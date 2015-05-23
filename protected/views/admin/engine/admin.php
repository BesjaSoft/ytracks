<?php
$this->breadcrumbs = array(
    'Engines' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Engine', 'url' => array('index')),
    array('label' => 'Create Engine', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('engine-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Engines</h1>

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
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'engine-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'make_id',
        'name',
        'alias',
        'description',
        'code',
        /*
          'parent_id',
          'tuner_id',
          'enginetype_id',
          'compression',
          'published',
          'ordering',
          'checked_out',
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
