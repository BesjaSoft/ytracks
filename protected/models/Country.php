<?php

/**
 * This is the model class for table "{{tracks_countries}}".
 *
 * The followings are the available columns in table '{{tracks_countries}}':
 * @property integer $id
 * @property string $name
 * @property string $fullname
 * @property string $iso2
 * @property string $iso3
 * @property integer $num
 * @property string $itu
 * @property string $fips
 * @property string $ioc
 * @property string $fifa
 * @property string $ds
 * @property string $wmo
 * @property string $gaul
 * @property string $marc
 * @property string $dial
 * @property string $remarks
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Country extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Country the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            'ERememberFiltersBehavior' => array(
                'class' => 'ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_countries}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('num, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('name, remarks', 'length', 'max' => 50),
            array('fullname', 'length', 'max' => 150),
            array('iso2, fips, wmo', 'length', 'max' => 2),
            array('iso3, itu, ioc, marc', 'length', 'max' => 3),
            array('fifa', 'length', 'max' => 4),
            array('ds', 'length', 'max' => 12),
            array('gaul, dial', 'length', 'max' => 5),
            array('checked_out_time, created, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, fullname, iso2, iso3, num, itu, fips, ioc, fifa, ds, wmo, gaul, marc, dial, remarks, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
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
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'fullname' => 'Fullname',
            'iso2' => 'Iso2',
            'iso3' => 'Iso3',
            'num' => 'Num',
            'itu' => 'Itu',
            'fips' => 'Fips',
            'ioc' => 'Ioc',
            'fifa' => 'Fifa',
            'ds' => 'Ds',
            'wmo' => 'Wmo',
            'gaul' => 'Gaul',
            'marc' => 'Marc',
            'dial' => 'Dial',
            'remarks' => 'Remarks',
            'ordering' => 'Ordering',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('iso2', $this->iso2, true);
        $criteria->compare('iso3', $this->iso3, true);
        $criteria->compare('num', $this->num);
        $criteria->compare('itu', $this->itu, true);
        $criteria->compare('fips', $this->fips, true);
        $criteria->compare('ioc', $this->ioc, true);
        $criteria->compare('fifa', $this->fifa, true);
        $criteria->compare('ds', $this->ds, true);
        $criteria->compare('wmo', $this->wmo, true);
        $criteria->compare('gaul', $this->gaul, true);
        $criteria->compare('marc', $this->marc, true);
        $criteria->compare('dial', $this->dial, true);
        $criteria->compare('remarks', $this->remarks, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function findList($conditions = '', $params = array()) {

        $conditions = new CDbCriteria();
        //$conditions->select = 'iso3, name';
        $conditions->order = 'name asc';

        $data = $this->active()->findAll(array('order' => 'name'));
        return CHtml::listData($data, 'iso3', 'name');
    }

}
