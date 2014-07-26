<h2>Album : <?php echo $model->getAlbum(); ?></h2>
<div id="gallery">
    <ul>
<?php
$this->widget('application.extensions.shadowbox.JShadowbox', array(
    'options' => array(
        'language'=>'en',
        'players'=>array('img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'),
    ),
));

$dir   = $model->getAlbum();
$exten = array('gif', 'png', 'jpg','jpeg'); // The extensions to display
$width = 120;
$height= 80;
if (is_dir($dir)) {
    if ($handle = opendir($dir)) {

        while (false !== ($file = readdir($handle))) {
            $bestand = $dir ."/". $file ;
            $ext = pathinfo($bestand);
            if(in_array($ext['extension'], $exten))
            {
                    $thumbnail = Multithumb::createThumbnail( $bestand
                                                             , 'thumbs'
                                                             , $width
                                                             , $height
                                                             );
                    ?>
            <li>
                <?php echo CHtml::link(CHtml::image($thumbnail,$label,$imgOptions),$bestand,array('rel'=>'shadowbox[x]','title'=>$file))?>
            </li>
            <?php
            }
    }

    if (empty($handle))
    {
        ?><li>
        <?php
            echo "Album not available, please contact the administrator on <a href='mailto:[email]'>[email]</a>";
        ?>
        </li>
    <?php
        }
        closedir($handle);
    } else {

        echo "No suitable pictures witin album.";
    }
} else{
    echo 'No pictures available';
}

?>
</ul>
</div>