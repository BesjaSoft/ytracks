Tere <?php echo $firstname; ?>,<br /><br />

Olete registreerunud "<?php echo $project_name; ?>" portaalis. Teie konto on hetkel aktiveerimata. <br />
Selleks, et aktiveerida oma konto vajuta alljärgneval lingil:
<br /><br />
<?php echo $html->link("Konto aktiveerimine", $project_www."/users/activateaccount/".$activation_code);  ?>
<br /><br />