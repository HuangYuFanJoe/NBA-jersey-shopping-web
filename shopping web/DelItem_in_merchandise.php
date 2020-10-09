<?php
header('Content-type: text/html; charset=utf-8');
require_once "class/Car.class.php";
//request.getHeader("referer");
session_start();

$Cart = new Cart();


$id = $_GET["id"];


if(isset($id) && strlen(trim($id))>0 && is_numeric($id)){

	$Cart->removeItem($id);
	//echo '刪除成功!';
}
require('referer.php');
?>
