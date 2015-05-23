<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseConsole
 *
 * @author fred
 */
class BaseConsole extends CConsoleCommand {

    protected $key = null;
    protected $content = array(
        'wsrp' => array('path' => '../../../../webcopier/wsrp/*.html', 'category' => 15),
        'chassis' => array('path' => '../../../../webcopier/wsrp/chassis/*.html', 'category' => 16),
        'formula2' => array('path' => '../../../../webcopier/Formula2/*.htm', 'category' => 17),
        'gelf1' => array('path' => '../../../../webcopier/GELMotorsport/archive/f1/*/*.html', 'category' => 18),
        'gelpeople' => array('path' => '../../../../webcopier/GELMotorsportPeople/*.html', 'category' => 23),
        'geldrivers' => array('path' => '../../../../webcopier/GELMotorsport/drivers/*.html', 'category' => 24),
        'geltracks' => array('path' => '../../../../webcopier/GELMotorsport/tracks/*.html', 'category' => 25),
        'rallybase' => array('path' => '../../../webcopier/Rallybase/*.html', 'category' => 26),
        'urh' => array('path' => '../../../../webcopier/urh/*.html', 'category' => 27),
    );

    protected function readfiles($do = false) {
        echo '**** Read files => content ****' . "\n";
        if ($do) {
            $files = glob($this->content[$this->key]['path']);
            echo 'files to process : ' . count($files) . "\n";
            foreach ($files as $file) {
                Content::model()->readfile($file, $this->content[$this->key]['category']);
            }
        }
    }

}
