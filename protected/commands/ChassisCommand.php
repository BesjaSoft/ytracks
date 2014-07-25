<?php
class ChassisCommand extends CConsoleCommand
{

    private function convertContent()
    {
        Tchassis::model()->readContent();
    }

    private function convertTvehicle()
    {
        Tchassis::model()->exportChassis();
    }

    private function readfiles()
    {
        $dir_path = "../../../../webcopier/wsrp/chassis/";
        $files = glob($dir_path."*.html");
        echo 'Aantal files: '.count($files)."\n";
        foreach ($files as $file) {
            Content::model()->readfile($file, 2, 6); // wsrp/chassis
        }
    }

    public function actionIndex()
    {
        $this->readfiles();
        $this->convertContent();
        $this->convertTvehicle();
    }

}
?>