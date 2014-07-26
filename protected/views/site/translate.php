<h1>Tõlgete haldur</h1>

<?php

//print_r ($translation);

if (count($translation)){
    echo CHtml::beginForm();
    foreach($translation as $name => $value){
        
        echo CHtml::textField($name, $value, array("size" => 75))."<br />";
    }
    echo CHtml::submitButton("Salvesta");
    echo CHtml::endForm();
}else{
   echo "Fail puudub"; 
}

?>