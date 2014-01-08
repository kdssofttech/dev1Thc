<?php
/**
 * Joomla! 1.5 component Provider
 *
 * @version $Id: controller.php 2012-04-16 00:26:03 svn $
 * @author SSS
 * @package Joomla
 * @subpackage Provider
 * @license GNU/GPL
 *
 * Helm tutor database for manage the Student,tutor and admin section.
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

/**
 * Provider Component Controller users just copy of com_user controller
 */
class ProviderControllerProvider_request extends providerController {
	function display() {
     
		 // Make sure we have a default view

		$model = $this->getModel('provider');

		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		if (!$usersConfig->get( 'allowUserRegistration' )) {
			JError::raiseError( 403, JText::_( 'Access Forbidden' ));
			return;
		}

		$user 	=& JFactory::getUser();

		if ( $user->get('guest')) {
			JRequest::setVar('view', 'provider_request');
		} else {
			$this->setredirect('index.php?option=com_users&task=edit',JText::_('You are already registered.'));
		}


        if( !JRequest::getVar( 'view' )) {
		    JRequest::setVar('view', 'provider_request' );
        }

		$view = $this->getView( 'provider_request', 'html' );
		$view->setModel( $this->getModel( 'provider', 'providerModel' ), true );
		$view->display();
		//parent::display();
	}
	
	/**
	 * Save provider registration and notify users and admins if required
	 * @return void
	 */
	function saveRequest()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$model = $this->getModel('provider');
		
		$db		=& JFactory::getDBO();
		
		$mainframe		= JFactory::getApplication();
		// Check if registration is allowed
		$usersConfig = &JComponentHelper::getParams( 'com_users' );

		if($_POST['name']=='' || $_POST['email']=='' )
		{
			$msg = JText::_( 'Please complete the request form' );
			$mainframe->enqueueMessage($msg, 'message');
			return $this->execute('display');
		}


		$todayDate=date("Y-m-d h:i:s");
		
		
		foreach($_POST as $key=>$value) {
            $$key = $value;
        }

				
        $ipaddress=$_SERVER['REMOTE_ADDR'];

			
		/*	
		$db->setQuery("INSERT INTO ".$db->quoteName('#__thc_provider_request')." set name='".addslashes($name)."' , email='".$email."', company='$company',approx_employee='$approx_employee',message='$message', request_date='$todayDate',specialty_id='$specialty_id'" );
		*/
		$db->setQuery("INSERT INTO ".$db->quoteName('#__thc_provider_request')." set name='".addslashes($name)."' , email='".$email."', company='$company',phone_number='$phone_number',message='$message', request_date='$todayDate',specialty_id='$specialty_id',clientIP = '$ipaddress'" );

		

		if($db->query())
		{

			$this->_sendMail($_POST,$randomPwd);

		// Everything went fine, set relevant message depending upon user activation state and display message
		
			$message = JText::_( 'COM_PROVIDER_REQEST_COMPLETE' );
		}	
		
		
		$this->setRedirect('index.php', $message);
		
	}

	function _sendMail($_POST,$pwd)
	{
		$mainframe	= JFactory::getApplication();
		$db			=& JFactory::getDBO();
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];//$user->get('email');
		$company	=$_POST['company'];
		$content	=$_POST['message'];
		$phoneNumber =$_POST['phone_number'];

		$sitename 	= $mainframe->getCfg( 'sitename' );
		$mailfrom 	= $mainframe->getCfg( 'mailfrom' );
		$fromname 	= $mainframe->getCfg( 'fromname' );
		$siteURL	= JURI::base();

		//get all super administrator
		$query = 'SELECT U.name, U.email, U.sendEmail '.
				' FROM #__users AS U '.
				' INNER JOIN #__user_usergroup_map AS UG ON UG.user_id = U.id '.
				' INNER JOIN #__usergroups AS G ON G.id = UG.group_id '.
				' WHERE LOWER( G.title ) = "sales"';
		$db->setQuery( $query );
		$rows = $db->loadObjectList();

		// Send email to user
		if ( ! $mailfrom  || ! $fromname ) {
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;
		}

		//JUtility::sendMail($email, $fromname, $email, $subject, $message);

		// Send notification to all administrators
		$subject2 = sprintf ( JText::_( 'COM_PROVIDER_REQ_SUBJECT' ), $name, $sitename);
		$subject2 = html_entity_decode($subject2, ENT_QUOTES);


		// get superadministrators id

		
		foreach ( $rows as $row )
		{
			if ($row->sendEmail)
			{
			$admin_msg = sprintf ( JText::_( 'COM_PROVIDER_REQUEST' ),  $sitename, $name,$email,$company,$content,$siteURL);

			$admin_msg =
				"A new provider request has been submitted.\n\n".
				"Name:\n".$name."\n\n".
				"Email:\n".$email."\n\n".
				"Phone Number:\n".$phoneNumber."\n\n".
				"Company:\n".$company."\n\n".
				"Message:\n".$content."\n\n";


			$admin_msg = html_entity_decode($admin_msg, ENT_QUOTES);

				JUtility::sendMail($mailfrom, $fromname, $row->email, $subject2, $admin_msg);
				//JUtility::sendMail($mailfrom, $fromname, 'kds.softtech@gmail.com', $subject2, $admin_msg);
			}
		}

		
	}

	
}
?>