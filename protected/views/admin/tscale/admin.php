<?php
$this->breadcrumbs = array(
    'Tscales' => array(Yii::t('app', 'index')),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List Tscale'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Tscale'),
        'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('tscale-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
?>

<h1> Manage&nbsp;Tscales</h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'tscale-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('style' => 'width:40px; text-align:center;')),
        'merk',
        'referentie',
        'car',
        'omschrijving',
        'categorie',
        'type_id',
        'category_id',
        array('htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'buttons' => array(
                'export' => array(
                    'label' => 'export',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/export.png',
                    'url' => 'Yii::app()->createUrl("/admin/tscale/export&id=$data->id")',
                ),
            ),
            'template' => '{view}{update}{export}',
        ),
    ),
));
?>
