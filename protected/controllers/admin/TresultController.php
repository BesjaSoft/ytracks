<?php

class TresultController extends Controller {

    public $layout = '//layouts/column1';
    private $_model;

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'getTypes', 'getVehicles'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'delete', 'export'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new Tresult;

        $this->performAjaxValidation($model);

        if (isset($_POST['Tresult'])) {
            $model->attributes = $_POST['Tresult'];


            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if (isset($_POST['Tresult'])) {
            $model->attributes = $_POST['Tresult'];

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'trindividuals' => $model->trindividuals,
        ));
    }

    /**
     * @param integer $id the ID of the model to be displayed
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel($id)->delete();

            if (!isset($_GET['ajax'])) {
                $this->redirect(array('index'));
            }
        } else {
            throw new CHttpException(400, Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionExport($id, $showUpdate = false) {
        $model = $this->loadModel($id);

        if (Tresult::model()->addIndividuals($model, true)) {
            if (Tresult::model()->export($model)) {
                $model->deleted = 1;
                $model->save();

                $this->redirect(array('admin/tresult/admin'));
            }
        }
        if ($showUpdate) {
            $this->render('update', array('model' => $model,));
        }
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tresult');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin() {
        $model = new Tresult('search');
        //if(isset($_GET['Tresult']))
        //	$model->attributes=$_GET['Tresult'];

        $this->render('admin', array('model' => $model,));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Tresult::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tresult-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function addIndividuals($id = null) {
        // Check op id
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Tresult', true), 'default', array(), 'error');
        } else {
            if ($this->Tresult->addindividuals($id, true)) {
                $this->Session->setFlash(__('Individuals added', true), 'default', array(), 'info');
            } else {
                $this->Session->setFlash(__('Individuals not added', true), 'default', array(), 'info');
            }
        }
        $this->redirect($this->referer(array('action' => 'view')));
    }

    public function actionGetTypes() {
        $tresult = $_POST['Tresult'];
        $data = Type::model()->list()->findAll('make_id=:make_id', array(':make_id' => (int) $tresult['make_id']));

        $data = CHtml::listData($data, 'id', 'name');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Select a Type'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionGetVehicles() {
        $tresult = $_POST['Tresult'];
        $data = Vehicle::model()->list()->findAll('type_id=:type_id', array(':type_id' => (int) $tresult['type_id']));
        echo 'type:' . $tresult['type_id'];
        $data = CHtml::listData($data, 'id', 'chassisnumber');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Select a Vehicle'), true);
        foreach ($data as $value => $chassisnumber) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($chassisnumber), true);
        }
    }

}
