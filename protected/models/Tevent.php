<?php

/**
 * This is the model class for table "{{tracks_tevents}}".
 *
 * The followings are the available columns in table '{{tracks_tevents}}':
 * @property integer $id
 * @property string $name
 * @property string $country_code
 * @property string $description
 * @property integer $done
 * @property integer $event_id
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Tevent extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_tevents}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, done, created', 'required'),
            array('done, event_id, deleted', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 200),
            array('country_code', 'length', 'max' => 3),
            array('description, modified, deleted_date', 'safe'),
            // unique name:
            array('name', 'unique'),
            // foreign key checks:
            array('country_code', 'exist', 'attributeName' => 'iso3', 'className' => 'Country'),
            array('event_id', 'exist', 'attributeName' => 'id', 'className' => 'Event'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, country_code, description, done, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'country_code' => 'Country Code',
            'description' => 'Description',
            'event_id' => 'Event',
            'done' => 'Done',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
        );
    }

    public function beforeSave() {
        if (empty($this->event_id)) {
            $this->done = 0;
        }
        return parent::beforeSave();
    }

    public function behaviors() {
        return array('AutoTimestampBehavior' => array('class' => 'AutoTimestampBehavior'),
            'ERememberFiltersBehavior' => array(
                'class' => 'ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('country_code', $this->country_code, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('done', 0);
        $criteria->compare('event_id', $this->event_id);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider($this, array('criteria' => $criteria, 'Pagination' => array('pageSize' => 50)));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tevents the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function export() {
        $event = Event::model()->find('name=:name', array('name' => $this->name));
        if (!empty($event->id)) {
            $this->event_id = $event->id;
            $this->done = 1;
            return ($this->save());
        }

        if (strpos($this->name, '[') > 0) {
            $tname = trim(substr($this->name, 0, strpos($this->name, '[') - 1));
            $event = Event::model()->find('name=:name', array('name' => $tname));
            if (!empty($event->id)) {
                $this->event_id = $event->id;
                $this->done = 1;
                return ($this->save());
            } else {
                $event = new Event();
                $event->name = $tname;
                $event->published = 1;
                $event->ordering = 1;
                if ($event->save()) {
                    $this->event_id = $event->id;
                    $this->done = 1;
                    return $this->save();
                }
            }
        } else {
            $event = new Event();
            $event->name = trim($this->name);
            $event->published = 1;
            $event->ordering = 1;
            if ($event->save()) {
                $this->event_id = $event->id;
                $this->done = 1;
                return $this->save();
            }
        }

        return false;
    }
}
