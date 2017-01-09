<?php
/*
// create a 100*100 image
$img = imagecreatetruecolor(100, 100);
$grey = imagecolorallocate($img, 255,255,255);

$red = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img,   0, 255,   0);
$blue = imagecolorallocate($img,   0, 0, 255);
imagefilledrectangle($img, 50, 0, 100, 100, $grey);

imagefilledellipse($img, 10, 50, 10, 10,$green);
// allocate some colors

// draw some lines
imageline($img, 40, 30, 40, 40, $green);
imageline($img, 50, 30, 50, 40, $red);
imageline($img, 45, 38, 45, 39, $blue);

imageline($img, 37, 45, 53, 45, $green);
imageline($img, 37, 43, 37, 45, $green);
imageline($img, 53, 43, 53, 45, $green);

// output image in the browser
header("Content-type: image/png");
imagepng($img);

// free memory
imagedestroy($img);
*/

$old = imageCreateFromJpeg("upload/offices1.jpg");
$w = imageSX($old);
$h = imageSY($old);
$w_new=round($w/2);
$h_new=round($h/2);
$new = imageCreate($w_new, $h_new);
imageCopyResized($new, $old, 0, 0, 0, 0, $w_new, $h_new, $w, $h);
header("Content-type: image/jpeg");
imageJpeg($new);
imageDestroy($old);
imageDestroy($new);