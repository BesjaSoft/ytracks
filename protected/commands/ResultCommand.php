<?php

class ResultCommand extends CConsoleCommand {

    private $key = null;
    private $content = array(
        'wsrp' => array('path' => '../../../../webcopier/wsrp/*.html', 'category' => 14),
        'chassis' => array('path' => '../../../../webcopier/wsrp/chassis/*.html', 'category' => 15),
        'formula2' => array('path' => '../../../../webcopier/Formula2/*.htm', 'category' => 16),
        'gelf1' => array('path' => '../../../../webcopier/GELMotorsport/archive/f1/*/*.html', 'category' => 20),
        'gelpeople' => array('path' => '../../../../webcopier/GELMotorsportPeople/*.html', 'category' => 22),
        'geldrivers' => array('path' => '../../../../webcopier/GELMotorsport/drivers/*.html', 'category' => 21),
        'geltracks' => array('path' => '../../../../webcopier/GELMotorsport/tracks/*.html', 'category' => 23),
        'rallybase' => array('path' => '../../../webcopier/Rallybase/*.html', 'category' => 24),
        'urh' => array('path' => '../../../webcopier/ultimateracinghistory/*.html', 'category' => 25),
    );

    public function actionIndex($section, $vehicle = "", $error = 0) {
        if (in_array($section, array_keys($this->content))) {
            $this->key = $section;
            $this->readfiles(false);

            if ($section == 'wsrp') {
                $this->convertWsrpContent(false);
                $this->convertTresult(true, $vehicle, $error);
            } else if ($section == 'chassis') {
                $this->convertChassisContent($do);
                $this->convertTvehicle($do, $error);
            } else if ($section == "formula2") {
                $this->convertFormula2Content($do);
                $this->convertTresult(true, $vehicle, $error);
            } else if ($section == "gelf1") {
                $this->convertGelf1Content($do);
                $this->convertTresult(true, $vehicle, $error);
            }
        } else {
            echo 'Please use one of the following : ' . "\n";
            print_r(array_keys($this->content));
        }
    }

    private function convertWsrpContent($do = false) {
        echo '**** Convert content => tresult ****' . "\n";
        if ($do) {
            Tresult::model()->readContent($this->key, $this->content[$this->key]['category']);
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
            //Tresult::model()->reorderResults(true);
            Tresult::model()->convertResults(true, $vehicle, $error);
        }
    }

    private function readfiles($do = false) {
        echo '**** Read files => content ****' . "\n";
        if ($do) {
            $files = glob($this->content[$this->key]['path']);
            echo 'files to proocess : '.count($files). "\n";
            foreach ($files as $file) {
                Content::model()->readfile($file, $this->content[$this->key]['category']);
            }
        }
    }

}

?>