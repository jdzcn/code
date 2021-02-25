    <?php
        /**
         * [watermark description]
         * @param  string  $img              [待加水印的图片地址]
         * @param  string  $watermark        [水印图片地址]
         * @param  integer $district         [水印的位置]
         * @param  integer $watermarkquality [图片水印的质量]
         * @return                           [添加水印的图片]
         */
        function watermark($img, $watermark, $district = 0,$watermarkquality = 95){
            $imginfo = @getimagesize($img);
            $watermarkinfo = @getimagesize($watermark);
            $img_w = $imginfo[0];
            $img_h = $imginfo[1];
            $watermark_w = $watermarkinfo[0];
            $watermark_h = $watermarkinfo[1];
            if($district == 0) $district = rand(1,9);
            if(!is_int($district) OR 1 > $district OR $district > 9) $district = 9;
            switch($district){
                case 1:
                    $x = +5;
                    $y = +5;
                    break;
                case 2:
                    $x = ($img_w - $watermark_w) / 2;
                    $y = +5;
                    break;
                case 3:
                    $x = $img_w - $watermark_w - 5;
                    $y = +5;
                    break;
                case 4:
                    $x = +5;
                    $y = ($img_h - $watermark_h) / 2;
                    break;
                case 5:
                    $x = ($img_w - $watermark_w) / 2;
                    $y = ($img_h - $watermark_h) / 2;
                    break;
                case 6:
                    $x = $img_w - $watermark_w;
                    $y = ($img_h - $watermark_h) / 2;
                    break;
                case 7:
                    $x = +5;
                    $y = $img_h - $watermark_h - 5;
                    break;
                case 8:
                    $x = ($img_w - $watermark_w) / 2;
                    $y = $img_h - $watermark_h - 5;
                    break;
                case 9:
                    $x = $img_w - $watermark_w - 5;
                    $y = $img_h - $watermark_h - 5;
                    break;
            }
            switch ($imginfo[2]) {
                case 1:
                    $im = @imagecreatefromgif($img);
                    break;
                case 2:
                    $im = @imagecreatefromjpeg($img);
                    break;
                case 3:
                    $im = @imagecreatefrompng($img);
                    break;
            }
            switch ($watermarkinfo[2]) {
                case 1:
                    $watermark_logo = @imagecreatefromgif($watermark);
                    break;
                case 2:
                    $watermark_logo = @imagecreatefromjpeg($watermark);
                    break;
                case 3:
                    $watermark_logo = @imagecreatefrompng($watermark);
                    break;
            }
            if(!$im or !$watermark_logo) return false;
            $dim = @imagecreatetruecolor($img_w, $img_h);
            if(@imagecopy($dim, $im, 0, 0, 0, 0,$img_w,$img_h )){
                imagecopy($dim, $watermark_logo, $x, $y, 0, 0, $watermark_w, $watermark_h);
            }
            $file = dirname($img) . '/w' . basename($img);
            $result = imagejpeg ($dim,$file,$watermarkquality);
            imagedestroy($watermark_logo);
            imagedestroy($dim);
            imagedestroy($im);
            if($result){
                echo $img.' 水印添加成功';
                return;
            }
            else {
                return false;
            }
        }
        $file = '1.jpg';   //待加水印的图片地址
        $water = 'logo.png';  //水印图片的地址
        watermark($file, $water,5);
    ?>