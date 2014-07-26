<?php

/**
 * This is the model class for table "{{tracks_vehicles}}".
 *
 * The followings are the available columns in table '{{tracks_vehicles}}':
 * @property integer $id
 * @property integer $type_id
 * @property string $reference
 * @property string $chassisnumber
 * @property string $alias
 * @property string $year
 * @property integer $color_id
 * @property integer $condition_id
 * @property string $modifications
 * @property string $licenseplate
 * @property string $remarks
 * @property integer $bodywork_id
 * @property integer $carrosseriesoort_id
 * @property string $model
 * @property string $options
 * @property string $history
 * @property string $engine
 * @property string $group
 * @property string $first_owner
 * @property string $next_owners
 * @property string $carrossier
 * @property string $comment
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Vehicle extends BaseModel {

    public static $displayField = 'chassisnumber';

    public static function getDisplayField($class = __CLASS__) {
        return parent::getDisplayField($class);
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Vehicle the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviours() {
        return array(
            'AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'SlugBehavior' => array(
                'class' => 'application.models.behaviours.SlugBehavior',
                'slug_col' => 'alias',
                'title_col' => array(array('type', 'alias'), 'chassisnumber'),
                'overwrite' => true //, 'max_slug_chars' => 125
            ),
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_vehicles}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type_id, created', 'required'),
            array('type_id, color_id, condition_id, bodywork_id, carrosseriesoort_id, published, ordering, checked_out, deleted', 'numerical', 'integerOnly' => true),
            array('reference', 'length', 'max' => 10),
            array('chassisnumber', 'length', 'max' => 50),
            array('alias', 'length', 'max' => 255),
            array('year', 'length', 'max' => 20),
            array('modifications, remarks, model, options, history, engine, group, first_owner, next_owners', 'length', 'max' => 500),
            array('licenseplate', 'length', 'max' => 20),
            array('carrossier', 'length', 'max' => 250),
            array('comment, checked_out_time, modified, deleted_date', 'safe'),
            // foreign key checks:
            array('type_id', 'exist', 'attributeName' => 'id', 'className' => 'Type'),
            array('color_id', 'exist', 'attributeName' => 'id', 'className' => 'Color'),
            //array('condition_id', 'exist','attributeName' => 'id', 'className' => 'Condition'),
            array('bodywork_id', 'exist', 'attributeName' => 'id', 'className' => 'Bodywork'),
            // unique key constraint:
            array('type_id+chassisnumber', 'application.extensions.uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, type_id, reference, chassisnumber, alias, year, color_id, condition_id, modifications, licenseplate, remarks, bodywork_id, carrosseriesoort_id, model, options, history, engine, group, first_owner, next_owners, carrossier, comment, published, ordering, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('type' => array(self::BELONGS_TO, 'Type', 'type_id'));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'type_id' => 'Type',
            'reference' => 'Reference',
            'chassisnumber' => 'Chassisnumber',
            'alias' => 'Alias',
            'year' => 'Year',
            'color_id' => 'Color',
            'condition_id' => 'Condition',
            'modifications' => 'Modifications',
            'licenseplate' => 'Licenseplate',
            'remarks' => 'Remarks',
            'bodywork_id' => 'Bodywork',
            'carrosseriesoort_id' => 'Carrosseriesoort',
            'model' => 'Model',
            'options' => 'Options',
            'history' => 'History',
            'engine' => 'Engine',
            'group' => 'Group',
            'first_owner' => 'First Owner',
            'next_owners' => 'Next Owners',
            'carrossier' => 'Carrossier',
            'comment' => 'Comment',
            'published' => 'Published',
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
     * @name afterSave
     * @abstract after the succesful save this method is called
     */
    public function afterSave() {

        // update the registered number of vehicles within the type:
        // get the number of registered cars:
        $criteria = new CDbCriteria();
        $criteria->condition = 'type_id='.$this->type_id.' and deleted = 0';
        $count = Vehicle::model()->count($criteria);

        // update the type
        $type = Type::model()->findByPk($this->type_id);
        $type->registered = $count;
        if (!$type->save()) {
            print_r($type->getErrors());
            die;
        }

        // create a directory for the album of the Vehicle
        $album = $this->getAlbum();
        if (!is_dir($album)) {
            mkdir($album, 0777, true);
        }

        // do some nice stuff in the parent afterSave
        return parent::afterSave();
    }

    /**
     *
     * Adjust some of the values before validation takes place.
     * @return boolean
     */
    public function beforeValidate() {
        $this->reference = $this->setNullable($this->reference);
        $this->chassisnumber = $this->setNullable($this->chassisnumber);
        $this->color_id = $this->setNullable($this->color_id);
        $this->condition_id = $this->setNullable($this->condition_id);
        $this->bodywork_id = $this->setNullable($this->bodywork_id);

        return parent::beforeValidate();
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
        if (is_numeric($this->type_id)) {
            $criteria->compare('t.type_id', $this->type_id);
        } else {
            $criteria->compare('type.name', $this->type_id, true);
            $with[] = 'type';
        }
        $criteria->compare('reference', $this->reference, true);
        $criteria->compare('chassisnumber', $this->chassisnumber, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('color_id', $this->color_id);
        $criteria->compare('condition_id', $this->condition_id);
        $criteria->compare('modifications', $this->modifications, true);
        $criteria->compare('licenseplate', $this->licenseplate, true);
        $criteria->compare('remarks', $this->remarks, true);
        $criteria->compare('bodywork_id', $this->bodywork_id);
        $criteria->compare('carrosseriesoort_id', $this->carrosseriesoort_id);
        $criteria->compare('model', $this->model, true);
        $criteria->compare('options', $this->options, true);
        $criteria->compare('history', $this->history, true);
        $criteria->compare('engine', $this->engine, true);
        $criteria->compare('group', $this->group, true);
        $criteria->compare('first_owner', $this->first_owner, true);
        $criteria->compare('next_owners', $this->next_owners, true);
        $criteria->compare('carrossier', $this->carrossier, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);
        if (!empty($with)) {
            $criteria->with = $with;
        }
        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    public static function getClassName() {
        return 'Vehicle';
    }

    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                .'/vehicles'
                .'/'.substr($this->getSlug($this->type->make->name), 0, 1)
                .'/'.$this->getSlug($this->type->make->name)
                .'/'.$this->getSlug($this->type->name)
                .'/'.$this->getSlug($this->chassisnumber)
        ); // The directory to display
    }

}
