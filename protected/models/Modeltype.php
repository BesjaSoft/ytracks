<?php

/**
 * This is the model class for table "{{tracks_modeltypes}}".
 *
 * The followings are the available columns in table '{{tracks_modeltypes}}':
 * @property integer $id
 * @property string $description
 * @property string $created
 * @property string $deleted
 * @property string $lastupdate
 * @property integer $version
 */
class Modeltype extends Unit {

    /**
     * Returns the static model of the specified AR class.
     * @return Modeltype the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getDisplayField() {
        return 'description';
    }

    public function init() {
        $this->domainValue = 'MPE';
        parent::init();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('domain', $this->getDomain(), false);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('delete_date', $this->delete_date, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
