<?php

class RelationsController extends BaseController
{

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
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array(),
//				'users'=>array('@'),
//			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','update', 'delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
//	public function actionView()
//	{
//		$this->render('view',array(
//			'model'=>$this->loadModel(),
//		));
//	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Relations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if (Yii::app()->request->isAjaxRequest)
        {
    		$module_id = substr($_POST["module_id"], 1, strlen($_POST["module_id"]));
            
            if (isset($_POST["imageCheckbox"]) && !empty($_POST["imageCheckbox"]))
            {
				foreach($_POST["imageCheckbox"] as $object_id)
				{
				    $objects = "";
                    $objects = Yii::app()->db->createCommand("SELECT count(*) FROM core_relations WHERE module_id = {$module_id} AND object_id = {$object_id} LIMIT 1")->queryScalar();
                    //print_r($images);
                    if (empty($objects) && $objects == 0){
                        Yii::app()->db->createCommand("INSERT INTO core_relations (module_id, object_id) VALUES ({$module_id},{$object_id})")->execute();
                    }
				}
                echo Yii::t("gallery", "INFO_MOVETOGALLERYSUCCESS");
			}else{
			     echo Yii::t("gallery", "INFO_MOVETOGALLERYFAILED");
			}
		}else{
		  echo Yii::t("gallery", "INFO_MOVETOGALLERYMAININFO");
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['relations']))
		{
			$model->attributes=$_POST['relations'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
            $module_id = $_GET["module_id"];
            $object_id = $_GET["object_id"];
            
            //echo "module - ".$module_id;
            
            $criteria = new CDbCriteria();
            $criteria->condition = "module_id = :module_id AND object_id = :object_id";
            $criteria->params = array(":module_id" => $module_id, ":object_id" => $object_id);
            
            $relation = Relations::model()->find($criteria);
            
			// we only allow deletion via POST request
			//$this->loadModel()->delete();
            if ($relation->delete()){
                echo "kustutatud";
            }else{
                echo "ei saa kustutada";
            }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
				//$this->redirect(Yii::app()->request->urlReferrer);
            
		}
		else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Relations::model()->findByPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='relations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
