<?php

/**
 * TarkvaraTehas [CMS]
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright (c) 2007, Vladimir Kjahrenov
 * @license			http://www.opensource.org/licenses/mit-license.php
 * 
 */

 
$controller = Yii::app()->controller->id;
$module = Yii::app()->controller->module->id;
//echo "controller: ".$controller;	
?>

	<ul class="sf-menu sf-navbar">
		<!-- CMS --> 
		<li <?php echo ($controller == "sections" || $controller == "containers" || $controller == "files" || $controller == "banners" ? 'class="current"' : ""); ?> >
			<?php echo CHtml::link(Yii::t("menu", "MENU_CMS"), array('/sections/admin'), array("class" => "sf-with-ul")); ?>
			<ul>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_SECTIONS"), array('/sections/admin')); ?></li>
			  	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_SECTIONS_ADD"), array('/sections/create')); ?></li>
                <li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_SECTIONS_STANDALONE"), array('/sections/standalone')); ?></li>
				
				<!-- FILES -->
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_FILES"), array('/files/admin/')); ?></li>
				<!--<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_FILE_UPLOAD"), array('/files/create')); ?></li>-->
				<!--/ FILES -->
				
                 <!-- BANNERS -->
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_BANNERS"), array('/banners/admin')); ?></li>
				
			</ul>
		</li>
		<!-- CMS -->
		
		
		<!-- CATEGORIES -->
		<li <?php echo ($controller == "categories" ? 'class="current"' : ""); ?>>
		<?php echo CHtml::link(Yii::t("menu", "MENU_CATEGORIES"), array('/categories/admin'), array("class" => "normal")); ?>
			<ul>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_CATEGORIES"), array('/categories/admin'), array()); ?></li>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_CATEGORIES_ADD"), array('/categories/create'), array()); ?></li>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_CATEGORIES_HIERARCHY"), array('/categories/hierarchy'), array()); ?></li>
			</ul>
		</li>
		<!--/ CATEGORIES -->
		
		<!-- ARTICLES -->
		<li <?php echo ($controller == "articles" ? 'class="current"' : ""); ?>>
		<?php echo CHtml::link(Yii::t("menu", "MENU_ARTICLES"), array('/articles/admin'), array("class" => "normal")); ?>
			<ul>
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_ARTICLES_ACTIVE"), array('/articles/admin'), array("class" => "normal")); ?></li>
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_ARTICLES_ADD"), array('/articles/create'), array("class" => "normal")); ?></li>
			</ul>
		</li>
        <!-- ARTICLES -->
         
		
		<!-- NEWS -->
		<li <?php echo ($controller == "default" && $module == "news" ? 'class="current"' : ""); ?>>
		<?php echo CHtml::link(Yii::t("menu", "MENU_NEWS"), array('/news/default/admin'), array("class" => "normal")); ?>
			<ul>
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_NEWS_ACTIVE"), array('/news/default/admin'), array("class" => "normal")); ?></li>
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_NEWS_ADD"), array('/news/default/create'), array("class" => "normal")); ?></li>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_NEWS_ARCHIVE"), array('/news/default/admin/archive'), array("class" => "normal")); ?></li>
			</ul>
		</li>
		<!--/ NEWS -->
		
		<!-- USERS -->
		<li <?php echo ($controller == "user" || $module == "srbac" ? 'class="current"' : ""); ?>>
		<?php echo CHtml::link(Yii::t("menu", "MENU_USERS"), array('/user/admin'), array("class" => "here")); ?>
			<ul>
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_USERS"), array('/user/admin'), array("class" => "")); ?></li>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_USERS_ADD"), array('/user/create'), array("class" => "normal")); ?></li>
                <li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_USERS_PERMISSIONS"), array('/srbac'), array("class" => ($controller == "authitem" ? "current" : "normal") )); ?></li>
			</ul>
		</li>
		<!--/ USERS -->
        
		<!-- GALLERY -->
		<li <?php echo ($controller == "default" && $module == "gallery" ? 'class="current"' : ""); ?>>
			<?php echo CHtml::link(Yii::t("menu", "MENU_GALLERY"), array('/gallery/default/admin'), array("class" => "normal")); ?>
			<ul>
		      	<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_GALLERY"), array('/gallery/default/admin'), array("class" => "normal")); ?></li>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_GALLERY_ADD"), array('/gallery/default/create'), array("class" => "normal")); ?></li>
				<li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_GALLERY_STANDALONEIMAGES"), array('/gallery/default/standalone'), array("class" => "normal")); ?></li>
                <li><?php echo CHtml::link(Yii::t("menu", "SUBMENU_GALLERY_IMPORTSINGLE"), array('/gallery/default/uploadsingle'), array("class" => "normal")); ?></li>
			</ul>
		</li>
		<!--/ GALLERY -->
  
	</ul>