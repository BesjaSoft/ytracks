<?php
$this->breadcrumbs = array(
    'Tvehicles' => array(Yii::t('app', 'index')),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List Tvehicle'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Tvehicle'),
        'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('tvehicle-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
?>

<h1> Manage&nbsp;Tchassis</h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'tvehicle-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'id', 'value' => '$data->id', 'htmlOptions' => array('style' => 'text-align: right; width:50px;')),
        //'filename',
        'tmake',
        'ttype',
        'chassis',
        'tengine',
        /*
          'year',
          'group',
          'first_owner',
          'next_owners',
          'comment',
          'make_id',
          'type_id',
          'vehicle_id',
          'published',
          'ordering',
          'checked_out',
          'checked_out_time',
          'created',
          'modified',
          'deleted',
          'deleted_date',
         */
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'export' => array(
                    'label' => 'export',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/export.png',
                    'url' => 'Yii::app()->createUrl("/admin/tchassis/export&id=$data->id")',
                ),
            ),
            'template' => '{view}{update}{export}',
            'htmlOptions' => array('style' => 'width:54px;')
        ),
    ),
));
?>
