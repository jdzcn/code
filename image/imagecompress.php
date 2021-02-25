    <?php
        /**
         * @param  $file  要缩放的图片路径
         * @param  $width 缩放后的宽度
         * @param  $height缩放后的高度
         * @param  $eq    是否等比缩放
         * @return [type]
         */
        function compress($file,$width,$height='',$eq=true){
            ob_clean();
            $image = imagecreatefrompng($file);
            $img_info = getimagesize($file);
            if($eq) $height = $img_info[1]*($width/$img_info[0]);
            $com_image = imagecreatetruecolor($width, $height);
            imagecopyresampled($com_image, $image, 0, 0, 0, 0, $width, $height, $img_info[0], $img_info[1]);
            header('Content-type:image/jpeg');
            imagepng($com_image,'slogo.png');
            imagedestroy($com_image);
        }
        $file = 'logo.png';
        compress($file,100);
    ?>