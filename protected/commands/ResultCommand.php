<?php

class ResultCommand extends BaseConsole {

    public function actionIndex($section, $vehicle = "", $error = 0) {
        if (in_array($section, array_keys($this->content))) {
            $this->key = $section;
            $this->readfiles(true);

            if ($section == 'wsrp') {
                $this->convertWsrpContent(false);
                $this->convertTresult(true, $vehicle, $error);
            } elseif ($section == "formula2") {
                $this->convertFormula2Content(true);
                $this->convertTresult(true, $vehicle, $error);
            } elseif ($section == "gelf1") {
                $this->convertGelf1Content(false);
                $this->convertTresult(true, $vehicle, $error);
            } elseif ($section == "urh") {
                $this->convertUrhContent(true);
                //$this->convertTresult(true, $vehicle, $error);
            }
        } else {
            echo 'Please use one of the following : ' . "\n";
            print_r(array_keys($this->content));
        }
    }

    private function convertFormula2Content($do = false) {
        echo '**** Convert Formula 2 content => tresult ****' . "\n";
        if ($do) {
            Formula2Tresult::model()->readContent($this->key, $this->content[$this->key]['category']);
        }
    }

    private function convertTvehicle($do = false) {
        echo '**** Convert tresults => results ****' . "\n";
        if ($do) {
            Tchassis::model()->exportChassis();
        }
    }

    private function convertTresult($do = false, $vehicle, $error) {
        echo '**** Convert tresults => results ****' . "\n";
        if ($do) {
            Tresult::model()->convertResults(true, $vehicle, $error);
        }
    }

    private function convertUrhContent($do = false) {
        echo '**** Convert URH content => tresult ****' . "\n";
        if ($do) {
            UrhTresult::model()->readContent($this->key, $this->content[$this->key]['category']);
            //Tresult::model()->reorderResults($do);
        }
    }

    private function convertWsrpContent($do = false) {
        echo '**** Convert WSRP content => tresult ****' . "\n";
        if ($do) {
            WsrpTresult::model()->readContent($this->key, $this->content[$this->key]['category']);
            Tresult::model()->reorderResults($do);
        }
    }

}

?>