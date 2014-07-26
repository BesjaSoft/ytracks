<?php

class EmailLogin extends Portlet
{
	public $title = 'Email Login';

	protected function renderContent()
	{
		$form = new LoginForm;
        //$form = CFrom("application.views.user.login", $model);
        
		if(isset($_POST['EmailLoginForm']))
		{
			$form->attributes = $_POST['EmailLoginForm'];
			if($form->validate())
			{
				$this->controller->refresh();
			}
		}
		
		$this->render("emailLogin", array('form'=>$form));
	}
}
