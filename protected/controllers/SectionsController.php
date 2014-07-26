<?php

class SectionsController extends CController
{
	const PAGE_SIZE=10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_section;
	
	private $ids; 

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('list','show'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update', 'moveup', 'movedown', 'admin','delete', 'linkto', 'standalone', 'linker'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new tree.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$this->layout = "admin";
		$tree = new Section;
		
		//print_r ($_POST);
		
		// retreave language from session 
		$session = Yii::app()->getSession();
		if (isset($_GET["section_lang"]))
		{	
			$session["section_lang"] = $_GET["section_lang"];	
		}else{
			if (!isset($session["section_lang"]))
			{
				$session["section_lang"] = "et";
			}
		}
		
		$criteria = new CDbCriteria;
		$criteria->condition = "lang = '".$session["section_lang"]."'";
		$criteria->select = 'id, name, level';
		$criteria->order = "lft ASC";

		$root = Section::model()->findAll($criteria);
			
		if (!empty($_POST))
		{
			$tree->attributes = $_POST['Section'];
			
			if ($tree->validate())
			{
                $c2 = new CDbCriteria();
                $c2->condition = "id = :id AND lang = '".$session["section_lang"]."'";
                $c2->params = array(":id" => $_POST['Section']["id"]);
				$parent = Section::model()->find($c2);
	
                //echo "name - ".$parent->name." ; ".$parent->lang;
    
				$newNode = new Section;
	    		$newNode->name = $tree->name;
	    		$newNode->lang = $_POST['Section']["lang"];
	    		if (isset($_POST["external_url_chk"]) && $_POST["external_url_chk"] == 1){
		    		$newNode->external_url = (substr($tree->external_url, 0, 7) == "http://" ? $tree->external_url : ($tree->external_url != "" ? "http://".$tree->external_url : ""));
	    		}
	    		
	    		if (isset($_POST["internal_url_chk"]) && $_POST["internal_url_chk"] == 1)
				{
	    			$newNode->internal_url = $tree->internal_url;
	    		}
	    		$newNode->is_newwindow = $tree->is_newwindow;
	    		$newNode->is_standalone = $tree->is_standalone;
	    		$newNode->is_active = $tree->is_active;
	    		
	    		//print_r ($newNode);
	    		$parent->appendChild($newNode); //You do not have to use the "save" function here.
	    		$this->redirect(array('admin'));
    		
    		}
//				$tree->lft = $last->lft + 1;  //_POST['Section']['lft'] = $last->rgt + 1;
//				$tree->rgt = $last->lft + 2;  //_POST['Section']['rgt'] = $last->rgt + 2;
//				$tree->level = $last->level+1; //_POST['Section']['level'] = $last->level;
//				$tree->external_url = (substr($_POST["Section"]["external_url"], 0, 7) == "http://" ? $_POST["Section"]["external_url"] : ($_POST["Section"]["external_url"] != "" ? "http://".$_POST["Section"]["external_url"] : ""));
//				$tree->lang = $_POST['Section']["lang"];
//				
//				$tree->updateCounters(array("rgt" => "2"), "rgt > ".$last->lft." AND lang = '".$session["navLanguage"]."'");
//				$tree->updateCounters(array("lft" => "2"), "lft > ".$last->lft." AND lang = '".$session["navLanguage"]."'");

		}
		
		// CREATE COMBO
		$combo = array();
		$indent = "";
       	foreach($root as $key => $value)
        {
        	for($i = 1; $i <= $value["level"]; $i++){
        		$indent .= "...";
        	}
       		$combo[$value["id"]] = $indent.$value["name"];
       		$indent = "";
       	}
           	
       	// CREATE MODULES LIST
        //$modules = Section::model()->getModules();
	 	foreach(Section::model()->getModules() as $key => $module)
        {
       		$modules[$module["url"]] = $module["name"];
       	}
		$this->render('create',array('tree'=>$tree, "combo" => $combo, "modules" => $modules));
	}

