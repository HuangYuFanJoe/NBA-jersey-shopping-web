<?php
$referer  = $_SERVER['HTTP_REFERER'];
if(strlen(trim($referer))==0)
$referer = "board.php";
header("Location:$referer");
?>
