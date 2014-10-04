<?php

/**
 * This is the model class for table "{{tracks_trounds}}".
 *
 * The followings are the available columns in table '{{tracks_trounds}}':
 * @property integer $id
 * @property integer $content_id
 * @property string $name
 * @property integer $event_id
 * @property integer $project_id
 * @property integer $circuit_id
 * @property integer $ordering
 * @property integer $laps
 * @property string $length
 * @property integer $distance_id
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $comment
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $published
 * @property integer $manches
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 *
 * The followings are the available model relations:
 * @property TracksEvents $event
 * @property TracksCircuits $circuit
 * @property TracksUnits $distance
 */
class Tround extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_trounds}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('content_id, name, event_id, published, done, created', 'required'),
            array('content_id, event_id, project_id, circuit_id, ordering, laps, distance_id, checked_out, published, manches, done, deleted', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 200),
            array('length', 'length', 'max' => 10),
            array('start_date, end_date, description, comment, modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, content_id, name, event_id, project_id, circuit_id, ordering, laps, length, distance_id, start_date, end_date, description, comment, checked_out, checked_out_time, published, manches, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
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
            'circuit' => array(self::BELONGS_TO, 'Circuit', 'circuit_id'),
            'distance' => array(self::BELONGS_TO, 'Unit', 'distance_id'),
            'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
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
            'name' => 'Name',
            'event_id' => 'Event',
            'project_id' => 'Project',
            'circuit_id' => 'Circuit',
            'ordering' => 'Ordering',
            'laps' => 'Laps',
            'length' => 'Length',
            'distance_id' => 'Distance',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'comment' => 'Comment',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'published' => 'Published',
            'manches' => 'Manches',
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

        $result = false;

        $filename = trim($this->content->title);
        $projectShortName = substr($filename, 0, strlen($filename) - 5);
        $seasonCode = substr($projectShortName, -4);
        $competitionCode = substr($projectShortName, 0, strlen($projectShortName) - 4);

        $season = Season::model()->find('name=:name', array('name' => $seasonCode));
        $competition = Competition::model()->find('code=:code', array('code' => $competitionCode));

        echo 'content :' . $filename . "\n";
        echo 'season : ' . $seasonCode . "\n";
        echo 'competition : ' . $competitionCode . "\n";

        $project = Project::model()->find('competition_id=:competition and season_id=:season', array(
            'season' => $season->id, 'competition' => $competition->id
        ));
        if (!empty($project->id)) {
            $round = Round::model()->find('name=:name and project_id=:projectid and ordering=:roundnum', array(
                'name' => trim($this->name),
                'projectid' => $project->id,
                'roundnum' => $this->ordering
                    )
            );
            if (empty($round->id)) {
                $round = Round::model()->find('project_id=:projectid and ordering=:roundnum', array(
                    'projectid' => $project->id,
                    'roundnum' => $this->ordering
                        )
                );
            }
            if (empty($round->id)) {
                $round = new Round();
                $round->project_id = $project->id;
                $round->event_id = $this->event_id;
                $round->name = $this->name;
                $round->ordering = $this->ordering;
                $round->start_date = $this->start_date;
                $round->end_date = $this->end_date;
                $round->published = 1;
                if ($round->save()) {
                    $this->project_id = $project->id;
                    $this->done = 1;
                    $result = $this->save();
                    echo 'Round added' . "\n";
                } else {
                    print_r($round->getErrors());
                }
            } else {
                $this->project_id = $project->id;
                $this->done = 1;
                if ($this->save()) {
                    echo 'Round ' . $round->name . ' with id ' . $round->id . ' found on project :' . $project->id . ', roundnum : ' . $this->ordering . "\n";
                } else {
                    print_r($this->getErrors());
                }
            }
        } else {
            echo 'project not found, competition : ' . $competition->id . ', season : ' . $season->id . "\n";
        }

        return $result;
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
        $criteria->compare('content.title', $this->content_id, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('event.name', $this->event_id, true);
        $criteria->compare('project.name', $this->project_id, true);
        $criteria->compare('circuit_id', $this->circuit_id);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('laps', $this->laps);
        $criteria->compare('length', $this->length, true);
        $criteria->compare('distance_id', $this->distance_id);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('manches', $this->manches);
        $criteria->compare('done', 0);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        $criteria->with = array('content', 'event');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tround the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
