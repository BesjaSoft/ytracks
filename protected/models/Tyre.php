<?php

/**
 * This is the model class for table "{{tracks_tyres}}".
 *
 * The followings are the available columns in table '{{tracks_tyres}}':
 * @property integer $id
 * @property string $code
 * @property integer $make_id
 * @property integer $published
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $created
 * @property string $modified
 */
class Tyre extends BaseModel
{

    public static function getDisplayField(){
        return 'code';
    }
    /**
     * Returns the static model of the specified AR class.
     * @return Tyre the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{tracks_tyres}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('code, make_id, ordering, created', 'required'),
            array('code', 'unique'),
            array('make_id, published, ordering, checked_out', 'numerical', 'integerOnly'=>true),
            array('code', 'length', 'max'=>10),
            array('checked_out_time, modified', 'safe'),
            // foreign key checks:
            array('make_id', 'exist','attributeName' => 'id', 'className' => 'Make'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, code, make_id, published, ordering, checked_out, checked_out_time, created, modified', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array
               ( 'make'       => array( self::BELONGS_TO, 'Make', 'make_id'    )
               , 'checkedout' => array( self::BELONGS_TO, 'User', 'checked_out')
               );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'code' => 'Code',
            'make_id' => 'Make',
            'published' => 'Published',
            'ordering' => 'Ordering',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'created' => 'Created',
            'modified' => 'Modified',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('code',$this->code,true);
        $criteria->compare('make_id',$this->make_id);
        $criteria->compare('published',$this->published);
        $criteria->compare('ordering',$this->ordering);
        $criteria->compare('checked_out',$this->checked_out);
        $criteria->compare('checked_out_time',$this->checked_out_time,true);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('modified',$this->modified,true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }
}