<?php

class CategoriesController extends CController {

    const PAGE_SIZE = 20;

    /**
     * @var string specifies the default action to be 'list'.
     */
    public $defaultAction = 'admin';

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
            array('allow', // allow all users to perform 'list' and 'show' actions
                'actions' => array('esileht'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'hierarchy', 'move'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'show' page.
     */
    public function actionCreate() {
        $this->layout = "admin";

        $model = new Categories;
        if (isset($_POST['Categories'])) {
            $model->attributes = $_POST['Categories'];
            if ($model->validate()) {
                $file = new Files;
                $file->image = CUploadedFile::getInstance($model, 'fileImage');

                if (!empty($file->image->name)) {
                    // CONFIGURATION
                    $randomFilename = md5(time() * rand());
                    $directory = Yii::app()->params['categories'];

                    //$model->image = CUploadedFile::getInstance($model, 'Filedata');

                    $file->filesize = $file->image->size;
                    $file->mimetype = $file->image->type;
                    $file->directory = $directory;
                    $file->filename = $randomFilename . '.' . $file->image->extensionName;

                    // additional info
                    $file->is_image = true;
                    $file->title = $model->title;
                    $file->status = 1;

                    $file->object_name = "category";

                    // MAKING AND SAVING THUMNAIL
                    $thumb = Yii::app()->image->load($file->image->tempName);
                    $thumb->resize(180, 120);
                    $thumb->save($directory . "/" . $randomFilename . '.' . $file->image->extensionName);


                    if (!$file->save()) {
                        echo "Tekkis viga";
                    }

                    if ($file != null) {
                        $model->image_id = $file->id;
                    }
                }

                if ($model->save()) {
                    $this->redirect(array('admin'));
                }
            }
        }
        $this->render('create', array('model' => $model));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'show' page.
     */
    public function actionUpdate() {
        $this->layout = "admin";

        $model = Categories::model()->with('images')->findByPk($_GET["id"]);
        if (isset($_POST['Categories'])) {
            $model->attributes = $_POST['Categories'];
            if ($model->validate()) {
                $file = new Files;
                $file->image = CUploadedFile::getInstance($model, 'fileImage');

                if (!empty($file->image->name)) {

                    // CONFIGURATION
                    $randomFilename = md5(time() * rand());
                    $directory = Yii::app()->params['categories'];

                    // DELETE FILE BEFORE ADDING NEW
                    if ($model->image_id > 0) {
                        $tmpFile = Files::model()->findByPk($model->image_id);

                        if (is_file($tmpFile->directory . "/" . $tmpFile->filename)) {
                            unlink($tmpFile->directory . "/" . $tmpFile->filename);
                        }
                        Files::model()->deleteByPk($model->image_id);
                    }

                    $file->filesize = $file->image->size;
                    $file->mimetype = $file->image->type;
                    $file->directory = $directory;
                    $file->filename = $randomFilename . '.' . $file->image->extensionName;

                    // additional info
                    $file->is_image = true;
                    $file->title = $model->title;
                    $file->status = 1;
                    $file->object_name = "category";

                    // MAKING AND SAVING THUMNAIL
                    $thumb = Yii::app()->image->load($file->image->tempName);
                    $thumb->resize(180, 120);
                    $thumb->save($directory . "/" . $randomFilename . '.' . $file->image->extensionName);


                    if (!$file->save()) {
                        echo "Tekkis viga";
                    }

                    if ($file != null) {
                        $model->image_id = $file->id;
                    }
                }

                if ($model->save()) {
                    $this->redirect(array('admin'));
                }
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'list' page.
     */
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadcategories()->delete();
            $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = "admin";

        $this->processAdminCommand();

        // genereate cateogries form
        $form = new SearchCategoriesForm();

        // SAVE FILTER FOR SEARCHING
        $session = Yii::app()->getSession();

        //print_r ($_POST);

        if (isset($_POST["SearchCategoriesForm"])) {
            $form->attributes = $_POST["SearchCategoriesForm"];
            $session["SearchCategories"] = $form->getAttributes();
        }
        if (isset($session["SearchCategories"])) {
            foreach ($session["SearchCategories"] as $attribute => $value) {
                $form->{$attribute} = $value;
            }
        }
        // END FILTER SAVING
        // PROCESS DELETION OF IMAGES OR COMPANIES
        $this->processAdminCommand();

        $criteria = new CDbCriteria;

        if ($form->validate()) {
            if (isset($session["SearchCategories"])) {
                $tmpSql = array();
                //print_r ($session["ConferencesSearch"]);

                foreach ($session["SearchCategories"] as $attribute => $value) {
                    if ($attribute == "keyword" && !empty($value)) {
                        $tmpSql[] = "title LIKE '%" . $value . "%'";
                    }

                    if ($attribute == "module" && !empty($value)) {
                        $tmpSql[] = "module = '" . $value . "'";
                    }
                }
                $sql = implode(" AND ", $tmpSql);
                if ($sql != "") {
                    $criteria->condition = $sql;
                }
            }
        }

        $criteria->order = "title ASC";

        $pages = new CPagination(Categories::model()->count($criteria));
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);

        $sort = new CSort('Categories');
        $sort->applyOrder($criteria);

        $models = Categories::model()->findAll($criteria);

        $this->render('admin', array(
            'models' => $models,
            'pages' => $pages,
            'sort' => $sort,
            'form' => $form,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
     */
    public function loadcategories($id = null) {
        if ($this->_model === null) {
            if ($id !== null || isset($_GET['id']))
                $this->_model = Categories::model()->findbyPk($id !== null ? $id : $_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Executes any command triggered on the admin page.
     */
    protected function processAdminCommand() {
        if (isset($_POST['command'], $_POST['id']) && $_POST['command'] === 'delete') {
            $this->loadcategories($_POST['id'])->delete();
            // reload the current page to avoid duplicated delete actions
            $this->refresh();
        }
    }

    public function actionHierarchy() {
        $this->layout = "admin";
        $criteria = new CDbCriteria;
        $criteria->condition = "module = 'gallery' AND is_active = 1";
        $criteria->order = "title ASC";

        $tree = Categories::model()->findAll($criteria);
        $categories = $this->generateCategoriesTree($tree);

        //echo "<xmp>";
        //        print_r ($categories);
        //        echo "</xmp>";

        $this->render('hierarchy', array(
            'categories' => $categories,
            'pages' => $pages
        ));
    }

    public function actionMove() {
        $this->layout = false;

        $id = (int) $_GET["old_id"]; // node what must be replaced
        $ref_id = (int) $_GET["new_id"]; // node where the node muxt be placed
        //$type    = $_POST["move_type"];
        //if(!in_array($type, array("after", "before", "inside"))) return false;

        $node = Categories::model()->findByPk($id);
        $node_newPlaceID = Categories::model()->findByPk($ref_id);

        $node->parent_id = $node_newPlaceID->id;

        $result = '<ul class="system_messages">';
        if ($node->save()) {
            $result .= '<li class="green"><span class="ico"></span><strong class="system_title">Edukalt salvestatud !</strong></li>';
        } else {
            $result .= '<li class="red"><span class="ico"></span><strong class="system_title">Midagi korrast ara !</strong></li>';
        }
        $result .= "</ul>";

        echo $result;
    }

    function generateCategoriesTree($data, $url = "/eshop/products/display/") {

        foreach ($data as $value) {
            $menu[$value->parent_id][$value->id] = $value->title;
        }

        return '<ul><li>' . CHtml::link("/", array("#")) . '</li>' . $this->treeMaker(0, $menu, $url) . "</li></ul>";
    }

    private function treeMaker($parent, $allmenus, $url) {

        $list = $allmenus[$parent];

        if (!empty($list)) {
            $menu .= '<ul ' . ($parent == 0 ? 'class="jstree-default"' : "") . ">";

            foreach ($list as $key => $val) {
                if (isset($allmenus[$key])) {
                    $menu .= '<li class="open" id="' . $key . '">' . CHtml::link($val, "/" . $key);
                    $menu .= $this->treeMaker($key, $allmenus, $url);
                } else {
                    $menu .= '<li class="leaf" id="' . $key . '">' . CHtml::link($val, "/" . $key);
                }
                $menu .= "</li>";
            }
            $menu .= "</ul>";
        }
        return $menu;
    }

}
