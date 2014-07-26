<?php
class UserController extends Controller {
	
	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction = 'admin';
 
	/**
	 * Specifies the action filters.
	 * This method overrides the parent implementation.
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules() 
	{
//		return array(
//			'logout, update',
//			'login, create, recover' => array(Group::GUEST, 'equal'),
//			'delete' => array(Group::ADMIN, 'min'),
//		);
		
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('register', 'login', 'recover', 'Recoverpassword', 'changepassword'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('showpartner', 'updatepartner', 'logout', 'show'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'create', 'delete', 'update', ),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionLogin() 
	{
		//$this->layout = "admin_login";
		$user = new User;
		
		if (isset($_POST['User']))
		{
			if (Yii::app()->request->isPostRequest) 
			{			
				$user->setAttributes($_POST['User']);
				
				$user->setScenario('login');
				// validate user input and redirect to previous page if valid
				if ($user->validate())
				{
					if (Yii::app()->user->isAdmin){
						$this->redirect(array("/sections/admin"));
					}else{
						$this->redirect(Yii::app()->user->returnUrl);
					}
				}
			}
		}
		// display the login form
		$this->render('login', array('user' => $user));
	}

	public function actionLogout() 
	{
		Yii::app()->user->logout();
        $url = Yii::app()->homeUrl.Yii::app()->defaultController."/navLanguage/".Yii::app()->language;
		$this->redirect($url);
	}

	public function actionAdmin() 
	{
		$this->layout = "admin";
		
		// genreate form 
		$filter = new SearchUsersForm();
        
        // SAVE FILTER FOR SEARCHING
		$session = Yii::app()->getSession();
        
        if (isset($_GET["SearchUsersForm"]))
		{
			$filter->attributes = $_GET["SearchUsersForm"];
			$session["SearchUsers"] = $filter->getAttributes();
		}
		if (isset($session["SearchUsers"]))
		{
			foreach($session["SearchUsers"] as $attribute => $value)
			{
				$filter->{$attribute} = $value;
			}
		}
		// END FILTER SAVING

		$criteria = new CDbCriteria;
        $criteria->alias = "user";
        
        if ($filter->validate())
		{	
			if (isset($session["SearchUsers"]))
			{
    			//print_r ($session["ConferencesSearch"]);
    			
    			foreach($session["SearchUsers"] as $attribute => $value)
    			{
    				if ($attribute == "keyword" && !empty($value))
    				{
    					$criteria->addCondition("username LIKE '%".$value."%' OR firstname LIKE '%".$value."%' OR lastname LIKE '%".$value."%'");
    				}
                    
    				if ($attribute == "isikukood" && !empty($value))
    				{
    					$criteria->addCondition("isikukood = '".$value."'");
    				}	
    			}
			}
		}

		$pages = new CPagination(User::model()->count($criteria));
		$pages->pageSize = 25;
		$pages->applyLimit($criteria);
		
		$sort = new CSort('User');
		$sort->attributes = array(
			'user.username'=>'username',
			'user.email'=>'email',
			'user.created'=>'created',
		);

		$sort->defaultOrder = 'created DESC';
		$sort->applyOrder($criteria);
		
		$users = User::model()->findAll($criteria);

		
		//The user list supports AJAX.  Not sure if this is a good thing in this case,
		//but I'll leave it as an example
		if (Yii::app()->request->isAjaxRequest){
			$this->renderPartial('listPage', compact('users', 'pages', 'sort', 'company', 'filter'));
		}else{
			$this->render('admin', compact('users', 'pages', 'sort', 'filter'));
		}
	}

	public function actionShow() 
	{
		if (Yii::app()->user->isAdmin)
		{
			$this->layout = "admin";
		}
		
        //"company",
        Yii::import("credits.models.Credit");
        Yii::import("credits.models.Contract");
        //, 'credits'
		$user = User::model()->with('profile')->findByPK(isset($_GET['id']) ? $_GET['id'] : Yii::app()->user->id);
		$user->profile = new UserProfile;
		//$user->company = new Companies;
        
		//$criteria=new CDbCriteria;
		//$criteria->condition = '`post`.`user_id`=\''.$user->id.'\'';
		//$pages=new CPagination(Post::model()->count($criteria));
		//$pages->pageSize=4;
		//$pages->applyLimit($criteria);
		//$criteria->order = '`post`.`created` DESC';
		//$user->post = Post::model()->findAll($criteria);http://www.auto24.ee/webcache_kasutatud/647/auto_php-id=351647-view=1-www_auto24_ee.html
			
		$this->render('show', array('user' => $user)); //, 'pages'
	}
    
    public function actionShowpartner() 
	{
		if (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin)
		{
			$this->layout = "admin";
		}
		

		$user = User::model()->with('profile')->findByPK(isset($_GET['id']) ? $_GET['id'] : Yii::app()->user->id);
		//$user->profile = new UserProfile;
		//$user->company = new Companies;
        
		//$criteria=new CDbCriteria;
		//$criteria->condition = '`post`.`user_id`=\''.$user->id.'\'';
		//$pages=new CPagination(Post::model()->count($criteria));
		//$pages->pageSize=4;
		//$pages->applyLimit($criteria);
		//$criteria->order = '`post`.`created` DESC';
		//$user->post = Post::model()->findAll($criteria);http://www.auto24.ee/webcache_kasutatud/647/auto_php-id=351647-view=1-www_auto24_ee.html
			
		$this->render('showpartner', array('user' => $user)); //, 'pages'
	}
	
	public function actionRegister()
 	{
		$user = new User;
		$user->profile = new UserProfile;
		//$user->company = new Companies;
        
        $user->setScenario('register');
		
		if (isset($_POST['User'])) 
		{
			
			
			$user->setAttributes($_POST['User']);
			$user->profile->setAttributes($_POST['UserProfile']);
			//$user->company->setAttributes($_POST['Companies']);
	
			$user->activated = false;
			//print_r ($_POST['User']);
			
			if ($user->validate()) // && $user->profile->validate()) // && $user->company->validate())
			{
				$user->encryptPassword();
                
				// SENDVERIFICATIONEMAIL
                $user->sendVerificationEmail = true;
                $user->usertype = 2;
                
				if ($user->save(false))
				{
					//$user->company->user_id = $user->id;
					$user->profile->user_id = $user->id;
					
				 	$user->profile->save(false);
				 	//$user->company->save(false);
				 	
                    
                    
				 	// CHECK IF FOLDER WITH SAME AS USERNAME EXISTS
				 	// IF NOT THEN MAKE IT
//				 	$imageFolder = Yii::app()->params["imagefolder"];
//				 	if (!is_dir($imageFolder."/".$user->username))
//					{
//				 		mkdir($imageFolder."/".$user->username);
//				 		mkdir($imageFolder."/".$user->username."/original");
//				 		mkdir($imageFolder."/".$user->username."/640_480");
//						mkdir($imageFolder."/".$user->username."/320_240");
//				 		mkdir($imageFolder."/".$user->username."/thumb");
//				 	}
				 	
					Yii::app()->user->setFlash('success', Yii::t("user", "REGISTER_SUCCESS"));
					//$this->redirect(array('site/index'));
					//Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
					$this->refresh();
				}else{
					echo "midagi on karrast ara";
				}
			}
		}
		$this->render('register', compact('user'));
	}

	public function actionCreate()
 	{
 		$this->layout = "admin";
        
		$user = new User;
        $user->profile = new UserProfile;
		$user->company = new Companies;
		
		if (isset($_POST['User']))
        {
		  
			//$user->setScenario('create');
			$user->setAttributes($_POST['User']);
            $user->company->setAttributes($_POST['Companies']);

			$user->activated = false;
            //print_r($_POST);
            if ($_POST["company_id"] > 0){
                //echo "com_id";
                if ($user->validate())
                {
    				$user->encryptPassword();
    				if ($user->save(false)){
    				    Companies::model()->updateByPK($_POST["company_id"], array("user_id" => $user->id));
                        // save profile
                        $user->profile->user_id = $user->id;
                        $user->profile->save(false);
                        
    				    if (Yii::app()->user->isAdmin){
    				        $this->redirect(array('user/show/id/'.$user->id));
                        }
    				}
    			}
            }else{
                //echo "else;";
    			if ($user->validate() && $user->company->validate()) 
                {
    				$user->encryptPassword();
    				if ($user->save(false)){
    				    $user->company->user_id = $user->id;
                        $user->profile->user_id = $user->id;
                        
                        $user->company->save(false);
                        $user->profile->save(false);
                        
    				    if (Yii::app()->user->isAdmin){
    				        $this->redirect(array('user/show/id/'.$user->id));
                        }
    				}
    			}
            }
		}
		$this->render('create', compact('user'));
	}

	public function actionUpdate() 
	{

		$id = isset($_GET['id']) ? $_GET['id'] : Yii::app()->user->id;
		
	//	if ((!Yii::app()->user->hasAuth(Group::ADMIN)) && ($id != Yii::app()->user->id)){
//			throw new CHttpException(404, 'Permission Denied');
//		}
		
		// set layout 
		if (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin){
			$this->layout = "admin";
		}

        // "company",
		$user = User::model()->with("profile")->findByPK($id);
		//$user->profile = new UserProfile;
		//$user->company = new Companies;
		
		//print_r ($user);
		
		if (isset($_POST['User'])) {
			
			//$user->setScenario(Yii::app()->user->hasAuth(Group::ADMIN) ? 'updateAdmin' : 'update');

			//$oldEmail = $user->email;
			$user->setAttributes($_POST['User']);
			$user->profile->setAttributes($_POST['UserProfile']);
			$user->company->setAttributes($_POST['Companies']);

			if ($user->validate() && $user->profile->validate() && $user->company->validate()) 
			{
				
				$redirect = array('show', 'id'=>$id);
				
				//email logic
				//if ($user->email != $oldEmail) {
//					$user->activated = false;
//					$redirect = array('site/index');
//				}
				
				//so not to save blank password
				if (empty($user->password)){
					unset($user->password);
				} else {
					$user->encryptPassword();
					//email notification of new password
					$user->sendNewPassword = true;
				}
				
				if ($user->save(false))
				{
					$user->profile->save(false);
					$user->company->save(false);
					
					Yii::app()->user->setFlash('success', "Profiil on edukalt uuendatud!");
					
					// redirection
					$this->redirect($redirect);
				}
			}
		}
		$this->render('update', compact('user'));
	}
    
   	
    public function actionUpdatepartner() 
	{

		$id = isset($_GET['id']) ? $_GET['id'] : Yii::app()->user->id;
		
	//	if ((!Yii::app()->user->hasAuth(Group::ADMIN)) && ($id != Yii::app()->user->id)){
//			throw new CHttpException(404, 'Permission Denied');
//		}
		
		// set layout 
		if (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin){
			$this->layout = "admin";
		}

        // "company",
		$user = User::model()->with("profile")->findByPK($id);
		//$user->profile = new UserProfile;
		//$user->company = new Companies;
		
        $user->setScenario("update"); 
		//print_r ($user);
		
		if (isset($_POST['User'])) 
        {
			
			//$user->setScenario(Yii::app()->user->hasAuth(Group::ADMIN) ? 'updateAdmin' : 'update');

			//$oldEmail = $user->email;
			$user->setAttributes($_POST['User']);
			$user->profile->setAttributes($_POST['UserProfile']);
			//$user->company->setAttributes($_POST['Companies']);

			if ($user->validate() && $user->profile->validate()) // && $user->company->validate()) 
			{
				//email logic
				//if ($user->email != $oldEmail) {
//					$user->activated = false;
//					$redirect = array('site/index');
//				}
				
				if ($user->save(false))
				{
				    $user->profile->user_id = $id;
					$user->profile->save(false);
					//$user->company->save(false);
					
					Yii::app()->user->setFlash('success', "Profiili uuendamine on edukalt lopetatud!");
					
					// redirection
					$this->redirect(array("showpartner"));
				}
			}
		}
		$this->render('updatepartner', compact('user'));
	}
	
	public function actionRecover() 
	{
		$user = new User;

		if (isset($_POST['User'])) {
			$user->setScenario('recover');
			$user->setAttributes($_POST['User']);

			if ($user->validate()) {				
				$found = User::model()->findByAttributes(array('email'=>$user->email));
				
				if ($found !== null) 
                {
				    // get session
                    $session = Yii::app()->getSession();
                
                	$email = Yii::app()->email;
                    $email->from = Yii::app()->name;
                    $email->sendAs = "html";
                    $email->view = $session["navLanguage"].'_recoveruser';
					$email->to = $found->email;
					//$email->view = 'UserRecover';
					$email->send(array('user' => $found, 'newPassword'=>false));
					Yii::app()->user->setFlash('recover', Yii::t("user", "RECOVEREMAILSENT", array("%s" => $user->email) ));
					$this->refresh();
				} else {
					$user->addError('email', Yii::t("user", "EMAILNOFOUND"));
				}
			}
		}

		$this->render('recover', compact('user'));
	}
	
	public function actionRecoverpassword() 
	{
		if (!isset($_GET['id'], $_GET['pass']))
			throw new CHttpException(404,'Invalid request');
			
		if ($user = User::model()->findbyPk($_GET['id'])) 
        {
			if ($user->password != $_GET['pass']){ 
				throw new CHttpException(404,'Invalid auth key');
            }
			$user->password = $user->generatePassword(6);
			$user->encryptPassword();
			if ($user->save(false))
            {		
                // get session
                $session = Yii::app()->getSession();
                
    			$email = Yii::app()->email;
                $email->from = Yii::app()->name;
    			$email->to = $user->email;
                $email->sendAs = "html";
    			$email->view =  $session["navLanguage"].'_newpassword';
    			$email->send(array('user' => $user, 'newPassword'=>true));
                Yii::app()->user->setFlash('recover', Yii::t("user", "NEWPASSSENT"));
			}else{
                Yii::app()->user->setFlash('recover', Yii::t("user", "NEWPASSSENTFAILED"));
			}
			$this->render('recover', array('user' => $user));
		} else{
			throw new CHttpException(404,'Invalid user');
        }
	}
    
    public function actionChangepassword()
    {
        if (!isset($_GET['id'], $_GET['pass'])){
			throw new CHttpException(404,'Invalid request');
        }
	 
        $form = new PasswordForm;
		$user = User::model()->findByPk($_GET['id']);
//			if ($user->password != $_GET['pass']){ 
//				throw new CHttpException(404,'Invalid auth key');
//            }
        if (isset($_POST["PasswordForm"]) && !empty($_POST["PasswordForm"]))
        {
            
            //$user->scenario = "passwordchange";
            $form->attributes = $_POST["PasswordForm"];
            
        
            if ($form->validate())
            {
    			$user->password = $form->password; //$user->generatePassword(6);
    			$user->encryptPassword();
                
    			if ($user->save(false))
                {		
                    // get session
                    $session = Yii::app()->getSession();
                    
        			$email = Yii::app()->email;
                    $email->from = "GoFoto <photo@gofoto.ee>";
        			$email->to = $user->email;
                    $email->sendAs = "html";
        			$email->view =  $session["navLanguage"].'_newpassword';
        			$email->send(array('user' => $user, 'newPassword'=>true));
                    Yii::app()->user->setFlash('recover', Yii::t("user", "NEWPASSSENT"));
    			}else{
                    Yii::app()->user->setFlash('recover', Yii::t("user", "NEWPASSSENTFAILED"));
    			}
            }
        }
        
       	$this->render('changepassword', array('form' => $form ));
    }

	public function actionDelete() 
	{
		//throw new CHttpException(404,'bad'); //was used for testing ajax
		
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadUser()->delete();
			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		}
		else{
			throw new CHttpException(404,'Invalid request. Please do not repeat this request again.  You must have JavaScript turned on!');
        }
	}

	public function actionVerify()
	{
		if (!isset($_GET['id'], $_GET['code'])){
			throw new CHttpException(404,'Invalid request');
		}
		if ($user = User::model()->findByPk($_GET['id'])) 
        {
			if ($user->activated){
				throw new CHttpException(400,'User already verified');
            }
			if ($user->activationCode == $_GET['code']) 
            {
                $user->sendVerificationEmail = false;
				$user->activated = true;
				$user->save(false);	
				$this->render('activated');
			}else{
				throw new CHttpException(400,'Incorrect verification code');
            }
		} else{
			throw new CHttpException(404,'Invalid user');
        }
			
	}
	
	protected function loadUser($id = null) 
	{
		if ($id == null)
		{
			$id = $_GET['id'];
		}
		if (isset($id))
		{
			$user = User::model()->with("company")->findByPk($id);
		}
		if (isset($user))
		{
			return $user;
		}else{
			throw new CHttpException(404,'The requested user does not exist.');
		}
	}

}