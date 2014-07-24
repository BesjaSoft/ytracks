<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/* ------------------------------------------------------------------------------ */

class jwd_T {
	var $_params_cookie = null; //Params will store in cookie for user select. Default: store all params
	var $_tpl = null;
	var $template = '';
	


	function jwd_T ($template, $_params_cookie=null) {
		$this->_tpl = $template;		
		$this->template = $template->template;
		
		if(!$_params_cookie) {
			$this->_params_cookie = $this->_tpl->params->toArray();
		} else {
			foreach ($_params_cookie as $k) {
				$this->_params_cookie[$k] = $this->_tpl->params->get($k);
			}
		}
		
		$this->getUserSetting();
	}
	
	function getUserSetting(){		
		$exp = time() + 60*60*24*355;
		if (isset($_COOKIE[$this->template.'_tpl']) && $_COOKIE[$this->template.'_tpl'] == $this->template){
			foreach($this->_params_cookie as $k=>$v) {
				$kc = $this->template."_".$k;
				if (isset($_GET[$k])){
					$v = $_GET[$k];
					setcookie ($kc, $v, $exp, '/');
				}else{
					if (isset($_COOKIE[$kc])){
						$v = $_COOKIE[$kc];
					}
				}
				$this->setParam($k, $v);
			}
			
		}else{
			setcookie ($this->template.'_tpl', $this->template, $exp, '/');
		}		
		return $this;
	}

	function getParam ($param) {
		if (isset($this->_params_cookie[$param])) {
			return $this->_params_cookie[$param];
		}
		return $this->_tpl->params->get($param);
	}

	function setParam ($param, $value) {
		$this->_params_cookie[$param] = $value;
	}
	

	function getCurrentURL(){
		$cururl = JRequest::getURI();
		if(($pos = strpos($cururl, "index.php"))!== false){
			$cururl = substr($cururl,$pos);
		}
		$cururl =  JRoute::_($cururl, true, 0);
		return $cururl;
	}


	
	function getCurrentMenuIndex(){	
		$Itemid = JRequest::getInt( 'Itemid');
		$database		=& JFactory::getDBO();
		$id = $Itemid;
		$menutype = 'mainmenu';
		$ordering = '0';
		while (1){
			$sql = "select parent, menutype, ordering from #__menu where id = $id limit 1";
			$database->setQuery($sql);
			$row = null;
			$row = $database->loadObject();			
			if ($row) {
				$menutype = $row->menutype;
				$ordering = $row->ordering;
				if ($row->parent > 0)
				{
					$id = $row->parent;
				}else break;
			}else break;
		}

		$user	=& JFactory::getUser();
		if (isset($user))
		{
			$aid = $user->get('aid', 0);
			$sql = "SELECT count(*) FROM #__menu AS m"
			. "\nWHERE menutype='". $menutype ."' AND published='1' AND access <= '$aid' AND parent=0 and ordering < $ordering";
		} else {
			$sql = "SELECT count(*) FROM #__menu AS m"
			. "\nWHERE menutype='". $menutype ."' AND published='1' AND parent=0 and ordering < $ordering";
		}
		$database->setQuery($sql);

		return $database->loadResult();
	}
		
	
	
	function isIE6 () {
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$msie='/msie\s(5\.[5-9]|[6]\.[0-9]*).*(win)/i';
		return isset($agent) &&
			preg_match($msie,$agent) &&
			!preg_match('/opera/i',$agent);
	}	
	
	function baseurl(){
		return JURI::base();
	}
	
	function templateurl(){
		return JURI::base()."templates/".$this->template;
	}
	
	

	function isFrontPage(){
		return (JRequest::getCmd('option')=='com_content' && !JRequest::getInt('id'));
	}
	
	function sitename() {
		$config = new JConfig();
		return $config->sitename;
	}

	function browser () {
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if ( strpos($agent, 'Gecko') )
		{
		   if ( strpos($agent, 'Netscape') )
		   {
		     $browser = 'NS';
		   }
		   else if ( strpos($agent, 'Firefox') )
		   {
		     $browser = 'FF';
		   }
		   else
		   {
		     $browser = 'Moz';
		   }
		}
		else if ( strpos($agent, 'MSIE') && !preg_match('/opera/i',$agent) )
		{
			 $msie='/msie\s(5\.[5-9]|[6]\.[0-9]*).*(win)/i';
		   	 if (preg_match($msie,$agent)) $browser = 'IE6';
		   	 else $browser = 'IE7';
		}
		else if ( preg_match('/opera/i',$agent) )
		{
		     $browser = 'OPE';
		}
		else
		{
		   $browser = 'Others';
		}
		return $browser;
	}
}



/* ------------------------------------------------------------------------------- */




$JWDT = new jwd_T($this);

$jwd_L = $this->countModules('left');
$jwd_R = $this->countModules('right');

if ( $jwd_L && $jwd_R ) {
	$layerclass = '_3';
	} elseif ( $jwd_L ) {
	$layerclass = '_2';
	} elseif ( $jwd_R ) {
	$layerclass = '_1';
	} else {
	$layerclass = '_0';
}

$curidx = $JWDT->getCurrentMenuIndex();
//if ($curidx) $curidx--;

//Calculate the width of template
$MainW = '';
$tmpcoverMin = '100%';
switch ($JWDT->getParam('jwd_screen')){
	case 'auto':
		$MainW = '97%';
		break;
	case 'fluid':
		$MainW = intval($JWDT->getParam('jwd_screen_width'));
		$MainW = $MainW ? $MainW.'%' : '90%';
		break;
	case 'fix':
		$MainW = intval($JWDT->getParam('jwd_screen_width'));
		$tmpcoverMin = $MainW ? ($MainW+1).'px' : '751px';
		$MainW = $MainW ? $MainW.'px' : '750px';
		break;		
	default:
		$MainW = intval($JWDT->getParam('jwd_screen'));
		$tmpcoverMin = $MainW ? ($MainW+1).'px' : '751px';
		$MainW = $MainW ? $MainW.'px' : '750px';
		break;
}

//Embeded horizontal navigation
if($JWDT->getParam('MyNavigation')==1) {
	$menuType = $JWDT->getParam('MyNavigationMenuType');
	if (!$menuType) $menuType = 'mainmenu';
	
	$japarams = new JParameter('');
	$japarams->set( 'menu_images', 1 );                    //    Source of menu
	$japarams->set( 'menu_images_align', 'left' );
	$japarams->set( 'menutype', $menuType );
	
	include_once( dirname(__FILE__).DS.'menu/menu.php' );
	$jwdmenu = new jwd_CSSmenu ($japarams);	
}

// Users Modules
$usersmodules = 0;
if ($this->countModules('user1')) $usersmodules++;
if ($this->countModules('user2')) $usersmodules++;
if ($usersmodules == 2) {
	$userswidth = '49.9%';		
} else if ($usersmodules == 1) {
	$userswidth = '100%';
}

// Bottom Modules
$bottommodules = 0;
if ($this->countModules('user5')) $bottommodules++;
if ($this->countModules('user6')) $bottommodules++;
if ($this->countModules('user7')) $bottommodules++;
if ($this->countModules('user8')) $bottommodules++;
if ($bottommodules == 4) {
	$bottomwidth = '25%';
} else if ($bottommodules == 3) {
	$bottomwidth = '33.3%';
} else if ($bottommodules == 2) {
	$bottomwidth = '50%';		
} else if ($bottommodules == 1) {
	$bottomwidth = '100%';
}
?>
