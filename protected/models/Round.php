<?php

/**
 * This is the model class for table "{{tracks_projects_rounds}}".
 *
 * The followings are the available columns in table '{{tracks_projects_rounds}}':
 * @property integer $id
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
 */
class Round extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return Round the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getClassName() {
        return 'Round';
    }

    public function getListHeldToday() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date_format( start_date, "%d%m" ) = date_format( curdate( ) , "%d%m")';
	$criteria->order = 'start_date asc';

        return new CActiveDataProvider(get_class($this), array('criteria' => $criteria,));
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_rounds}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, event_id, project_id, ordering, published, created', 'required'),
            array('event_id, project_id, circuit_id, ordering, laps, distance_id, checked_out, published, manches, deleted', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 200),
            array('length', 'length', 'max' => 10),
            array('start_date, end_date, description, comment, modified, deleted_date', 'safe'),
            // foreign key checks:
            array('event_id', 'exist', 'attributeName' => 'id', 'className' => 'Event'),
            array('project_id', 'exist', 'attributeName' => 'id', 'className' => 'Project'),
            array('circuit_id', 'exist', 'attributeName' => 'id', 'className' => 'Circuit'),
            array('distance_id', 'exist', 'attributeName' => 'id', 'className' => 'Distance'),
            // unique field combination:
            array('project_id+ordering', 'application.extensions.uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, event_id, project_id, circuit_id, ordering, laps, length, distance_id, start_date, end_date, description, comment, checked_out, checked_out_time, published, manches, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                        . '/races'
                        . '/' . $this->project->competition->code
                        . '/' . $this->project->season->name
                        //. '/' . $this->ordering . '-' . $this->event->country_code
        ); // The directory to display
    }

    public function afterSave() {

        // create a directory for the album of the Round
        $album = $this->getAlbum();
        if (!is_dir($album)) {
            mkdir($album, 0777, true);
        }

        //$this->addMenuItem();
        $this->addSubrounds();

        // do some nice stuff in the parent afterSave
        return parent::afterSave();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'subrounds' => array(self::HAS_MANY, 'Subround', 'projectround_id'),
            'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
            'circuit' => array(self::BELONGS_TO, 'Circuit', 'circuit_id'),
            'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
            'distance' => array(self::BELONGS_TO, 'Distance', 'distance_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
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
        $criteria->compare('event_id', $this->event_id);
        $criteria->compare('project_id', $this->project_id);
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
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    // private methods:
    private function addMenuItem() {
        // first find the parent if applicable
        $criteriaParent = new CDbCriteria();
        $criteriaParent->condition = 'name=:name';
        $criteriaParent->params = array(':name' => $this->project->name);
        $parent = Menu::model()->find($criteriaParent);

        $criteriaComponent = new CDbCriteria();
        $criteriaComponent->condition = 'name=:name';
        $criteriaComponent->params = array(':name' => 'Tracks');
        $component = Extension::model()->find($criteriaComponent);

        // look for the menu item:
        $criteriaMenu = new CDbCriteria();
        $criteriaMenu->condition = 'name=:name and parent=:parentid and componentid=:componentid';
        $criteriaMenu->params = array(':name' => $this->name, ':parentid' => $parent->id, ':componentid' => $component->id);
        $menuItem = Menu::model()->find($criteriaMenu);

        if ($menuItem == null && $this->published = 1) {

            $criteriaOrdering = new CDbCriteria();
            $criteriaOrdering->condition = 'parent=:parentid';
            $criteriaOrdering->params = array(':parentid' => $parent->id);

            $menu = new Menu();
            $menu->menutype = 'mainmenu';
            $menu->name = $this->name;
            $menu->parent = $parent->id;
            $menu->ordering = $this->ordering;
            $menu->componentid = $component->id;
            $menu->link = 'index.php?option=com_tracks&view=roundresult&pr=' . $this->id;
            $menu->type = 'component';
            $menu->published = 1;
            $menu->sublevel = $parent->sublevel + 1;
            $menu->params = "cb_integration=\n user_registration=\n image_max_size=120\n indview_showresults=\n " .
                    "indview_results_showteam=\n indview_results_showproject=\n indview_results_showcompetition=\n " .
                    "indview_results_showseason=\n indview_results_showrace=\n indview_results_onlypointssubrounds=\n " .
                    "indview_results_showperformance=\n indview_results_showrank=\n page_title=\n " .
                    "show_page_title=1\n pageclass_sfx=\n menu_image=-1\n secure=0\n";
            $menu->save();
        } elseif ($menuItem != null and $this->published == 0) {
            // unpublish the menuitem
            $menuItem->published = 0;
            $menuItem->save();
        }
    }

    private function addSubrounds() {
        $criteria = new CDbCriteria();
        $criteria->select = 'COUNT(*) AS CNT';
        $criteria->condition = 'round_id=:round';
        $criteria->params = array('round' => $this->id);

        $found = Subround::model()->findAll($criteria);

        if ($found->cnt >= 1) {
            return;
        }

        if ($this->project->competition->code == 'f1') {
            // add the race, expected to be on the end_date
            $this->addSubround('race', 1, 1);
            // add the fastest laps, expected to be on the end_date
            $this->addSubround('fastest laps', 2, 1);
            // add the starting grid, expected to be on the end_date
            $this->addSubround('starting grid', 3, 1);
        } else if (in_array($this->project->competition->code, array('adacgt', 'spgt'))) {
            $this->addSubround('race', 1, 1);
            $this->addSubround('race', 2, 1);
            $this->addSubround('starting grid', 3, 1);
            //
        } else if ($this->manches >= 1) {

            // add the overall result-subround, expected to be on the end_date
            $subround = new Subround();
            $subround->projectround_id = $this->id;
            $subround->factor = 1;
            $subround->start_date = $this->start_date;
            $subround->end_date = $this->end_date;
            $subround->ordering = 1;
            $subround->subroundtype_id = Subroundtype::model()->find('lower(name)=:name and deleted=0', array('name' => 'overall result'))->id;
            $subround->published = 1;
            if (!$subround->save()) {
                echo 'something went wrong....';
                return;
            }
            unset($subround);

            if ($this->project->competition->code == 'wrc') {
                // get subroundtype "special stages":
                $subroundtype_id = Subroundtype::model()->find('lower(name)=:name and deleted=0', array('name' => 'special stage'))->id;
                // add the stages:
                for ($i = 1; $this->manches; $i++) {
                    $subround = new Subround();
                    $subround->projectround_id = $this->id;
                    $subround->factor = 1;
                    $subround->start_date = $this->start_date;
                    $subround->end_date = $this->end_date;
                    $subround->ordering = $i + 1;
                    $subround->name = 'Special stage ' . $i;
                    $subround->subroundtype_id = $subroundtype_id;
                    $subround->published = 1;
                    if (!$subround->save()) {
                        echo 'something went wrong....';
                        break;
                    }
                    unset($subround);
                }
                $this->manches = 1;
                $this->save();
            }
        }
    }

    private function addSubround($name, $ordering, $factor) {
        // add the race, expected to be on the end_date
        $subround = new Subround();
        $subround->projectround_id = $this->id;
        $subround->factor = $factor;
        $subround->start_date = $this->end_date;
        $subround->end_date = $this->end_date;
        $subround->ordering = $ordering;
        $subround->subroundtype_id = Subroundtype::model()->find('lower(name)=:name and deleted=0', array('name' => $name))->id;
        $subround->published = 1;
        return $subround->save();
    }

    public function copySubrounds() {
        $round = Round::model()->find('project_id=:project and ordering=:ordering', array('project' => $this->project_id, 'ordering' => $this->ordering - 1));

        foreach ($round->subrounds as $subround) {
            $copy = new Subround();
            $copy->projectround_id = $this->id;
            $copy->start_date = $this->end_date;
            $copy->end_date = $this->end_date;
            $copy->published = 1;
            $copy->factor = $subround->factor;
            $copy->subroundtype_id = $subround->subroundtype_id;
            $copy->ordering = $subround->ordering;
            $copy->save();
        }
    }

}
