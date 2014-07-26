<?php

class User extends ActiveRecord
{
	public $rememberMe;
	public $password_repeat;
    
    // THIS NEE
    public $name;
    
    const USERTYPE_CLIENT = 1;
    const USERTYPE_PARTNER = 2;
	
	//Unhashed password for account verification email
	public $passwordUnHashed;
	
	//Flags on whether to send certain emails in afterSave()
	protected $sendVerificationEmail = false;
	public $sendNewPassword = false;
	
	/**
	 * Returns the static model of the specified AR class.
	 * This method is required by all child classes of CActiveRecord.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function behaviors(){
		return array(
			'AutoTimestampBehavior' => array(
				'class' => 'AutoTimestampBehavior',
			)
		);
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		return array(
			array('username, password', 'length', 'min'=>5, 'max'=>35),
			array('username', 'unique', 'caseSensitive'=>false, 'on' => 'register, create'),
			
			array('password', 'authenticatePass', 'on' => 'login, changepassword'),
			array('password', 'compare', 'on' => 'register, updateAdmin, changepassword'),
			
			array('email', 'length', 'max' => 40),
			array('email', 'email'),
		
            //array('isikukood', 'required', 'on' => 'register', 'message' => "{attribute} ".Yii::t("user", "ERR_REQUIREDFIELD")),        
			//array('isikukood', 'korrektneIsikukood', 'on' => 'register'),
			
			array('username, password, password_repeat, email, firstname, lastname', 'required', 'on' => 'register', 'message' => "{attribute} ".Yii::t("user", "ERR_REQUIREDFIELD")),
			
            array('email, firstname, lastname, isikukood', 'required', 'on' => 'update'),
			
            
			array('email', 'required', 'on' => 'recover', 'message' => "{attribute} ".Yii::t("user", "ERR_REQUIREDFIELD")),
			
			array('email, notify_messages', 'required', 'on' => 'updateAdmin'),
			array('notify_messages', 'in', 'range' => array('0','1')),
			
            //([a-zA-Z-]+^[0-9]+)
            array('firstname, lastname', 'safe'), //'match', 'pattern' => "/\p{Alphabetic}/",  "on" => "register, update"),
			//array('group_id', 'exist', 'className'=>'Group', 'attributeName' => 'id', 'on' => 'updateAdmin'),			
			//array('group_id', 'numerical', 'integerOnly' => true),
		);
	}

	
	/**
	 * Authenticates the password.
	 * This is the 'authenticatePass' validator as declared in rules().
	 */
	public function authenticatePass($attribute,$params) {
		
		if (!$this->hasErrors()) { // we only want to authenticate when no input errors
			$identity = new UserIdentity($this->username,$this->password);
			$identity->authenticate();
			
			switch ($identity->errorCode) {
				case UserIdentity::ERROR_NONE:
					$duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
					Yii::app()->user->login($identity, $duration);
					break;
					
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username', Yii::t("user", "USER_INCORRECTUSERNAME"));
					break;
					
				case UserIdentity::ERROR_EMAIL_INVALID:
					$this->addError('email', Yii::t("user", "USER_MUSTVALIDATE"));
					break;
					
				default: // UserIdentity::ERROR_PASSWORD_INVALID
					$this->addError('password', Yii::t("user", "USER_INCORRECTPASSWORD"));
					break;
			}
		}
	}
    

	public function relations() {
		return array(
			//'post' => array(self::HAS_MANY, 'Post', 'user_id'),
			//'num_posts' => array(self::STAT, 'Post', 'user_id'),
			'profile' => array(self::HAS_ONE, 'UserProfile', 'user_id'),

		);
	}

	public function attributeLabels() {
		return array(
            'username' => Yii::t("user", "USER_USERNAME"),
			'iskukood' => Yii::t("user", "USER_ISIKUKOOD"),
			'email_confirmed'=> Yii::t("user", "USER_ACTIVATED"),
			'created'=> Yii::t("user", "USER_REGISTERED"),
            'modified' => Yii::t("general", "TXT_MODIFIED"),
			'notify_messages'=> Yii::t("user", "USER_NOTIFYMESSAGE"),
			'firstname' => Yii::t("user", "USER_FIRSTNAME"),
			'lastname' => Yii::t("user", "USER_LASTNAME"),
            'email' => Yii::t("user", "USER_EMAIL"),
            'password' => Yii::t("user", "USER_PASSWORD"),
            'password_repeat' => Yii::t("user", "USER_PASSWORDREPEAT"),
            'bank_name' => Yii::t("user", "BANKNAME"),
            'bank_account' => Yii::t("user", "BANKACCOUNT"),
		);
	}
	
	public function encryptPassword() 
	{
		$this->passwordUnHashed = $this->password;
		$this->password = md5($this->password);
	}

