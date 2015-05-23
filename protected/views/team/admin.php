<?php
$this->breadcrumbs = array(
    'Teams' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Team', 'url' => array('index')),
    array('label' => 'Create Team', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('team-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Teams</h1>

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
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        'country_code',
        'published',
        /*
          array('name' => 'id', 'header' => '#', 'htmlOptions' => array('style' => 'width:50px;')),
          'acronym',
          'constructor_id',
          'picture',
          'picture_small',

          'description',
          'admin_id',
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
