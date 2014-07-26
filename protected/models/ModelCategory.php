<?php

/**
 * This is the model class for table "{{tracks_units}}".
 *
 * The followings are the available columns in table '{{tracks_units}}':
 * @property integer $id
 * @property string $domain
 * @property string $code
 * @property string $description
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $delete_date
 */
class ModelCategory extends Unit {

    /**
     * Returns the static model of the specified AR class.
     * @return Distance the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        $this->domainValue = 'MCY';
        parent::init();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'scalemodel' => array(self::HAS_MANY, 'Scalemodel', 'category_id'),
            'tscale' => array(self::HAS_MANY, 'TScale', 'category_id')
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

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

}
