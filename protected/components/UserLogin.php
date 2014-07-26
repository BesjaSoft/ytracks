<?php

class UserLogin extends Portlet
{
	public $title='Login';
    public $viewFile = "userLogin";

	protected function renderContent()
	{
		$form = new LoginForm;
        //$form = CFrom("application.views.user.login", $model);
        
		if(isset($_POST['LoginForm']))
		{
			$form->attributes = $_POST['LoginForm'];
			if($form->validate())
			{
				$this->controller->refresh();
			}
		}
		
        if ($this->viewFile == ""){
            echo "<font color='red'>Kujunduse fail ei ole märgitud</font>";
            return false;
        }
        
        if (file_exists(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"))
        {
           $this->renderFile(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php", array('form'=>$form)); 
        }else{
            $this->render($this->viewFile, array('form'=>$form));
        }
	}
}
