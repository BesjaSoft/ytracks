<?php

class ConvertCommand extends CConsoleCommand {

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

    public function actionIndividual($section, $step) {

        // the following sections are defined:
        // 1. gelf1drivers
        // 2. gelmotorsport
        // the following steps are defined:
        // 0. all steps
        // 1. read files into Content
        // 2. convert content into stories
        // 3. convert into Tindividual
        // 4. convert into Individual
        // set the key needed in the methods:
        $this->key = $section;

        // Decide what to do next:
        switch ($step) {
            case 0:
                // build a loop to step through
                break;
            case 1:
                // read the content:
                $this->readfiles(true);
                break;
            case 2:
                $this->convertContentStories($section, true);
                break;
            case 3:
                $this->convertContentTindividual($section, true);
                break;
            case 4:
                $this->convertIndividual(true);
                break;
        }
    }

    public function actionIndex($section, $vehicle = "") {
        if (in_array($section, array_keys($this->content))) {
            $this->key = $section;
            $this->readfiles(false);

            if ($section == 'wsrp') {
                $this->convertWsrpContent(false);
                $this->convertTresult(true, $vehicle);
            } else if ($section == 'chassis') {
                $this->convertChassisContent($do);
                $this->convertTvehicle($do);
            } else if ($section == "formula2") {
                $this->convertFormula2Content($do);
                $this->convertTresult(true, $vehicle);
            } else if ($section == "gelf1") {
                $this->convertGelf1Content($do);
                $this->convertTresult(true, $vehicle);
            }
        } else {
            echo 'Please use one of the following : ' . "\n";
            print_r(array_keys($this->content));
        }
    }

    public function actionRallybase($step) {
        $this->key = 'rallybase';

        echo '**** Start of Convert Rallybase ****' . "\n";

        if ($step == 'all') {
            echo '**** step all ****' . "\n";
            // creat a loop to do all actions:
        } else {
            echo '**** step ' . $step . ' ****' . "\n";
            // Decide what to do next:
            switch ($step) {
                case 0:
                    // build a loop to step through
                    break;
                case 1:
                    // read the content:
                    $this->readfiles(true);
                    break;
                case 2:
                    $this->convertRallybaseRallies(true);
                    break;
                case 3:
                    $this->convertRallybaseDrivers(true);
                    break;
                case 4:
                    $this->convertRallybaseChampionships(true);
                    break;
                case 5:
                    $this->convertRallybaseResults(true);
                    break;
            }
        }
        echo '**** End of Convert Rallybase ****' . "\n";
    }

    public function actionTrack($section, $step) {
        $this->key = $section;

        if ($step == 'all') {
            
        } else {
            // Decide what to do next:
            switch ($step) {
                case 0:
                    // build a loop to step through
                    break;
                case 1:
                    // read the content:
                    $this->readfiles(true);
                    break;
                case 2:
                    $this->convertContentStories($section, true);
                    break;
                case 3:
                    $this->convertContentTindividual($section, true);
                    break;
                case 4:
                    $this->convertContentIndividual(true);
                    break;
            }
        }
    }

    public function actionVehicle() {
        Tvehicle::model()->exportVehicles();
    }

    private function convertWsrpContent($do = false) {
        echo '**** Convert content => tresult ****' . "\n";
        if ($do) {
            Tresult::model()->readContent($this->key, $this->content[$this->key]['category']);
        }
    }

    private function convertContentStories($do = false) {
        echo '**** Convert content => stories ****' . "\n";
        if ($do) {
            Content::model()->convertStories($this->key, $this->content[$this->key]['category']);
        }
    }

    private function convertContentTindividual($do = false) {
        echo '**** Convert content => tindividual ****' . "\n";
        if ($do) {
            Tindividual::model()->readContent($this->key, $this->content[$this->key]['category']);
        }
    }

    private function convertIndividual($do = false) {
        echo '**** Convert tindividual => Individual ****' . "\n";
        if ($do) {
            Tindividual::model()->convertIndividuals(false);
        }
    }

    private function convertTvehicle($do = false) {
        echo '**** Convert tresults => results ****' . "\n";
        if ($do) {
            Tchassis::model()->exportChassis();
        }
    }

    private function convertTresult($do = false, $vehicle) {
        echo '**** Convert tresults => results ****' . "\n";
        if ($do) {
            //Tresult::model()->reorderResults(true);
            Tresult::model()->convertResults(true, $vehicle);
        }
    }

    private function readfiles($do = false) {
        echo '**** Read files => content ****' . "\n";
        if ($do) {
            echo 'Path:' . $this->content[$this->key]['path'] . "\n";
            $files = glob($this->content[$this->key]['path']);
            foreach ($files as $file) {
                echo 'File:' . $file . "\n";
                Content::model()->readfile($file, $this->content[$this->key]['category']);
            }
        }
    }

    private function convertRallybaseChampionships($do = false) {
        echo '**** Convert Rallybase Championships ****' . "\n";
        if ($do) {
            Tresult::model()->convertRallybaseChampionships($this->key, $this->content[$this->key]['category']);
        }
    }

    private function convertRallybaseDrivers($do = false) {
        echo '**** Convert Rallybase Drivers ****' . "\n";
        if ($do) {
            Tresult::model()->convertRallybaseDrivers($this->key, $this->content[$this->key]['category']);
        }
    }

    private function convertRallybaseRallies($do = false) {
        echo '**** Convert Rallybase Rallies ****' . "\n";
        if ($do) {
            Tresult::model()->convertRallybaseRallies($this->key, $this->content[$this->key]['category']);
        }
    }

}

?>
