<?php
header('Content-type: text/html; charset=utf-8');
require_once "inc/class/Car.class.php";

session_start();

$Cart = new Cart();


$id = $_GET["id"];
$num = $_GET['num'];

if(!is_numeric($num))
$num = 1;
if(isset($id) && strlen(trim($id))>0 && is_numeric($id)){

	$Cart->updateItem($id,$num);
	//修改$id的數量
}

?>
