<?php

/**
 * This is the model class for table "{{tracks_tprojects}}".
 *
 * The followings are the available columns in table '{{tracks_tprojects}}':
 * @property integer $id
 * @property integer $content_id
 * @property integer $project_id
 * @property integer $competition_id
 * @property integer $season_id
 * @property integer $done
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Tproject extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return Tproject the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_tprojects}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('content_id, created', 'required'),
            array('content_id, project_id, competition_id, season_id, done, deleted', 'numerical', 'integerOnly' => true),
            array('modified, deleted_date', 'safe'),
            // foreign keys:
            array('content_id', 'exist', 'attributeName' => 'id', 'className' => 'Content'),
            array('competition_id', 'exist', 'attributeName' => 'id', 'className' => 'Competition'),
            array('season_id', 'exist', 'attributeName' => 'id', 'className' => 'Season'),
            array('project_id', 'exist', 'attributeName' => 'id', 'className' => 'Project'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, content_id, project_id, competition_id, season_id, done, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
            'season' => array(self::BELONGS_TO, 'Season', 'season_id'),
            'competition' => array(self::BELONGS_TO, 'Competition', 'competition_id'),
            'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'content_id' => 'Content',
            'project_id' => 'Project',
            'competition_id' => 'Competition',
            'season_id' => 'Season',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
        );
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

    public function export() {
        $filename = trim($this->content->title);
        $projectShortName = substr($filename, 0, strlen($filename) - 5);
        $seasonCode = substr($projectShortName, -4);
        $competitionCode = substr($projectShortName, 0, strlen($projectShortName) - 4);

        $season = Season::model()->find('name=:name', array('name' => $seasonCode));
        $competition = Competition::model()->find('code=:code', array('code' => $competitionCode));

        echo 'content :' . $filename . "\n";
        echo 'season : ' . $seasonCode . "\n";
        echo 'competition : ' . $competitionCode . "\n";

        $this->season_id = $season->id;
        $this->competition_id = $competition->id;

        $project = new Project();
        $project->name = $competition->name . ' ' . $seasonCode;
        $project->competition_id = $this->competition_id;
        $project->season_id = $this->season_id;
        $project->published = 1;
        $project->ordering = 0;
        if ($project->save()) {
            $this->project_id = $project->id;
            $this->done = 1;
            return $this->save();
        } else {
            print_r($project->getErrors());
        }
        return false;
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
        $criteria->compare('content_id', $this->content_id);
        $criteria->compare('project_id', $this->project_id);
        $criteria->compare('competition_id', $this->competition_id);
        $criteria->compare('season_id', $this->season_id);
        $criteria->compare('done', 0);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
