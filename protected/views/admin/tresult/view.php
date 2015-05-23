<?php
$this->breadcrumbs = array(
    'Tresults' => array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Tresult', 'url' => array('index')),
    array('label' => 'Create Tresult', 'url' => array('create')),
    array('label' => 'Update Tresult', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Tresult', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Export Tresult', 'url' => array('export', 'id' => $model->id)),
    array('label' => 'Manage Tresult', 'url' => array('admin')),
);
?>

<h1>View Tresult #<?php echo $model->id; ?></h1>

<?php
$dateFormatter = new CDateFormatter('nl-NL');
?>
<table>
    <tr>
        <td width="50%"><?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'id',
                    'row',
                    'num',
                    'individuals',
                    'laps',
                    'performance',
                    'classification',
                    'raceclass',
                    'grid',
                    'laptime',
                    'Livery',
                    'Field4Question',
                    'Field4Or',
                    'Field4Evo',
                    'Field4_2',
                    array(
                        'name' => 'content_id',
                        'type' => 'raw',
                        'value' => CHtml::Link(CHtml::encode($model->content->title)
                                , array('content/view', 'id' => $model->content_id)
                        )
                    ),
                    array('name' => 'round', 'type' => 'raw', 'value' => $model->roundnum . '. ' . $model->round . ' ' . $model->rounddate),
                    array('name' => 'subround_id'
                        , 'type' => 'raw'
                        , 'value' => isset($model->subround_id) ? CHtml::Link(CHtml::encode($model->subround->round->name . ' ' . $dateFormatter->format('dd-M-yyyy', $model->subround->round->start_date))
                                        , array('subround/view', 'id' => $model->subround_id)
                                ) : $model->subround_id
                    ),
                    array('name' => 'tvehicle',
                        'type' => 'raw',
                        'value' => $model->tvehicle . ' ' . CHtml::tag('div', array('class' => 'chassisnumber'), $model->tchassis) . ' ' . Chtml::tag('div', array('class' => 'licenseplate'), $model->tlicenseplate)
                    ),
                    array('name' => 'vehicle_id'
                        , 'type' => 'raw'
                        , 'value' => (isset($model->make_id) ? CHtml::Link(CHtml::encode($model->make->name)
                                        , array('make/view', 'id' => $model->make_id)) : "")
                        . ' '
                        . (isset($model->type_id) ? CHtml::Link(CHtml::encode($model->type->name)
                                        , array('type/view', 'id' => $model->type_id)) : "")
                        . ' '
                        . (isset($model->vehicle_id) ? CHtml::Link(CHtml::encode($model->vehicle->chassisnumber)
                                        , array('vehicle/view', 'id' => $model->vehicle_id)) : "")
                    ),
                    array(
                        'name' => 'engine_id',
                        'type' => 'raw',
                        'value' => (isset($model->engine_id) ? CHtml::Link(CHtml::encode($model->engine->make->name . ' ' . $model->engine->name)
                                        , array('engine/view', 'id' => $model->engine_id)) : $model->engine_id)
                    ),
                    'tteam',
                    array('name' => 'team_id'
                        , 'type' => 'raw'
                        , 'value' => isset($model->team_id) ? CHtml::Link(CHtml::encode($model->team->name)
                                        , array('team/view', 'id' => $model->team_id)
                                ) : $model->team_id
                    ),
                    'deleted',
                    'error',
                ),
            ));
            ?>
        </td>
        <td>
            <?php
            $driver = new TresultIndividual();
            $driver->unsetAttributes();
            $driver->result_id = $model->id;
            $this->widget('zii.widgets.grid.CGridView', array('id' => 'driver-grid',
                'dataProvider' => $driver->search(),
                'columns' => array('id', 'individual_id', $this->showIndividualGrid(), 'classification')
                    )
            );
            ?>
        </td>
    </tr>
</table>


