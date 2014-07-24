<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/gallery.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/cars.css" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div><!-- header -->

    <div id="mainmenu">
        <?php
            $this->widget('application.components.JQuerySlideTopMenu.JQuerySlideTopMenu',
                array('items' =>
                    array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array(
                            'label' => 'Tracks',
                            'url' => '',
                            'subs' => array(
                                array('label' => 'Competitions', 'url' => array('/competition/index' )),
                                array('label' => 'Individuals', 'url' => array('/individual/index'  )),
                                array('label' => 'Teams', 'url' => array('/team/index'        )),
                                array('label' => 'Seasons', 'url' => array('/season/index'      )),
                                array('label' => 'Projects', 'url' => array('/project/index'     )),
                                array('label' => 'Events', 'url' => array('/event/index'       )),
                                array('label' => 'Circuits', 'url' => array('/circuit/index'     )),
                            ),
                        ),
                        array(
                            'label' => 'Cars',
                            'url' => '',
                            'subs' => array(
                                array('label' => 'Makes', 'url' => array('/make/index'        )),
                                array('label' => 'Types', 'url' => array('/type/index'        )),
                                array('label' => 'Vehicles', 'url' => array('/vehicle/index'     )),
                                array('label' => 'Scalemodels', 'url' => array('/scalemodel/index'  )),
                                array('label' => 'Engines', 'url' => array('/engine/index'      )),
                                array('label' => 'Tuners', 'url' => array('/tuner/index'       )),
                                array('label' => 'Constructors', 'url' => array('/constructor/index' )),
                                array('label' => 'Tyres', 'url' => array('/tyre/index'        )),
                            ),
                        ),
                        array(
                            'label' => 'CMS',
                            'url' => '',
                            'subs'=>array(
                                array('label' => 'Content', 'url' => array('/admin/content/admin'))), 'visible'=>!Yii::app()->user->isGuest
                            ),
                        array(
                            'label' => 'System',
                            'url' => '',
                            'subs'=>array(
                                array(
                                    'label' => 'CMS',
                                    'url'=> '',
                                    'subs'=> array(
                                        array('label' => 'Sections', 'url' => array('/admin/section/admin'      )),
                                        array('label' => 'Categories', 'url' => array('/admin/category/admin'     )),
                                    )
                                ),
                                array(
                                    'label' => 'Tracks',
                                    'url' => '',
                                    'subs'=>array(
                                        array('label' => 'Cartypes', 'url' => array('/admin/cartype/admin'      )),
                                        array('label' => 'Enginetypes', 'url' => array('/admin/enginetype/admin'   )),
                                        array('label' => 'Modeltypes', 'url' => array('/admin/modeltype/admin'    )),
                                        array('label' => 'Outreasons', 'url' => array('/admin/outreason/admin'         )),
                                        array('label' => 'Raceclasses', 'url' => array('/admin/raceclass/admin'    )),
                                        array('label' => 'Scales', 'url' => array('/admin/scale/admin'        )),
                                        array('label' => 'Subroundtypes', 'url' => array('/admin/subroundtype/admin' )),
                                        array('label' => 'Units', 'url' => array('/admin/unit/admin'         )),
                                    ))
                                ),
                            'visible'=>!Yii::app()->user->isGuest
                        ),
                        array(
                            'label' => 'Conversion',
                            'url' => '',
                            'subs'=>array(
                                array('label' => 'TChassis', 'url' => array('/admin/tchassis/admin')),
                                array('label' => 'TModels', 'url' => array('/admin/tscale/admin')),
                                array('label' => 'TProjects', 'url' => array('/admin/tproject/admin')),
                                array('label' => 'TRounds', 'url' => array('/admin/tround/admin')),
                                array('label' => 'TResults', 'url' => array('/admin/tresult/admin')),
                                array('label' => 'TTypes', 'url' => array('/admin/ttype/admin')),
                                array('label' => 'TVehicles', 'url' => array('/admin/tvehicle/admin')),
                             )
                     , 'visible'=>!Yii::app()->user->isGuest
                ),
                array('label' => 'Contact', 'url' => array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                array('label' => 'Contact', 'url' => array('/site/contact')),
                array('label' => 'Login', 'url' => array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label' => 'Logout ('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                ),
            ));  ?>
    </div><!-- mainmenu -->

    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'=>$this->breadcrumbs,
    )); ?><!-- breadcrumbs -->

    <?php echo $content; ?>

    <div id="footer">
        Copyright &copy; 2010- <?php echo date('Y'); ?> by BSS.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>