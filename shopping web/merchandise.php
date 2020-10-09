<?php
$file=fopen("passenger.txt", "r");
$num=fgets($file);
fclose($file);
$num++;
$file=fopen("passenger.txt", "w");
$page = $_GET['page'];
fwrite($file, $num);
fclose($file);
$checkout = $_GET['checkout'];
include "class/Car.class.php";
session_start();

require('link.php');
  $sql = "select * from merchandise_data";
  $result = mysqli_query($link, $sql);
  $content_sql = "select * from merchandise_data where type = 3 or type = 9 or type = 10";
  $content_result = mysqli_query($link, $content_sql);
  if($_SESSION['login'] == true)
  {
      $account = $_SESSION['account'];
      $sql_member = "select * from member_data where account = '$account'";
      $result_member = mysqli_query($link, $sql_member);
      $member_row = mysqli_fetch_assoc($result_member);
      $_SESSION['nickname'] = $member_row['nickname'];
      $shopping = true;
  }
  $MyCart = new Cart();
  $first_come = $_SESSION['first_come'];
  if(!$first_come && $_SESSION['login'] == ture){
    $_SESSION['first_come'] = 1;
    $sql = "SELECT * FROM cart where account = '$account'";
    $data = mysqli_query($link, $sql);
      while($row = mysqli_fetch_array($data))
      {
        $MyCart->addItem($row[id], $row[merchandise], $row[price], $row[quantity], "", "元");//($_id, $_name, $_price, $_quantity, $_brief, $_spec)
      }
  }
  $Myitems = $MyCart->getAllItems();

  $pic_amt=mysqli_num_rows($result);
  $modify_merch = $_GET['modify_merch'];
    if($_POST['input_merch_name'] != '' && $_POST['input_money'] != '' && $_POST['input_sort'] != '') {
      $pic_name = $_FILES['Myfile']['name'];
      move_uploaded_file($_FILES['Myfile']['tmp_name'], iconv("utf-8", "big5", "./upload/" . $_FILES['Myfile']['name'])); //轉碼
      $merch_name = $_POST['input_merch_name'];
      $money = $_POST['input_money'];
      $merch_sort = $_POST['input_sort'];
      $sqlInsert = "insert into merchandise_data value(NULL,'$pic_name', '$merch_name', '$money', '$merch_sort')";
      mysqli_query($link, $sqlInsert);
      ?>
      <script>alert('商品新增成功！');</script>
      <?php
    }
    if($_POST['delete_merch_name'] != '') {
      $merch_name = $_POST['delete_merch_name'];
      $sqlDelete = "Delete From merchandise_data where merch_name = '$merch_name'";
      if (mysqli_query($link,$sqlDelete)) {
      ?>
      <script>alert('商品刪除成功！');</script>
      <?php }
    }
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>87nba</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/MyCar.js"></script>
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;

}
#colophon {
	position:absolute;
	top: 1450px;
	left: 100px;
}
#sch {
	position:absolute;
	top: 90%;
	left: 4%;
}
<!--
a:link {
text-decoration:underline;
color:#000000;
}
a:visited {
//設定已經瀏覽過的連結
text-decoration:underline;
color:#000000;
}
a:hover {
//設定滑鼠移經的連結
text-decoration:underline;
color:gray;
}
#welcome_pic{
  position: absolute;
  top: 10%;
  width: 100%;
}
.style1 {font-size: 12px}
#sidebar {
	background: none;
  position:absolute;
  top:100%;
  left: 5%;
	height: 80%;
	width: 16%;
}
#sidebar tr:hover td{
	background-color:#bdddf1;
}
#sidebar li{
  background-color:black;
  padding: 0 30px;
  display:inline-block;
}
#sidebar p{
  background-color:black;
  padding: 0 30px;
  display: inline-block;
}
.style13 {color: #FFFFFF; font-size: 15px}
.style14 {color: #333333}
#upload{
  position: absolute;
  top: 90%;
  left: 25%;
}
#merchandise{
  position: absolute;
  top: 90%;
  left: 40%;
}
#merchandise a:hover{
  background-color:#bdddf1;
  padding: 10px 150px;
  display:inline-block;
}
#content {
	position:absolute;
	top: 250%;
	left: 3%;
	background-color: #EEEEEE;
	height: 60%;
	width: 97%;
}
#content_title {
	position:absolute;
	top: 0%;
	left: 0%;
	background-color:#005470;
	height: 10%;
	width: 100%;
}
#content_picture {
	position:absolute;
	top: 15%;
	left: 1%;
	background-color:#EEEEEE;
	height: 1%;
	width: 100%;
}
#footer {
	position:absolute;
	top: 85%;
	left: 0%;
}
.style16 {color: #FFFFFF; font-weight: bold; }
#passenger {
	position:absolute;
	top: 7%;
	left: 45%;
	background-color:none;
	height: 2%;
	width: 10%;
}
ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}
ul.pagination li {display: inline;}
ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}
ul.pagination li a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
ul.pagination li a:hover:not(.active) {background-color: #ddd;}
div.center {text-align: center;}
ul { /* 取消ul預設的內縮及樣式 */
        margin: 0;
        padding: 0;
        list-style: none;
    }
    ul.drop-down-menu {
        border: #ccc 1px solid;
        display: inline-block;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 15px;
    }

    ul.drop-down-menu li {
        position: relative;
        white-space: nowrap;
        border-right: #ccc 1px solid;
    }

    ul.drop-down-menu > li {
        float: left; /* 只有第一層是靠左對齊*/
    }

     ul.drop-down-menu a {
        background-color: #3a3b44;
        color: #333;
        display: block;
        padding: 2px 70px;
        text-decoration: none;
        line-height: 40px;
    }
    ul.drop-down-menu a:hover { /* 滑鼠滑入按鈕變色*/
        background-color: #666;
        color: #000;
    }
    ul.drop-down-menu li:hover > a { /* 滑鼠移入次選單上層按鈕保持變色*/
        background-color: #666;
        color: #000;
    }
ul.drop-down-menu ul {
        border: #ccc 1px solid;
        position: absolute;
        z-index: 99;
        left: -1px;
        top: 100%;
       min-width: 180px;
    }

    ul.drop-down-menu ul { /*隱藏次選單*/
         left: 99999px;
         opacity: 0;
         -webkit-transition: opacity 0.3s;
         transition: opacity 0.3s;
     }

     ul.drop-down-menu li:hover > ul { /* 滑鼠滑入展開次選單*/
         opacity: 1;
         -webkit-transition: opacity 0.3s;
         transition: opacity 0.3s;
         left: -1px;
         border-right: 5px;
     }
#title_welcome{
  position: absolute;
  top:7%;
  left: 88%;
}
#page{
  position: absolute;
  top: 235%;
  left:10%;
  width: 90%;
}
#bg1{
  position: absolute;
  top:85%;
  left: 0%;
  height:150%;
  width: 100%;
  background-color: #bdddf1;
}
#bgp1{
  position: absolute;
  top:85%;
  left: -10%;
  height:150%;
  width: 110%;
  background-image: url(images/girl1.jpg);
}
#rightsidebar{
  position: absolute;
  left: 80%;
    top : 85%;
  width: 400px;
  margin-left: 10px;
 }

 #cart {
    position: fixed;
    top: 30%;
    background-color: none;
	}

	#cart .header{
		width: 267px;
		height: 80px;
		background: url(images/敗家.png) no-repeat;
		text-indent: -9999px;
	}

	#cart .middle {
		width: 267px;
		padding: 5px;
		border: 1px solid #ddd;
		border-top: none;
		font-size: 12px;
		text-align: center;
	}