	/**
	 * Updates a particular tree.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$this->layout = "admin";
		
		// get session
		$session = Yii::app()->getSession();
		if (isset($_GET["section_lang"]))
		{	
			$session["section_lang"] = $_GET["section_lang"];	
		}else{
			if (!isset($session["section_lang"]))
			{
				$session["section_lang"] = "et";
			}
		}
		
		
		$treeNode=$this->loadtree();
		if(isset($_POST['Section']))
		{
			$treeNode->attributes=$_POST['Section'];
			
			if ($treeNode->validate())
			{
				$parent = Section::model()->findByPK($_POST['Section']["id"]); //"$criteria2);
		
				if ($_POST['Section']['id'] == $parent->id)
				{
					//$newNode = new Section;
		    		//$treeNode->name = $treeNode->name;
		    		//$treeNode->lang = $_POST['Section']["lang"];
		    		
		    		if (isset($_POST["external_url_chk"]) && $_POST["external_url_chk"] == 1){
			    		$treeNode->external_url = (substr($treeNode->external_url, 0, 7) == "http://" ? $treeNode->external_url : ($treeNode->external_url != "" ? "http://".$treeNode->external_url : ""));
		    		}else{
		    			$treeNode->external_url = NULL;
		    		}
		    		
		    		if (isset($_POST["internal_url_chk"]) && $_POST["internal_url_chk"] == 1)
					{
		    			$treeNode->internal_url = $treeNode->internal_url;
		    		}else{
		    			$treeNode->internal_url = NULL;
		    		}
	    		
					//$treeNode->external_url = (substr($_POST["Section"]["external_url"], 0, 7) == "http://" ? $_POST["Section"]["external_url"] : ($_POST["Section"]["external_url"] != "" ? "http://".$_POST["Section"]["external_url"] : ""));
		    		//$parent->appendChild($newNode); //You do not have to use the "save" function here.
		    		$treeNode->save();
				}else{
				
					$newNode = new Section;
		    		$newNode->name = $tree->name;
		    		$newNode->lang = $_POST['Section']["lang"];
		    		
		    		if (isset($_POST["external_url_chk"]) && $_POST["external_url_chk"] == 1){
			    		$newNode->external_url = (substr($treeNode->external_url, 0, 7) == "http://" ? $treeNo->external_url : ($treeNode->external_url != "" ? "http://".$treeNode->external_url : ""));
		    		}else{
		    			$newNode->external_url = NULL;
		    		}
		    		
		    		if (isset($_POST["internal_url_chk"]) && $_POST["internal_url_chk"] == 1)
					{
		    			$newNode->internal_url = $treeNode->internal_url;
		    		}else{
		    			$newNode->internal_url = NULL;
		    		}
					$newNode->is_newwindow = $tree->is_newwindow;
	    			$newNode->is_standalone = $tree->is_standalone;
	    			$newNode->is_active = $tree->is_active;
	    		
					//$newNode->external_url = (substr($_POST["Section"]["external_url"], 0, 7) == "http://" ? $_POST["Section"]["external_url"] : ($_POST["Section"]["external_url"] != "" ? "http://".$_POST["Section"]["external_url"] : ""));
		    		$parent->appendChild($newNode); //You do not have to use the "save" function here.
	    		}
	    		
	    		$this->redirect(array('admin'));
			}
//				$tree->lft = $last->lft + 1;
//				$tree->rgt = $last->lft + 2;
//				$tree->level = $last->level + 1;
//				$tree->lang = $_POST['Section']["lang"];
//				$tree->external_url = (substr($_POST["Section"]["external_url"], 0, 7) == "http://" ? $_POST["Section"]["external_url"] : ($_POST["Section"]["external_url"] != "" ? "http://".$_POST["Section"]["external_url"] : ""));

//				$tree->updateCounters(array("rgt" => "2"), "rgt > ".$last->lft." AND lang = '".$session["navLanguage"]."'");
//				$tree->updateCounters(array("lft" => "2"), "lft > ".$last->lft." AND lang = '".$session["navLanguage"]."'");
//				
//			
		}
		
		// CREATE COMBO
		$criteria=new CDbCriteria;
		$criteria->condition = "lang = '".$session["section_lang"]."'";
		$criteria->select = 'id, name, level';
		$criteria->order = "lft ASC";

		$root = Section::model()->findAll($criteria);
		
		$combo = array();
		$indent = "";
       	foreach($root as $key => $value)
        {
        	for($i = 1; $i <= $value["level"]; $i++){
        		$indent .= "...";
        	}
       		$combo[$value["id"]] = $indent.$value["name"];
       		$indent = "";
       	}
       	
       	// CREATE MODULES LIST
	 	foreach(Section::model()->getModules() as $key => $module)
        {
       		$modules[$module["url"]] = $module["name"];
       	}
       	
		$this->render('update',array('tree'=>$treeNode, "combo" => $combo, "modules" => $modules));
	}

	/**
	 * Lists all trees.
	 */
	 
