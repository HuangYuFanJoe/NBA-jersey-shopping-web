<?php
session_start();
if(isset($_POST['captcha'])){
  require('link.php');
      if($_POST['account'] != "" && $_POST['pwd'] != "") {
        $sql = "select * from member_data where account='$_POST[account]' and pwd='$_POST[pwd]'";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) == 0)
            $fail = true;
        else
        {
          if( $_POST['captcha'] == $_SESSION['captcha']){
            $_SESSION['login'] = true;
            $_SESSION['account'] = $_POST['account'];
            if($_SESSION['loginboard'] == true)
              header("Location: board.php");
            else
              header("Location: index.php");
          }
          else
           $msg="圖形驗證碼錯誤!";
          mysqli_free_result($result); // 釋放佔用的記憶體
        }
      }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>會員登入頁面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                form.submit();
            },

        rules: {
            account: {
                 required: true,
                 minlength: 6,
                maxlength: 12
            },
            pwd: {
                 required: true,
                 minlength: 6,
                 maxlength: 12
            },
        },
        messages: {
            account: {
                required: "帳號為必填欄位",
                minlength: "帳號最少要6個字",
                maxlength: "帳號最長12個字"
            },
            pwd: {
                required: "密碼為必填欄位",
                minlength: "請輸入密碼長度大於6的字串",
                maxlength: "請輸入密碼長度小於12的字串"
            },
        }
        });
    });
    </script>
<style type="text/css">
.error {
  color: #D82424;
  font-weight: normal;
  font-family: "微軟正黑體";
  display: inline;
  padding: 1px;
}
<style type="text/css">
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
#bg_picture {
  background-image: url(images/bgcurry.JPG);
  height: 60%;
  width: 50%;
  position:absolute;
  top: 17%;
  left: 27%;
}
#log
{
  position:absolute;
  top: 35%;
  left: 30%;
}
#sidebar {
	background-color:#EEEEEE;
	height: 80%;
	width: 16%;
	position:absolute;
	top:10%;
	left:9%;
}
#sidebar tr:hover td{
	background-color:#F6F6F6;
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
#rightsidebar {
  position:absolute;
  top: 10%;
  left: 79%;
  background-color: #F6F6F6;
  height: 70%;
  width: 15%;
}
#footer {
  position:absolute;
  top: 80%;
  left: 10%;
  background-color:#F6F6F6;
  height: 0%;
  width: 0%;
}
.style1 {font-size: 12px}
.style2 {font-size: 20px}
.style3 {font-size: 20px}
.style4 {color: red}
-->
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel='stylesheet' id='bootstrapCSS-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/bootstrap.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='custom-style-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/fedora.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='googleFonts2-css'  href='https://fonts.googleapis.com/css?family=Lato%3A400%2C300%2C700&#038;ver=4.7.4' type='text/css' media='all' />
</head>
<body>
<div id ="title" align="center">
  <ul class="drop-down-menu">
      <li><a href="index.php"><img src="images/恩逼欸.png" width="100px" height="40px" border="0"></a></li>
      <li><a href="member_sign_up.php" style="color:white;"><i class="material-icons">subtitles</i><strong>註冊</strong></a></li>
      <li><a href="board.php" style="color:white;"><i class="fa fa-commenting" style="font-size:24px;"></i><strong>留言板</strong></a></li>
      <li><a href="merchandise.php?search=+" style="color:white;"><i class="material-icons">store</i><strong>87商品</strong></a></li>
      <li><a href="#" style="color:white;"><i class="material-icons">info_outline</i><strong>關於我們</strong></a>
      <ul>
      <li><a href="https://www.facebook.com/87nba-137666573465851" style="color:white;"><i class="fa fa-facebook-square" style="font-size:24px"></i> <strong>粉絲專頁</strong></a></li>
      <li><a href="designidea.php" style="color:white;"><i class="fa fa-envira" style="font-size:24px;"></i><strong>經營理念</strong></a></li>
      </ul>
  </ul>
