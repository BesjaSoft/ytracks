<?php

/**
 * This is the model class for table "{{weblinks}}".
 *
 * The followings are the available columns in table '{{weblinks}}':
 * @property string $id
 * @property integer $catid
 * @property string $title
 * @property string $alias
 * @property string $url
 * @property string $description
 * @property integer $hits
 * @property integer $state
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $ordering
 * @property integer $access
 * @property string $params
 * @property string $language
 * @property string $created
 * @property string $created_by
 * @property string $created_by_alias
 * @property string $modified
 * @property string $modified_by
 * @property string $metakey
 * @property string $metadesc
 * @property string $metadata
 * @property integer $featured
 * @property string $xreference
 * @property string $publish_up
 * @property string $publish_down
 * @property string $version
 * @property string $images
 */
class Weblink extends BaseModel {

    public static $displayField = 'title';

    public static function getDisplayField($class = __CLASS__) {
        return parent::getDisplayField($class);
    }    
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{weblinks}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('description, params, metakey, metadesc, metadata, xreference, images', 'required'),
            array('catid, hits, state, checked_out, ordering, access, featured', 'numerical', 'integerOnly' => true),
            array('title, url', 'length', 'max' => 250),
            array('alias, created_by_alias', 'length', 'max' => 255),
            array('language', 'length', 'max' => 7),
            array('created_by, modified_by, version', 'length', 'max' => 10),
            array('xreference', 'length', 'max' => 50),
            array('checked_out_time, created, modified, publish_up, publish_down', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, catid, title, alias, url, description, hits, state, checked_out, checked_out_time, ordering, access, params, language, created, created_by, created_by_alias, modified, modified_by, metakey, metadesc, metadata, featured, xreference, publish_up, publish_down, version, images',
                'safe', 'on' => 'search'),
        );
    }
    
    public function scopes() {
        return array(
            'list' => array(
                'order' => self::getDisplayField($this),
                'select' => 'id,' . self::getDisplayField($this)
            ),
            'active' => array('condition' => 'deleted=0'),
            'recently' => array('order' => 'create_time DESC', 'limit' => 5)
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'references' => array(self::HAS_MANY, 'IndividualReference', 'source_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'catid' => 'Catid',
            'title' => 'Title',
            'alias' => 'Alias',
            'url' => 'Url',
            'description' => 'Description',
            'hits' => 'Hits',
            'state' => 'State',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'ordering' => 'Ordering',
            'access' => 'Access',
            'params' => 'Params',
            'language' => 'Language',
            'created' => 'Created',
            'created_by' => 'Created By',
            'created_by_alias' => 'Created By Alias',
            'modified' => 'Modified',
            'modified_by' => 'Modified By',
            'metakey' => 'Metakey',
            'metadesc' => 'Metadesc',
            'metadata' => 'Metadata',
            'featured' => 'Featured',
            'xreference' => 'Xreference',
            'publish_up' => 'Publish Up',
            'publish_down' => 'Publish Down',
            'version' => 'Version',
            'images' => 'Images',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('catid', $this->catid);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('hits', $this->hits);
        $criteria->compare('state', $this->state);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('access', $this->access);
        $criteria->compare('params', $this->params, true);
        $criteria->compare('language', $this->language, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('created_by_alias', $this->created_by_alias, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('metakey', $this->metakey, true);
        $criteria->compare('metadesc', $this->metadesc, true);
        $criteria->compare('metadata', $this->metadata, true);
        $criteria->compare('featured', $this->featured);
        $criteria->compare('xreference', $this->xreference, true);
        $criteria->compare('publish_up', $this->publish_up, true);
        $criteria->compare('publish_down', $this->publish_down, true);
        $criteria->compare('version', $this->version, true);
        $criteria->compare('images', $this->images, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Weblink the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