	public function actionAdmin() //
	{
		$this->layout = "admin";
	
		// retreave language from session
		$session = Yii::app()->getSession();
		if (isset($_GET["section_lang"]))
		{	
			$session["section_lang"] = $_GET["section_lang"];	
		}else{
			if (!isset($session["section_lang"]))
			{
				$session["section_lang"] = "et";
			}
		}
		
			ob_start();

			$criteria = new CDbCriteria;
			$criteria->condition = "lang = '".$session["section_lang"]."' AND name = 'Root'";
			$tmp = Section::model()->find($criteria);
			
            $root = Section::model()->findByPk($tmp->id);
            
	//		
//			$newNode = new Section();
//            $newNode->name = "First Node";
//            $root->appendChild($newNode); //You do not have to use the "save" function here.

            $tree2 = $root->getNestedTree();
           	
           	foreach($tree2 as $key => $subtree)
            {
            	//echo $key.": ".$this->printNestedTreeOriginal($subtree);
           		$tree .= $this->printNestedTreeOriginal($subtree);
           	}

            // Let's do some modifications:

//            $newNode2->moveLeft(); //You do not have to use the "save" function here.
//            echo "<h3>Move Second Node to the left</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }
//
//            $newNode3->moveUp(); //You do not have to use the "save" function here.
//            echo "<h3>Move the GrandChild node up</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }
//
//            $newNode3->moveBelow($newNode2);
//            echo "<h3>Move GrandChild Down to Second</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }
//
//            $newNode2->moveRight();
//            echo "<h3>Move Second to the right</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }
//
//            $newNode3->moveBefore($newNode);
//            echo "<h3>Move GrandChild before the first node</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }
//
//    		$newNode->moveBelow($newNode2);
//            echo "<h3>Move First Node below the second</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }

           // $newNode2->deleteNode();
//            echo "<h3>Delete only the Second Node</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }

//            $newNode->moveBelow($newNode3);
//            echo "<h3>Move First Node below the GrandChild</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }

           // $newNode3->deleteNode(true);
//            echo "<h3>Delete the GrandChild and all children</h3>";
//            $tree2 = $root->getNestedTree();
//            foreach($tree2 as $key => $subtree)
//            {
//                echo $key.": ".$this->printNestedTree($subtree);
//            }
    		$message = ob_get_clean();

			
    		$this->render('admin',array('tree' => $tree, "tree2" => $tree2));
	}