</div>
<div id="bg_picture">
<div id="log">
<form id="form1" name="form1" method="post" action="">
  <p><?php for($i = 0; $i < 15; $i++) echo "&nbsp";?><a href="index.php"><img src="images/恩逼欸.png" width="100" height="40" /></a></p>
  <p><strong><i class="fa fa-address-card-o" style="font-size:24px;"></i> 帳號 :</strong>
    <label>
    <input type="text" name="account" id="account" style='width:150px;'/>
    </label>
  </p>
  <p><strong>&nbsp;<i class="fa fa-key" style="font-size:24px;"></i> 密碼 :</strong>
    <input type="password" name="pwd" id="pwd" style='width:150px;'/>
  </p>
<p><strong>&nbsp;&nbsp;&nbsp;驗證碼：</strong>
<label>
<input type="text" name="captcha" style='width:100px'>　<img src="captcha.php"> <div align="center" style='color:red'><?=$msg?></div>
</label>
</p>
  <p>
  <?php for($i = 0; $i < 12; $i++) echo "&nbsp";?>
  <button type="submit" class="btn btn-primary">登入</button>&nbsp;&nbsp;&nbsp;
  <input type="button" class="btn btn-primary" value="立即註冊" onclick="location.href='member_sign_up.php'">
  </p>
  <?php if($fail == true) { ?><p><span class="style4"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;輸入的帳號或密碼有誤！</strong></span></p> <?php } ?>
</form>
</div>
</div>
<div id="sidebar" align="center">
  <table width="100%" height="45%" >
      <li><span class="style3" style='color:white'><strong>西區</strong></span></li>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=1">Golden State Warriors</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=2">Los Angeles Lakers</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=3">Huston Rockets</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=4">San Antonio Spurs</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=5">Oklahoma Thunder</a></td>
    </tr>
    </table>
    <table width="100%" height="45%" >
      <p><strong>&nbsp;<span class="style3" style='color:white'>東區</span></strong></p>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=6">Cleveland Cavaliers</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=7">Chicaco Bulls</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=8">Toronto Raptors</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=9">Washington Wizards</a></td>
    </tr>
    <tr>
      <td height="30" align="center">&nbsp;&nbsp;<a href="merchandise.php?sort=10">Boston Celtics</a></td>
    </tr>
  </table>
</div>
<div id="rightsidebar">
  <table width="201" height="277">
    <tr>
      <th height="23" bgcolor="3B5998" class="style3" scope="row" >&nbsp;<span style='color:white'>店長公告</span></th>
    </tr>
    <tr>
      <th class="style14" scope="row"><p class="style19">NBA球衣優惠活動！ </p>
        <p class="style19">A.加入會員購買商品一律87折優惠！</p>
        <p class="style19">&nbsp;</p>
        <p class="style19">B.購買NBA球衣4件起1000一件！</p>
        <p class="style19">&nbsp;</p>
        <p class="style19">C.凡是預測球賽結果比糗爺還精準，就可以獲得九色香雞排一份！還有機會抽30000元獎金！</p>
        <p class="style19">&nbsp;</p>
        <p class="style19">D.全場滿5000元免運費！<br />
全場球衣貨到付款！<br />
如有其它問題，請聯繫線上客服8787nba，感謝！</p>
        <p>&nbsp;</p>
        <p><br />
        </p>
      </th>
    </tr>
  </table>
</div>
<div id="footer">
  <footer id="colophon" class="site-footer" role="contentinfo">
    <br  />
    <br  />
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
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/js/bootstrap.min.js?ver=20151215'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/js/npm.js?ver=20151215'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/js/fedora.js?ver=20151215'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/js/loader.min.js?ver=20151215'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/js/line-button.js?ver=20140411'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/js/navigation.js?ver=20151215'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/themes/fedora-id-v2/js/skip-link-focus-fix.js?ver=20151215'></script>
<script type='text/javascript' src='http://fedora.or.id/wp-includes/js/wp-embed.min.js?ver=4.7.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var countVars = {"disqusShortname":"fedoraid"};
/* ]]> */
</script>
<script type='text/javascript' src='http://fedora.or.id/wp-content/plugins/disqus-comment-system/media/js/count.js?ver=4.7.4'></script>
</body>
</html>
