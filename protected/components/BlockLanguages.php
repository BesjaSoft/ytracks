<?php

class BlockLanguages extends CWidget
{
    public $viewFile = "blockLanguages";
        
	public function init()
	{  
		
	}
	
	public function run()
	{
        $languages = Yii::app()->params["languages"];
        
        if ($this->viewFile == ""){
            echo "<font color='red'>Kujunduse file ei ole märgitud</font>";
            return false;
        }
        
        if (file_exists(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php"))
        {
           $this->renderFile(Yii::app()->theme->basePath."/components/views/".$this->viewFile.".php", array("languages" => $languages)); 
        }else{
            $this->render($this->viewFile, array("languages" => $languages));
        }
	}
}