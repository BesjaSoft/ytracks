<?php

class SiteController extends BaseController
{
    
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
				'actions'=>array('contact', 'askprice', 'sms', 'registreerikoolitusele'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('translate'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image
			// this is used by the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xEBF4FB,
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	 /**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$contact=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$contact->attributes=$_POST['ContactForm'];
			if($contact->validate())
			{
				$email = Yii::app()->email;
				$email->to = Yii::app()->params['adminEmail'];
				$email->from = $email->replyTo = $contact->email;
				$email->subject = $contact->subject;
				$email->message = $contact->body;
				$email->send();
				
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('contact'=>$contact));
	}

        
    public function actionTranslate()
    {
        $this->layout = "admin";
        $file = Yii::app()->BasePath."/messages/et/kuulutused.php";
        
        //$file2 = Yii::app()->BasePath."/messages/et/kuulutused2.php";
        
        if (isset($_POST) && !empty($_POST)){
            //print_r ($_POST);
            
            $text = "array(\n";
            foreach($_POST as $key => $value){
                if ($key != "yt0"){
                    $text .= "\t'".$key."' => '".$value."',\n";
                }
            }
            $text .= ");";
            $content = "<?php \nreturn {$text} \n?>";
            
            $fh = fopen($file, 'w') or die("can't open file");
            fwrite($fh, $content);
            fclose($fh);

        }
        
        if (is_file($file)){
            $translation = include_once($file);
        }else{
            $translation = array();
        }
        
        //print_r ($translation);
        $this->render('translate', array('translation'=>$translation));
    }
    
     /**
	 * Displays the contact page
	 */
	public function actionAskprice()
	{
        $this->layout = false;
        
        $image_id = $_GET["id"];
        $image = Files::model()->findByPk($image_id);
        
		$contact=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$contact->attributes=$_POST['ContactForm'];
			if($contact->validate())
			{
                // SALVESTAMINE ANDMEBAASI
                $inbox = new Inbox();
                $inbox->sender_id = Yii::app()->user->id;
                $inbox->to_id = 1;
                $inbox->to_email = $contact->email;
                $inbox->subject = $this->_fixEncoding($contact->subject);
                
                $images =  unserialize($_POST['ContactForm']["attachments"]); //array("1AU00246.jpg", "2AU00226.jpg");
                
                $links = "";
                if (is_array($images)){
                    $i = 1;
                    foreach($images as $image)
                    {
                        $img = Files::model()->findByAttributes(array("original_filename" => $image));
                        $links .= CHtml::link("Pilt ".($i++)." - ".$img->filename, array("/gallery/default/downloadone/image/".$img->filename),array("target" => "_blank"))."<br />";
                    }
                }
                
                $inbox->message =  $this->_fixEncoding($contact->body).$links;
                $inbox->status_admin = Inbox::STATUS_NEW;
                $inbox->attachments = $contact->attachments;
                $inbox->status_user = Inbox::STATUS_SENT;
                
                
                if ($inbox->save())
                {
                    $email = Yii::app()->email;
			
                	$email->sendAs = "html";
                    $email->view = "empty";
                    $email->to = "photo@gofoto.ee"; // photo@gofoto.ee"; //Yii::app()->params['adminEmail'];
                    $email->cc = array("vladimir.kjahrenov@gogroup.ee"); //, "siim.valdmets@gogroup.ee", "siim.valdmets@gmail.com");
    				$email->from = $email->replyTo = ucfirst(strtolower($contact->name))."<".$contact->email.">";
    				$email->subject = Yii::t("site", "Uus tellimus");
    				$email->message = "GoFoto.ee-s laekus uus tellimus! Vaata lähemalt ".CHtml::link("www.gofoto.ee", "htpp://www.gofoto.ee");
                    //print_r ($email);
    				if ($email->send(array("user" => "GoGroup"))){
                        Yii::app()->user->setFlash('success', Yii::t("site", "SITE_EAMILSENDSUCCESS"));
                    }else{
                        Yii::app()->user->setFlash('failed', Yii::t("site", "SITE_EAMILSENTFAILED"));
                    }
                }
                 
				//Yii::app()->user->setFlash('success', Yii::t("site", "SITE_EAMILSENDSUCCESS"));
				$this->refresh();
			}
		}
		$this->render('askprice',array('contact'=>$contact, "image" => $image));
	}
    
    function _fixEncoding($in_str)
    {
        $cur_encoding = mb_detect_encoding($in_str) ;
        if($cur_encoding == "UTF-8" && mb_check_encoding($in_str,"UTF-8")){
            return $in_str;
        }else{
            $x = str_replace("ð", "š", utf8_encode($in_str));
            $x = str_replace("Ð", "Š", $x);
            $x = str_replace("þ", "ž", $x);
            $x = str_replace("Þ", "Ž", $x);
            return $x;
        }
    } 
    
    
    public function actionRepairorder()
	{
		$contact=new RepairOrderForm;
		if(isset($_POST['RepairOrderForm']))
		{
			$contact->attributes=$_POST['RepairOrderForm'];
			if($contact->validate())
			{
				$email = Yii::app()->email;
                $email->sendAs = "html";
                $email->view = "main";
                
				$email->to = "tellimine@alvservis.ee";
				$email->from = $email->replyTo = $contact->email;
				$email->subject = "Uus tellimus";
                
                $message = "Uue tellimuse andmed: <br /><br />";
                $message .= "Nimi: ".$contact->name."<br />";
                $message .= "E-mail: ".$contact->email."<br />";
                $message .= "Telefon: ".$contact->phone."<br />";
                $message .= "Auto mark: ".$contact->carbrand."<br />";
                $message .= "Auto mudel: ".$contact->cartype."<br />";
                $message .= "Ehitusaasta: ".$contact->caryear."<br />";
                $message .= "Töömaht: ".$contact->workinhours."<br />";
                $message .= "Kütuse liik: ".$contact->fueltype."<br />";
                $message .= "Tehasetähis (VIN-kood): ".$contact->vin."<br />";
                $message .= "Tellimus: ".$contact->info."<br /><br /><br />";
                 $message .= "Lugupidamisega <br />Online süsteem";
                
				$email->message = $message;
				if ($email->send(array("user" => "ALV servis")))
                {
			     	Yii::app()->user->setFlash('success', Yii::t("site", "SITE_EAMILSENDSUCCESS"));
                }else{
                    //echo "tekkis viga";
                    Yii::app()->user->setFlash('success', Yii::t("site", "SITE_EAMILNOTSENT"));
                }
				
				Yii::app()->user->setFlash('contact','Täname, et tellisite töö tegemise ALV Servis-elt');
				$this->refresh();
			}
		}
		$this->render('repairorder',array('contact'=>$contact));
	}
    
    public function actionRegistreerikoolitusele()
	{
		$form = new RegisterKoolitusForm;
		if(isset($_POST['RegisterKoolitusForm']))
		{
			$form->attributes=$_POST['RegisterKoolitusForm'];
			if($form->validate())
			{
				$email = Yii::app()->email;
                $email->sendAs = "html";
                $email->view = "main";
                
				$email->to = "info@iluteeninduskool.ee";
				$email->from = $email->replyTo = $form->email;
				$email->subject = "Uus registreerija";
                
                $message .= "<br /><br />Nimi: ".$form->firstname." ".$form->lastname."(".$form->isikukood.")<br />";
                $message .= "E-mail: ".$form->email."<br />";
                $message .= "Telefon: ".$form->phone."<br />";
                $message .= "Valitus kooitus: ".$form->courses[$form->course]."<br />";
                $message .= "Sünnipäev: ".$form->birthday."<br />";
                $message .= "Aadress: ".$form->address."<br />";
                $message .= "Lõpetatud kool: ".$form->finished_school."<br />";
                $message .= "Ülikool: ".$form->universities[$form->university]."<br />";
                $message .= "Jooksev tegevus: ".$form->current_work."<br />";
                $message .= "Lisainfo: ".$form->additional_info."<br /><br /><br />";
                 $message .= "Lugupidamisega <br />Online süsteem";
                
				$email->message = $message;
				if ($email->send(array("user" => "Iluteeninduskool")))
                {
			     	Yii::app()->user->setFlash('success', Yii::t("site", "SITE_EAMILSENDSUCCESS"));
                }else{
                    //echo "tekkis viga";
                    Yii::app()->user->setFlash('success', Yii::t("site", "SITE_EAMILNOTSENT"));
                }
				
				Yii::app()->user->setFlash('contact','Täname, et tellisite töö tegemise ALV Servis-elt');
				$this->refresh();
			}
		}
		$this->render('registreerikoolitusele',array('form'=>$form));
	}
    
    
    public function actionSms()
    {
        // SMS parameters
        // message        
        // sender
        // price
        // service_id
        // message_id
        // sig 
        //a:13:{s:7:"country";s:2:"EE";s:8:"currency";s:3:"EEK";s:7:"keyword";s:10:"FOR SORVER";s:7:"message";s:11:"www.minu.ee";s:10:"message_id";s:32:"884b7845afe3593467d9240aacd5fca7";s:8:"operator";s:0:"";s:5:"price";s:4:"50.0";s:6:"sender";s:11:"37255621935";s:10:"service_id";s:32:"3daf4c880f9aae9745dd1d74698cf23e";s:9:"shortcode";s:5:"13017";s:3:"sig";s:32:"8a699adbe8c415b82ead41ee7a8c04fe";s:6:"status";s:7:"pending";s:4:"test";s:4:"true";}

//        $fp=fopen('./uploads/sms.txt','a+');
//        fputs($fp, serialize($_REQUEST)."\n");
//        fputs($fp, "{$_REQUEST}\n");
//        fclose($fp); 
        
        // ADMIN DATA
        $service_id = "3daf4c880f9aae9745dd1d74698cf23e";
        $service_pass = "53ace343fa28788e39c7560702aa45e7";
        
        $ip = $_SERVER["REMOTE_ADDR"];
        //echo "ip - ".$ip;
        if(!in_array($_SERVER['REMOTE_ADDR'], array('121.0.0.1', '81.20.151.38', '81.20.148.122', '209.20.83.207'))) {
            die("Error: Unknown IP");
        }
        
        // check the signature
        $secret = ''; // insert your secret between ''
        if(!empty($secret) && !check_signature($_GET, $secret)) {
            die("Error: Invalid signature");
        }

        $sender = $_GET['sender'];
        $message = $_GET['message'];

        $sms = new OrdersSms;
        $sms->sender = $sender;
        $sms->message = $message;
        
        if ($sms->save()){
            echo "Makstud";
        }else{
            echo "Viga. Kirjutage e-mailile: info@sorver.eu, helistage +372 55 684 416";
            print_r ($sms->errors);
        }

    }
    
    function check_signature($params_array, $secret) {
        ksort($params_array);
        
        $str = '';
        foreach ($params_array as $k=>$v) {
          if($k != 'sig') {
            $str .= "$k=$v";
          }
        }
        $str .= $secret;
        $signature = md5($str);
        
        return ($params_array['sig'] == $signature);
    }


    // GENERATE 64 LONG KEY
	function get_rand_id($length){
		$chrs = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S' ,'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

		if($length > 0){
			$rand_id = "";
			for($i=1; $i<=$length; $i++){
				mt_srand((double)microtime() * 1000000);
				$num = mt_rand(1,count($chrs));
				$rand_id .= @$chrs[$num];
			}
		}
		return $rand_id;
	}
}