<?php

class UserMenu extends Portlet
{
    public $viewFile = "userMenu";
    
	public function init()
	{
		if(isset($_POST['command']) && $_POST['command']==='logout')
		{
			Yii::app()->user->logout();
			$this->controller->redirect(Yii::app()->homeUrl);
		}
		$this->title=CHtml::encode(Yii::app()->user->name);
		parent::init();
	}

	protected function renderContent()
	{

         if (file_exists(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"))
        {
           $this->renderFile(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"); 
        }else{
            $this->render($this->viewFile);
        }
	}
}