-->
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel='stylesheet' id='bootstrapCSS-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/bootstrap.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='custom-style-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/fedora.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='googleFonts2-css'  href='https://fonts.googleapis.com/css?family=Lato%3A400%2C300%2C700&#038;ver=4.7.4' type='text/css' media='all' />
<style type="text/css">
<!--
.style19 {font-size: 16px}
.style3 {font-size: 20px}
.style4 {font-size: 24px}
-->
</style>
</head>
<body>
<div id="bg1"></div>
<div id="bgp1"></div>
<div id="title" align="center">
<ul class="drop-down-menu">
<?php  if($_SESSION['login'] != true) { ?>
    <li><a href="index.php"><img src="images/恩逼欸.png" width="100px" height="40px" border="0"></a></li>
    <li><a href="member_log_in.php" style="color:white;"><i class="material-icons">perm_identity</i><strong>登入</strong></a></li>
    <li><a href="member_sign_up.php" style="color:white;"><i class="material-icons">subtitles</i><strong>註冊</strong></a></li>
    <li><a href="board.php" style="color:white;"><i class="fa fa-commenting" style="font-size:24px;"></i><strong>留言板</strong></a></li>
    <li><a href="merchandise.php?search=+" style="color:white;"><i class="material-icons">store</i><strong>87商品</strong></a></li>
    <li><a href="#" style="color:white;"><i class="material-icons">info_outline</i><strong>關於我們</strong></a>
    <ul>
    <li><a href="https://www.facebook.com/87nba-137666573465851" style="color:white;"><i class="fa fa-facebook-square" style="font-size:24px"></i> <strong>粉絲專頁</strong></a></li>
    <li><a href="designidea.php" style="color:white;"><i class="fa fa-envira" style="font-size:24px;"></i><strong>經營理念</strong></a></li>
    </ul>
    </ul>
<?php } else { ?>
  <li><a href="index.php"><img src="images/恩逼欸.png" width="100px" height="40px" border="0"></a></li>
  <li><a href="board.php" style="color:white;"><i class="fa fa-commenting" style="font-size:24px;"></i><strong>留言板</strong></a></li>
  <li><a href="payinfo.php" style="color:white;"><i class="material-icons">store</i><strong>檢視訂單</strong></a></li>
  <li><a href="#" style="color:white;"><i class="material-icons">info_outline</i><strong>關於我們</strong></a>
  <ul>
  <li><a href="https://www.facebook.com/87nba-137666573465851" style="color:white;"><i class="fa fa-facebook-square" style="font-size:24px"></i> <strong>粉絲專頁</strong></a></li>
  <li><a href="designidea.php" style="color:white;"><i class="fa fa-envira" style="font-size:24px;"></i><strong>經營理念</strong></a></li>
  </ul>
  <li><a href="logout.php" style="color:white;"><i class="material-icons">thumb_down</i><strong>登出</strong></a></li>
  </ul>
<?php } ?>
</div>
<div id="title_welcome">
<?php if($_SESSION['login'] == true) { ?>
<span style = "color:black">Hi , <?=$member_row['nickname']?>&nbsp;&nbsp;<a href="modify_personal_info.php" class="style1"><i class="fa fa-pencil" style="font-size:14px;"></i>修改個人資料</a></span>
<?php } ?>
</div>
<div id="sidebar" align="center">
  <table width="100%" height="45%" >
      <li><span class="style3" style='color:white'><strong>西區</strong></span></li>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=1" style="text-decoration:none;">Golden State Warriors</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=2" style="text-decoration:none;">Los Angeles Lakers</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=3" style="text-decoration:none;">Huston Rockets</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=4" style="text-decoration:none;">San Antonio Spurs</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=5" style="text-decoration:none;">Oklahoma Thunder</a></td>
    </tr>
    </table>
    <table width="100%" height="45%" >
      <p><strong>&nbsp;<span class="style3" style='color:white'>東區</span></strong></p>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=6" style="text-decoration:none;">Cleveland Cavaliers</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=7" style="text-decoration:none;">Chicaco Bulls</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=8" style="text-decoration:none;">Toronto Raptors</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=9" style="text-decoration:none;">Washington Wizards</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=10" style="text-decoration:none;">Boston Celtics</a></td>
    </tr>
  </table>
