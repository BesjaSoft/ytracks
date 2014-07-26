<?php

/**
 * This is the model class for table "{{tracks_circuits}}".
 *
 * The followings are the available columns in table '{{tracks_circuits}}':
 * @property integer $id
 * @property string $name
 * @property string shortname
 * @property string $alias
 * @property string $city
 * @property string $country_code
 * @property double $length
 * @property integer $distance_id
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $published
 * @property integer $ordering
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Circuit extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return Circuit the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_circuits}}';
    }

    public static function getClassName() {
        return 'Circuit';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, created', 'required'),
            array('distance_id, checked_out, published, ordering, deleted', 'numerical', 'integerOnly' => true),
            array('length', 'numerical'),
            array('name, alias, city', 'length', 'max' => 255),
            array('shortname', 'length', 'max' => 50),
            array('country_code', 'length', 'max' => 3),
            array('checked_out_time, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // foreign keys:
            array('distance_id', 'exist', 'attributeName' => 'id', 'className' => 'Distance'),
            // Please remove those attributes that should not be searched.
            array('id, name, alias, city, country_code, length, distance_id, checked_out, checked_out_time, published, ordering, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'distance' => array(self::BELONGS_TO, 'Distance', 'distance_id'),
            'rounds' => array(self::HAS_MANY, 'Round', 'circuit_id'),
            'checked_out' => array(self::BELONGS_TO, 'User', 'user_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'shortname' => 'Shortname',
            'alias' => 'Alias',
            'city' => 'City',
            'country_code' => 'Country',
            'length' => 'Length',
            'distance_id' => 'Distance',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'published' => 'Published',
            'ordering' => 'Ordering',
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
        $criteria->compare('shortname', $this->shortname, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('country_code', $this->country_code, true);
        $criteria->compare('length', $this->length);
        $criteria->compare('distance_id', $this->distance_id);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getAlbum() {
        if (!empty($this->shortname)) {
            $shortname = strtolower($this->shortname);
            return strtolower($this->getBaseImagePath()
                    . '/circuits'
                    . '/' . substr($shortname, 0, 1)
                    . '/' . $shortname
            ); // The directory to display
        } else {
            return strtolower($this->getBaseImagePath()
                    . '/circuits'
                    . '/' . substr($this->alias, 0, 1)
                    . '/' . $this->alias
            ); // The directory to display
        }
    }

    public function afterSave() {

        // create a directory for the album of the Individual
        $album = $this->getAlbum();
        if (!is_dir($album)) {
            mkdir($album, 0777, true);
        }

        // do some nice stuff in the parent afterSave
        return parent::afterSave();
    }

}
