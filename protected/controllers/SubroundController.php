<?php

class SubroundController extends Controller
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
				'actions'=>array('index','view','autoComplete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','addParticipants','copyResults'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	    $this->render('view',array('model'=>$this->loadModel(),));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Subround;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subround']))
		{
			$model->attributes=$_POST['Subround'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subround']))
		{
			$model->attributes=$_POST['Subround'];
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Subround');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Subround('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Subround']))
			$model->attributes=$_GET['Subround'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    /**
     * @abstract performs an autocomplete search on the type based on Make.name and t.name
     */
    public function actionAutoComplete()
    {
        $res = array();

        if (isset($_GET['term'])) {

            $criteria = new CDbCriteria;
            $criteria->addSearchCondition('concat(round.name," ",round.start_date," ",subroundtype.name)', $_GET['term']);
            $criteria->order ='concat(round.start_date,round.name,subroundtype.name)';
            $criteria->select = 'id';

            $model   = new Subround();
            $results = $model->with(array('subroundtype','round'))->findAll($criteria);
            foreach($results as $result){
                $res[] = array
                         (   // label for dropdown list
                           'value'=> $result->round->name." ".$result->round->start_date."/".$result->subroundtype->name,  // value for input field
                           'id'   => $result->id,                            // return value from autocomplete
                         );
            }
        }

        echo CJSON::encode($res);
        Yii::app()->end();
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
				$this->_model=Subround::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


    public function actionAddParticipants()
    {
        $model = $this->loadModel();
        $model->addParticipants();

        $this->render('view',array('model'=>$model,));
    }

    public function actionCopyResults()
    {
        $model = $this->loadModel();
        $model->copyResults();

        $this->render('view',array('model'=>$model,));
    }

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='subround-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
