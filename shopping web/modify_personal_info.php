<?php
session_start();
require('link.php');
$account = $_SESSION['account'];
if($_SESSION['login'] != true)
  header("Location: index.php");
if($_POST['newpwd2']!=""){
  $sqlUpdate = "update member_data set pwd = '$_POST[newpwd]', name = '$_POST[newname]', birth = '$_POST[newbirth]',
  phone = '$_POST[newphone]', address = '$_POST[newaddress]', email = '$_POST[newemail]', nickname = '$_POST[newnickname]'
  where account='$account'";
  mysqli_query($link, $sqlUpdate);
  header("Location:index.php");
}
$sql = "select * from member_data where account = '$account'";
$result = mysqli_query($link, $sql);
if($_POST['newnickname'] != ""){
  $_SESSION['nickname'] = $_POST['newnickname'];
  $sql = "update board set guestName = '$_POST[newnickname]' where guestAccount='$account'";
  mysqli_query($link, $sql);
}
$row = mysqli_fetch_assoc($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>修改個人資料</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><!--藍色按鈕-->
<link rel='stylesheet' id='bootstrapCSS-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/bootstrap.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='custom-style-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/fedora.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='googleFonts2-css'  href='https://fonts.googleapis.com/css?family=Lato%3A400%2C300%2C700&#038;ver=4.7.4' type='text/css' media='all' />
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<!--additional method - for checkbox .. ,require_from_group method ...-->
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<script>
    $(document).ready(function($) {
        //for select

        $("#form1").validate({
            submitHandler: function(form) {
                alert("已儲存修改");
                form.submit();
            },

            rules: {
                account: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                newpwd: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                newpwd2: {
                    required: true,
                    equalTo: "#newpwd"
                },
				newname: {
					required: true,
				},
				newbirth: {
					required: true
				},
				newphone: {
				},
				newaddress: {
				},
				newemail: {
                    required: true,
                    email: true
                },
				newnickname: {
					required: true
				},
            },
            messages: {
                account: {
                    required: "帳號為必填欄位",
                    minlength: "帳號最少要6個字",
                    maxlength: "帳號最長12個字"
                },
				newpwd: {
					required: "密碼為必填欄位",
                    minlength: "請輸入密碼長度大於6的字串",
                    maxlength: "請輸入密碼長度小於12的字串"
				},
                newpwd2: {
                    equalTo: "與密碼不符"
                },
				newname: {
					required: "姓名為必填欄位"
				},
				newbirth: {
					required: "請輸入生日(YYYY/MM/DD)",
				},
				newemail: {
                    required: "請輸入電子郵件",
					email: "格式不合"
                },
				newnickname: {
					required: "請輸入暱稱"
				},
            }
        });
    });
    </script>
    <style>
    .error {
    	color: #D82424;
    	font-weight: normal;
    	font-family: "微軟正黑體";
    	display: inline;
    	padding: 1px;
    }
    .CSSTableGenerator {
       margin:auto;
       padding:0px;
       width:60vw;
     }
    .CSSTableGenerator table{
        border-collapse: collapse;
        border-spacing: 0;
        width:100%;
        height:50%;
        margin:0px;padding:0px;
    }
    .CSSTableGenerator tr:last-child td:last-child {
     -moz-border-radius-bottomright:9px;
     -webkit-border-bottom-right-radius:9px;
     border-bottom-right-radius:9px;
    }
    .CSSTableGenerator table tr:first-child td:first-child {
     -moz-border-radius-topleft:9px;
     -webkit-border-top-left-radius:9px;
     border-top-left-radius:9px;
    }
    .CSSTableGenerator table tr:first-child td:last-child {
     -moz-border-radius-topright:9px;
     -webkit-border-top-right-radius:9px;
     border-top-right-radius:9px;

    }
    .CSSTableGenerator tr:last-child td:first-child{
     -moz-border-radius-bottomleft:9px;
     -webkit-border-bottom-left-radius:9px;
     border-bottom-left-radius:9px;

    }
    .CSSTableGenerator tr:hover td{
     background-color:#005fbf;
     color:black;
    }
    .CSSTableGenerator td{
     vertical-align:middle;
     background-color:#e5e5e5;
     border:1px solid #999999;
     border-width:0px 1px 1px 0px;
     text-align:left;
     padding:8px;
     font-size:16px;
     font-family:Arial,微軟正黑體;
     font-weight:normal;
     color:#000000;
    }
    .CSSTableGenerator tr:last-child td{
     border-width:0px 1px 0px 0px;
    }
    .CSSTableGenerator tr td:last-child{
     border-width:0px 0px 1px 0px;
    }
    .CSSTableGenerator tr:last-child td:last-child{
     border-width:0px 0px 0px 0px;
    }
    .CSSTableGenerator tr:first-child td{
    background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%);
      background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
      background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf");
      background: -o-linear-gradient(top,#005fbf,005fbf);
      background-color:#005fbf;
      text-align:center;
      font-size:20px;
      font-family:Arial, 微軟正黑體;
      font-weight:bold;
      color:#ffffff;
    }
    .CSSTableGenerator tr:first-child:hover td{
      background:-o-linear-gradient(bottom, #005fbf 5%, #005fbf 100%);
      background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #005fbf) );
      background:-moz-linear-gradient( center top, #005fbf 5%, #005fbf 100% );
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#005fbf");
      background: -o-linear-gradient(top,#005fbf,005fbf);
      background-color:#005fbf;
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
    #title{
      width: 100%;
    }
    #btn
    {
      position: absolute;
      top:105%;
      left: 35%;
    }
    #info{
      position: absolute;
      top: 15%;
      left: 19%;
    }
    .style1 {font-size: 15px}
    .style2 {font-size: 25px}
    .style3 {font-size: 20px}
    </style>
</head>
<body>
<div id="title" align="center">
  <ul class="drop-down-menu">
    <li><a href="index.php"><img src="images/恩逼欸.png" width="100px" height="40px" border="0"></a></li>
    <li><a href="board.php" style="color:white;"><i class="fa fa-commenting" style="font-size:24px;"></i><strong>留言板</strong></a></li>
    <li><a href="merchandise.php?search=+" style="color:white;"><i class="material-icons">store</i><strong>87商品</strong></a></li>
    <li><a href="#" style="color:white;"><i class="material-icons">info_outline</i><strong>關於我們</strong></a>
    <ul>
    <li><a href="https://www.facebook.com/87nba-137666573465851" style="color:white;"><i class="fa fa-facebook-square" style="font-size:24px"></i> <strong>粉絲專頁</strong></a></li>
    <li><a href="designidea.php" style="color:white;"><i class="fa fa-envira" style="font-size:24px;"></i><strong>經營理念</strong></a></li>
    </ul>
    <li><a href="logout.php" style="color:white;"><i class="material-icons">thumb_down</i><strong>登出</strong></a></li>
    </ul>
  </div>
<div id="info">
<form id="form1" name="form1" method="post" action='<?=$_SERVER['PHP_SELF'] ?>'>
  <div id="content">
    <div class="CSSTableGenerator">
    <table width="760" border="0" >
      <tr>
        <td height="40" colspan="2" ><span class="style2"><strong>修改個人資料</strong></span></td>
      </tr>
      <tr>
        <td width="148" height="40" align="right"><span class="style1">帳號</span></td>
        <td width="596" height="40"><label>
        <?php for($i = 0; $i < 10; $i++) echo "&nbsp";
            echo"$row[account]";
        ?>
          </label></td>
      </tr>
      <tr>
        <td height="40"align="right"><span class="style1">密碼</span></td>
        <td height="40"><label>
        <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
          echo"<input type=\"password\" class=\"form-inline\" name=\"newpwd\" id=\"newpwd\" height=\"20\" style='width:100px;' value=\"$row[pwd]\" placeholder = \"限6-12個字\"/>";
        echo"</label>"."</td>"."</tr>";
        ?>
        <tr>
          <td height="40"align="right"><span class="style1">密碼確認</span></td>
          <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"password\" class=\"form-inline\" name=\"newpwd2\" id=\"newpwd2\" height=\"20\" style='width:100px;'/>";
          echo"</label>"."</td>"."</tr>";
          ?>
        <tr>
        <td height="40"align="right"><span class="style1">姓名</span></td>
        <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"text\" class=\"form-inline\" name=\"newname\" id=\"newname\" style='width:70px;' height=\"20\" value =\"$row[name]\"/>";
          echo"</label>"."</td>"."</tr>";
          ?>
      </tr>
      <tr>
        <td height="40"align="right"><span class="style1">性別</span></td>
        <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp";?><input type="radio" name="gender" id="gender1"disabled/>
          男 </label>
          <label> &nbsp;
          <input name="gender" type="radio" id="gender2" disabled/>
          <strong>女</label>
          </strong>
          <label for="gender" class = "error"></label>
        </td>
      </tr>
      <tr>
        <td height="40"align="right"><span class="style1">生日</span></td>
        <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"text\" class=\"form-inline\" name=\"newbirth\" id=\"newbirth\" style='width:100px;' height=\"20\" placeholder = \"例:1999/09/01\" value =\"$row[birth]\"/>";
          echo"</label>"."</td>"."</tr>";
          ?>
          </label></td>
      </tr>
      <tr>
        <td height="40"align="right"><span class="style1">電話號碼</span></td>
        <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"text\" class=\"form-inline\" name=\"newphone\" id=\"newphone\" style='width:100px;' height=\"20\"/ value=\"$row[phone]\">";
          echo"</label>"."</td>"."</tr>";
          ?>
      <tr>
        <td height="40"align="right"><span class="style1">地址</span></td>
        <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"text\" class=\"form-inline\" name=\"newaddress\" id=\"newaddress\" style='width:300px;' height=\"20\"/ value=\"$row[address]\">";
          echo"</label>"."</td>"."</tr>";
          ?>
      <tr>
        <td height="40"align="right"><span class="style1">電子郵件</span></td>
        <td height="40"><label>
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"text\" class=\"form-inline\" name=\"newemail\" id=\"newemail\" style='width:240px;' height=\"20\" value=\"$row[email]\"/>";
          echo"</label>"."</td>"."</tr>";
          ?>
      <tr>
        <td height="40"align="right"><span class="style1">暱稱</span></td>
        <td height="40">
          <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";
            echo"<input type=\"text\" class=\"form-inline\" name=\"newnickname\" id=\"newnickname\" style='width:80px;' height=\"20\" value=\"$row[nickname]\"/>";
          echo "</td>"."</tr>";
          ?>
    </table>
  </div>
  </form>
  <div id="btn" align="center">
  <input type="submit" class="btn btn-primary" name='button' value="儲存修改" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  <input type="button" class="btn btn-primary" value="返回首頁" onclick="location.href='index.php'">
  </div>
</div>
</div>
</body>
</html>
