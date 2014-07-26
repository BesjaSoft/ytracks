<?php

class TopMenu extends CWidget
{
    public $viewFile = "topMenu";
    public $menuType = "top"; // children
    public $childParentId = 0;
        
	public function init()
	{  
		
	}
	
	public function run()
	{
		$this->renderContent();
		
	} 


	public function getMenu()
	{
        if ($this->menuType == "children"){
            return Section::model()->findChildren($this->childParentId);
        }
        
        if ($this->menuType == "top"){
            return Section::model()->findMenu();
        }
	}
    
	protected function renderContent()
	{
        if ($this->viewFile == ""){
            echo "<font color='red'>Kujunduse file ei ole märgitud</font>";
            return false;
        }
        
        if (file_exists(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"))
        {
           $this->renderFile(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"); 
        }else{
            $this->render($this->viewFile);
        }
	}
}