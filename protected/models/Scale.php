<?php

/**
 * This is the model class for table "{{tracks_scales}}".
 *
 * The followings are the available columns in table '{{tracks_scales}}':
 * @property integer $id
 * @property string $code
 * @property string $description
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Scale extends Unit {

   public static $domainValue = 'SLE';

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
        return array();
    }

}
