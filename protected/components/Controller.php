<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    // some search related variables
    public $hasAdminSearch = false;
    public $hasActionSearch = false;
    public $actionSearchForm = '';
    public $searchModel;

    protected function setResultIndividualColumn() {
        return array(
            'name' => 'individual_id',
            'type' => 'raw',
            'value' => 'CHTML::link( CHTML::encode($data->individual->full_name)." ".
                                                CHtml::Image($data->individual->getFlag($data->individual->nationality))
                                              , array("/individual/view","id"=>$data->individual_id)
                                              )'
        );
    }

    protected function showTeamGrid() {
        return array(
            'name' => 'team_id',
            'type' => 'raw',
            'value' => 'CHtml::link( CHTML::encode($data->team->name)." ".
                                                CHtml::Image($data->team->getFlag($data->team->country_code))
                                              , array("/team/view","id"=>$data->team_id)
                                              )'
        );
    }

    protected function setResultVehicleColumn() {
        return array('name' => 'vehicle_id',
            'type' => 'raw',
            'value' => '(isset($data->make_id) ? CHTML::link( CHTML::encode($data->make->name)
                                              , array("/make/view","id"=>$data->make_id)
                                              ) : "")
                ." ".
                (isset($data->type_id) ? CHTML::link( CHTML::encode($data->type->name)
                           , array("/type/view","id"=>$data->type_id)
                           ) : "")." ".
                (isset($data->vehicle_id) ? CHTML::link( CHTML::tag(\'div\', array(\'class\'=>\'chassisnumber\'), CHTML::encode($data->vehicle->chassisnumber))
                           , array("/vehicle/view","id"=>$data->vehicle_id)
                           ): "").
                (isset($data->engine_id) ? " - ".CHTML::link(CHTML::encode($data->engine->getFullname()), array("/engine/view","id"=>$data->engine_id)
                           ): "")
                '
        );
    }

    protected function setResultSubroundColumn() {
        return array('name' => 'subround_id',
            'type' => 'raw',
            'value' => 'isset($data->subround_id) ? CHTML::link( CHTML::encode($data->subround->round->project->name."/".$data->subround->round->name."/".$data->subround->subroundtype->name)
                                             , array("/subround/view","id"=>$data->subround_id)
                                             ) : $data->subround_id'
        );
    }

    protected function setResultButtonColumn() {
        return $this->showButtonColumn('result');
    }

    protected function showProjectButtonGrid() {
        return $this->showButtonColumn('project');
    }

    private function showButtonColumn($controller) {

        // determine the button template
        $button_template = '{view}';
        if (!Yii::app()->user->isGuest) {
            $button_template = '{view} {update} {delete}';
        }

        // return the button definition
        return array('class' => 'CButtonColumn',
            'template' => $button_template,
            'viewButtonUrl' => 'Yii::app()->createUrl("/' . $controller . '/view"  , array("id" => $data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("/' . $controller . '/update", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/' . $controller . '/delete", array("id" => $data->id))',
            'htmlOptions' => array('style' => 'width:60px; text-align:center;')
        );
    }

    protected function showIndividualGrid() {
        return array(
            'name' => 'individual_id',
            'type' => 'raw',
            'value' => 'isset($data->individual_id) ? CHtml::Link( CHtml::encode($data->individual->full_name).\' \'.
                                              CHtml::Image($data->individual->getFlag($data->individual->nationality))
                                            , array("individual/view","id"=>$data->individual_id)
                                            ) : $data->individual_id'
        );
    }

    protected function showCompetitionGrid() {
        return $this->showRelatedColumnGrid('competition');
    }

    protected function showContentGrid() {
        return $this->showRelatedColumnGrid('content', 'title');
    }
    protected function showMakeDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('make_id'),
            'type' => 'raw',
            'value' => !isset($model->make_id) ? $model->make_id : CHtml::Link(CHtml::encode($model->make->name), array('make/view', 'id' => $model->make_id))
        );
    }
    protected function showMakeGrid() {
        return $this->showRelatedColumnGrid('make');
    }
    protected function showTypeDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('type_id'),
            'type' => 'raw',
            'value' => !isset($model->type_id) ? $model->type_id : CHtml::Link(CHtml::encode($model->type->name), array('type/view', 'id' => $model->type_id))
        );
    }
    protected function showTypeGrid() {
        return array('name' => 'type_id',
            'type' => 'raw',
            'value' => '!isset($data->type_id) ? $data->type_id : CHTML::link( CHTML::encode($data->type->make->name)
                                              , array("/make/view","id"=>$data->type->make_id)
                                              )." ".
                                   CHTML::link( CHTML::encode($data->type->name)
                                              , array("/type/view","id"=>$data->type_id)
                                              )'
        );
    }

    protected function showSeasonGrid() {
        return $this->showRelatedColumnGrid('season');
    }

    protected function showProjectGrid() {
        return $this->showRelatedColumnGrid('project');
    }

    protected function showRandomImageGrid() {
        return array(
            'type' => 'image',
            'value' => '$data->getRandomThumbnail()',
            'htmlOptions' => array('style' => 'text-align: center')
        );
    }

    private function showRelatedColumnGrid($relation, $displayField = 'name') {
        return array('name' => $relation . '_id'
            , 'type' => 'raw'
            , 'value' => '!isset($data->' . $relation . '_id) ? "" : CHTML::link( CHTML::encode($data->' . $relation . '->' . $displayField . ')
                                             , array("/' . $relation . '/view","id"=>$data->' . $relation . '_id)
                                             )'
        );
    }

    protected function getPublishedImageDetail() {
        return array('name' => 'published',
            'type' => 'image',
            'value' => $_model->getPublishedImage());
    }

    protected function searchModel($model, $search) {
        $res = array();
        $criteria = new CDbCriteria;
        $criteria->addSearchCondition($model->getDisplayField(), $search);

        $results = $model->active()->findAll($criteria);
        foreach ($results as $result) {
            $res[] = array
                ('value' => $result->{$model->getDisplayField()}, // value for input field
                'id' => $result->id, // return value from autocomplete
            );
        }

        return $res;
    }

    protected function ShowContentDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('content_id'),
            'type' => 'raw',
            'value' => !isset($model->content_id) ? $model->content_id : CHtml::Link(CHtml::encode($model->content->title), array('content/view', 'id' => $model->content_id))
        );
    }

    protected function ShowProjectDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('project_id'),
            'type' => 'raw',
            'value' => !isset($model->project_id) ? $model->project_id : CHtml::Link(CHtml::encode($model->project->name), array('project/view', 'id' => $model->project_id))
        );
    }

    protected function ShowEventDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('event_id'),
            'type' => 'raw',
            'value' => !isset($model->event_id) ? $model->event_id : CHtml::Link(CHtml::encode($model->event->name), array('event/view', 'id' => $model->event_id))
        );
    }

    protected function ShowCircuitDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('circuit_id'),
            'type' => 'raw',
            'value' => !isset($model->circuit_id) ? $model->circuit_id : CHtml::Link(CHtml::encode($model->circuit->name), array('circuit/view', 'id' => $model->circuit_id))
        );
    }

    protected function ShowCompetitionDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('competition_id'),
            'type' => 'raw',
            'value' => !isset($model->competition_id) ? $model->competition_id : CHtml::Link(CHtml::encode($model->competition->name), array('competition/view', 'id' => $model->competition_id))
        );
    }

    protected function ShowSeasonDetail($model) {
        return array(
            'label' => $model->getAttributeLabel('season_id'),
            'type' => 'raw',
            'value' => !isset($model->season_id) ? $model->season_id : CHtml::Link(CHtml::encode($model->season->name), array('season/view', 'id' => $model->season_id))
        );
    }

    protected function showEventGrid() {
        return $this->showRelatedColumnGrid('event');
    }

    protected function ShowIndividualDetailView($model) {
        return array(
            'name' => 'individual_id',
            'type' => 'raw',
            'value' => isset($model->individual_id) ? CHtml::link(CHtml::encode($model->individual->full_name), array('individual/view', 'id' => $model->individual_id)) : $model->individual_id
        );
    }

    protected function BuildActionMenu($model) {
        return array(
            array('label' => 'List ' . get_class($model), 'url' => array('index')),
            array('label' => 'Create ' . get_class($model), 'url' => array('create')),
            array('label' => 'Update ' . get_class($model), 'url' => array('update', 'id' => $model->id)),
            array('label' => 'Delete ' . get_class($model), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
            array('label' => 'Manage ' . get_class($model), 'url' => array('admin')),
        );
    }

    protected function showCircuitGrid() {
        return $this->showRelatedColumnGrid('circuit');
    }

    protected function ShowConstructorDetailView($model) {
        return array(
            'label' => $model->getAttributeLabel('constructor_id'),
            'type' => 'raw',
            'value' => isset($model->constructor_id) ? CHtml::Link(CHtml::encode($model->constructor->name)
                            , array('make/view', 'id' => $model->constructor_id)) : $model->constructor_id
        );
    }

}
