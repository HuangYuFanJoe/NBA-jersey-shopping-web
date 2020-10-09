<?php
session_start();
header("Content-type: image/png");
$image = ImageCreateFromPNG("images/captcha.png"); //背景圖片
$color_black = ImageColorAllocate($image,0,0,0);

$string = rand(11111,99999); //產生圖形驗證碼
imagestring($image,10,10,5, $string,$color_black);
ImageJPEG($image);
$_SESSION['captcha'] = $string; //寫入session
?>
