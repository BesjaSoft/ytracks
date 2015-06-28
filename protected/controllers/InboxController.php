<?php

class InboxController extends BaseController
{
	const PAGE_SIZE=10;

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('list', 'delete', 'create'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'changestatus', 'answer'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    	/**
	 * Manages all models.
	 */
	public function actionList()
	{

        $user_id = Yii::app()->user->id;
         
        $count_inbox = Inbox::model()->count(array("condition" => "to_id = ".$user_id." AND status_user = ".Inbox::STATUS_NEW));
        $count_draft = Inbox::model()->count(array("condition" => "sender_id = ".$user_id." AND status_user = ".Inbox::STATUS_DRAFT));
        $count_sent = Inbox::model()->count(array("condition" => "sender_id = ".$user_id." AND status_user = ".Inbox::STATUS_SENT));
        $count_trash = Inbox::model()->count(array("condition" => "sender_id = ".$user_id." AND status_user = ".Inbox::STATUS_DELETED));


        // GET MESSAGES
        $criteria = new CDbCriteria();
        $criteria->condition = (!isset($_GET["status"]) || $_GET["status"] == Inbox::STATUS_NEW ? 
        "to_id = ".$user_id." AND (status_user = ".Inbox::STATUS_NEW." OR status_user = ".Inbox::STATUS_READ.")" : 
        "sender_id = ".$user_id." AND status_user = ".$_GET["status"] );
        
        $pages=new CPagination(Inbox::model()->count($criteria));
		$pages->pageSize=20;
		$pages->applyLimit($criteria);

		$sort=new CSort('Inbox');
		$sort->defaultOrder='created DESC';
		$sort->applyOrder($criteria);
        
        $messages = Inbox::model()->findAll($criteria);
        
        $this->render('list',array(
			'messages' => $messages,
            'pages' => $pages,
            'sort' => $sort,
			'count_inbox' => $count_inbox,
            'count_draft' => $count_draft,
            'count_sent' => $count_sent,
            'count_trash' => $count_trash
		));
    }
    

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if (Yii::app()->user->isAdmin){
            $this->layout = "admin";
        }
        
		$model=new Inbox;
		if(isset($_POST['Inbox']))
		{
            if ($_POST["Inbox"]["to_email"] == "all")
            {
                $users = User::model()->findAll();
                
                // SEND EMAIL
                $email = Yii::app()->email;
                
                foreach ($users as $user)
                {
                    
                	$email->sendAs = "html";
                    $email->view = "empty";
                    $email->to = $user->email;
                    //$email->cc = array("vladimir.kjahrenov@gogroup.ee"); //, "siim.valdmets@gogroup.ee", "siim.valdmets@gmail.com");
    				$email->from = Yii::app()->name."<".Yii::app()->params["adminEmail"].">";
    				$email->subject = $_POST["Inbox"]["subject"];
    				$email->message = $_POST["Inbox"]["message"];
                    //print_r ($email);
                    
                    // SAVE EMAIL TO DB FOR USER AND REPORTS 
    				$email->send(array("user" => ""));
                    $model->sender_id = Yii::app()->user->id;
            
                    // save info for user message 
        			$model->attributes = $_POST['Inbox'];
                    $model->status_user = Inbox::STATUS_NEW;
                    $model->status_admin = Inbox::STATUS_SENT; 
                    
        			$model->save();
                }
                 if (Yii::app()->user->isAdmin){
				    $this->redirect(array('admin'));
                }else{
                    $this->redirect(array('list'));
                }
                
            }else{
                $model->sender_id = Yii::app()->user->id;
                
                // save info for user message 
    			$model->attributes = $_POST['Inbox'];
                $model->status_user = Inbox::STATUS_NEW;
                $model->status_admin = Inbox::STATUS_SENT; 
                
    			if($model->save()){
                    if (Yii::app()->user->isAdmin){
    				    $this->redirect(array('admin'));
                    }else{
                        $this->redirect(array('list'));
                    }
                }
            }
		}

		$this->render('create',array(
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
			if(!isset($_POST['ajax'])){
				$this->redirect(array('index'));
            }
		}
		else{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	   $this->layout = "admin";

        $count_inbox = Inbox::model()->count(array("condition" => "to_id = ".Yii::app()->user->id." AND status_admin = ".Inbox::STATUS_NEW));
        $count_draft = Inbox::model()->count(array("condition" => "sender_id = ".Yii::app()->user->id." AND status_admin = ".Inbox::STATUS_DRAFT));
        $count_sent = Inbox::model()->count(array("condition" => "sender_id = ".Yii::app()->user->id." AND status_admin = ".Inbox::STATUS_SENT));
        $count_trash = Inbox::model()->count(array("condition" => "sender_id = ".Yii::app()->user->id." AND status_admin = ".Inbox::STATUS_DELETED));


        // GET MESSAGES
        
        $criteria = new CDbCriteria();
        $criteria->condition = (!isset($_GET["status"]) || $_GET["status"] == Inbox::STATUS_NEW ? 
        "to_id = ".Yii::app()->user->id." AND (status_admin = ".Inbox::STATUS_NEW." OR status_admin = ".Inbox::STATUS_READ.")" : 
        "sender_id = ".Yii::app()->user->id." AND status_admin = ".$_GET["status"] );
        
        
        $pages=new CPagination(Inbox::model()->count($criteria));
		$pages->pageSize=20;
		$pages->applyLimit($criteria);

		$sort=new CSort('Inbox');
		$sort->defaultOrder='created DESC';
		$sort->applyOrder($criteria);
        
        $messages = Inbox::model()->findAll($criteria);
        
        $this->render('admin',array(
			'messages' => $messages,
            'pages' => $pages,
            'sort' => $sort,
			'count_inbox' => $count_inbox,
            'count_draft' => $count_draft,
            'count_sent' => $count_sent,
            'count_trash' => $count_trash
		));
    }
    
    public function actionMessage()
    {
        $this->layout = false;
        
        if (isset($_GET["id"]) && $_GET["id"] > 0)
        {
            Inbox::model()->updateByPk($_GET["id"], array("status_".(Yii::app()->user->isAdmin ? "admin" : "user") => Inbox::STATUS_READ));   
        }
        $message = Inbox::model()->findByPk($_GET["id"]);
        
        $this->render('message',array(
			'message' => $message
		));
    }

    public function actionAnswer()
    {
        $id = $_GET["id"];
        
        if (Yii::app()->user->isAdmin){
            $this->layout = "admin";
        }
        
		$model=new Inbox;
		if(isset($_POST['Inbox']))
		{
			$model->attributes = $_POST['Inbox'];
            // remove ID 
            unset($model->id);
            
            $model->sender_id = Yii::app()->user->id;
            $model->status_user = Inbox::STATUS_NEW;
            $model->status_admin = Inbox::STATUS_SENT;
            
			if($model->save()){
				$this->redirect(array('admin'));
            }
		}
        
        $message = Inbox::model()->findByPk($id);
        if (!empty($message)){
            $message->subject = "RE: ".$message->subject;
            $message->to_id = $message->sender_id;
            
            if($message->save()){
                $this->redirect(array('admin'));
            }
        }
        
        $this->render('answer',array(
			'message' => $message
		));        
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
				$this->_model=Inbox::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
    
    
    public function actionChangestatus()
    {
        $status = $_GET["status"];
        $id = $_GET["id"];
        
        if (Inbox::model()->updateByPk($id, array("status" => $status, "folder_type" => Inbox::FOLDER_SENT)))
        {
            $statuses = Inbox::model()->getMessageStatuses();
            echo $statuses[$status];
        }
        else{
            echo "tekkis viga";
        }
        
    }
}
