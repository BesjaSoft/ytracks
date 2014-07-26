<?php

class ModulesController extends CController
{
	const PAGE_SIZE=10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_modules;

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
				'actions'=>array('show', 'Getviews'),
				'users'=>array('*'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','update', 'delete', 'move'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Shows a particular modules.
	 */
	public function actionShow()
	{
		$this->layout = "admin";
		$this->render('show',array('modules'=>$this->loadmodules()));
	}

	/**
	 * Creates a new modules.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$this->layout = "admin";
		$modules = new Modules;
		
		$container_id = (isset($_GET["container_id"]) ? $_GET["container_id"] : 0);
		$section_id = (isset($_GET["section_id"]) ? $_GET["section_id"] : 0);
		
		if(isset($_POST['Modules']))
		{
			$modules->attributes=$_POST['Modules'];
			if($modules->save()){
				$this->redirect(array('containers/admin','section_id'=>$section_id));
			}
		}
		
		
		$this->render('create',array('modules'=>$modules, "container_id" => $container_id, "section_id" => $section_id));
	}

	/**
	 * Updates a particular modules.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$this->layout = "admin";
        
        $container_id = (isset($_GET["container_id"]) ? $_GET["container_id"] : 0);
		$section_id = (isset($_GET["section_id"]) ? $_GET["section_id"] : 0);
        
		$modules=$this->loadmodules();
		if(isset($_POST['Modules']))
		{
			$modules->attributes = $_POST['Modules'];
            if ($modules->validate())
            {
    			if($modules->save()){
    				$this->redirect(array('containers/admin','section_id'=>$section_id));
                }
            }
		}
		$this->render('update',array('modules'=>$modules, "section_id" => $_GET["section_id"]));
	}
	
	/**
	 * Deletes a particular modules.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$section_id = $_GET["section_id"];
			// we only allow deletion via POST request
			$this->loadmodules()->delete();
			//$this->redirect(array('containers/admin', "section_id" => $section_id));
		}
		else
			throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
	}
    
    public function actionMove()
    {
        $id = $_GET["id"];
        $direction = $_GET["direction"];
        
        $criteria = new CDbCriteria;
        $criteria->select = "*, @a := rank, (SELECT id FROM core_modules WHERE rank < @a AND container_id = :container_id ORDER BY rank DESC LIMIT 1 ) AS prev_id,
(SELECT rank FROM core_modules WHERE rank < @a AND container_id = :container_id ORDER BY rank DESC LIMIT 1 ) AS prev_rank,
(SELECT id FROM core_modules WHERE rank > @a AND container_id = :container_id ORDER BY rank ASC LIMIT 1 ) AS next_id,
(SELECT rank FROM core_modules WHERE rank > @a AND container_id = :container_id ORDER BY rank ASC LIMIT 1 ) AS next_rank ";
		$criteria->condition = "id = :id AND container_id = :container_id";
		$criteria->params = array(":id" => $_GET["id"], ":container_id" => $_GET["container_id"]);
        $criteria->order = "rank ASC";
                
        //print_r ($criteria);
		$module = Modules::model()->find($criteria);
        
        //echo "prev - ".$module->prev_id."<br />";
        //echo "next - ".$module->next_id."<br />";
        if ($direction == "up"){
            if ($module->rank >= 2){
                Modules::model()->updateByPk($module->id, array("rank" => $module->rank - 1 ));
            }
            Modules::model()->updateByPk($module->prev_id, array("rank" => $module->prev_rank + 1 ));
        }
        
        if ($direction == "down"){
            Modules::model()->updateByPk($module->id, array("rank" => $module->rank + 1 ));
            Modules::model()->updateByPk($module->next_id, array("rank" => $module->next_rank - 1));
        }
		
        $this->redirect(array("containers/admin", "section_id" => $_GET["section_id"]));
        
    }

	/**
	 * Lists all moduless.
	 */
	public function actionList()
	{
		$criteria=new CDbCriteria;

		$pages=new CPagination(Modules::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$modulesList=Modules::model()->findAll($criteria);

		$this->render('list',array(
			'ModulesList'=>$modulesList,
			'pages'=>$pages,
		));
	}

	/**
	 * Manages all moduless.
	 */
	public function actionAdmin()
	{
		$this->layout = "admin";
		$this->processAdminCommand();

		$criteria=new CDbCriteria;
        $criteria->order = "rank ASC";

		$pages=new CPagination(Modules::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('modules');
		$sort->applyOrder($criteria);

		$modulesList=Modules::model()->findAll($criteria);

		$this->render('admin',array(
			'ModulesList'=>$modulesList,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadmodules($id=null)
	{
		if($this->_modules===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_modules=Modules::model()->findByPk($id!==null ? $id : $_GET['id']);
			if($this->_modules===null)
				throw new CHttpException(500,'The requested modules does not exist.');
		}
		return $this->_modules;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadmodules($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
	
	public function actionGetviews()
	{
		$this->layout = false;
		
 		$data = Yii::app()->modules[$_POST['Modules']['module']];
        if (is_array($data) && !empty($data)){
    	    foreach($data["blocks"] as $value=>$name)
    	    {
    	        echo CHtml::tag('option', array('value' => $value),CHtml::encode($name),true);
    	    }
        }else{
            echo CHtml::tag('option', array('value' => ""),CHtml::encode(Yii::t("general", "TXT_CHOOSE")),true);
        }
	}
}

