<?php
$this->breadcrumbs = array(
    'Tevents' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tevent', 'url' => array('index')),
    array('label' => 'Create Tevent', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tevent-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tevents</h1>

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
<button class="btn btn-primary" onclick="updateAll();">Update all</button>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'tevent-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'id' => 'selectedItem',
            'header' => 'Select',
            'selectableRows' => 2,
            'class' => 'zii.widgets.grid.CCheckboxColumn',
        ),
        'id',
        'name',
        'country_code',
        'description',
        'done',
        'created',
        /*
          'modified',
          'deleted',
          'deleted_date',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array('update' => array(
                    'label' => 'Update',
                    'icon' => 'pencil',
                    'url' => 'Yii::app()->createUrl("admin/tevent/update", array("id"=>$data->id,"showError"=>true))',
                ),
            ),
            'htmlOptions' => array(
                'style' => 'width: 50px',
            ),
        ),
    ),
));
?>
<script type="text/javascript">
    function updateAll() {
        $('input[type=checkbox][name="selectedItem[]"]').each(function () {
            if (this.checked) {
                //console.log($(this).val()); 
                //alert('haije, val:' + $(this).val());
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('admin/tevent/export'); ?>",
                    data: {id: $(this).val()},
                    success: function (msg) {
                        //alert("Success");
                    },
                    error: function (xhr) {
                        alert("failure " + xhr.readyState + this.url);
                    }
                });
            }
        });
        $.fn.yiiGridView.update('tevent-grid');

    }
</script>
