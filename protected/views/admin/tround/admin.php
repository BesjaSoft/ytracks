<?php
$this->breadcrumbs = array(
    'Trounds' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tround', 'url' => array('index')),
    array('label' => 'Create Tround', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search',
        "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tround-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Trounds</h1>

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
<button class="btn btn-primary" onclick="exportAllTrounds();">Export all</button>
<?php
$this->widget('booster.widgets.TbGridView',
        array(
    'id' => 'tround-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'id' => 'selectedItem',
            'header' => 'Select',
            'selectableRows' => 2,
            'class' => 'zii.widgets.grid.CCheckboxColumn',
        ),
        array('name' => 'id', "header" => '#', 'htmlOptions' => array('style' => 'width:40px;')),
        $this->showContentGrid(),
        'name',
        array('name' => 'ordering', "header" => 'Ord', 'htmlOptions' => array('style' => 'width:20px;')),
        $this->showEventGrid(),
        'start_date',
        /*
          $this->showProjectGrid(),
          $this->showCircuitGrid(),
          'ordering',
          'laps',
          'length',
          'distance_id',
          'end_date',
          'description',
          'comment',
          'checked_out',
          'checked_out_time',
          'published',
          'manches',
          'created',
          'modified',
          'deleted',
          'deleted_date',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{export}',
            'buttons' => array(
                'export' => array(
                    'label' => 'Export',
                    'icon' => 'wrench',
                    'url' => 'Yii::app()->createUrl("admin/tround/export", array("id"=>$data->id))'),
                'update' => array(
                    'label' => 'Update',
                    'icon' => 'pencil',
                    'url' => 'Yii::app()->createUrl("admin/tround/update", array("id"=>$data->id,"showError"=>true))'),
            ),
            'htmlOptions' => array(
                'style' => 'width: 80px',
            ),
        ),
    ),
));
?>
<script type="text/javascript">
    function exportAllTrounds() {
        $('input[type=checkbox][name="selectedItem[]"]').each(function () {
            if (this.checked) {
                //console.log($(this).val()); 
                //alert('haije, val:' + $(this).val());
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('admin/tround/export'); ?>",
                    data: {id: $(this).val()},
                    success: function (msg) {
                        //alert("Successful export of the trounds");
                    },
                    error: function (xhr) {
                        alert("failure " + xhr.readyState + this.url);
                    }
                });
            }
        });
        $.fn.yiiGridView.update('tround-grid');
    }
</script>