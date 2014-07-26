Tere <?php echo $firstname; ?>,<br /><br />

Olete "<?php echo $project_name; ?>" portaali kasutaja ning registreerinud konverentsile:<br />
Konverentsi andmed:<br />
Pealkiri: <?php echo $title; ?><br />
Algus: <?php echo $date_start; ?><br />
Lõpp: <?php echo $date_end; ?><br />
Kirjeldus: <?php echo $description; ?><br /><br />

Lisainfo saamiseks vajuta lingile: 

<br /><br />
<?php echo $html->link("Konverentsi lisainfo", $project_www."/conferences/default/details/".$conference_id);  ?>
<br /><br />