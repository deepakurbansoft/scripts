<?php
//$SourceFile = 'big.jpg';
//$DestinationFile = 'image1-watermark.jpg';
//$WaterMarkText = 'urbansoft.in';
//watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile);
//
//function watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile) {
//    list($width, $height) = getimagesize($SourceFile);
//    $image_p = imagecreatetruecolor($width, $height);
//    $image = imagecreatefromjpeg($SourceFile);
//    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
//    $black = imagecolorallocate($image_p, 0, 0, 0);
//    $font = 'arial.ttf';
//    $font_size = 40;
//    imagettftext($image_p, $font_size, 0, 10, 20, $black, $font, $WaterMarkText);
//    if ($DestinationFile<>'') {
//        imagejpeg ($image_p, $DestinationFile, 100);
//    } else {
//        header('Content-Type: image/jpeg');
//        imagejpeg($image_p, null, 100);
//    };
//    imagedestroy($image);
//    imagedestroy($image_p);
//};
//
//?>




<?php
// Load the stamp and the photo to apply the watermark to
$im = imagecreatefromjpeg('photo.jpeg');

// First we create our stamp image manually from GD
$stamp = imagecreatetruecolor(250, 70);
//imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
//imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
$im = imagecreatefromjpeg('photo.jpeg');
imagestring($stamp, 25, 20, 20, 'cashbookpickandclick.com', 0xFFFFFF);
//imagestring($stamp, 3, 20, 40, '(c) 2007-9', 0x0000FF);

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

// Save the image to file and free memory
imagepng($im, 'photo_stamp.png');
imagedestroy($im);

?>
