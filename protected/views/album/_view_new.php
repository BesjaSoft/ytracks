<h2>Album : <?php echo $model->getAlbum(); ?></h2>
<?php
/*$this->widget('application.extensions.OrbitSlider.OrbitSlider',
              array(
                    'images'=>array(
                        array('../rpd/images/stories/vehicles/f/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_01.jpg','Text'),
                        array('../rpd/images/stories/vehicles/f/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_02.jpg','Text 2'),
                        array('../rpd/images/stories/vehicles/f/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_03.jpg','Text 3'),
                        array('../rpd/images/stories/vehicles/f/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_04.jpg',''),
                        array('../rpd/images/stories/vehicles/f/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_05.jpg',''),
                    ),
                    'slider_options'=>array(
                        'width'=>'800',
                        'height'=>'600',
                        'animation'=>'horizontal-slide',
                        'bullets'=>true,
                     ),
              )


);
*/
$this->widget('ext.adGallery.AdGallery',
        array( 'agWidth'  => 800 //450 px wide main image
             , 'agHeight' => 600 //200 px wide main image
            //'agThumbHeight' => 75, //75px tall thumb images
            //'agEffect' => 'slide-hort', //vertically slide between images
            //'agSlideShowAutoStart' => 'false', //Automatically start a slide show
            , 'imageList' => array(
                array( 'image_url' => '../rpd/images/stories/races/f1/1950/gbr/1950 Silverstone (Giuseppe Farina, Alfa Romeo 158).jpg'
                     //, 'thumb_url' => '../rpd/plugins/content/multithumb/thumbs/b.107.80.16777215.0.vehicles.f.ferrari.dino-206-sp.032.Drogo_Ferrari_Dino_206_SP_032_1967_02.jpg'
                     , 'alt' => 'Something something'
                     , 'title' => 'Test tile'
                     ),
                array( 'image_url' => 'images/gallery/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_02.jpg'
                     , 'alt' => 'Something something2'
                     , 'title' => 'Test tile2'
                     ),
                array( 'image_url' => 'images/gallery/ferrari/dino-206-sp/032/Drogo_Ferrari_Dino_206_SP_032_1967_03.jpg'
                     , 'alt' => 'Something something3'
                     , 'title' => 'Test tile3'
                     ),
            ),
        )
    );
    ?>