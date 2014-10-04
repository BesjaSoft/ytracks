<?php

/**
 * This is the model class for table "{{tracks_scalemodels}}".
 *
 * The followings are the available columns in table '{{tracks_scalemodels}}':
 * @property integer $id
 * @property integer $make_id
 * @property integer $type_id
 * @property string $description
 * @property string $alias
 * @property string $reference
 * @property integer $year
 * @property string $color
 * @property string $raceno
 * @property string $livery
 * @property string $event
 * @property string $drivers
 * @property integer $category_id
 * @property integer $scale_id
 * @property integer $modeltype_id
 * @property integer $material_id
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Scalemodel extends BaseModel {

    public static $displayField = 'description';

    public static function getDisplayField($class = __CLASS__) {
        return parent::getDisplayField($class);
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Scalemodel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
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

    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                . '/vehicles'
                . '/' . substr($this->getSlug($this->make->name), 0, 1)
                . '/' . $this->getSlug($this->make->name)
                . '/' . $this->getSlug($this->reference)
        ); // The directory to display
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_scalemodels}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('make_id, type_id, reference', 'required'),
            array('make_id, type_id, year, category_id, scale_id, modeltype_id, material_id, deleted', 'numerical', 'integerOnly' => true),
            array('description, alias, color, raceno, livery, event, drivers', 'length', 'max' => 255),
            array('reference', 'length', 'max' => 50),
            array('created, modified, deleted_date', 'safe'),
            // foreign key checks:
            array('make_id', 'exist', 'attributeName' => 'id', 'className' => 'Make'),
            array('type_id', 'exist', 'attributeName' => 'id', 'className' => 'Type'),
            array('category_id', 'exist', 'attributeName' => 'id', 'className' => 'ModelCategory'),
            array('modeltype_id', 'exist', 'attributeName' => 'id', 'className' => 'Modeltype'),
            array('material_id', 'exist', 'attributeName' => 'id', 'className' => 'Material'),
            array('scale_id', 'exist', 'attributeName' => 'id', 'className' => 'Scale'),
            // Unique key:
            array('make_id+reference', 'uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, make_id, type_id, description, alias, reference, year, color, raceno, livery, event, drivers, category_id, scale_id, modeltype_id, material_id, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'make' => array(self::BELONGS_TO, 'Make', 'make_id'),
            'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
            'material' => array(self::BELONGS_TO, 'Material', 'material_id'),
            'modeltype' => array(self::BELONGS_TO, 'ModelType', 'modeltype_id'),
            'category' => array(self::BELONGS_TO, 'ModelCategory', 'category_id'),
            'scale' => array(self::BELONGS_TO, 'Scale', 'scale_id'),
            'drivers' => array(self::HAS_MANY, 'ScalemodelDriver', 'scalemodel_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'make_id' => 'Make',
            'type_id' => 'Type',
            'description' => 'Description',
            'alias' => 'Alias',
            'reference' => 'Reference',
            'year' => 'Year',
            'color' => 'Color',
            'raceno' => 'Raceno',
            'livery' => 'Livery',
            'event' => 'Event',
            'drivers' => 'Drivers',
            'category_id' => 'Category',
            'scale_id' => 'Scale',
            'modeltype_id' => 'Modeltype',
            'material_id' => 'Material',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
            'image' => 'Image',
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
        $with = array();

        $criteria->compare('id', $this->id);
        if (is_numeric($this->make_id)) {
            $criteria->compare('t.make_id', $this->make_id);
        } else {
            $criteria->compare('make.name', $this->make_id, true);
            $with[] = 'make';
        }
        if (is_numeric($this->type_id)) {
            $criteria->compare('type_id', $this->type_id);
        } else {
            $criteria->compare('type.name', $this->type_id, true);
            $with[] = 'type';
        }
        //$criteria->compare('type.name', $this->type_id, true);
        $criteria->compare('t.description', $this->description, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('reference', $this->reference, true);
        $criteria->compare('year', $this->year);
        $criteria->compare('color', $this->color, true);
        $criteria->compare('raceno', $this->raceno, true);
        $criteria->compare('livery', $this->livery, true);
        $criteria->compare('event', $this->event, true);
        $criteria->compare('drivers', $this->drivers, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('scale_id', $this->scale_id);
        $criteria->compare('modeltype_id', $this->modeltype_id);
        $criteria->compare('material_id', $this->material_id);
        //$criteria->compare('created', $this->created, true);
        //$criteria->compare('modified', $this->modified, true);
        //$criteria->compare('deleted', $this->deleted);
        //$criteria->compare('deleted_date', $this->deleted_date, true);
        if (!empty($with)) {
            $criteria->with = $with;
        }

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public function behaviors() {
        return array(
            'AutoTimestampBehavior' => array('class' => 'AutoTimestampBehavior'),
            'ERememberFiltersBehavior' => array(
                'class' => 'ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
            'SlugBehavior' => array
                ('class' => 'application.models.behaviours.SlugBehavior'
                , 'slug_col' => 'alias'
                , 'title_col' => array(array('make', 'name'), 'reference')
                , 'overwrite' => true //, 'max_slug_chars' => 125
            )
        );
    }

}
