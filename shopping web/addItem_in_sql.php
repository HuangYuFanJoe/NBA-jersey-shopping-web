<?php
header('Content-type: text/html; charset=utf-8');
require_once "class/Car.class.php";
session_start();
if($_SESSION['login'] != true)
  header("Location: member_log_in.php");
else {
  $MyCart = new Cart();
  $Myitems = $MyCart->getAllItems();
  $account = $_SESSION['account'];
  require('link.php');
  $sql = "SELECT * FROM cart where account = '$account' ";
  $data = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($data)) // 刪除購物車
  {
    $check = 0;
    foreach ($Myitems as $key => $Myitem)
    {
      if($Myitem->_id == $row[id]){
        $quantity = $Myitem->_quantity;
        $sql = "update cart set quantity = '$quantity' where id = '$row[id]'";
        $result = mysqli_query($link, $sql);
        $check = 1;
        break;
      }
    }
    if($check == 0)
    {
      $sql = "delete FROM cart where id = '$row[id]'";
      $result = mysqli_query($link, $sql);
    }
  }
  $sql = "SELECT * FROM cart where account = '$account' ";
  $data = mysqli_query($link, $sql);
  foreach ($Myitems as $key => $Myitem)//加入購物車
  {
    $check = 0;
    while($row = mysqli_fetch_array($data))
    {
        if($Myitem->_id == $row[id])
        {
          $check = 1;
        }
    }
    if($check == 0)
    {
      $string = rand(10000000,99999999);
      $id = $Myitem->_id;
      $merchandise_name = $Myitem->_name;
      $price = $Myitem->_price;
      $quantity = $Myitem->_quantity;
      $sql = "insert into cart value('$string','$account', '$id', '$merchandise_name', '$price', '$quantity','備貨中')";
      $result = mysqli_query($link, $sql);
    }
  }
  $_SESSION['first_come'] = 0;
    require('referer.php');
}
 ?>
