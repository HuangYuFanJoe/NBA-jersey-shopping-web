<?php
session_start();
if($_SESSION['login'] != true)
  header("Location:index.php");
$account = $_SESSION['account'];
require('link.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>檢視訂單</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><!--藍色按鈕-->
</head>
<body>
<style>
#bg{
  position: absolute;
  top:0%;
  left: -10%;
  height:150%;
  width: 110%;
  background-image: url(images/girl1.jpg);
}
#payinfo{
  position: absolute;
  top:0%;
  left: 20%;
  height: 100%;
  width: 100%;
}
</style>
<div id="bg">
<div id="payinfo">
<?php
  if($account == 'rootroot') {
    echo "<p style='font-size:20px; color:red;' align='center'><strong>&emsp;所有訂單</strong></p>";
    $sql_cart = "select * from cart";
    $result_cart = mysqli_query($link, $sql_cart);
      while( $row_cart = mysqli_fetch_assoc($result_cart)) {
          echo "<table align = 'center' width = '40%' border = '1'>";
          echo "<tr>"."<td align = 'center'>"."訂單編號"."</td>"."<td align = 'center'>"."N".$row_cart["number"]."</td>"."</tr>";
          echo "<tr>"."<td align = 'center'>"."帳號"."</td>"."<td align = 'center'>".$row_cart["account"]."</td>"."</tr>";
          echo "<tr>"."<td align = 'center'>"."商品名稱"."</td>"."<td align = 'center'>";
          echo $row_cart["merchandise"]."&nbsp;*&nbsp;".$row_cart["quantity"]."</td>";
          echo "<tr>"."<td align = 'center'>"."出貨狀況"."</td>"."<td align = 'center'>"."<span style='color:blue'>$row_cart[situation]</span>".
          "&nbsp;";
          if($_GET['num'] == $row_cart['number']){
              echo "<form id='form1' name='form1' method='post' action=''>";
              echo "&nbsp;<input type='text' name='changesitu' id='changesitu' style='width:80px;'/>";
              echo "&nbsp;<input type='submit' value='確定修改'></form>";
          }
          else {
            echo "<input type='button' class='primary' value='修改'  onclick='location.href=\"payinfo.php?num=$row_cart[number]\"'>";
          }
          echo "</td>"."</tr></br>";
          $sqlUpdate = "update cart set situation = '$_POST[changesitu]' where number='$_GET[num]'";
          mysqli_query($link, $sqlUpdate);
      }
      echo "</td></tr></table>";
    mysqli_free_result($result); // 釋放佔用的記憶體
    mysqli_free_result($result_cart); // 釋放佔用的記憶體
    mysqli_close($link);
  }
  else {
    echo "<p style='font-size:20px; color:red;' align='center'><strong>&emsp;我的訂單</strong></p>";
    $sql = "select * from member_data where account = '$account'";
    $result = mysqli_query($link, $sql);
    $sql_cart = "select * from cart where account = '$account'";
    $result_cart = mysqli_query($link, $sql_cart);
    $row = mysqli_fetch_assoc($result);
          while($row_cart = mysqli_fetch_assoc($result_cart)) {
              $string = rand(00000000,99999999);
              echo "<table align = 'center' width = '40%' border = '1'>";
              echo "<tr>"."<td align = 'center'>"."訂單編號"."</td>"."<td align = 'center'>"."N".$row_cart["number"]."</td>"."</tr>";
              echo "<tr>"."<td align = 'center'>"."帳號"."</td>"."<td align = 'center'>".$row["account"]."</td>"."</tr>";
              echo "<tr>"."<td align = 'center'>"."姓名"."</td>"."<td align = 'center'>".$row["name"]."</td>"."</tr>";
              echo "<tr>"."<td align = 'center'>"."電話"."</td>"."<td align = 'center'>".$row["phone"]."</td>"."</tr>";
              echo "<tr>"."<td align = 'center'>"."地址"."</td>"."<td align = 'center'>".$row["address"]."</td>"."</tr>";
              echo "<tr>"."<td align = 'center'>"."信箱"."</td>"."<td align = 'center'>".$row["email"]."</td>"."</tr>";
              echo "<tr>"."<td align = 'center'>"."商品名稱"."</td>"."<td align = 'center'>";
              echo $row_cart["merchandise"]."&nbsp;*&nbsp;".$row_cart["quantity"]."</td>";
              echo "<tr>"."<td align = 'center'>"."出貨狀況"."</td>"."<td align = 'center'>"."<span style='color:blue'>$row_cart[situation]</span>"."</td>"."</tr></br>";
          }
          echo "</td></tr></table>";
    mysqli_free_result($result); // 釋放佔用的記憶體
    mysqli_free_result($result_cart); // 釋放佔用的記憶體
    mysqli_close($link);
  }
?>
<p>&nbsp;</p>
<p align='center'><input type='button' class='btn btn-primary' value='回商品頁面' onclick='location.href="merchandise.php?search=+"'></p>
</div>
</div>
</body>
</html>
