<?php

class FilesController extends CController
{
	const PAGE_SIZE=10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

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
				'actions'=>array('list','show', 'gallery'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','upload','create','singleUpload'),
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
		$this->render('show',array('model'=>$this->loadfiles()));
	}
	
	public function actionSingleUpload()
	{
		$model=new Files;
		
		//print_r($_POST);
		//echo "<hr />";
		//print_r($_FILES);
		
		if(!empty($_FILES))
		{
			$model->attributes=$_POST['Files'];
			
			// CONFIGURATION
			$randomFilename = md5(time() * rand());
			$directory = Yii::app()->params['imagefolder'];
			
			//$model->image = CUploadedFile::getInstance($model, 'Filedata');
			$model->image = CUploadedFile::getInstance($model, 'Filedata');
			$model->filesize = $model->image->size;
			$model->mimetype = $model->image->type;
			$model->directory = $directory;
			$model->filename = $randomFilename. '.' . $model->image->extensionName;
			
			// additional info
			$model->is_image = true;
			//$model->title = "testimine 01";
			$model->user_id = Yii::app()->user->id;
			$model->object_id = isset($_POST['object_id']) ? $_POST['object_id'] : 0;
			$model->object_name = "gallery";
			
			if (isset(Yii::app()->user->id) && Yii::app()->user->id > 0){
				$model->status = 1;
			}
			 
			$exif = exif_read_data($model->image->tempName, 'IFD0');
			$model->exif = serialize($exif);

			//echo "tmpFile: ".$model->image->tempName;
		
			// MAKING AND SAVING THUMNAIL
			$thumb = Yii::app()->image->load($model->image->tempName); // 'images/test.jpg'
			$thumb->resize(100, 100)->quality(75)->watermark("GoGroup", 1, 10, 3);
			$thumb->save($directory."/thumbs/thumb_".$randomFilename. '.' . $model->image->extensionName);
			
			// MAKING AND SAVING 640 X 480 IMAGE
			$thumb = Yii::app()->image->load($model->image->tempName); // 'images/test.jpg'
			$thumb->resize(640, 480)->quality(75)->watermark("GoGroup", 1, 10, 3);
			$thumb->save($directory."/640_480/thumb_".$randomFilename. '.' . $model->image->extensionName);

			$model->iptc = $this->getIPTC_data($model->image->tempName);
			
			// SAVE ORIGINAL IMAGE
			$model->image->saveAs($directory."/original/".$randomFilename. '.' . $model->image->extensionName);
				
			$model->save();
			//if($model->save())
			//{
				//$this->redirect(array('show','id'=>$model->id));
			//}
		}
		$this->render('singleUpload',array('model'=>$model));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate() //MultipleUpload()
	{
		
//		try{
//			$myFile = "upload.txt";
//			$fh = fopen($myFile, 'w') or die("can't open file");
//			$stringData = serialize($_POST);
//			fwrite($fh, $stringData);
//			$stringData = serialize($model);
//			fwrite($fh, $stringData);
//			fclose($fh);
//			echo "saved ok";
//			mail("crioz@hot.ee", "fail", "saved ok");
//		}catch (Exception $e) {
//		    echo 'Caught exception: ',  $e->getMessage(), "\n";
//		    mail("crioz@hot.ee", "fail", $e->getMEssage());
//		}

			
		
		
		$model=new Files;
		//if(isset($_POST['Files']))
		
		//print_r($_POST);
		//echo "<hr />";
		//print_r($_FILES);
		
		if(!empty($_FILES))
		{
			//$model->attributes=$_FILES['Filedata']; //['Files'];
			
			// CONFIGURATION
			$randomFilename = md5(time() * rand());
			$directory = Yii::app()->params['imagefolder'];
			
			//$model->image = CUploadedFile::getInstance($model, 'Filedata');
			$model->image = CUploadedFile::getInstanceByName('Filedata');
			$model->filesize = $model->image->size;
			$model->mimetype = $model->image->type;
			$model->directory = $directory;
			$model->filename = $randomFilename. '.' . $model->image->extensionName;
			
			// additional info
			$model->is_image = true;
			//$model->title = "testimine 01";
			$model->user_id = Yii::app()->user->id;
			$model->object_id = isset($_POST['object_id']) ? $_POST['object_id'] : 0;
			$model->object_name = "gallery";
			
			if (isset(Yii::app()->user->id) && Yii::app()->user->id > 0){
				$model->status = 1;
			}
			 
			$exif = exif_read_data($model->image->tempName, 'IFD0');
			$model->exif = serialize($exif);

			//echo "tmpFile: ".$model->image->tempName;
		
			$thumb = Yii::app()->image->load($model->image->tempName); // 'images/test.jpg'
			$thumb->resize(100, 100)->quality(75)->watermark("GoGroup", 1, 10, 3);
			// SAVE THUMBNALE
			$thumb->save($directory."/thumb_".$randomFilename. '.' . $model->image->extensionName); //  or $image->save('images/small.jpg');
			
			
//			
//			// SAVE ORIGINAL IMAGE
//			//echo "FILE: ".$directory.$randomFilename. '.' . $model->image->extensionName;
			$model->image->saveAs($directory."/".$randomFilename. '.' . $model->image->extensionName);
//				
			$model->save();
			//if($model->save())
			//{
				//$this->redirect(array('show','id'=>$model->id));
			//}
		}
		//$this->render('create',array('model'=>$model));
	}
	
		
	
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadfiles();
		if(isset($_POST['Files']))
		{
			$model->attributes=$_POST['Files'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
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
			$this->loadfiles()->delete();
			$this->redirect(array($return));
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

		$pages=new CPagination(Files::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=Files::model()->findAll($criteria);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout = "admin";
		
		$this->processAdminCommand();

		$criteria=new CDbCriteria;

		$pages=new CPagination(Files::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Files');
		$sort->applyOrder($criteria);

		$models=Files::model()->findAll($criteria);

		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadfiles($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Files::model()->findbyPk($id!==null ? $id : $_GET['id']);
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
			$this->loadfiles($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
	
	private function getIPTC_data( $image_path ) 
	{
	    $size = getimagesize ( $image_path, $info);
	    if(is_array($info)) {
	        $iptc = iptcparse($info["APP13"]);
	        foreach (array_keys($iptc) as $s) {
	            $c = count ($iptc[$s]);
	            for ($i=0; $i <$c; $i++)
	            {
	                echo $s.' = '.$iptc[$s][$i].'<br>';
	            }
	        }
	    }
	}

}
