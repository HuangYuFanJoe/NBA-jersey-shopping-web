<?php
require_once "class/Car.class.php";
//request.getHeader("referer");
session_start();

$Cart = new Cart();
$Myitems = $Cart->getAllItems();

foreach ($Myitems as $key => $Myitem){
  $id = $Myitem->_id;
  if(isset($id) && strlen(trim($id))>0 && is_numeric($id)){

	   $Cart->removeItem($id);
	    //echo '刪除成功!';
  }
}
require('referer.php');


 ?>