</div>
<div id="passenger"><small>訪客人數 : <?php echo $num + "人"?><small></div>
<div id="welcome_pic"><p><img src="images/allstar.jpg" width="100%" height="450" /></p></div>
<div id="sch">
  		<form class="search-form" action="merchandise.php">
					<label>
							 <input type="text" class="search-field" placeholder="Search …" name="search"/>
					</label>
							  <input type="submit" class="fd-btn-search" value="Search" />
      </form>
</div>
<div id="upload">
<?php if($account == 'rootroot') {
if($modify_merch == 0) { ?>
<input type='submit' class='btn btn-primary' value='新增商品' onclick="location.href='merchandise.php?modify_merch=1&search=+'"/>
<input type='submit' class='btn btn-primary' value='刪除商品' onclick="location.href='merchandise.php?modify_merch=2&search=+'"/>
<?php } ?>
<?php if($modify_merch == 1) { ?>
<form enctype="multipart/form-data" method="post" action="merchandise.php?modify_merch=0&search=+">
<input type='file' name='Myfile'>
商品名稱<input type='text' name='input_merch_name' id='input_merch_name' style='width:130px;'><br>
商品價格<input type='text' name='input_money' id='input_money' style='width:60px;'><br>
商品分類<input type='text' name='input_sort' id='input_sort' style='width:60px;'><br><br>
<input type="submit" class="btn-primary" value="確定新增"/>
</form>
<?php } ?>
<?php if($modify_merch == 2) { ?>
<form enctype="multipart/form-data" method="post" action="merchandise.php?modify_merch=0&search=+">
商品名稱<input type='text' name='delete_merch_name' id='delete_merch_name' style='width:130px;'><br><br>
<input type="submit" class="btn-primary" value="確定刪除"/>
</form>
<?php } ?>
<?php } ?>
</div>
<div id="merchandise">
<?php
$search = $_GET['search'];
$search_sql = "select * from merchandise_data where merch_name like '%".$search."%'";
$search_result = mysqli_query($link, $search_sql);
$search_records=mysqli_num_rows($search_result);
if($search == ' ')
  $search = '+';
