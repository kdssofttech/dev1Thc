<?php
/**
 * @package		Joomla.Site
 * @subpackage	Templates.beez5
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
$user	=& JFactory::getUser();
$this->baseurl=JURI::base();

$user 	=& JFactory::getUser();
$user_id=$user->get('id');
$db			=& JFactory::getDBO();
//get the provider info
$db->setQuery("SELECT * from #__thc_providers where user_id='$user_id'");
$providerProfile=$db->loadObjectList();


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
?>
<?php if(!$templateparams->get('html5', 0)): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else: ?>
	<?php echo '<!DOCTYPE html>'; ?>
<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/reset.css" type="text/css" rel="stylesheet">
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/styles.css" type="text/css" rel="stylesheet">
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/font-awesome.css" type="text/css" rel="stylesheet">
<!--[if gte IE 9]>
  		<style type="text/css">
    		.gradient {filter: none;}
  		</style>
	<![endif]-->
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/scripts/jquery-1.7.1.min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/fancybox/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/fancybox/jquery.fancybox.js?v=2.1.3"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/fancybox/jquery.fancybox.css?v=2.1.2" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
			}
);
</script>	


<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/modernizr.custom.79639.js"></script> 
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

				var dd = new DropDown( $('#dd1') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
        
        
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

				var dd = new DropDown( $('#dd2') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});
			
			
		</script>
        



        
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(".box .close").click(function () {
    $(this).parent().hide()
})
});//]]>  
</script>


        
</head>
<body>
<div id="bg-container">


	<header class="header">
		<div class="container">

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
			<?php if($this->countModules('merchant-menu')):?>
		<div class="memberNav provNav">
				<jdoc:include type="modules" name="merchant-menu" />
			
			<?php endif;?>
		</div>
        
        
		<nav id="nav-notification">
				<div class="wrapper-user-nav">
					<div id="dd1" class="wrapper-dropdown-1" tabindex="1"><span id="nav-notification-icon" title="My Notifications"></span>
						<ul class="dropdown">
							<!--<li><a href="/index.php?option=com_thcpos&amp;view=thcpos&amp;Itemid=1065"><strong>MEMBERS CHECKED IN</strong> <p>2 members Checked In at your business.<br/> Send a Payment Request.</p></a></li>-->
							<li>There are no new notifications at this time.</p></li>
						</ul>
					</div>
				</div>
		</nav>
        
        
		<nav id="nav-account">
				<div class="wrapper-user-nav">
					<div id="dd2" class="wrapper-dropdown-2" tabindex="1"><span id="profile-pic-thumb-image" style="background-image: url('<?php if($providerProfile[0]->provider_pic!=''){ ?>/images/provider_pic/thumb_<?php echo $providerProfile[0]->provider_pic;?><?php }else{?>/templates/totalhealthcard/images/user-profile-pic.png<?php }?>');" title="My Profile"></span>
					 <?php if($user->get('id')>0 && $user->get('username')!=''){?>
						<ul class="dropdown">
							<li><a href="<?php echo JRoute::_('index.php?option=com_provider&view=providereditprofile&Itemid=1064');?>"><i class="icon-user"></i>Edit Profile</a></li>
							<li><a href="javascript:void(this);" onclick="javascript:document.login_form.submit();"><i class="icon-remove"></i>Log out</a></li>
						</ul>
						<?php }?>
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
    </div><!-- container -->
</header>

<!--<div id="notification-box">
	<div class="container">
        <div class="box" id="dialog">
            <div class="close">X Close</div>
            <div class="box thc-notification title"><strong>MEMBERS CHECKED IN</strong> You have 2 members Checked In at your business. <a href="<?php echo JRoute::_('index.php?option=com_thcpos&view=thcpos&Itemid=1065');?>">Send a Payment Request.</a></div>	
            <div class="box thc-notification title"><strong>NOTIFICATION</strong> Your account credentials have been verified.</div>	
        </div>
    </div>
</div>-->

    
<div class="container">    
	<div id="container-main">

		<div class="bodyMain <?php echo $homeClass;?>">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		</div>

	</div><!-- END #container-main -->
</div></div><!-- container -->






<footer class="footer">
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
</div><!-- END #bg-container -->

</body>
</html>
