<?php /*Yii::app()->baseUrl.'/'; ?>index.php?r=image/view&file=<?php echo $bestand; ?>" rel="shadowbox[x];player=img"><img src="<?php echo $thumbnail; ?>" />*/?>
<h2>Album: <?php echo $model->getAlbum(); ?></h2>
<div id='gallery'>
    <ul>
        <?php
        $this->widget('application.extensions.shadowbox.JShadowbox', array(
            'options' => array(
                'language' => 'en',
                'players' => array('img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'),
            ),
        ));

        $dir = $model->getAlbum();
        $exten = array('gif', 'png', 'jpg', 'jpeg'); // The extensions to display
        $width = 120;
        $height = 80;
        if (is_dir($dir)) {
            if ($handle = opendir($dir)) {

                while (false !== ($file = readdir($handle))) {
                    $bestand = $dir ."/". $file ;
                    $ext = pathinfo($bestand);
                    $fileSize = filesize($bestand);
                    //echo 'bestand:'.$bestand.', size:'.$fileSize;
                    if(in_array($ext['extension'], $exten) && $fileSize <= 2097152) {
                        try {
                            $thumbnail = Multithumb::createThumbnail($bestand, $width, $height);
                            echo '<li>'.Chtml::link('<img src="'.$thumbnail.'"/>',
                                         Yii::app()->baseUrl.'/index.php?r=image/view&file='.urlencode($bestand),
                                         //$bestand,
                                         array('rel'=>'shadowbox[x];player=img','title'=>$file)
                                      ).'</li>';

                        } catch (Exception $ex) {
                            echo 'Error in creating image of '.$bestand.'!';
                        }
                    }
            }

            if (empty($handle)) {
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
        } else {
            echo 'No pictures available';
        }

        ?>
    </ul>
</div>