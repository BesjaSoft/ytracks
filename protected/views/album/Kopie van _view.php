<h2>Album : <?php echo $model->getAlbum(); ?></h2>
<?php
$this->widget('application.extensions.gallery.EGallery',
        array('path' => 'images/gallery/ferrari/dino-206-sp/032/',
            // 'other' => 'properties',
            )
    );
    ?>