if($search_records == 0) {
?>
<script>alert("查無此商品！");</script>
<?php }
$sort = $_GET['sort'];
$merchandise_sql = "select * from merchandise_data where type='".$sort."' and merch_name like '%".$search."%'";
$merchandise_result = mysqli_query($link, $merchandise_sql);
$total_records=mysqli_num_rows($merchandise_result);
$total_page = ceil($total_records / 3);
mysqli_data_seek($merchandise_result,($_GET['page']-1)*3);
for($j = 0; $j < 3; $j++) //sort
{
  $merchandise_row = mysqli_fetch_assoc($merchandise_result);
  $pic_name = $merchandise_row["pic_name"];
  $merch_name = $merchandise_row["merch_name"];
  $money = $merchandise_row["money"];
  if($merchandise_row != null){
    echo "<a href=\"#\"><img src=\"images/$pic_name\" width=\"250\" height=\"250\"; >&nbsp;&nbsp;
    $merch_name&nbsp;$$money&nbsp;&nbsp;";
      $ckeck = 0;
      if ($Myitems)
        foreach ($Myitems as $key => $Myitem)
        {
          if($Myitem->_id == $merchandise_row["id"])
          {
            $check = 1;
            break;
          }
        }
        if($check == 1){?>

          <button type="button" class="primary" onclick="location.href='DelItem_in_merchandise.php?id=<?=$merchandise_row["id"]?>'">
          <?php
          echo "<i class='fa fa-trash-o' style='font-size:24px'></i>";
        }
        else{ ?>
          <button type="button" class="primary" onclick="location.href='addItem.php?id=<?=$merchandise_row["id"]?>'">
        <?php
          echo"<i class='material-icons'>shopping_cart</i>";
        }
        $check = 0;
    ?>
    </button>&emsp;
    <?php
    echo "</br></br></br>";
  }
}
if($search != null){ //search
  $search_page = ceil($search_records / 3);
  mysqli_data_seek($search_result,($_GET['page']-1)*3);
  for($i = 0; $i < 3; $i++)
  {
    $search_row = mysqli_fetch_assoc($search_result);
    $pic_name = $search_row["pic_name"];
    $merch_name = $search_row["merch_name"];
    $money = $search_row["money"];
    if($search_row != null){
      echo "<a href=\"#\"><img src=\"images/$pic_name\" width=\"250\" height=\"250\"; >&nbsp;&nbsp;
      $merch_name&nbsp;$$money&nbsp;&nbsp;";
        $ckeck = 0;
        if ($Myitems)
          foreach ($Myitems as $key => $Myitem)
          {
            if($Myitem->_id == $search_row["id"])
            {
              $check = 1;
              break;
            }
          }
          if($check == 1){?>

            <button type="button" class="primary" onclick="location.href='DelItem_in_merchandise.php?id=<?=$search_row["id"]?>'">
            <?php
            echo "<i class='fa fa-trash-o' style='font-size:24px'></i>";
          }
          else{ ?>
            <button type="button" class="primary" onclick="location.href='addItem.php?id=<?=$search_row["id"]?>'">
          <?php
            echo"<i class='material-icons'>shopping_cart</i>";
          }
          $check = 0;
      ?>
      </button>&emsp;
      <?php
      echo "</br></br></br>";
    }
  }
}
  mysqli_free_result($search_result); // 釋放佔用的記憶體
  mysqli_free_result($merchandise_result); // 釋放佔用的記憶體
  mysqli_close($link); // 關閉資料庫連結
