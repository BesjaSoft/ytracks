<h1>Kategooriate hierarhia muutmine</h1>

<?php

$path = Yii::app()->baseUrl;

$script = <<<EOD

$("#demo1").tree({
	// Data configuration omitted
	rules : {
		//clickable : [ "root2", "folder" ],
		//deletable : [ "root2", "folder" ],
		//renameable : "all",
		//creatable : [ "folder" ],
		draggable : [ "all" ],
		drag_button : "left",
		droppable : [ "tree-drop" ]
	},
	callback    : { 
		onmove      : function(NODE,REF_NODE,TYPE,TREE_OBJ,RB) { 
			$.ajax({
			   type: "GET",
			   url: "{$path}/categories/move/old_id/" + NODE.id + "/new_id/" + REF_NODE.id,
			   dataType : "html", 
			   error : function (XMLHttpRequest, textStatus, errorThrown) {
						  // typically only one of textStatus or errorThrown 
						  // will have info
						  //this; // the options for this ajax request
						  $("#result").html(XMLHttpRequest + ", " + textStatus + ", " + errorThrown);
						},
			   success: function(html){
			    $("#result").show();
				$("#result").html(html);
			    $("#result").animate({opacity: 1.0}, 3000).fadeOut("slow");
			   }
			 });

			//alert("node " + NODE.id + "REF_NODE " + REF_NODE.id + " type " + TYPE);
		}
		
	}
});

EOD;

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl."/jsTree/css.js");

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl."/jsTree/_lib.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl."/jsTree/tree_component.min.js");

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl."/jsTree/tree_component.css");

Yii::app()->clientScript->registerScript('categoryTree', $script, CClientScript::POS_READY);

//echo "<xmp>";
//print_r ($categories);
//echo "</xmp>";

?>

<div id="result"></div>

<div id="demo1" class="demo">
<?php echo $categories; ?>
</div>

