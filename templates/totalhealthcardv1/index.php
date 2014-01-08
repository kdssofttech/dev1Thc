<?php
/**
 * @package     Skeleton for Joomla!
 * @copyright   Copyright (C) 2012 CloudHotelier. All rights reserved.
 * @license     GNU/GPL v3 or later
 * @link        http://www.cloudhotelier.com
 * @author      Xavier Pallicer <xpallicer@gmail.com>
 */
// no direct access
defined('_JEXEC') or die;

// initialize template
require dirname(__FILE__) . DS . 'helper.php';
$tpl_options = TplSkeletonHelper::initializeTemplate($this);
$user  =& JFactory::getUser();

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

    <head>
    
    
    <?php
$app = JFactory::getApplication();
$this->setTitle( $this->getTitle() . ' | ' . $app->getCfg( 'sitename' ) );
?>
    

        <jdoc:include type="head" />

        <?php if ($tpl_options->analytics):?>

            <script type="text/javascript">

              var _gaq = _gaq || [];
              _gaq.push(['_setAccount', '<?php echo $tpl_options->analytics;?>']);
              _gaq.push(['_trackPageview']);

              (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();

            </script>

        <?php endif;?>
        <script type="text/javascript" src="<?php echo JURI::base();?>plugins/system/azrul.system/pc_includes/ajax_1.5.pack.js"></script>
      
        
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/jskeleton.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
		
		<!-- Add jQuery library -->
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-1.10.1.min.js"></script>
		
		<!-- Add venobox -->
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/venobox/venobox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/venobox/venobox.min.js"></script>
		
    </head>

    <body>

        
        
<!-- The container is a centered 960px -->
<div class="container">


<!-- Start Header -->
<div id="header" class="sixteen columns">
<!--login/logout html-->
<div class="row" style="margin-bottom:0; height:40px;">
<form action="<?php echo JRoute::_('index.php'); ?>" method="post" id="login-form" name="login_form">
<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="user.logout" />
<input type="hidden" name="return" value="<?php echo $returnurl; ?>" />
<?php echo JHtml::_('form.token'); ?>
</form>
 <!-- Login/Sign up -->
 <?php if($user->get('id')>0 && $user->get('username')!=''){?>
      <div id="top-login" class="sixteen columns">
    <?php if($user->get('ProviderUserType')=='ThcProvider'){?>
<a href="<?php echo JRoute::_('index.php?option=com_users&view=profile&Itemid=1064',false);?>" class="small black login"><span class="username">Go to My Total HealthCard Dashboard ›</span></a>
    <?php }else{?>
<a href="<?php echo JRoute::_('index.php?option=com_users&view=profile&Itemid=1058',false);?>" class="small black login"><span class="username">Go to My Total HealthCard Dashboard ›</span></a>
    <?php }?>

         
    <a href="javascript:void(this);" onclick="javascript:document.login_form.submit();" class="small black logout button"><span class="log-in">Log out</span></a>
        
        </div><!-- END #top-login -->
  <?php }else{?>
  <div id="top-login" class="sixteen columns">


<a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=131&Itemid=1076',false);?>" class="small black login button"><span class="log-in">Log in</span></a>

         <div class="divider"></div>
         
    <a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=133&Itemid=1076',false);?>" class="small orange signup button"><span class="sign-up">Sign up</span></a>
    
     <div class="divider"></div>
         
    <a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=138&Itemid=1076',false);?>" class="small request-provider button"><span class="request-provider">Be a Provider</span></a>
        
        </div>
  <?php }?>  
  
      
</div>
<!--end html-->
<jdoc:include type="modules" name="header" />
</div><!-- END #header -->


<!-- Start Main -->
<div id="main">
<?php if ($this->getBuffer('message')) : ?>
<jdoc:include type="message" />
<?php endif; ?>
<jdoc:include type="component" />  
</div><!-- END #main -->

<!-- Start Footer -->
<div id="footer" class="sixteen columns">
<jdoc:include type="modules" name="footer" />
</div><!-- END #footer -->


</div><!-- END .container -->

        	<script type="text/javascript">
		 $(document).ready(function(){
			$('.venobox').venobox({
				numeratio: true,
				border: '20px'
			});
			$('.venoboxvid').venobox({
				bgcolor: '#000'
			});
			$('.venoboxframe').venobox({
				border: '6px'
			});
			$('.venoboxinline').venobox({
				framewidth: '300px',
				frameheight: '250px',
				border: '6px',
				bgcolor: '#f46f00'
			});
			$('.venoboxajax').venobox({
				border: '30px;',
				frameheight: '220px'
			});
		})
	</script>
        

    </body>

</html>