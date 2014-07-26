<?php

/**
 * This is the model class for table "{{tracks_projects}}".
 *
 * The followings are the available columns in table '{{tracks_projects}}':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $competition_id
 * @property integer $season_id
 * @property integer $admin_id
 * @property integer $type
 * @property string $params
 * @property integer $ordering
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $published
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Project extends BaseModel {

    public static function getClassName() {
        return 'Project';
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Project the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_projects}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, competition_id, season_id, admin_id, ordering, published, created', 'required'),
            array('competition_id, season_id, admin_id, type, ordering, checked_out, published, deleted', 'numerical', 'integerOnly' => true),
            array('name, alias', 'length', 'max' => 200),
            array('modified, deleted_date', 'safe'),
            // unique name:
            array('name', 'unique'),
            // foreign key checks:
            array('admin_id', 'exist', 'attributeName' => 'id', 'className' => 'User'),
            array('competition_id', 'exist', 'attributeName' => 'id', 'className' => 'Competition'),
            array('season_id', 'exist', 'attributeName' => 'id', 'className' => 'Season'),
            // unique key constraint:
            array('competition_id+season_id', 'application.extensions.uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, alias, competition_id, season_id, admin_id, type, params, ordering, checked_out, checked_out_time, published, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'season' => array(self::BELONGS_TO, 'Season', 'season_id'),
            'competition' => array(self::BELONGS_TO, 'Competition', 'competition_id'),
            'checkedOut' => array(self::BELONGS_TO, 'User', 'checked_out'),
            'administrator' => array(self::BELONGS_TO, 'User', 'admin_id'),
            'participants' => array(self::HAS_MANY, 'Participant', 'project_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'competition_id' => 'Competition',
            'season_id' => 'Season',
            'admin_id' => 'Admin',
            'type' => 'Type',
            'params' => 'Params',
            'ordering' => 'Ordering',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('competition_id', $this->competition_id);
        $criteria->compare('season_id', $this->season_id);
        $criteria->compare('admin_id', $this->admin_id);
        $criteria->compare('type', $this->type);
        $criteria->compare('params', $this->params, true);
        $criteria->compare('ordering', $this->ordering);
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

    public function hasDivisions() {
        return false;
    }

    public function getAlbum() {
        return strtolower($this->getBaseImagePath()
                . '/races'
                . '/' . $this->competition->code
                . '/' . $this->season->name
        ); // The directory to display
    }

    public function afterSave() {

        // create a directory for the album of the Individual
        $album = $this->getAlbum();
        if (!is_dir($album)) {
            mkdir($album, 0777, true);
        }

        // add the project to the menu
        // first find the parent if applicable
        $criteriaParent = new CDbCriteria();
        $criteriaParent->condition = 'name=:name';
        $criteriaParent->params = array(':name' => $this->competition->name);
        $parent = Menu::model()->find($criteriaParent);

        $criteriaComponent = new CDbCriteria();
        $criteriaComponent->condition = 'name=:name';
        $criteriaComponent->params = array(':name' => 'Tracks');
        $component = Component::model()->find($criteriaComponent);

        // look for the menu item:
        $criteriaMenu = new CDbCriteria();
        $criteriaMenu->condition = 'name=:name and parent=:parentid and componentid=:componentid';
        $criteriaMenu->params = array(':name' => $this->name, ':parentid' => $parent->id, ':componentid' => $component->id);
        $menuItem = Menu::model()->find($criteriaMenu);

        if ($menuItem == null && $this->published = 1) {
            //
            $criteriaOrdering = new CDbCriteria();
            $criteriaOrdering->condition = 'parent=:parentid';
            $criteriaOrdering->params = array(':parentid' => $parent->id);
            //
            $menu = new Menu();
            $menu->menutype = 'mainmenu';
            $menu->name = $this->name;
            $menu->parent = $parent->id;
            $menu->ordering = Menu::model()->count($criteriaOrdering) + 1;
            $menu->componentid = $component->id;
            $menu->link = 'index.php?option=com_tracks&view=project&p=' . $this->id;
            $menu->type = 'component';
            $menu->published = '1';
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

        // do some nice stuff in the parent afterSave
        return parent::afterSave();
    }

    // private methods:
    private function addMenuItem() {
        // first find the parent if applicable
        $criteriaParent = new CDbCriteria();
        $criteriaParent->condition = 'name=:name';
        $criteriaParent->params = array(':name' => $this->competition->name);
        $parent = Menu::model()->find($criteriaParent);

        $criteriaComponent = new CDbCriteria();
        $criteriaComponent->condition = 'name=:name';
        $criteriaComponent->params = array(':name' => 'Tracks');
        $component = Component::model()->find($criteriaComponent);

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

}
