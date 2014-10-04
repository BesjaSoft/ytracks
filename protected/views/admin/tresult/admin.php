<?php
$this->breadcrumbs = array(
    'Tresults' => array(Yii::t('app', 'index')),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List Tresult'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Tresult'),
        'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('tresult-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
?>
<h1>Manage Tresults</h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>

<button class="btn btn-primary" onclick="updateAll();">Update all</button>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'tresult-grid',
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
        'round',
        array('name' => 'rounddate', 'htmlOptions' => array('style' => 'width:80px;')),
        array('name' => 'sub', 'htmlOptions' => array('style' => 'width:15px;')),
        array('name' => 'row', 'htmlOptions' => array('style' => 'width:20px;')),
        array('name' => 'num', 'htmlOptions' => array('style' => 'width:40px;')),
        'individuals',
        array('name' => 'tvehicle', 'type' => 'html', 'value' => '$data->tvehicle.CHtml::tag(\'div\', array(\'class\' => \'chassisnumber\'), $data->tchassis).CHtml::tag(\'div\', array(\'class\' => \'licenseplate\'), $data->tlicenseplate)'),
        array('name' => 'error', 'htmlOptions' => array('style' => 'width:15px;')),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'buttons' => array(
                'export' => array(
                    'label' => 'export',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/export.png',
                    'url' => 'Yii::app()->createUrl("/admin/tresult/export", array("id"=>$data->id,"showError"=>true))'),
            ),
            'template' => '{view}{update}{delete}{export}',
            'htmlOptions' => array('style' => 'width:65px;')
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
                    url: "<?php echo Yii::app()->createUrl('admin/tresult/export'); ?>",
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
        $.fn.yiiGridView.update('tresult-grid');

    }
</script>