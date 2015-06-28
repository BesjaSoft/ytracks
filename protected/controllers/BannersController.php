<?php

class BannersController extends BaseController
{
	const PAGE_SIZE = 10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='show';

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
				'actions'=>array('show', 'redirect'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create', 'update', 'stats', 'admin', 'delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Shows a particular model.
	 */
	public function actionShow()
	{
		$this->render('show',array('model'=>$this->loadbanners()));
	}
    
    public function actionRedirect()
    {
        $this->layout = false;
        
        $banner = Banners::model()->findByPk($_GET["id"]);
        
        if (!empty($banner))
        {
    		$stat = Yii::app()->db->createCommand('SELECT * FROM banners_stats WHERE banner_id = '.$banner->id.' AND date = "'.date("Y-m-d").'"')->queryRow();
            
            if (!empty($stat)){
        		$clicks = $stat["clicks"] + 1;
                Yii::app()->db->createCommand("UPDATE banners_stats SET clicks = ".$clicks." WHERE id = ".$stat["id"])->execute();
            }else{
        		$clicks = 1;
        		$date = date('Y-m-d');
                Yii::app()->db->createCommand("INSERT INTO banners_stats (banner_id, clicks, date) VALUES ({$banner->id}, {$clicks}, '{$date}')")->execute();
            }
 		
   			$this->redirect($banner->url);	
    		
        }
        echo "Midagi on korrast ära";
    } 

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
	   $this->layout = "admin";
       
       //print_r ($_FILES);
       //print_r ($_POST);
		$model=new Banners;
        $file = new Files;
        
		if(isset($_POST['Banners']))
		{
			$model->attributes=$_POST['Banners'];
            if ($model->validate())
			{
                $file = new Files;
                //$file->attributes=$_FILES['Banners'];
                //print_r ($_FILES["Banners"]);
                //if ($file->validate()){
                    $file->image = CUploadedFile::getInstance($file, 'myfile');
                
                    
                    //$file->attributes = $_FILES["fileImage"];
   
    				// CONFIGURATION
    				$randomFilename = md5(time() * rand());
    				$directory = Yii::app()->params['bannersfolder'];
    				
    				//$model->image = CUploadedFile::getInstance($model, 'Filedata');
    				
    				$file->filesize = $file->image->size;
    				$file->mimetype = $file->image->type;
    				$file->directory = $directory;
    				$file->filename = $randomFilename. '.' . $file->image->extensionName;
    				
    				// additional info
    				$file->is_image = true;
    				$file->title = ""; //$model->title;
                    $file->description = "";
                    $file->user_id = 0;
    				$file->status = 1;
                    $file->object_id = 0;
    				$file->object_name = "banner";
    
    				// MAKING AND SAVING THUMNAIL
    				$thumb = Yii::app()->image->load($file->image->tempName);
    				$thumb->save($directory."/".$randomFilename. '.' . $file->image->extensionName);
    			
                    
    				if (!$file->save())
    				{
    					echo "Tekkis viga";
                        print_r($file->errors);
    				}
                    
                    if ($file != null)
                    {
    				    $model->image_id = $file->id;
                    }

            
    			if($model->save())
                {
    				$this->redirect(array('stats','id'=>$model->id));
                }
            }
            
		}
		$this->render('create',array('model'=>$model, "file" => $file));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
	   $this->layout = "admin";
       
		$model=$this->loadbanners();
		if(isset($_POST['Banners']))
		{
		  //print_r ($_POST['Banners']);
			$model->attributes=$_POST['Banners'];
            if ($model->validate())
			{
                $file = new Files;
    			$file->image = CUploadedFile::getInstance($file, 'fileImage');
    
    			if (!empty($file->image->name))
    			{
    			
    				// CONFIGURATION
    				$randomFilename = md5(time() * rand());
    				$directory = Yii::app()->params['bannersfolder'];
    				
    				// DELETE FILE BEFORE ADDING NEW
    				if ($model->image_id > 0)
    				{
    					$tmpFile = Files::model()->findByPk($model->image_id);

    					if (is_file($tmpFile->directory."/".$tmpFile->filename)){
    						unlink($tmpFile->directory."/".$tmpFile->filename);
    					}
    					Files::model()->deleteByPk($model->image_id);
    				}
    				
    				$file->filesize = $file->image->size;
    				$file->mimetype = $file->image->type;
    				$file->directory = $directory;
    				$file->filename = $randomFilename. '.' . $file->image->extensionName;
    				
    				// additional info
    				$file->is_image = true;
    				$file->title = "";
    				$file->status = 1;
    				$file->object_name = "banner";
    
    				// MAKING AND SAVING THUMNAIL
    				$thumb = Yii::app()->image->load($file->image->tempName);
    				$thumb->save($directory."/".$randomFilename. '.' . $file->image->extensionName);
    			
    				
    				if (!$file->save())
    				{
    					echo "Tekkis viga";
    				}
    			
    				
        			if ($file != null){
        				$model->image_id = $file->id;
        			}
                }
            

                if($model->save()){
    			    $this->redirect(array('stats','id'=>$model->id));
                }
            }
		}
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
			// we only allow deletion via POST request
			$this->loadbanners()->delete();
			$this->redirect(array('list'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	   $this->layout = "admin";
		$this->processAdminCommand();

		$criteria=new CDbCriteria;

		$pages=new CPagination(Banners::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('banners');
		$sort->applyOrder($criteria);

		$models=Banners::model()->findAll($criteria);
        
        $userData = new CActiveDataProvider('banners', array(
            'pagination'=>array(
                    //pagination
                    'pageSize'=>10, 
            ),
            'sort' => array(
                //csort
                'defaultOrder' => 'url'
            )
        ));

		$this->render('admin',array(
			'models'=>$models,
            'userData' => $userData,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}
    
    public function actionStats()
    {
        $this->layout = "admin";

        $criteria = new CDbCriteria;
        $criteria->condition = "banner_id = :id";
        $criteria->params = array(":id" => $_GET["id"]);
        $criteria->order = "date ASC"; 
        
        $stats = BannersStats::model()->findAll($criteria);

        $this->render('stats', array('stats' => $stats));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadbanners($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Banners::model()->findbyPk($id!==null ? $id : $_GET['id']);
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
			$this->loadbanners($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
