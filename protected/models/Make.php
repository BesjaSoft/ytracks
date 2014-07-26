<?php

/**
 * This is the model class for table "{{tracks_makes}}".
 *
 * The followings are the available columns in table '{{tracks_makes}}':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $code
 * @property integer $founder_id
 * @property string $logo
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $published
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Make extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return Make the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getClassName() {
        return 'Make';
    }

    public function init() {
        $this->displayField = 'name';
        parent::init();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_makes}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, created', 'required'),
            array('founder_id, ordering, checked_out, published, deleted', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            array('alias', 'length', 'max' => 50),
            array('code', 'length', 'max' => 10),
            array('logo', 'length', 'max' => 255),
            array('checked_out_time, modified, deleted_date', 'safe'),
            // unique:
            array('name', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, alias, code, founder_id, logo, ordering, checked_out, checked_out_time, published, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('type' => array(self::HAS_MANY, 'Type', 'make_id'),
            'tresult' => array(self::HAS_MANY, 'Tresult', 'make_id'),
            'result' => array(self::HAS_MANY, 'Result', 'make_id'),
            'individual' => array(self::BELONGS_TO, 'Individual', 'founder_id'),
            'checked_out' => array(self::BELONGS_TO, 'User', 'user_id')
        );
    }

    /**
     * function: getLogo() - checks the logo if not applicable returns a "no-image".
     * returns : image with logo
     * */
    public function getLogo() {
        $path = 'vehicles/'
                . substr($this->alias, 0, 1)
                . '/'
                . $this->alias
                . '/';
        $file = $this->alias . '-logo';
        $ext = '.png';
        //
        if (!(file_exists($this->getBaseImagePath() . $path . $file . $ext))) {
            $ext = '.jpg';
            if (!(file_exists($this->getBaseImagePath() . $path . $file . $ext))) {
                $ext = '.gif';
                if (!file_exists($this->getBaseImagePath() . $path . $file . $ext)) {
                    $path = '';
                    $file = 'no_image';
                    $ext = '.gif';
                }
            }
        }
        //
        return CHtml::image($this->getBaseImagePath() . $path . $file . $ext);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'code' => 'Code',
            'founder_id' => 'Founder',
            'logo' => 'Logo',
            'ordering' => 'Ordering',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'published' => 'Published',
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
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('founder_id', $this->founder_id);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                . '/vehicles'
                . '/' . substr($this->getSlug($this->name), 0, 1)
                . '/' . $this->getSlug($this->name)
        ); // The directory to display
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
