<?php
/**
 * @package		Joomla.Site
 * @subpackage	Templates.beez5
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.00
defined('_JEXEC') or die;
$this->baseurl=JURI::base();
$user	=& JFactory::getUser();
// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));
if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}
JHtml::_('behavior.framework', true);
// get params
$color			= $this->params->get('templatecolor');
$logo			= $this->params->get('logo');
$navposition	= $this->params->get('navposition');
$app			= JFactory::getApplication();
$doc			= JFactory::getDocument();
$templateparams	= $app->getTemplate(true)->params;

$menu = $app->getMenu();
$homeClass='';
if ($menu->getActive() == $menu->getDefault()) {
       $homeClass="homeBody";
}
//load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);
$db		=& JFactory::getDBO();
$user 	=& JFactory::getUser();
$userId	= (int) $user->get('id');
$peronalInfo=$db->setQuery("SELECT * from #__thc_members where user_id='$userId'");
$personalRecord=$db->loadObjectList();
?>
<?php if(!$templateparams->get('html5', 0)): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else: ?>
	<?php echo '<!DOCTYPE html>'; ?>
<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/reset.css" type="text/css" rel="stylesheet">
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/styles.css" type="text/css" rel="stylesheet">
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/font-awesome.css" type="text/css" rel="stylesheet">

<!--[if gte IE 9]>
  		<style type="text/css">
    		.gradient {filter: none;}
  		</style>
	<![endif]-->
<!--<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/scripts/jquery-1.7.1.min.js"></script>-->

<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/fancybox/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/fancybox/jquery.fancybox.js?v=2.1.3"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/fancybox/jquery.fancybox.css?v=2.1.2" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.videoTourLink').fancybox();
			$('.fancybox').fancybox();
			}
);
</script>			


<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/thcprovidertpl<?php //echo $this->template; ?>/js/modernizr.custom.79639.js"></script> 
<noscript><link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/noJS.css" /></noscript>
        
		<script type="text/javascript">

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
        
        
        
<!--[if IE 6]>
<link href="Home_Page_files/axurerp_pagespecificstyles_ie6.css" type="text/css" rel="stylesheet">
<![endif]-->


<!--<script src="/templates/totalhealthcard/js/jquery-1.4.4.min.js" type="text/javascript"></script>-->
 
<script src="/templates/totalhealthcard/js/jsCarousel-2.0.0.js" type="text/javascript"></script>

<link href="/templates/totalhealthcard/css/jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />
 

    <script type="text/javascript">
        $(document).ready(function() {
 
            $('#carouselv').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true, masked: false, itemstodisplay: 3, orientation: 'h' });

        });       
 
    </script>
 



</head>
<body>

<div class="container">


	<header class="header">
		<!--login/logout html-->
<div class="row" style="float:left;">

	<!-- Logo -->
    <div id="top-logo" class="six columns">
    <a href="<?php echo JURI::base();?>"><img src="/templates/totalhealthcardv1/assets/backgrounds/header-logo-beta.png" /></a>
    </div><!-- END #top-logo -->





<?php if($this->countModules('top1')):?>
			<nav class="mainNav">
			<jdoc:include type="modules" name="top1" />
			</nav>
			<div class="divide divide0"></div>
			<?php endif;?>
			<?php if($this->countModules('member-menu')):?>
		<div class="memberNav">
				<jdoc:include type="modules" name="member-menu" />
			
			<?php endif;?>
		</div>
        
        

<nav>
		<div class="wrapper-user-nav">
			<div id="dd" class="wrapper-dropdown-2" tabindex="1"><span id="profile-pic-thumb-image" style="background-image: url('<?php if($personalRecord[0]->member_pic!=''){ ?>/images/member_pic/thumb_<?php echo $personalRecord[0]->member_pic;?><?php }else{?>/templates/totalhealthcard/images/user-profile-pic.png<?php }?>');" title="My Profile"></span>
				<ul class="dropdown">
					<li><a href="<?php echo JRoute::_('index.php?option=com_users&view=profile&layout=edit-personal&Itemid=1058');?>"><i class="icon-user"></i>Edit Profile</a></li>
					<li><a href="javascript:void(this);" onclick="javascript:document.login_form.submit();"><i class="icon-remove"></i>Log out</a></li>
				</ul>
			</div>
		</div>
</nav>



<form action="<?php echo JRoute::_('index.php'); ?>" method="post" id="login-form" name="login_form">
<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="user.logout" />
<input type="hidden" name="return" value="<?php echo $returnurl; ?>" />
<?php echo JHtml::_('form.token'); ?>
</form>
 <!-- Login/Sign up -->
        
        
</div><!--end .row-->
    		
</header>
    
    
<div id="container-main">
    
		<?php if ($menu->getActive() == $menu->getDefault()) { ?>
		<jdoc:include type="message" />
		<div class="bodyMain homeBody bodyBackground">
		
		<div class="bodyInner mainBody">
		<h1>A healthy decision for you, and your wallet.</h1>
		
		<div class="bodyInnerContent">
		
			<p class="darkGreyText">Total Healthcard is a revolutionary marketing platform where everyday healthy activities are rewarded with lifestyle savings accessed through cutting-edge mobile payment software.</p>
		
			<p class="darkGreyText">Members complete healthy activities to earn points and those points equal levels of savings when shopping within our provider network. Our mobile payment software allows for quick, easy, and discrete discounts. Total Healthcard is bringing health tracking and loyalty savings to the next level. <span class="greenText"><strong><a href="<?php echo JRoute::_('index.php?option=com_users&view=registration&Itemid=1044');?>">Sign up for FREE!</a></strong></span></p>
		
			<div class="mainButtons">
				<div class="alignLeft" id="signUpButton">
					FOR YOU - LIMITED BETA <!--<a class="" href=""><u>More Info</u></a>-->
					<?php if($user->get('id')==0 || $user->get('username')==''):?>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration&Itemid=1044');?>" class="signupbutton">Signup Up Now. Free!</a>
					<?php endif;?>
				</div>
				<div class="spacer alignLeft"></div>
				<div class="alignLeft" id="learnMoreButton">
					For Providers
					<a href="<?php echo JRoute::_('index.php?option=com_provider&view=provider_request&Itemid=1056');?>" class="learnbutton" id="u38" >Learn More</a>
				</div>
			</div>
		
			<a href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/home_image/u109_normal.jpg" class="videoTourLink"><span class="greenText" style="font-family:Arial;font-size:16px;font-weight:bold;font-style:normal;text-decoration:none;color:#006600;">Take a 2 minute video tour.</span></a>
		
		</div>
		</div>
		<div class="divide divide2 centered"></div>
		</div>		
		<div class="bodyMain homeBody">
		
		<div class="bodyInner">
		<div class="cleared topMargin">
		<!--signupcircle.jpg-->
			<img class="alignRight leftMargin" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/thc-home-arrow-graphic.png" alt=""/>
		
			<h2 class="darkGreyText">Limited Beta Program Open Now!</h2>
		
			<p class="darkGreyText"><strong>Here's how it works:</strong> You have been invited to be part of a special project. It's simple, just sign up, attach your credit card (there will be no charge and your information is stored securely with authorize.net), locate a provider, use your Total Healthcard to pay at point of purchase, and <span class="greenText"><strong>SAVE 20%.</strong></span> Yep, it's that easy.</p>
		
			<h2 class="darkGreyText">Save Money While Getting Healthly!</h2>
		
			<p class="darkGreyText">Activities such as working out, eating healthy, and getting a massage are all tracked through our website or your mobile device. Your savings are accessed through our state of the art mobile payment application. Each purchase you make is discounted to the level you've earned just by being a healthy person!</p>
		</div>
		
		<div class="cleared topMargin">
			<img class="alignLeft rightMargin" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/thc-home-bar-chart.png"/>
		
			<h2 class="darkGreyText">Multiple Levels of Savings</h2>
		
			<p class="darkGreyText">Work out to work up! We reward your healthy habits with points. The greater the points the greater your savings when shopping with Total Healthcard providers.</p>
		</div>
		
		<p class="callUsLink greenText">Questions? Call Us! 1-855-868-2595</p>
		
		</div>
		</div>




		<?php }else{?>
		<div class="bodyMain <?php echo $homeClass;?>">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		</div>
		<?php } ?>

</div><!-- END #container-main -->

<footer class="footer">
		<div class="innerFooter">
			<?php if($this->countModules('footer')):?>
			<?php if($user->get('id')==0 || $user->get('username')==''):?>
			<jdoc:include type="modules" name="footer" />
			<?php endif;?>
			<?php endif;?>
		</div>
        
        
        
        

<div>
<div id="footer-nav" class="sixteen columns">
			<a class="item" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=126&Itemid=1053');?>" class="nav_what_is_thc item">WHAT IS TOTAL HEALTHCARD?</a>
            <a class="item" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=127&Itemid=1054');?>" class="nav_how-it-works item">HOW IT WORKS</a>
            <a class="item" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=134&Itemid=1053');?>" class="nav_faqs small item">FAQs</a>
            <a class="item" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=132&Itemid=1053');?>" class="nav_company small item">COMPANY</a>

<br/>
<a href="<?php echo JURI::base();?>"><img style="margin-top:15px;" src="<?php echo JURI::base();?>templates/totalhealthcardv1/assets/backgrounds/footer-logo.png" /></a>
<br/>

<a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=124&Itemid=1054');?>" class="fine-print">Terms of Service</a> | <a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=124&Itemid=1054');?>" class="fine-print">Privacy Policy</a>
<br/>
<p style="text-align:center; float:none; color:#666; font: 10px normal Helvetica, Arial, sans-serif;">Copyright 2013</p>

</div><!-- END #footer-nav -->
</div>



        
	</footer>
<!--Login popup for fancybox-->
<div id="loginwithFancy" style="display:none; width:510px;text-align:left; height:310px;">
<!--<jdoc:include type="modules" name="thc-loginopopup" />
--></div>



</div><!-- END .container -->

</body>
</html>
