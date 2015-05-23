<?php
$this->breadcrumbs = array(
    'Tindividuals' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tindividual', 'url' => array('index')),
    array('label' => 'Create Tindividual', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tindividual-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tindividuals</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn'));
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'tindividual-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'id', "header" => '#', 'htmlOptions' => array('style' => 'width:40px;')),
        $this->showContentGrid(),
        'first_name',
        'last_name',
        'nationality',
        'date_of_birth',
        'date_of_death',
        /*
          'height',
          'weight',
          'gender',
          'full_name',
          'nickname',
          'date_of_birth',
          'place_of_birth',
          'country_of_birth',
          'place_of_death',
          'country_of_death',
          'picture',
          'address',
          'postcode',
          'city',
          'state',
          'country',
          'description',
          'error',
          'created',
          'modified',
          'deleted',
          'deleted_date',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'buttons' => array(
                'export' => array(
                    'label' => 'export',
                    'icon' => 'share',
                    'url' => 'Yii::app()->createUrl("/admin/tindividual/export&id=$data->id")',
                ),
            ),
            'template' => '{view}{update}{delete}{export}',
            'htmlOptions' => array('style' => 'width:65px;')
        ),
    ),
));
?>
