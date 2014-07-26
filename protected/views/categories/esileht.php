<?php $themePath = Yii::app()->theme->baseUrl; ?>

<table id="categories">
<tr>
<?php
$row = 1;
foreach($categories as $category){
?>
    <td>
    
        <table border="0" style="height: 203px; width: 246px;" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3"><?php echo CHtml::image($themePath."/images/ig_cat_top.png"); ?></td>
        </tr>
        <tr>
            <td><?php echo CHtml::image($themePath."/images/ig_cat_left.png"); ?></td>
            <td style="width: 181px; height: 121px;background-color: white;" valign="middle" align="center">
            <?php 
                echo CHtml::link(
                    CHtml::image(Yii::app()->baseUrl.substr($category->images->directory, 1, strlen($category->images->directory))."/".$category->images->filename, $category->title, array("border" => 0)),
                    array("gallery/default/search/category_id/".$category->id)
                );
            ?>
            </td>
            <td><?php echo CHtml::image($themePath."/images/ig_cat_right.png"); ?></td>
        </tr>
         <tr>
            <td colspan="3" valign="top" style="width:246px; height:53px;background: url('<?php echo $themePath."/images/ig_cat_bottom.png"; ?>');background-repeat: no-repeat;">
            <div class="categories_title"><?php echo CHtml::link($category->title, array("gallery/default/search/category_id/".$category->id)); ?></div>
            </td>
        </tr>
        </table>

    </td>
<?php 

if ($row % 2 == 0){
    echo "</tr><tr><td>&nbsp;</td></tr><tr>";
}
$row++;

} ?>
</tr>
</table>