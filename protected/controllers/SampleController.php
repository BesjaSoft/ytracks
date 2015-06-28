<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SampleController
 *
 * @author fred
 */
class sampleController extends BaseController {

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
                'actions' => array('index', 'view', 'testUI'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
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

    public function behaviors() {
        return array('EAsteroid' => array('class' => 'ext.Asteroid.behaviors.EAsteroid'));
    }

    public function actionIndex() {
        $this->render('index', array());
    }

    public function actionTestUI() {

        $this->Asteroid('a3')->onEvent('click', '#clickMe')
                ->replace('#myDiv1', '_p1',
                        function() {
                            return array('var1' => 'Yeah!', 'var2' => 'You clicked me…');
                        })
                        ->asteroid('a2')
                ->prepend('#myDiv2', '_p2', function() {
                            return array('var3' => 'Im Here!', 'var4' => 'You know it!');
                        })
                ->orbit();

        $this->render('index');
    }

}

?>
