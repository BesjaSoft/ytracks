<?php

class IndividualController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','autoComplete','ajaxTwinOrDoubles','chart'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','combine','twinsOrDoubles'),
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
	public function actionView()
	{
        $this->hasSearchForm = true;
        $this->searchForm = '_actionsearch';
        $this->searchModel = new Individual();
	
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Individual();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Individual']))
		{
			$model->attributes=$_POST['Individual'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		} else {
		    $model->published = true;
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Individual']))
		{
			$model->attributes=$_POST['Individual'];
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria(array(
            'condition' => 'published=1',
            'order' => 'full_name asc',
        ));
        if(isset($_GET['tag'])) {
            $criteria->addSearchCondition('tags',$_GET['tag']);
        }

        // This is just for disabling buttons which have no results
        $acCriteria=new CDbCriteria;
        $acCriteria->select='DISTINCT(SUBSTR(`full_name`,1,1)) AS `full_name`';
        $chars = Individual::model()->findAll($acCriteria);
        foreach ($chars as $char) {
            $activeChars[]=$char->full_name;
        }

		Yii::import('application.extensions.alphapager.ApActiveDataProvider');
		
        $dataProvider=new ApActiveDataProvider('Individual', 
            array(
            	'alphapagination' => array(
                	'attribute' => 'full_name',
                	'activeCharSet' => $activeChars,
            ),
            'pagination'=>array(
                'pageSize'=>Yii::app()->params['postsPerPage'],
            ),
            'criteria'=>$criteria,
        ));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	    $model=new Individual('search');
	    $model->unsetAttributes();  // clear any default values
	    if (isset($_GET['Individual'])) {
                $model->attributes=$_GET['Individual'];
	    }

	    $this->render('admin',array('model'=>$model,));
	}

    	public function actionChart(){

        	$this->render("geochart");
    	}	
	
	public function actionTwinOrDoubles()
	{
		$model=new Individual('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Individual'])) {
			$model->attributes=$_GET['Individual'];
		}

		$this->render('twinordoubles',array('model'=>$model,));
	}	
	
	/**
	 * action : Combine
	 * purpose : combines two individuals into one. 
	 */
	 /*
	public function actionCombine()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['combineId']))
		{
			$combineId=$_POST['combineId'];
			if($model->combine($combineId)) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('combine',array('model' => $model,));
	}*/
	
	public function actionCombine($id, $combineId){
		$model = Individual::model()->findbyPk($id);
		if ($model->combine($combineId)) {
			$this->redirect("twinsordoubles");
		} else {
			$this->errorpage();
		}
	}
	/*
	public function actionTwinsOrDoubles() {
		
	}
	* */
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id'])){
				$this->_model=Individual::model()->findbyPk($_GET['id']);
			}
			if($this->_model===null) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='individual-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * performs an autocomplete search on the Individual
     */
    public function actionAutoComplete()
    {
        $res = array();

        if (isset($_GET['term'])) {
            $model = new Individual();
            $res   = $this->searchModel($model, $_GET['term']);
        }

        echo CJSON::encode($res);
        Yii::app()->end();
    }

}
