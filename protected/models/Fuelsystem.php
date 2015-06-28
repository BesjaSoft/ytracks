<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ignition
 *
 * @author fred
 */
class Fuelsystem extends Unit
{
    public static $domainValue = 'FSM';

    /**
     * Returns the static model of the specified AR class.
     * @return Distance the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getDisplayField($class = __CLASS__) {
        return parent::getDisplayField($class);
    }

    public static function getDomainValue($class = __CLASS__) {
        return parent::getDomainValue($class);
    }
    
        /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('types' => array(self::HAS_MANY, 'Type', 'engineposition_id'));
    }
}
?>

