<?php
class Multithumb {

    private static $imagePath = '../../images/stories/';
    private static $thumbPath = '../rpd/plugins/content/multithumb/thumbs/';

    public static function createThumbnail($filename, $width=120, $height=80, $proportion='bestfit', $bgcolor = 0xFFFFFF, $watermarkfile = '')
    {

        $temp = pathinfo($filename);
        $ext = $temp['extension']; //todo: check filename here
        $alt_filename = '';

        $size = @getimagesize($filename);
        if(!$size) {
           $multithumb_msg .= "There was a problem loading image $filename\\n";
           return false;
        }
        $origw = $size[0];
        $origh = $size[1];
        if ($alt_filename && ($origw<$width || $origh<$height)) {
            $width = $origw;
            $height = $origh;
        }
        if ($origw<$width && $origh<$height) {
            return false;
        }

        $watermark = $watermarkfile?1:0;
        if($width || $height) {
            $prefix = substr($proportion,0,1) . ".$width.$height.$bgcolor.$watermark.";
        } else {
            $prefix = "$watermark.";
        }
        $thumbFile = $prefix . str_replace(array(':','/','\\'),  '.' ,substr($filename, strlen(self::$imagePath)));
        //switch($GLOBALS['botMtGlobals']['scramble']) {
        //    case 'md5': $thumbFile = md5($thumbFile) . '.' . $ext; break;
        //    case 'crc32': $thumbFile = sprintf("%u", crc32($thumbFile)) . '.' . $ext;
        //}
        $thumbname = str_replace('#', '-', self::$thumbPath.$thumbFile);
        if (file_exists($thumbname)) {
            $size = @getimagesize($thumbname);
            if ($size) {
                $width = $size[0];
                $height = $size[1];
            }
        } else {
            if(!($width || $height)) { // Both sides zero
                $width = $origw;
                $height = $origh;
                $proportion='stretch';
            } elseif (!($width && $height)) { // One of the sides zero
                $proportion = 'bestfit';
            }
            $newheight = $height;
            $newwidth = $width;
            $dst_x = $dst_y = $src_x = $src_y = 0;
            if ((($origw < $origh && $width < $height) || ($origw >= $origh && $width <= $height)) && $width != 0 || $height == 0) {
                switch($proportion) {
                   case 'fill':
                      $newheight =  $origh/$origw*$width;
                      $dst_y = ($height - $newheight)/2;
                      break;
                   case 'crop':
                      $temph = $origw;
                      $origw = $origh / $newheight * $newwidth;
                      $src_x = ($temph-$origw)/2;
                      break;
                   case 'bestfit':
                      $newheight = $height = round($width / ($origw / $origh));
                }
            } else {
                switch($proportion) {
                   case 'fill':
                      $newwidth =  $origw/$origh*$height;
                      $dst_x = ($width - $newwidth)/2;
                      break;
                   case 'crop':
                      $temph = $origh;
                      $origh = $origw * $newheight / $newwidth;
                      $src_y = ($temph-$origh)/2;
                      break;
                   case 'bestfit':
                      $newwidth = $width = round($height * ($origw / $origh));
                }
            }

            switch(strtolower($ext)) {
                case 'png':
                    if(!function_exists("imagecreatefrompng")) {
                        if(!$disablepngwarning) $multithumb_msg .= 'PNG is not supported on this server.\n';
                        $disablepngwarning = true;
                        return false;
                    }
                    else {
                        $src_img = imagecreatefrompng($filename);
                        $imagefunction = "imagepng";
                    }
                    break;
                case 'gif':
                    if(!function_exists("imagecreatefromgif")) {
                        if(!$disablegifwarning) $multithumb_msg .= 'GIF is not supported on this server.\n';
                        $disablegifwarning = true;
                        return false;
                    }
                    else {
                        $src_img = imagecreatefromgif($filename);
                        $imagefunction = "imagegif";
                    }
                    break;
                default:
                    if(!function_exists("imagecreatefromjpeg")) {
                        if(!$disablejpgwarning) $multithumb_msg .= 'JPG is not supported on this server.\n';
                        $disablejpgwarning = true;
                        return false;
                    }
                    else {
                        ini_set('gd.jpeg_ignore_warning', 1);
                        $src_img = imagecreatefromjpeg($filename);
                        $imagefunction = "imagejpeg";
                    }
            }
            $dst_img = ImageCreateTrueColor((int)$width, (int)$height);
            imagefill( $dst_img, 0,0, $bgcolor);
            imagecopyresampled($dst_img,$src_img, $dst_x, $dst_y, $src_x, $src_y, $newwidth,$newheight,$origw, $origh);

            if($watermarkfile) {
                if($botMtGlobals['transparency_type'] == 'alpha')
                    $transcolor = FALSE;
                else
                    $transcolor = $botMtGlobals['transparent_color'];
                $this->create_watermark($dst_img, $watermarkfile, $botMtGlobals['watermark_left'], $botMtGlobals['watermark_top'], $transcolor, $botMtGlobals['transparency']);
            }
            if($imagefunction=='imagejpeg')
                $result = @$imagefunction($dst_img, $thumbname, 80); //$botMtGlobals['quality']);
            else
                $result = @$imagefunction($dst_img, $thumbname);

            imagedestroy($src_img);
            if(!$result) {
                if(!$disablepermissionwarning) $multithumb_msg .= "Could not create image:\\n$thumbname.\\nCheck if you have write permissions in /plugins/content/multihumb/$dest_folder/\\n";
                $disablepermissionwarning = true;
            }
            else
                imagedestroy($dst_img);
        }
        return self::$thumbPath.basename($thumbname);
    }

}
?>