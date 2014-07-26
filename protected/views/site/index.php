<?php $this->pageTitle = Yii::app()->name; ?>

<div class="row">
    <div class="span11 offset1">
        <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
    </div>
</div>

<div class="row">
    <div class="span3 offset1">
        <h5>Happy Birthday!</h5>
        <p>We congratulate:</p>
        <?php
        $model = new Individual();
        $this->widget('bootstrap.widgets.TbGridView',
                array(
            'type' => 'striped bordered condensed',
            'id' => 'individuals-born-grid',
            'template' => '{items}{pager}',
            'dataProvider' => $model->getListBornToday(),
            'columns' => array(
                array('name' => 'full_name', 'type' => 'raw', 'value' => 'Chtml::link(Chtml::encode($data->full_name),array("individual/view", "id"=>$data->id))'),
                array('name' => 'age', 'htmlOptions' => array('style' => 'width:30px; text-align:center;')),
            )
        ));
        ?>
    </div>
    <div class="span4">
        <h5>Rest in Peace</h5>
        <p>We remember the following persons who died:</p>
        <?php
        $died = new Individual();
        $this->widget('bootstrap.widgets.TbGridView',
                array(
            'type' => 'striped bordered condensed',
            'id' => 'individuals-died-grid',
            'template' => '{items}{pager}',
            'dataProvider' => $died->getListDiedToday(),
            'columns' => array(
                array('name' => 'full_name',
                    'type' => 'raw',
                    'value' => 'Chtml::link(Chtml::encode($data->full_name),
					array("individual/view", "id"=>$data->id))'),
                array('name' => 'Year', 'value' => 'Yii::app()->dateFormatter->format("y", $data->date_of_death)'),
                array('name' => 'age', 'htmlOptions' => array('style' => 'width:30px; text-align:center;')),
            )
        ));
        ?>
    </div>
    <div class="span4">
        <h5>Races held today</h5>
        <p>We take a look at the races held today:</p>
        <?php
        $held = new Round();
        $this->widget('bootstrap.widgets.TbGridView',
                array(
            'type' => 'striped bordered condensed',
            'id' => 'races-held-grid',
            'template' => '{items}{pager}',
            'dataProvider' => $held->getListHeldToday(),
            'columns' => array(
                array('name' => 'Round',
                    'type' => 'raw',
                    'value' => 'Chtml::link(Chtml::encode($data->name),
					array("round/view", "id" => $data->id))'),
                array('name' => 'Year', 'value' => 'Yii::app()->dateFormatter->format("y",$data->start_date)')
            )
        ));
        ?>
    </div>
</div>
<!-- only for not guests -->
<?php if (!Yii::app()->user->isGuest) { ?>
    <div class="row">
        <div class="span10 offset1">
            <h4>Checks on Individuals</h4>
        </div>
    </div>
    <div class="row">
        <div class="span2 offset1">
            <h5>Early Birds!</h5>
            <?php
            $earlyBirds = new Individual();
            $this->widget('bootstrap.widgets.TbGridView',
                    array(
                'type' => 'striped bordered condensed',
                'id' => 'individuals-early-birds-grid',
                'template' => '{items}{pager}',
                'dataProvider' => $earlyBirds->getEarlyBirds(),
                'columns' => array(
                    array('name' => 'full_name', 'type' => 'raw', 'value' => 'Chtml::link(Chtml::encode($data->full_name),array("individual/view", "id"=>$data->id))'),
                    'date_of_birth',
                )
            ));
            ?>
        </div>
        <div class="span2">
            <h5>Not born, just dead!</h5>
            <?php
            $missingBirthDates = new Individual();
            $this->widget('bootstrap.widgets.TbGridView',
                    array(
                'type' => 'striped bordered condensed',
                'id' => 'individuals-not-born-grid',
                'template' => '{items}{pager}',
                'dataProvider' => $missingBirthDates->getMissingBirthDate(),
                'columns' => array(
                    array('name' => 'full_name', 'type' => 'raw', 'value' => 'Chtml::link(Chtml::encode($data->full_name),array("individual/view", "id"=>$data->id))'),
                    'date_of_death'
                )
            ));
            ?>

        </div>
        <div class="span2">
            <h5>Alive & Kickin'</h5>
            <?php
            $diehards = new Individual();
            $this->widget('bootstrap.widgets.TbGridView',
                    array(
                'type' => 'striped bordered condensed',
                'id' => 'individuals-not-born-grid',
                'template' => '{items}{pager}',
                'dataProvider' => $diehards->getDieHards(),
                'columns' => array(
                    array('name' => 'full_name', 'type' => 'raw', 'value' => 'Chtml::link(Chtml::encode($data->full_name),array("individual/view", "id"=>$data->id))'),
                    array('name' => 'age', 'htmlOptions' => array('style' => 'width:30px; text-align:center;')),
                )
            ));
            ?>
        </div>
        <div class="span2">
            <div id="twinordoubles">
            </div>

            <?php
            echo CHtml::ajaxButton("Update", array('individual/AjaxTwinOrDoubles'),
                    array('update' => '#twinordoubles'));
            ?>
        </div>
        <div class="span2">
            <h5>Twins or doubles?</h5>
            <?php
            $twinsOrDoubles = new Individual();
            $this->widget('bootstrap.widgets.TbGridView',
                    array(
                'type' => 'striped bordered condensed',
                'id' => 'individuals-early-birds-grid',
                'template' => '{items}{pager}',
                'dataProvider' => $twinsOrDoubles->getTwinsOrDoubles(),
                'columns' => array(
                    array('name' => 'full_name', 'type' => 'raw', 'value' => 'Chtml::link(Chtml::encode($data->full_name),array("individual/view", "id"=>$data->id))'),
                    'date_of_birth',
                )
            ));
            ?>
        </div>
    </div>
<?php }
?>

