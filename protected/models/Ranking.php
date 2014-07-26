<?php

class Ranking extends BaseModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{tracks_projects_rankings}}';
    }

    public function rules()
    {
        return array(
            array('individual_id, project_id, rank', 'required'),
            array('individual_id, project_id, team_id, rank, raceclass_id, checked_out, deleted', 'numerical', 'integerOnly'=>true),
            array('points', 'length', 'max'=>11),
            array('modified, deleted_date', 'safe'),
            // foreign keys checks:
            array( 'individual_id', 'exist', 'attributeName' => 'id', 'className' => 'Individual'),
            array( 'project_id', 'exist', 'attributeName' => 'id', 'className' => 'Project'),
            array( 'team_id', 'exist', 'attributeName' => 'id', 'className' => 'Team'),
            // unique field combination:
            array('individual_id+project_id', 'application.extensions.uniqueMultiColumnValidator'),
            // used by search:
            array('id, individual_id, project_id, team_id, rank, points, raceclass_id, checked_out, checked_out_time, created, modified, deleted, deleted_date', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array(
            'individual' => array(self::BELONGS_TO, 'Individual', 'individual_id' ),
            'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
            'team' => array(self::BELONGS_TO, 'Team', 'team_id'),
            'raceclass' => array(self::BELONGS_TO, 'Raceclass', 'raceclass_id')
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('app', 'ID'),
            'individual_id' => Yii::t('app', 'Individual'),
            'project_id' => Yii::t('app', 'Project'),
            'team_id' => Yii::t('app', 'Team'),
            'rank' => Yii::t('app', 'Rank'),
            'points' => Yii::t('app', 'Points'),
            'raceclass_id' => Yii::t('app', 'Raceclass'),
            'checked_out' => Yii::t('app', 'Checked Out'),
            'checked_out_time' => Yii::t('app', 'Checked Out Time'),
            'created' => Yii::t('app', 'Created'),
            'modified' => Yii::t('app', 'Modified'),
            'deleted' => Yii::t('app', 'Deleted'),
            'deleted_date' => Yii::t('app', 'Deleted Date'),
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
        $with = array();

        $criteria->compare('id', $this->id);
        if (is_numeric($this->individual_id)) {
            $criteria->compare('individual_id', $this->individual_id);
        } else {
            $criteria->compare('individual.full_name', $this->individual_id, true);
            $with[] = 'individual';
        }
        if (is_numeric($this->project_id)) {
            $criteria->compare('project_id', $this->project_id);
        } else {
            $criteria->compare('project.name', $this->project_id, true);
            $with[] = 'project';
        }
        if (is_numeric($this->team_id)) {
            $criteria->compare('team_id', $this->team_id);
        } else {
            $criteria->compare('team.name', $this->team_id, true);
            $with[] = 'team';
        }
        $criteria->compare('rank', $this->rank);
        $criteria->compare('points', $this->points,true);
        $criteria->compare('raceclass_id', $this->raceclass_id);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time,true);
        $criteria->compare('created', $this->created,true);
        $criteria->compare('modified', $this->modified,true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date,true);

        if (!empty($with)) {
            $criteria->with = $with;
        }

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }

    public function behaviors()
    {
        return array(
            'AutoTimestampBehavior' => array( 'class' => 'application.components.AutoTimestampBehavior'),
            'CAdvancedArBehavior', array('class' => 'ext.CAdvancedArBehavior')
        );
    }
}