	private function printNestedTree($tree)
	{
	    $result = array(
						'label' => $tree['node']->name, //." (".$tree['node']->getLeftValue().",".$tree['node']->getRightValue().")", 
						'url' => array('site/index')
						);
	    if(is_array($tree['children']))
	    {
	        foreach($tree['children'] as $key => $child)
    	    {
    	    	$result['subs'][$child['node']->id] = $this->printNestedTree($child);
				
    	    }
	    }
	    
	    return $result;
	}
	
	
//  !!! ORGINAL 
	var $j = 0; 
	private function printNestedTreeOriginal($tree)
	{

		$indent = "";
		for	($i = 0; $i <= $tree['node']->level; $i++){
			$indent .= "&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$j += 1;
 		$result = '<tr><td width="300px;">'.$indent;
		 
		if ($tree['node']->external_url != null)
		{
			$result .= CHtml::link($tree['node']->name, $tree['node']->external_url, array("target" => "_blank"));
		}
		if ($tree['node']->internal_url != null)
		{
			$result .= CHtml::link($tree['node']->name, array($tree['node']->internal_url));
		}
		if ($tree['node']->external_url == null && $tree['node']->internal_url == null)
		{
			$result .= CHtml::link($tree['node']->name, array("/containers/admin", "section_id" => $tree['node']->id))." <font color='#999999'>(".$tree['node']->getLeftValue().",".$tree['node']->getRightValue().")</font>";
		}
			
		$result .= '</td>';
        $result .= '<td width="150px">'.
            Yii::t("section", "SECTION_ISACTIVE").': '.($tree["node"]->is_active == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO")).'<br />'.
            //Yii::t("section", "SECTION_ISVISIBLE").': '.($tree["node"]->is_visible == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO")).'<br />'.
            Yii::t("section", "SECTION_NEWWINDOW").': '.($tree["node"]->is_newwindow == 1 ? Yii::t("general", "TXT_YES") : Yii::t("general", "TXT_NO")).'</td>';
        $result .= '<td width="150px">'.
            ($tree["node"]->internal_url != null || $tree["node"]->internal_url != "" ? Yii::t("section", "SECTION_INTERNALURL").': '.$tree["node"]->internal_url.'<br />' : "").
            ($tree["node"]->external_url != null || $tree["node"]->external_url != "" ? Yii::t("section", "SECTION_EXTERNALURL").': '.$tree["node"]->external_url.'</td>' : "");
        $result .= '<td><div class="actions_menu"><ul>';
		
		if ($tree['node']->level != 0)
		{ 
			//if (is_array($tree['children']) && count($tree['children']) != 1){
				$result .= "<li>".CHtml::link(Yii::t("general", "BTN_UP"), array("moveup", "id" => $tree['node']->id), array("class" => "up"))."</li>";
				$result .= "<li>".CHtml::link(Yii::t("general", "BTN_DOWN"), array("movedown", "id" => $tree['node']->id), array("class" => "down"))."</li>";
		 	//}
			$result .= "<li>".CHtml::link(Yii::t("general", "BTN_DELETE"), array("delete", "id" => $tree['node']->id), array('confirm'=>Yii::t("general", "TXT_DELETEPROMPT", array("%s" => $tree["node"]->name)), "class" => "delete"))."</li>"; 
			$result .= "<li>".CHtml::link(Yii::t("general", "BTN_EDIT"), array("update", "id" => $tree['node']->id), array("class" => "edit"))."</li>";
            if ($tree['node']->external_url == null && $tree['node']->internal_url == null)
            {
                $result .= "<li>".CHtml::link(Yii::t("general", "BTN_EDITMODULES"), array("/containers/admin", "section_id" => $tree['node']->id), array("class" => "modules"))."</li>";
            }
  	   }
     	$result .= "</ul></div></td></tr>";
     	
	    if(is_array($tree['children']))
	    {
	        //$result .= "<tr>";
	        foreach($tree['children'] as $key => $child)
    	    {
    	        //$result .= "<td>";
    	        //"child ".$key.": ".
    	        $result .= $this->printNestedTreeOriginal($child, $section_id, $direction);
    	        //$result .= "<a href='moveup/id/".$child['node']->id."'>move up</a> || <a href='movedown/id".$child['node']->id."/direction/down'>move down</a>";
     	        //$result .= "</td>";
    	    }
    	    //$result .= "</tr>";
	    }
	    
	    return $result;
	}
	
	private function printNestedTreeCombo($tree)
	{
	    $result[$tree['node']->id] = $tree['node']->name;
	    if(is_array($tree['children']))
	    {
	        foreach($tree['children'] as $key => $child)
    	    {
    	    	$indent = "";
    	    	for($i = 1; $i <= $child['node']->level; $i++){
					$indent .= "...";
				}
    	    	$result[$child['node']->id] = $indent." ".$child['node']->name;
				$result[$child['node']->id] = $this->printNestedTreeCombo($child);
    	    }
	    }
	    
	    return $result;
	}
	
	
	public function actionMoveup()
	{
		$id = $_GET['id'];
		
		$node = Section::model()->findByPK($id);
		$node->moveLeft();
		
  		$this->redirect(array('admin'));
		
	}
	
	public function actionMovedown()
	{
		$id = $_GET['id'];

		$node = Section::model()->findByPK($id);
		$node->moveRight();

  		$this->redirect(array('admin'));
		
	}
	
	/**
	 * Deletes a particular tree.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		$id = $_GET['id'];

		//$root = Section::model()->findByPK(1);
		$node = Section::model()->findByPk($id);
		$node->deleteNode();
		
  		$this->redirect(array('admin'));
	}
    
    public function actionLinkto()
    {
        $this->layout = "admin";
        
        // get session
		$session = Yii::app()->getSession();
		if (isset($_GET["navLanguage"]))
		{	
			$session["navLanguage"] = $_GET["navLanguage"];	
		}else{
			if (!isset($session["navLanguage"]))
			{
				$session["navLanguage"] = "et";
			}
		}
        
        if (isset($_POST) && !empty($_POST)){
            
        }
        
   	    // CREATE COMBO
		$criteria=new CDbCriteria;
		$criteria->condition = "lang = '".$session["navLanguage"]."'";
		$criteria->select = 'id, name, level';
		$criteria->order = "lft ASC";

		$root = Section::model()->with('containers')->findAll($criteria);
		
        $this->render('linkto',array("root" => $root, "object_id" => $_GET["object_id"]));
    }
	
    public function actionGetcontainers()
    {
        $containers = Containers::model()->findByAttributes(array("section_id" => $_GET["section_id"]));
        
        return $containers;
    } 
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadtree($id=null)
	{
		if($this->_section===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_section=Section::model()->findByPk($id!==null ? $id : $_GET['id']);
			if($this->_section===null)
				throw new CHttpException(500,'The requested tree does not exist.');
		}
		return $this->_section;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadtree($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
    
    
    /**
     * SectionsController::actionStandalone()
     *  Shows standalone pages 
     * @return void
     */
    public function actionStandalone()
    {
        $this->layout = "admin";
		
        $criteria = new CDbCriteria;
		$criteria->condition = "is_standalone = 1";
		$standalonepages = Section::model()->findAll($criteria);
       
    	$this->render('standalone', array('standalonepages' => $standalonepages));
        
    }
    
    
    public function actionLinker()
    {
        $this->layout = false;
		
        $criteria = new CDbCriteria;
		$criteria->condition = "is_standalone = 1";
		$pages = Section::model()->findAll($criteria);
       
        
    	$this->render('linker', array('pages' => $pages));
        
    }
    
}
