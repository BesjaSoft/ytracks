<?php
$this->breadcrumbs = array(
    'Tprojects' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tproject', 'url' => array('index')),
    array('label' => 'Create Tproject', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tproject-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tprojects</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tproject-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        $this->showContentGrid(),
        $this->showProjectGrid(),
        $this->showCompetitionGrid(),
        $this->showSeasonGrid(),
        'created',
        /*
          'modified',
          'deleted',
          'deleted_date',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{export}',
            'buttons' => array('export' => array(
                    'label' => 'Export',
                    'icon' => 'wrench',
                    'url' => 'Yii::app()->createUrl("admin/tproject/export", array("id"=>$data->id))',
                ),
            ),
            'htmlOptions' => array(
                'style' => 'width: 60px',
            ),
        ),
    ),
));
?>
