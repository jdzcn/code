    <?php
        ob_clean();
        $str="jdzcn@qq.com";
        // $font="cao.ttf";
        header('Content-type:image/jpeg');
        // $image1 = imagecreatefromgif('http://c.biancheng.net/uploads/allimg/191023/1-1910231P5435C.gif');
        $image2 = imagecreatefromjpeg('1.jpg');
        $co = imagecolorallocate($image2, 255,255,255);
        // imagettftext($image2, 0, 0, 0, 0, $co, $font, $str);
        imagestring($image2, 5, 0, 0, $str, $co);
        // imagepng($image1,'php.png');
        imagejpeg($image2);
        // imagepng($image2);
        echo "2.jpg saved.";
    ?>