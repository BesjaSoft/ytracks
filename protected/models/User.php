<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $usertype
 * @property integer $block
 * @property integer $sendEmail
 * @property integer $gid
 * @property string $registerDate
 * @property string $lastvisitDate
 * @property string $activation
 * @property string $params
 * @property string $cake
 */
class User extends BaseModel {

    private $_salt;

    /**
     * Returns the static model of the specified AR class.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{users}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, params', 'required'),
            array('block, sendEmail, gid', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('username', 'length', 'max' => 150),
            array('email, password, activation', 'length', 'max' => 100),
            array('usertype', 'length', 'max' => 25),
            array('cake', 'length', 'max' => 10),
            array('registerDate, lastvisitDate', 'safe'),
            // unique name:
            array('name', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, username, email, password, usertype, block, sendEmail, gid, registerDate, lastvisitDate, activation, params, cake', 'safe', 'on' => 'search'),
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
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'usertype' => 'Usertype',
            'block' => 'Block',
            'sendEmail' => 'Send Email',
            'gid' => 'Gid',
            'registerDate' => 'Register Date',
            'lastvisitDate' => 'Lastvisit Date',
            'activation' => 'Activation',
            'params' => 'Params',
            'cake' => 'Cake',
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

        $criteria->compare('username', $this->username, true);

        $criteria->compare('email', $this->email, true);

        $criteria->compare('password', $this->password, true);

        $criteria->compare('usertype', $this->usertype, true);

        $criteria->compare('block', $this->block);

        $criteria->compare('sendEmail', $this->sendEmail);

        $criteria->compare('gid', $this->gid);

        $criteria->compare('registerDate', $this->registerDate, true);

        $criteria->compare('lastvisitDate', $this->lastvisitDate, true);

        $criteria->compare('activation', $this->activation, true);

        $criteria->compare('params', $this->params, true);

        $criteria->compare('cake', $this->cake, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    public function findList($conditions = array(), $params = array()) {

        $data = $this->findAll($conditions, $params);

        return CHtml::listData($data, 'id', $this->getDisplayField());
    }

    public function validatePassword($password) {
        echo 'password' . $password;
        return $this->hashPassword($password, $this->_salt) === $this->password;
    }

    public function hashPassword($password, $salt) {
        //return md5($salt.$password);
        return md5($password);
    }

}