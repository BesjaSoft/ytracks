<?php
$this->breadcrumbs = array(
    'Divisions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Division', 'url' => array('index')),
    array('label' => 'Create Division', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('division-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Divisions</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'division-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'project_id',
        'raceclass_id',
        'description',
        'ordering',
        'checked_out',
        /*
          'checked_out_time',
          'created',
          'modified',
          'deleted',
          'deleted_date',
         */
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
