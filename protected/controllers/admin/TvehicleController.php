<?php

class TvehicleController extends BaseController {

    public $layout = '//layouts/column2';
    private $_model;

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'getTypes', 'getVehicles'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'delete', 'update', 'export'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView() {
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }

    public function actionCreate() {
        $model = new Tvehicle;

        $this->performAjaxValidation($model);

        if (isset($_POST['Tvehicle'])) {
            $model->attributes = $_POST['Tvehicle'];

            if ($model->save()) {
                if ($model->IsDone()) {
                    $this->runResultCommand($model->tvehicle);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model,));
    }

    public function actionUpdate() {
        $model = $this->loadModel();

        $this->performAjaxValidation($model);

        if (isset($_POST['Tvehicle'])) {
            $model->attributes = $_POST['Tvehicle'];

            if ($model->save()) {
                if ($model->IsDone()) {
                    $this->runResultCommand($model->tvehicle);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        } else {
            $model->convertTvehicle();
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel()->delete();

            if (!isset($_GET['ajax'])) {
                $this->redirect(array('index'));
            }
        } else {
            throw new CHttpException(400, Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tvehicle');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Tvehicle('search');
        //if(isset($_GET['Tvehicle']))
        //	$model->attributes=$_GET['Tvehicle'];

        $this->render('admin', array('model' => $model,));
    }

    public function actionGetTypes() {
        $tresult = $_POST['Tvehicle'];
        $data = Type::model()->list()->findAll('make_id=:make_id', array(':make_id' => (int) $tresult['make_id']));

        $data = CHtml::listData($data, 'id', 'name');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('-- Type --'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionGetVehicles() {
        $tresult = $_POST['Tvehicle'];
        $data = Vehicle::model()->list()->findAll('type_id=:type_id', array(':type_id' => (int) $tresult['type_id']));
        echo 'type:' . $tresult['type_id'];
        $data = CHtml::listData($data, 'id', 'chassisnumber');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('-- Vehicle --'), true);
        foreach ($data as $value => $chassisnumber) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($chassisnumber), true);
        }
    }

    public function actionExport() {
        if ($this->loadModel()->export()) {
            $model = $this->loadModel();
            if ($model->IsDone()) {
                $this->runResultCommand($model->tvehicle);
            }
            $this->redirect(array('admin'));
        } else {
            $this->redirect(array('update', 'id' => $model->id));
        }
    }

    private function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $this->_model = Tvehicle::model()->findbyPk($_GET['id']);
            }
            if ($this->_model === null) {
                throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
            }
        }
        return $this->_model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tvehicle-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function runResultCommand($vehicle) {
        $commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
        $runner = new CConsoleCommandRunner();
        $runner->addCommands($commandPath);
        $commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
        $runner->addCommands($commandPath);
        $args = array('yiic', 'result', '--section=wsrp', '--vehicle=' . $vehicle . '');
        ob_start();
        $runner->run($args);
        echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
    }

}
