<?php
header('Content-type: text/html; charset=utf-8');

require_once "class/Car.class.php";

session_start();

$Cart = new Cart();

$id = $_GET["id"];
require('link.php');
$sql = "SELECT * FROM merchandise_data where id = '$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
//echo $id;
	$num = $_GET["num"];
	$sort = $_GET["sort"];
if($num){
	if(isset($id) && strlen(trim($id))>0 && is_numeric($id)){
		$Cart->addItem($id, $row[merch_name], $row[money], $num, "", "元"); //($_id, $_name, $_price, $_quantity, $_brief, $_spec)
		$referer = "merchandise.php?sort=$sort";
		header("Location:$referer");
	}
}
else{
if(isset($id) && strlen(trim($id))>0 && is_numeric($id)){
	$Cart->addItem($id, $row[merch_name], $row[money], 1, "", "元"); //($_id, $_name, $_price, $_quantity, $_brief, $_spec)

}
//加入成功後回到前一頁
	$referer  = $_SERVER['HTTP_REFERER'];
	if(strlen(trim($referer))==0)
		$referer = "merchandise.php";

	header("Location:$referer");
}
?>
