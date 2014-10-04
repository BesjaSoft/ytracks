<?php
class UpdateAllCommand extends BaseConsole {

    function actionIndex() {
        $this->updateAllIndividuals();
    }

    private function updateAllIndividuals(){
        Individual::model()->batchUpdateAll(); 
    }
}
?>