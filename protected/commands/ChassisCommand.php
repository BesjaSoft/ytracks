<?php

class ChassisCommand extends BaseConsole {

    private function convertContent($do = false) {
        if ($do) {
            Tchassis::model()->readContent($this->content[$this->key]['category']);
        }
    }

    private function convertTvehicle() {
        Tchassis::model()->exportChassis();
    }

    public function actionIndex() {
        $this->key = 'chassis';
        $this->readfiles(true);
        $this->convertContent(true);
        $this->convertTvehicle();
    }

}

?>