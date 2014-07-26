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

<h1> Manage&nbsp;Tvehicles</h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button'));
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>

<?php
echo CHtml::ajaxLink("Delete Selected",
        // route vers l'action en charge d'effacer les éléments
        // depuis la base de données (voir plus bas pour le code)
        $this->createUrl('deleteBulk'), array(
    "type" => "post", // POST donc.
    // les identifiants des modèles sélectionnées sont accessibles
    // via la méthode $.fn.yiiGridView.getSelection à laquelle
    // on passe l'identifiant du CGridView visé (ici 'data-grid').
    "data" => "js:{ids:$.fn.yiiGridView.getSelection('data-grid')}",
    // cette fonction javascript traite la réponse renvoyée par
    // l'action 'deleteBulk'. La variable 'data' contient le nombre
    // d'enregistrement supprimés.
    // La mise à jour du CGridView se fait via la méthode
    // $.fn.yiiGridView.update (à qui on passe l'identifiant du CGridView)
    'success' => 'js:function(data, textStatus, XMLHttpRequest){' .
    'if(data!=0)$.fn.yiiGridView.update("data-grid")}'
        )
);



$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'tvehicle-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'selectableRows' => '20',
    'columns' => array(
        array('class' => 'CCheckBoxColumn'),
        array('name' => 'id', 'header' => '#', 'value' => '$data->id', 'htmlOptions' => array('style' => 'text-align: right; width:40px;')),
        'tvehicle',
        'tmake',
        'ttype',
        array('name' => 'vehicle_id', 'type' => 'raw', 'value' => '!isset($data->vehicle_id) ? "": $data->make->name.\' \'.$data->type->name'),
        'tchassis',
        'tlicenseplate',
        /*
          'vehicle_id',
          'engine_id',
          'done',
          'created',
          'modified',
         */
        array('class' => 'CButtonColumn',
            'buttons' => array(
                'export' => array(
                    'label' => 'export',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/export.png',
                    'url' => 'Yii::app()->createUrl("/admin/tvehicle/export&id=$data->id")',
                )
            ),
            'template' => '{view}{update}{delete}{export}',
            'htmlOptions' => array('style' => 'width:65px;')
        )
    ),
));
?>
