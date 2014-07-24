<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).DS.'/jwd.php');
$siteName = $JWDT->sitename();
$logoText = (trim($JWDT->getParam('logoText'))=='') ? $config->sitename : $JWDT->getParam('logoText');
$sloganText = (trim($JWDT->getParam('sloganText'))=='') ? JText::_('SITE SLOGAN') : $JWDT->getParam('sloganText');
$fontSize = (trim($JWDT->getParam('fontSize'))=='') ? JText::_('SITE SLOGAN') : $JWDT->getParam('fontSize');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $JWDT->baseurl(); ?>templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $JWDT->baseurl(); ?>templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $JWDT->templateurl(); ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $JWDT->templateurl(); ?>/css/menu.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $JWDT->templateurl(); ?>/menu/suckerfish.css" type="text/css" />
<script type="text/javascript"><!--//--><![CDATA[//><!--

sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

//--><!]]></script>
<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {display: inline-block;}
</style>
<![endif]-->
<?php if ($JWDT->isIE6()) {
?>
<style type="text/css">
.clearfix {height: 1%;}
img {border: none;}
img , h1.logo a{behavior: url(<?php echo $JWDT->templateurl(); ?>/css/iepngfix.htc);}
#nav li ul { background-position: -1000px;}
h1.logo a { text-indent:-10000px; }
#nav li ul li, #nav li a { background:transparent url(<?php echo $JWDT->templateurl(); ?>/images/blank.png) no-repeat right;}
h1.logoimg img{ width:280px; height:60px;}
</style>
<?php } ?>
<style type="text/css">
#jwd_header, #jwd_navigation, #jwd_container, #jwd_footercover, #jwd_bottommodulescover { width: <?php echo $MainW; ?>; margin: 0 auto;}
#jwd_coverper {min-width: <?php echo $tmpcoverMin; ?>;}
body{font-size:<?php echo $fontSize; ?>;}






</style>
</head>

<body id="bd" class="<?php echo $JWDT->browser();?>" >
<a name="Top" id="Top"></a>
<div id="jwd_coverper">
<?php if($this->countModules('user4')) : ?><div id="jwd_search"><jdoc:include type="modules" name="user4" /></div><?php endif; ?>





<!-- B: HEADER -->
<div id="jwd_headercover">
	<div id="jwd_header" class="clearfix">
    <div id="jwd_header_left">
	<?php 
		 
		if ($JWDT->getParam('logoType')=='image') { ?>
		<h1 class="logoimg">
			<a href="index.php" title="<?php echo $siteName; ?>"><img src="<?php echo $JWDT->templateurl(); ?>/images/logo.png" border="0" alt="<?php echo $siteName; ?>" /></a>
		</h1>
	<?php } else { ?>
		<h1 class="logo-text">
			<a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $logoText; ?></span></a>	
		</h1>
		<p class="site-slogan"><?php echo $sloganText;?></p>
	<?php } ?>
    </div>
	
    <!-- B: BANNER MODULE -->
        <?php if($this->countModules('banner')) : ?><div id="jwd_banner"><jdoc:include type="modules" name="banner" /></div><?php endif; ?>
        <!-- FINISH: BANNER MODULE -->
        </div>
</div>
<!-- F: HEADER -->

<!-- B: NAV -->
<div id="jwd_navigationcover"><div id="jwd_navigation" class="clearfix"><?php $jwdmenu->genMenu (0); ?>
</div></div>
<!-- F: NAV -->


<div id="jwd_containercover<?php echo $layerclass; ?>">
<div id="jwd_containercover2">
	<div id="jwd_container">
	<div id="jwd_container2" class="clearfix">
		<div id="jwd_mainbody">
		
		<!-- B: CONTENT -->
		<div id="jwd_contentcover">
        <!-- B: TOP MODULE -->
		<?php if( $this->countModules('top') ) {?><div class="jwd_top-module"><jdoc:include type="modules" name="top" style="xhtml" /></div><?php } ?>
        <!-- FINISH: TOP MODULE -->
        
		<div id="jwd_content">
			<jdoc:include type="message" />
			<?php if(!$JWDT->isFrontPage()) : ?><div id="jwd_pathway"><jdoc:include type="module" name="breadcrumbs" /></div><?php endif ; ?>
			<jdoc:include type="component" />
		</div>
        <?php if ($this->countModules('user1') || $this->countModules('user2')) { ?>

        <!-- B: USERS MODULES -->
<div id="jwd_usersmodulescover">
    <div id="jwd_usersmodules">
        <?php if ($this->countModules('user1')) { ?>
        <div id="user1" style="width:<?php echo $userswidth; ?>;"><jdoc:include type="modules" name="user1" style="xhtml" /></div><?php } ?>
        <?php if ($this->countModules('user2')) { ?>
        <div id="user2" style="width:<?php echo $userswidth; ?>;"><jdoc:include type="modules" name="user2" style="xhtml" /></div><?php } ?>
    </div>
</div>
<!-- F: USERS MODULES -->
<?php } ?>     
		</div>
		<!-- F: CONTENT -->
		</div>
