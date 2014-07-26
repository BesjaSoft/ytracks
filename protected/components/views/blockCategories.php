<ul id="categories">
<?php foreach($this->getTreeCategories() as $category){ ?>
	<li><?php echo CHtml::link("<span>".$category->title.'</span>', array("/gallery/default/search/category_id/".$category->id)); ?></li>
<?php } ?>
</ul>