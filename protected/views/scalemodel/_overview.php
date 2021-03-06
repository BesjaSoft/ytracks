<table>
    <tr>
        <td width="50%">
            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'type' => 'striped condensed',
                'data' => $model,
                'attributes' => array(
                    'description',
                    'reference',
                    'year',
                    'color',
                    'raceno',
                    'livery',
                    'event',
                    'drivers',
                    array('name' => 'category_id', 'type' => 'raw', 'value' => isset($model->category_id) ? CHtml::Link(CHtml::encode($model->category->description), array('admin/unit/view', 'id' => $model->category_id)) : $model->category_id),
                    array('name' => 'scale_id', 'type' => 'raw', 'value' => isset($model->scale_id) ? CHtml::Link(CHtml::encode($model->scale->code), array('admin/scale/view', 'id' => $model->scale_id)) : $model->scale_id),
                    array('name' => 'modeltype_id', 'type' => 'raw', 'value' => isset($model->modeltype_id) ? CHtml::Link(CHtml::encode($model->modeltype->code), array('admin/range/view', 'id' => $model->modeltype_id)): $model->modeltype_id),
                    array('name' => 'material_id', 'type' => 'raw', 'value' => isset($model->material_id) ? CHtml::Link(CHtml::encode($model->material->code), array('admin/unit/view', 'id' => $model->material_id)) : $model->category_id),
                ),
            ));
            ?>
        </td>
        <td style="vertical-align: top">
            <?php
            $driver = new DriverScaleModel();
            $driver->unsetAttributes();
            $driver->scalemodel_id = $model->id;
            $this->widget('zii.widgets.grid.CGridView', array('id' => 'driver-grid',
                'dataProvider' => $driver->search(),
                'columns' => array($this->showIndividualGrid())
                    )
            );
            ?>
                <div>
        </td>
    </tr>
</table>
