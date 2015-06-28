<?php

class ArticlesController extends BaseController
{
	const PAGE_SIZE=10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='index';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
				'actions'=>array('index', 'details'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('list','show', 'create', 'update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'update', 'create'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
   // public function beforeAction()
//    {
////        //echo "c " .$this->id;
////        $action = $this->getAction();
////        //echo "a ".$action->id;
////        $permission = ucfirst($this->id).ucfirst($action->id);
////        //echo "p ".$permission;
////        if(!Yii::app()->user->checkAccess($permission )) //'ArticlesUpdate'
////        {
////            throw new CHttpException(403,'Permissions denied.');
////        }
////        return true;
//    }

	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->condition = "status = ".Articles::STATUS_APPROVED;
		
		$pages=new CPagination(Articles::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('articles');
		$sort->applyOrder($criteria);
		
		$models=Articles::model()->findAll($criteria);

		$this->render('index',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Shows a particular model.
	 */
	public function actionDetails()
	{
		$this->render('details',array('model'=>$this->loadarticles()));
	}

	/**
	 * Shows a particular model.
	 */
	public function actionShow()
	{
		if (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin){
			$this->layout = "admin";
		}
		$this->render('show',array('model'=>$this->loadarticles()));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		if (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin){
			$this->layout = "admin";
		}
		
		$model=new Articles;
		if(isset($_POST['Articles']))
		{
			$model->attributes=$_POST['Articles'];
			if (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin){
				$model->status = 0;
			}
			$model->user_id = Yii::app()->user->id;
			if($model->save())
			{
				if (Yii::app()->user->isAdmin){
					$this->redirect(array('admin')); //,'id'=>$model->id));
				}else{
					$this->redirect(array('list')); //,'id'=>$model->id));
				}
				
			}
		}
		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{

		//print_r (Yii::app()->user);
		if (Yii::app()->user->isAdmin){
			$this->layout = "admin";
		}
	
		$model=$this->loadarticles();
		$params=array('Articles'=>$model);
//		if(Yii::app()->user->checkAccess('updateOwnArticle',$params))
//		{
//			
			if(isset($_POST['Articles']))
			{
				$model->attributes=$_POST['Articles'];
				if($model->save()){
					$this->redirect(array('show','id'=>$model->id));
				}
			}
//		}else{
//			echo "no permissions";
//		}
		$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			//print_r ($_POST);
			
			if (isset($_POST["articleCheckbox"]) && !empty($_POST["articleCheckbox"]) && $_POST["command"] == "deleteSelected"){
				foreach($_POST["articleCheckbox"] as $record)
				{
					Articles::model()->deleteByPk($record);
				}
			}else{
				// we only allow deletion via POST request
				$this->loadarticles()->delete();
			}
			$this->redirect(array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$criteria=new CDbCriteria;
		$criteria->condition = "user_id = :user_id"; 
        $criteria->params = array(":user_id" => Yii::app()->user->id);

		$pages=new CPagination(Articles::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Articles');
		$sort->applyOrder($criteria);
		
		$models=articles::model()->findAll($criteria);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		//print_r ($_POST);
		
		$this->layout = "admin";
		
		$this->processAdminCommand();
        
        $filter = new SearchArticlesForm();
        $filter->attributes = $_GET["SearchArticlesForm"];
        if ($filter->validate()){
            
        }

		$criteria=new CDbCriteria;

		$pages=new CPagination(Articles::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Articles');
		$sort->applyOrder($criteria);

		$models=Articles::model()->with('user', 'category')->findAll($criteria);

		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
            'filter' => $filter,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadarticles($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Articles::model()->findByPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadarticles($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
