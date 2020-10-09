<?php
$file=fopen("passenger.txt", "r");
$num=fgets($file);
fclose($file);
$num++;
$file=fopen("passenger.txt", "w");
fwrite($file, $num);
fclose($file);
$page=$_GET['page'];
session_start();
require('link.php');
  $sql = "select * from merchandise_data";
  $result = mysqli_query($link, $sql);
  $content_sql = "select * from merchandise_data ";
  $content_result = mysqli_query($link, $content_sql);
  if($_SESSION['login'] == true)
  {
      $account = $_SESSION['account'];
      $sql_member = "select * from member_data where account = '$account'";
      $result_member = mysqli_query($link, $sql_member);
      $member_row = mysqli_fetch_assoc($result_member);
      $_SESSION['nickname'] = $member_row['nickname'];
  }
  $pic_amt=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>87nba</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
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
	top: 85%;
	left: 2%;
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
	background-color:#EEEEEE;
	height: 78%;
	width: 16%;
	position:absolute;
	top:93%;
	left:3%;
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
.style13 {color: #FFFFFF; font-size: 15px}
#content {
	background-image: url(images/bgcurry.JPG);
	width: 61%;
  height: 77%;
	position:absolute;
	top: 85%;
	left: 21%;
}
#rightsidebar {
	position:absolute;
	top: 85%;
	left: 83%;
	background-color: #EEEEEE;
	height: 75%;
	width: 200px;
}
.style14 {color: #333333}
#footer {
	position:absolute;
	top: -50%;
	left: 0%;
}
.style16 {color: #FFFFFF; font-weight: bold; }
#passenger {
	position:absolute;
	top: 7%;
	left: 70%;
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
  left: 87%;
}
-->
</style>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel='stylesheet' id='bootstrapCSS-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/bootstrap.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='custom-style-css'  href='http://fedora.or.id/wp-content/themes/fedora-id-v2/assets/css/fedora.min.css?ver=4.7.4' type='text/css' media='all' />
<link rel='stylesheet' id='googleFonts2-css'  href='https://fonts.googleapis.com/css?family=Lato%3A400%2C300%2C700&#038;ver=4.7.4' type='text/css' media='all' />
<style type="text/css">
<!--
.style19 {font-size: 16px}
.style3 {font-size: 20px}
-->
</style>
</head>
<body>
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
  <li><a href="merchandise.php?search=+" style="color:white;"><i class="material-icons">store</i><strong>87商品</strong></a></li>
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
<span style = "color:black">Hi , <?=$member_row['nickname']?>&nbsp;&nbsp;<a href="modify_personal_info.php" class="style1">
<i class="fa fa-pencil" style="font-size:14px;"></i>修改個人資料</a></span>
<?php } ?>
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
<div id="passenger"><small>訪客人數 : <?php echo $num + "人"?><small></div>
<div id="welcome_pic"><p><img src="images/allstar.jpg" width="100%" height="450" /></p></div>
<div id="content"><span style="color:black;">
<p>&nbsp;</p>
<p style="font-size:20px;" align="center"><strong><img src="images/恩逼欸.png" width="100px" height="40px"></img> 經營理念 : 誠實苦幹、創新求進</strong ></p><p>&nbsp;</p>
<p><strong>「三好一公道」</strong><br>
是87企業最為重視的經營信念，奠定了87企業「誠實苦幹創新求進」經營理念基石！</p><p>&nbsp;</p>

<p><strong>「誠實」</strong><br>
的內涵在於「以『誠』立身、以『實』待人」。</p><p>&nbsp;</p>

<p><strong>「苦幹」</strong><br>
是敬業精神，創業者以身作則，潛移默化地影響每位統一人，以「積極進取」和「無私付出」 的人生觀，來迎接每一項的挑戰。</p><p>&nbsp;</p>

<p><strong>「創新」</strong><br>
以領先的思維及經營模式，勇於開創未來，以因應時代趨勢，提昇競爭力。</p><p>&nbsp;</p>

<p><strong>「求進」</strong><br>
創新必須周全計劃、執行力與效率三者全力配合，以達「求進」之目的，除滿足社會大眾對物質及品質的需求外，更進一步期許貼近精神、文化、心靈的亟求。</p><p>&nbsp;</p>
</span></div>
  <div id="rightsidebar">
  <table width="201" height="277">
    <tr>
      <th height="30" bgcolor="3B5998" class="style13" scope="row">&nbsp;店長公告！！</th>
    </tr>
    <tr>
      <th class="style14" scope="row"><p class="style19">&nbsp;NBA球衣優惠活動！ </p>
        <p class="style19">&nbsp;A.加入會員購買商品一律87折優惠！</p><br><br>
        <p class="style19">&nbsp;B.購買NBA球衣4件起1000一件！</p><br><br>
        <p class="style19">&nbsp;C.凡是預測球賽結果比糗爺還精準，就可以獲得九色香雞排一份！還有機會抽30000元獎金！</p><br><br>
        <p class="style19">&nbsp;D.全場滿5000元免運費！<br />
全場球衣貨到付款！<br />
如有其它問題，請聯繫線上客服8787nba，感謝！</p>
      </th>
    </tr>
  </table>
</div>
<div id="sch">
  		<form class="search-form" action="merchandise.php">
					<label>
							 <input type="text" class="search-field" placeholder="Search …" name="search"/>
					</label>
							  <input type="submit" class="fd-btn-search" value="Search" />
      </form>
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
