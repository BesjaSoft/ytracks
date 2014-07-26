<?php
$session = Yii::app()->getSession();
foreach($languages as $lang => $name)
{
    echo '<span class="'.($session["navLanguage"] == $lang ? "lang active": "normal").'">['.CHtml::link($name, array('/sections/admin/','navLanguage'=>$lang))."]</span> ";
}
?>