?>
</div>
<div id="page" align="center">
  <ul class="pagination">
<?php
  echo "<br><tr align='center'> <td colspan = '4'>";
  $pre_page=$page-1;
  $next_page=$page+1;
  if($page > 1)
    echo "<li><a href='merchandise.php?page=$pre_page&sort=$sort&search=$search'><</a></li>";
  for($j = 1; $j <= $total_page; $j++){
    if($j == $page) echo "<li><a>$j</a></li>";
    else echo "<li><a href = 'merchandise.php?page=$j&sort=$sort&search=$search'> $j </a>&nbsp;&nbsp;</li>";
  }
  if($next_page <= $total_page)
    echo "<li><a href='merchandise.php?page=$next_page&sort=$sort&search=$search'>></a>&nbsp;&nbsp;</li>";
  echo "</td></tr>";
if($search != null){
  echo "<tr align='center'> <td colspan = '4'>";
  $pre_page=$page-1;
  $next_page=$page+1;
  for($j = 1; $j <= $search_page; $j++){
    if($j == $_GET['page']) echo "<li><a>$j</a></li>";
    else echo "<li><a href = 'merchandise.php?page=$j&sort=$sort&search=$search'> $j </a>&nbsp;&nbsp;</li>";
  }
  if($next_page <= $search_page)
    echo "<li><a href='merchandise.php?page=$next_page&sort=$sort&search=$search'>></a>&nbsp;&nbsp;</li>";
    echo "</td><tr>";
}
  ?>
  </ul>
</div>
	<div id="content">
  <div id="content_title" align="center"><span class="style4" style='color:white'><strong><i class="material-icons">search</i> 熱&emsp;搜&emsp;商&emsp;品</strong></span></div>
  <div id="content_picture">
  <p>
  <?php
    for($j = 0; $j < 8; $j++)
    {
    	$content_row = mysqli_fetch_assoc($content_result);
    	$pic_name = $content_row["pic_name"];
    	echo "<a href=\"#\"><img src=\"images/$pic_name\" width=\"178\" height=\"138\"; ></a>"; echo"&nbsp;";
    	$merch_name = $content_row["merch_name"];
    	$money = $content_row["money"];
    	echo "<a href=\"#\">$merch_name&nbsp;$$money</a>"; echo"&emsp;";
      if($j == 3)
        echo "</br></br>";
    }
  ?>
  </p>
  </div>
</div>

