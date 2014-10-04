<?php

class TypeCommand extends BaseConsole {

    private function convertContent($do = false) {
        if ($do) {
            Ttype::model()->readContent();
        }
    }

    private function convertTypes($do = false) {
        if ($do) {
            Type::model()->convertTypes();
        }
    }

    private function readFiles($do = false) {

        $main = 'MainDirectory';
        if ($do) {
            $dir_path = '../../../../webcopier/AZRacingCars/*/*/';
            $files = glob($dir_path . '*.php.htm');
            echo 'aantal files: ' . count($files) . "\n";
            foreach ($files as $file) {
                echo 'file:' . $file . "\n";
                Content::model()->readfile($file, 2, 13); // sources/azracingcars
            }
        }
    }

    public function actionIndex() {
        $this->readFiles();
        $this->convertContent();
        $this->convertTypes(true);
    }

}

?>