<?php

/**
 * This is the model class for table "{{tracks_projects_subrounds}}".
 *
 * The followings are the available columns in table '{{tracks_projects_subrounds}}':
 * @property integer $id
 * @property integer $round_id
 * @property integer $subroundtype_id
 * @property integer $raceclass_id
 * @property string $name
 * @property integer $ordering
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $comment
 * @property string $factor
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $published
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Subround extends BaseModel {

    public $max;

    /**
     * Returns the static model of the specified AR class.
     * @return Subround the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getClassName() {
        return 'Subround';
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_subrounds}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('round_id, subroundtype_id, ordering, created', 'required'),
            array('round_id, subroundtype_id, raceclass_id, ordering, checked_out, published, deleted', 'numerical', 'integerOnly' => true),
            array('factor', 'length', 'max' => 8),
            array('start_date, end_date, name, description, comment, modified, deleted_date', 'safe'),
            // foreign key checks:
            array('round_id', 'exist', 'attributeName' => 'id', 'className' => 'Round'),
            array('subroundtype_id', 'exist', 'attributeName' => 'id', 'className' => 'Subroundtype'),
            array('raceclass_id', 'exist', 'attributeName' => 'id', 'className' => 'Raceclass'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, round_id, subroundtype_id, name, ordering, start_date, end_date, description, comment, factor, checked_out, checked_out_time, published, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('round' => array(self::BELONGS_TO, 'Round', 'round_id'),
            'subroundtype' => array(self::BELONGS_TO, 'Subroundtype', 'subroundtype_id'),
            'raceclass' => array(self::BELONGS_TO, 'Raceclass', 'raceclass_id'),
            'results' => array(self::HAS_MANY, 'Result', 'subround_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'round_id' => 'Projectround',
            'subroundtype_id' => 'Subroundtype',
            'raceclass_id' => 'Raceclass',
            'ordering' => 'Ordering',
            'name' => 'Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'comment' => 'Comment',
            'factor' => 'Factor',
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
        $criteria->compare('round_id', $this->round_id);
        $criteria->compare('subroundtype_id', $this->subroundtype_id);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('factor', $this->factor, true);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array('AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'));
    }

    public function addParticipants() {
        $project = Project::model()->findByPk($this->round->project_id);
        foreach ($project->participants as $participant) {

            $criteria = new CDbCriteria();
            $criteria->condition = 'subround_id=:subround and individual_id=:individual and team_id=:team';
            $criteria->params = array(
                'subround' => $this->id,
                'individual' => $participant->individual_id,
                'team' => $participant->team_id
            );
            $found = Result::model()->findAll($criteria);
            if (count($found) == 0) {

                $result = new Result();
                $result->subround_id = $this->id;
                $result->individual_id = $participant->individual_id;
                $result->team_id = $participant->team_id;
                $result->number = $particpant->number;
                $result->make_id = $participant->team->constructor_id;
                $result->laps = $subround->round->laps;
                $result->checked_out = 0;
                $result->rank = 0;
                $result->performance = '00:00:00.000';
                if (!$result->save()) {
                    print_r($result->getErrors());
                }
                unset($result);
            }
        }
    }

    public function copyResults() {
        // first find the last subround with valid results:
        if (count($this->results) == 0) {
            $query = ' select max(sr.id) as max'
                    . ' from   jos_tracks_projects_subrounds  sr '
                    . ' inner join jos_tracks_projects_rounds pr on pr.id = sr.round_id '
                    . ' where  pr.project_id      = ' . $this->round->project_id
                    . ' and    sr.subroundtype_id = 4 ' // race
                    . ' and    exists (select rr.id from dpbfw_tracks_results rr '
                    . '                where  rr.subround_id    = sr.id '
                    . '                and    rr.rank           = 1 '
                    . '                and    rr.classification = 1 '
                    . '               )';
            $subround = Subround::model()->findByPk(Subround::model()->findBySql($query)->max);

            foreach ($subround->results as $source) {
                $result = new Result();
                $result->subround_id = $this->id;
                $result->individual_id = $source->individual_id;
                $result->team_id = $source->team_id;
                $result->number = $source->number;
                $result->make_id = $source->make_id;
                $result->type_id = $source->type_id;
                $result->vehicle_id = $source->vehicle_id;
                $result->engine_id = $source->engine_id;
                $result->tyre_id = $source->tyre_id;
                $result->raceclass_id = $source->raceclass_id;
                $result->laps = $this->round->laps;
                $result->checked_out = 0;
                $result->rank = 0;
                $result->performance = '00:00:00.000';
                if (!$result->save()) {
                    print_r($result->getErrors());
                }
                unset($result);
            }
        }
    }

}