<div id="rightsidebar">
  <div id="cart">
    <div class="header">購物車</div>
    <div class="middle">
      <div>您的購物車中有<span class="shopping_w2" id="">0</span>樣商品</div>
      <?php
      $checkcount = 0;
      if($checkout != 1){ // 購物車
      if ($Myitems){
      ?>
      <div class="right_main">
          <div class="product">
            <div class="product_b_body">
              <form id="myform" action="merchandise.php?sort=<?=$sort?>&checkout=1" method="post"
              onsubmit="return checkForm();">
                <div class="shopping">
                  <div class="shopping_body">
                    <table width="100%" border="0" cellpadding="6" cellspacing="0"
                    id="mytable">
                      <tr>
                        <td width="5  0%" class="shopping_w1"
                          style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">商品名稱</td>
                        <td width="21%" class="shopping_w1"
                          style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">價
                          格</td>
                        <td width="21%" class="shopping_w1"
                          style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">數
                          量</td>
                        <td width="8%" style="border-bottom: 1px solid #d2d2d2;">
                              <tr>
                                <td width="100%" align="center" valign="middle"><!--  <input name="Submit" type="submit" class="shopping_bt" style="cursor: pointer;" value="刪 除" />--></td>
                              </tr>
                        </td>
                      </tr>
    <?php
                    foreach ($Myitems as $key => $Myitem){
                      $checkcount ++;
                      $background  = $checkcount%2==1?"bgcolor=\"#e7e7e7\"":"";
                    ?>
                      <tr id="item_<?php echo $Myitem->_id;?>">
                        <td <?php echo $background;?>><input type="hidden"
                          name="item<?php echo $Myitem->_id;?>"
                          value="<?php echo $Myitem->_id;?>"></input> <?php echo $Myitem->_name; ?></td>
                        <td <?php echo $background;?>><?php echo $Myitem->_price; ?>元</td>
                        <td <?php echo $background;?>><select
                          name="Quity<?php echo $Myitem->_id;?>" class="shopping_down"
                          onchange="amount();">
                          <?php
                            if($Myitem->_quantity == 1)
                              echo "<option value='1' selected>1</option>";
                            else
                              echo "<option value='1'>1</option>";
                            if($Myitem->_quantity == 2)
                              echo "<option value='2' selected>2</option>";
                            else
                              echo "<option value='2'>2</option>";
                            if($Myitem->_quantity == 3)
                              echo "<option value='3' selected>3</option>";
                            else
                              echo "<option value='3'>3</option>";
                            if($Myitem->_quantity == 4)
                              echo "<option value='4' selected>4</option>";
                            else
                              echo "<option value='4'>4</option>";
                            if($Myitem->_quantity == 5)
                              echo "<option value='5' selected>5</option>";
                            else
                              echo "<option value='5'>5</option>";
                            if($Myitem->_quantity == 6)
                              echo "<option value='6' selected>6</option>";
                            else
                              echo "<option value='6'>6</option>";
                            if($Myitem->_quantity == 7)
                              echo "<option value='7' selected>7</option>";
                            else
                              echo "<option value='7'>7</option>";
                            if($Myitem->_quantity == 8)
                              echo "<option value='8' selected>8</option>";
                            else
                              echo "<option value='8'>8</option>";
                            if($Myitem->_quantity == 9)
                              echo "<option value='9' selected>9</option>";
                            else
                              echo "<option value='9'>9</option>";
                            if($Myitem->_quantity == 10)
                              echo "<option value='10' selected>10</option>";
                            else
                              echo "<option value='10'>10</option>";
                          ?>
                        </select></td>
                        <td <?php echo $background;?>>
                          <table width="96" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="70%" align="center" valign="middle"><input
                                name="button<?php echo $Myitem->_id; ?>" type="button"
                                class="shopping_bt" style="cursor: pointer;"
                                onclick="del(<?php echo $Myitem->_id; ?>);" value="刪 除" />
                              </td>
                              <td width="30%" align="center" valign="middle"></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    <?php
                  }
                  ?>
                </table>

                </div>
                </div>
                <table  border="0" cellpadding="5" cellspacing="0"
                  style="margin-top: 10px;">
                  <tr>
                    <td colspan="2" align="right">總金額：<span class="shopping_w2"
                      id="amount">0</span>元</td>
                  </tr>

                </table>
                <script type="text/javascript">amount();</script>

                <table  border="0" cellpadding="0" cellspacing="0"
                  style="margin-top: 10px;">
                  <tr>
                    <td align="right"><input name="Submit2" type="submit"
                      class="shopping_bt1" style="cursor: pointer;" value="下一步" /></td>
                      <td align="right"><input type="button" value="清除購物車" onclick="location.href='clearcart.php'"></td>
                  </tr>
                </table>
                </form>
                </div>
                </div>
                </div>
      <?php
      }
    }else{ // 結帳
      foreach ($Myitems as $key => $Myitem)
      {
      //$item = $Myitem->getItem();
       $q = $_POST['Quity'.$key];
        //echo $q;
        $Myitem->updateItem($q);
      }
      ?>
      <div class="right_main">
      <div class="product">
      <div class="product_b_body">
      <form id="myform" action="OrderForm.php" method="post"
      	onsubmit="return checkForm();">
      <div class="shopping">
      <div class="shopping_body">
      <table width="100%" border="0" cellpadding="6" cellspacing="0"
      	id="mytable">
      	<tr>
      		<td width="43%" class="shopping_w1"
      			style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">商品名稱</td>
      		<td width="21%" class="shopping_w1"
      			style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">價
      		格</td>
      		<td width="21%" class="shopping_w1"
      			style="border-right: 1px solid #d2d2d2; border-bottom: 1px solid #d2d2d2;">數
      		量</td>

      	</tr>
      	<?php

      	$checkcount = 0;
        $total = 0;
      	if ($Myitems)
      	{
      		foreach ($Myitems as $key => $Myitem)
      		{
      			$checkcount ++;
      			$background  = $checkcount%2==1?"bgcolor=\"#e7e7e7\"":"";
      			//var_export($Myitem);
      			?>
      	<tr id="item_<?php echo $Myitem->_id;?>">
      		<td <?php echo $background;?>><input type="hidden"
      			name="item<?php echo $Myitem->_id;?>"
      			value="<?php echo $Myitem->_id;?>"></input> <?php echo $Myitem->_name; ?></td>
      		<td <?php echo $background;?>><?php echo $Myitem->_price; ?>元</td>
      		<td <?php echo $background;?>><?php echo $Myitem->_quantity;?></td>

      	</tr>
      	<?php
          $total = $total + $Myitem->_sub_total;
      		}
          echo "<tr>
            <td>總金額:  ".$total."</td>
          </tr>";
      	}
      	else{
      		?>
      	<tr>
      		<td bgcolor="#e7e7e7" colspan="4">目前無任何購物資料</td>
      	</tr>
      	<?php
      	}
      	?>
        <tr><td colspan=3>
        <input type="button" value = "上一步" onclick="location.href='merchandise.php?sort=<?=$sort?>'">
        <input type="button" value = "記錄至購物車" onclick="location.href='addItem_in_sql.php'">
        <input type="button" value = "結帳" onclick="location.href='payinfo.php'">
        </br><span style = "color:red"><strong>註：按下記錄至購物車時會將你的購物車資料記錄下來，方便下次登入時檢視</strong></span>
        </td></tr>
      </table>
      </div>
      </div>
      </form>
      </div>
      </div>
      </div>
    <?php }
      ?>
      </div>
      </div>
    </div>
  </div>
