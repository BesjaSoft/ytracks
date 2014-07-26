<?php

class ContainersController extends CController
{
	const PAGE_SIZE=10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_containers;

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
				'actions'=>array('display', 'test'),
				'users'=>array('*'),
			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'create', 'update', 'delete', 'show', 'linkto'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionDisplay()
	{
		//$this->layout = "main2";
        YiiBase::beginProfile("container");
        
		$criteria=new CDbCriteria;
        //$criteria->alias = "containers";
		$criteria->condition = "t.section_id = :section_id AND t.is_active = 1";
		$criteria->params=array(':section_id' => $_GET["section_id"]);
		
		// GET SECTION DATA
		$section = Section::model()->findByPk($_GET["section_id"]);
		$session = Yii::app()->getSession();
		$session["current_section"] = $section;

        //$session["breadcrumb"] = $section->getBreadcrumb();

		$containersList = Containers::model()->with(array("modules" => array("condition" => "modules.is_active = 1")))->findAll($criteria);

		$this->render('display',array(
			'containers'=>$containersList
		));
        YiiBase::endProfile("container");
        
	}
	
/*****************************************************************
** ADMIN FUNCTIONS
*****************************************************************/


	/**
	 * Shows a particular Containers.
	 */
	public function actionShow()
	{
		$this->layout = "admin";
		$this->render('show',array('Containers'=>$this->loadcontainers()));
	}

	/**
	 * Creates a new Containers.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$this->layout = "admin";
		$section_id = $_GET["section_id"];
		
		$containers = new Containers;
		if(isset($_POST['Containers']))
		{
			$containers->attributes=$_POST['Containers'];
			if($containers->save()){
				$this->redirect(array('admin', 'section_id'=>$section_id));
			}
		}
		
		$this->render('create',array('containers'=>$containers, "section_id" => $section_id));
	}

	/**
	 * Updates a particular Containers.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$this->layout = "admin";
		$container = $this->loadcontainers();
        
		if(isset($_POST['Containers']))
		{
			$container->attributes=$_POST['Containers'];
			if($container->save()){
                $this->redirect(array('admin', 'section_id'=>$container->section_id));
            }
		}
		$this->render('update', array('container'=>$container));
	}
	
	/**
	 * Deletes a particular Containers.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		//if(Yii::app()->request->isPostRequest)
//		{
			// we only allow deletion via POST request
			$this->loadcontainers()->delete();
			$this->redirect(array('admin', "section_id" => $_GET["section_id"]));
		//}
//		else
//			throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all containerss.
	 */
	public function actionAdmin()
	{
        Yii::beginProfile("container");
        
		$this->layout = "admin";
		$this->processAdminCommand();

		$section_id = $_GET["section_id"];
		
		$criteria = new CDbCriteria;
		$criteria->condition = "section_id = :section_id";
		$criteria->params = array(':section_id' => $section_id);
        $criteria->order = "rank ASC";

		$containers = Containers::model()->findAll($criteria);

		$this->render('admin',array(
			'containers'=>$containers,
			'section_id'=> $section_id
		));
        Yii::endProfile("container");
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadcontainers($id=null)
	{
		if($this->_containers===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_containers=Containers::model()->findByPk($id!==null ? $id : $_GET['id']);
			if($this->_containers===null)
				throw new CHttpException(500,'The requested Containers does not exist.');
		}
		return $this->_containers;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadcontainers($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