<?php if ($this->countModules('user9')) { ?>
        <div id="user9"><jdoc:include type="modules" name="user9" style="xhtml" /></div><?php } ?>
        <?php if ($this->countModules('right')) { ?><div id="jwd_sidebar1"><jdoc:include type="modules" name="right" style="xhtml" /></div><?php } ?>
		<?php if ($this->countModules('left')) { ?><div id="jwd_sidebar2"><jdoc:include type="modules" name="left" style="xhtml" /></div><br /><?php } ?>
	</div>
	</div>
</div>
</div>

<?php if ($this->countModules('user5') || $this->countModules('user6') || $this->countModules('user7')|| $this->countModules('user8')) { ?>
<!-- B: BOTTOM MODULES -->
<div id="jwd_bottommodulescover">
    <div id="jwd_bottommodules">
        <?php if ($this->countModules('user5')) { ?>
        <div id="user5" style="width:<?php echo $bottomwidth; ?>;"><jdoc:include type="modules" name="user5" style="xhtml" /></div><?php } ?>
        <?php if ($this->countModules('user6')) { ?>
        <div id="user6" style="width:<?php echo $bottomwidth; ?>;"><jdoc:include type="modules" name="user6" style="xhtml" /></div><?php } ?>
        <?php if ($this->countModules('user7')) { ?>
        <div id="user7" style="width:<?php echo $bottomwidth; ?>;"><jdoc:include type="modules" name="user7" style="xhtml" /></div><?php } ?>
        <?php if ($this->countModules('user8')) { ?>
    	<div id="user8" style="width:<?php echo $bottomwidth; ?>;"><jdoc:include type="modules" name="user8" style="xhtml" /></div><?php } ?>
    </div>
</div>
<!-- F: BOTTOM MODULES -->
<?php } ?>

<!-- B: FOOTER -->
<div id="jwd_footercover">
<div id="jwd_footer" class="clearfix">
	<div id="jwd_bottomnavigation"><jdoc:include type="modules" name="user3" /></div>
	<div class="copyright">
      <!-- You CAN NOT remove (or unreadable) those links without permission. Removing the link and template sponsor Please visit joomlaweb.com or contact with e-mail (webmaster@joomlaweb.com) If you don't want to link back to joomlaweb.com, you can always pay a link removal donation fee of 20 USD. This will allow you to use the template link free on one domain name. Also, kindly send me the site's url so I can include it on my list of verified users . Please read license.txt -->
    <div>Copyright &copy;  <?php echo $siteName; ?>. All Rights Reserved. <a href="http://www.joomlaweb.com">Joomla Templates</a> by <a href="http://www.joomlaweb.com">JoomlaWeb</a> <br />
        <a href="http://www.bestofjoomla.com">Joomla Templates</a> Sponsored by <a href="http://www.bestofjoomla.com">  Best of Joomla!</a></div>
    <jdoc:include type="modules" name="myfooter" />
    </div>
	
	<div class="jwd_valid">
		<a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo urlencode(JRequest::getURI());?>" target="_blank" title="<?php echo JText::_("CSS Validity");?>" style="text-decoration: none;">
		<img src="<?php echo $JWDT->templateurl(); ?>/images/icon-css.gif" border="none" alt="<?php echo JText::_("CSS Validity");?>" />
		</a>
		<a href="http://validator.w3.org/check/referer" target="_blank" title="<?php echo JText::_("XHTML Validity");?>" style="text-decoration: none;">
		<img src="<?php echo $JWDT->templateurl(); ?>/images/icon-xhtml.gif" border="none" alt="<?php echo JText::_("XHTML Validity");?>" />
		</a>
        <a href="index.php?format=feed&type=rss" target="_blank" title="<?php echo JText::_("RSS");?>" style="text-decoration: none;">
		<img src="<?php echo $JWDT->templateurl(); ?>/images/icon-rss.gif" border="none" alt="<?php echo JText::_("RSS");?>" />
		</a>
	</div>

</div>
</div>
<!-- F: FOOTER -->
</div>
<jdoc:include type="modules" name="debug" />
</body>
</html>