<?php

$tabs = array();
$tabs['Details'] = $this->renderPartial('_detail', array('model' => $model), true, true);

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs' => $tabs,
        /* 'options' => array(
          'collapsible' => false,
          'selected' => $tab,
          'height' => '100px',
          'id' => 'garage-detail'
          ), */
));

?>