</div>
<div id="footer">
	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<p><strong><h4 class="title"><i class="fa fa-home" style="font-size:24px"></i>COMPANY</strong></h4></p>
					<ul class="list-unstyled">
						<li><a href="http://www.ncue.edu.tw/bin/home.php"><small class="footer-link">National ChangHua University of Education</small></a>
					</ul>
				</div>
				<div class="col-xs-12 col-md-3">
					<p><strong><h4 class="title"><i class="fa fa-phone" style="font-size:24px"></i>PHONE</h4></strong></p>
					<small>04-723-2105</small>
				</div>
				<div class="col-xs-12 col-md-3">
					<p><strong><h4 class="title"><i class="material-icons">mail_outline</i>E-MAIL</h4></strong></p>
					<small> s045412@gm.ncue.edu.com</small>
                    <small> s045414@gm.ncue.edu.com</small>
				</div>
				<div class="col-xs-12 col-md-3">
					<p><strong><h4 class="title"><i class="material-icons">people</i>DEVELOPER</h4></strong></p>
					<li><a href="https://www.facebook.com/profile.php?id=100000410046964"><small class="footer-link">Huang Yu Fan</small></a> </li>
					<li><a href="https://www.facebook.com/profile.php?id=100003506098265&fref=ts"><small class="footer-link">Lu Han Zhang</small></a></li>
				</div>
			</div>
		</div>
		<br  / />
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<hr  />
					<div class="site-info">
						<p><small>Copyright © 2017 87nba All rights reserved.</small></p>
					</div><!-- .site-info -->
					<div align="center">
					  <a href="https://www.facebook.com" target="_blank">
							<div class="fd-btn-facebook">
								<i class="fa fa-facebook-official fa-lg"></i> <strong>87nba | </strong><strong>Facebook</strong>
							</div>
					  </a>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div>
</body>
</html>
