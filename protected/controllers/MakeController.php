<?php

class MakeController extends BaseController {

    private $keywordSearchColumnArray = array('name'); //Columns to search
    public $currentSearchValue; //Current keword search string
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'autoComplete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {

        if (isset($_GET['Type'])) {
            $searchType = new Type('search');
            $searchType->unsetAttributes();  // clear any default values
            $searchType->attributes = $_GET['Type'];

            $this->render('view', array('model' => $this->loadModel(), 'searchType' => $searchType));
        } else {
            $this->render('view', array('model' => $this->loadModel(),
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Make;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Make'])) {
            $model->attributes = $_POST['Make'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Make'])) {
            $model->attributes = $_POST['Make'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array('model' => $model,));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $criteria = new CDbCriteria(array(
            'condition' => 'published=1',
            'order' => 'name asc',
        ));
        if (isset($_GET['tag']))
            $criteria->addSearchCondition('tags', $_GET['tag']);

        // This is just for disabling buttons which have no results
        $acCriteria = new CDbCriteria;
        $acCriteria->select = 'DISTINCT(SUBSTR(`name`,1,1)) AS `name`';
        $chars = Make::model()->findAll($acCriteria);
        foreach ($chars as $char)
            $activeChars[] = $char->name;

        $dataProvider = new ApActiveDataProvider('Make', array(
            'alphapagination' => array(
                'attribute' => 'name',
                'activeCharSet' => $activeChars,
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->params['postsPerPage'],
            ),
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
                //'criteria'=>$criteria,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Make('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Make']))
            $model->attributes = $_GET['Make'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Make::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'make-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * performs an autocomplete search on the Make
     */
    public function actionAutoComplete() {
        $res = array();

        if (isset($_GET['term'])) {
            $model = new Make();
            $res = $this->searchModel($model, $_GET['term']);
        }

        echo CJSON::encode($res);
        Yii::app()->end();
    }

    /**
     * Make the keyword search SQL.
     * @param       String  Search string input by user
     * @return      String  SQL condition
     */
    private function _makeKeywordSearchCondition($keywordStr) {
        $criteriaSql;           //Search condition
        //Split the string into an array of words and phrases
        //The string: Android "Web Apps"
        //will produce a two element array containing 'Android' and 'Web Apps'
        $elementArray = array();
        $regX = "/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|[\s,]+/";
        $tempArray = preg_split($regX, trim($keywordStr), 0, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($tempArray as $ind => $str) {
            if (trim($str)) {
                array_push($elementArray, $str);
            }
        }

        //Construct the search sql
        foreach ($this->keywordSearchColumnArray as $column) {
            foreach ($elementArray as $value) {
                $value = addSlashes($value);
                $value = '"%' . $value . '%"';
                if ($criteriaSql) {

                    $criteriaSql .= ' OR';
                }
                $criteriaSql .= " $column LIKE $value";
            }
        }
        return $criteriaSql;
    }

}