	protected function afterSave() 
	{
        $session = Yii::app()->getSession();
        
		if ($this->sendVerificationEmail) {
			//so not to try to logout new registrations (that have not even been logged in yet)
			//must logout user before flashing, as flashes are erased when logged out.
			//if ((Yii::app()->user->id == $this->id) && (!Yii::app()->user->isGuest)){
//				Yii::app()->user->logout();
//			}
            
			//send email
			$email = Yii::app()->email;
			$email->to = $this->email;
			$email->from = Yii::app()->name."<".Yii::app()->params["adminEmail"].">";
			$email->sendAs = "html";
			$email->view = $session["navLanguage"].'_verifyEmail'; //_partner_register';
			$email->send(array('user' => &$this));
		}
		
		if ($this->sendNewPassword) 
        {				
			//send email
			$email = Yii::app()->email;
			$email->to = $this->email;
			$email->from = Yii::app()->name."<".Yii::app()->params["adminEmail"].">";
			$email->sendAs = "html";
			$email->view = $session["navLanguage"].'_changePassword';
			$email->send(array('user' => &$this));
		}
		parent::afterSave();
	}

	public function generatePassword($length=20) 
	{
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		
		while ($i <= $length) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass .= $tmp;
			$i++;
		}
		return $pass;	
	}
	
	public function getActivated() 
	{
		return $this->email_confirmed == null;
	}
	
	public function setActivated($val) 
	{
		if ($val)
			$this->email_confirmed = null;
		else {
			$this->email_confirmed = $this->generatePassword();
			
			/*
			* we don't send the verification email until afterSave() in case the user is
			* actually not saved (for some reason or another, e.g. an error)
			* So we simply set a flag instead
			*/
			$this->sendVerificationEmail = true;
		}
	}
	
	public function getActivationCode() 
	{
		return ($this->email_confirmed != null) ? $this->email_confirmed : false;
	}
	
	public function getUsers($user_type = 0) 
	{
		$criteria = new CDbCriteria;
        $criteria->select = "id, CONCAT(firstname, ' ', lastname) as name";
		$criteria->addCondition("status = 1");
        $criteria->addCondition("usertype = ".$user_type);

		$result = User::model()->findAll($criteria);
		return $result;
	}
    
    
    public function getUserTypes() 
	{
	   return array(
            self::USERTYPE_CLIENT => Yii::t("user", "USERTYPE_CLIENT"),
            self::USERTYPE_PARTNER => Yii::t("user", "USERTYPE_PARTNER")
       );
    }
    
    
    /**
     * User::korrektneIsikukood() Isikukoodi kontrollimiseks mõeldud funktsioon
     * 
     * @param mixed $attribute
     * @param mixed $params
     * @return
     */
    function korrektneIsikukood($attribute, $params)
    {
        $kood = $this->isikukood;
        
        //echo "isik ".$kood;
        if (strlen($kood) != 11 || !is_numeric($kood))
        {
            $this->addError('username', "Vigane isikukood! Peab olema 11 sümbolit pikk");
            return false;
        };
    
        $parts = unpack("a1sugu/a2aasta/a2kuu/a2paev/a3jrk/a1chk",$kood);
        // mktime can deal with overflows in arguments and return
        // a correct date so it can be used to validate the date
        $valid_date = date("ymd",mktime(0,0,0,$parts["kuu"],$parts["paev"],$parts["aasta"]));
        if (substr($kood,1,6) != $valid_date)
        {
            $this->addError('username', "Vigane isikukood! Vale formaat!");
            return false;
        };
    
        $k1 = 1;
        $k2 = 3;
    
        $chk1 = $chk2 = 0;
        // esimesed 10 numbrit korrutame läbi nende
        // järjekorranumbritega (vahemikus 1..9)
        // ja liidame kokku, tulemuse jagame jäägiga 11-ga
        //  ja saadud number peaks olema
        // isikukoodi viimane number.
    
        // kui jäägiga jagamise tulemuseks on 10, siis tuleb
        // tehe uuesti teha seekord alustades
        // järjekorranumbrist 3, aga meie oleme kavalad ja teeme
        //  mõlemad tehted korraga
        for ($i = 0; $i < 10; $i++)
        {
            $chk1 += $k1 * $kood[$i];
            $chk2 += $k2 * $kood[$i];
            $k1 = ($k1 < 9) ? ++$k1 : 1;
            $k2 = ($k2 < 9) ? ++$k2 : 1;
        };
    
        $jaak = $chk1 % 11;
        if ($jaak == 10)
        {
            $jaak = $chk2 % 11;
        };
    
        if ($parts["chk"] != $jaak)
        {
            $this->addError('username', "Vigane isikukood! Vale formaat!");
            return false;
        };
    
        return true;
    }


}