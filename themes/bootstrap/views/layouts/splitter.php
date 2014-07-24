<?php
// the standard page layout
$this->beginContent('//layouts/splitter');

Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl().'/js/wijmo/jquery.wijutil.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl().'/js/wijmo/jquery.wijmo.wijsplitter.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl().'/js/ytracks.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile(Yii::app()->request->getBaseUrl().'/js/wijmo/jquery.wijmo.css');

$splitterScript =
"$('#splitterContainer').splitter({minAsize:100, maxAsize:300, splitVertical:true, A:$('#leftPane'), B:$('#rightPane'), slave:$('#rightSplitterContainer'), closeableto:0});
$('#rightSplitterContainer').splitter({splitHorizontal:true, A:$('#list'), B:$('#properties'), closeableto:100});";
Yii::app()->clientScript->registerScript('splitterScript',$splitterScript, CClientScript::POS_READY);
//
?>
<div id="splitterContainer">
	<div id="leftPane">
        <?php echo $content; ?>
	</div>
	<!-- #leftPane -->
	<div id="rightPane">
        <div style="height:5%; background:#bac8dc">
            <?php echo $this->clips['toolbar']; ?>
	    </div>
		<div id="rightSplitterContainer" style="height:89%">
			<div id="list">
                <?php echo $this->clips['list']; ?>
			</div>
			<div id="properties" />
		</div>
	</div>
</div>

<?php $this->endContent(); ?>