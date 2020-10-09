<?php
if(!empty($_POST["account"]))
{
  require('link.php');
  $sql = "insert into member_data(account,pwd,pwd2,name,gender,birth,phone,address,email,nickname) values('$_POST[account]','$_POST[pwd]',
  '$_POST[pwd2]','$_POST[name]','$_POST[gender]','$_POST[birth]','$_POST[phone]','$_POST[address]','$_POST[email]','$_POST[nickname]')";
  if($result = mysqli_query($link,$sql)){
     $msg = "<span style='color:blue'><a href=\"member_log_in.php\">立即登入</a></span>";
     $signupsuccess = true;
   }
   else $msg = "<span style = 'color:red'>資料新增失敗!(" .mysqli_error($link) .")</span>";

   mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>會員註冊頁面</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><!--藍色按鈕-->
<script type="text/javascript" src="javascript/checkform.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
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
                alert("註冊成功!");
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
                pwd2: {
                    required: true,
                    equalTo: "#pwd"
                },
				name: {
					required: true,
				},
                gender: {
                    required: true
                },
				birth: {
					required: true
				},
				phone: {
				},
				address: {
				},
				email: {
                    required: true,
                    email: true
                },
				nickname: {
					required: true
				},
                agree: {
                    required: true
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
                pwd2: {
                    equalTo: "與密碼不符"
                },
				name: {
					required: "姓名為必填欄位"
				},
                gender: {
                    required: "請選擇性別"
                },
				birth: {
					required: "請輸入生日(YYYY/MM/DD)",
				},
				email: {
                    required: "請輸入電子郵件",
					email: "格式不合"
                },
				nickname: {
					required: "請輸入暱稱"
				},
                agree: {
                    required: "請詳閱會員合約並勾選同意"
                }
            }
        });
    });

    $(function() { //網頁完成後才會載入
         $('#account').keyup(function() {
             $.ajax({
                 url: "ajx_check_account_jquery.php",
                 data: $('#form1').serialize(),
                 type: "POST",
                 dataType: 'text',
                 success: function(msg) {
                     $("#show_msg").html(msg);//顯示訊息
                     //document.getElementById('show_msg').innerHTML= msg ;
                 },
                 error: function(xhr, ajaxOptions, thrownError) {
                     alert(xhr.status);
                     alert(thrownError);
                 }
             });
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
#bg
{
  height: 100%;
  width: 100%;
  position:absolute;
  top: 10%;
  left: 0%;
  background-image: url(images/87nba.png);
}
.style1 {font-size: 12px}
.style2 {
    font-size: 20px
}
#content {
	background-color: #FFFFFF;
	height: 53%;
	width: 45%;
	position:absolute;
	top: 10%;
	left: 30%;
  background: none;
}
#content_pic{
  position: absolute;
  top: 8%;
  left: 44%;
}
#footer {
  position:absolute;
  top: 115%;
  left: 10%;
  background-color:#F6F6F6;
  height: 0%;
  width: 0%;
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
      <li><a href="member_log_in.php" style="color:white;"><i class="material-icons">perm_identity</i><strong>登入</strong></a></li>
      <li><a href="board.php" style="color:white;"><i class="fa fa-commenting" style="font-size:24px;"></i><strong>留言板</strong></a></li>
      <li><a href="merchandise.php?search=+" style="color:white;"><i class="material-icons">store</i><strong>87商品</strong></a></li>
      <li><a href="#" style="color:white;"><i class="material-icons">info_outline</i><strong>關於我們</strong></a>
      <ul>
      <li><a href="https://www.facebook.com/87nba-137666573465851" style="color:white;"><i class="fa fa-facebook-square" style="font-size:24px"></i> <strong>粉絲專頁</strong></a></li>
      <li><a href="designidea.php" style="color:white;"><i class="fa fa-envira" style="font-size:24px;"></i><strong>經營理念</strong></a></li>
      </ul>
  </ul>
</div>
<form id="form1" name="form1" method="post" action='<?=$_SERVER['PHP_SELF'] ?>'>
<div id="bg">
  <div id="content_pic"><a href="index.php"><img src="images/恩逼欸.png" width="130" height="50" /></a></div>
  <div id="content">
  <table width="760" border="0" >
    <tr>
      <td height="40" colspan="2" align="center" ><span class="style2"><strong>會員資料填寫</strong></span></td>
    </tr>
    <tr>
      <td width="148" height="40" align="right"><label for="account">帳號</label></td>
      <td width="596" height="40"><label>
      <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="account" id="account" height="20" placeholder = "限6-12個字">
        </label><span id="show_msg" style="color:red"></span></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield2">密碼</label></td>
      <td height="40"><label>
      <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="password" class="form-inline" name="pwd" id="pwd" height="20" placeholder = "限6-12個字"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield3">密碼確認</label></td>
      <td height="40"><label>
      <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="password" class="form-inline" name="pwd2" id="pwd2" height="20"placeholder = "請再次輸入密碼"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield4">姓名</label></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="name" id="name" height="20"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><strong>性別</strong></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="radio" name="gender" id="gender1"/>
        男 </label>
        <label> &nbsp;
        <input name="gender" type="radio" id="gender2" />
        <strong>女</label>
        </strong>
        <label for="gender" class = "error"></label>
      </td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield5">生日</label></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="birth" id="birth" height="20"placeholder = "例:1999/09/01"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield6">電話號碼</label></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="phone" id="phone" height="20"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield7">地址</label></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="address" id="address" height="20"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield8">電子郵件</label></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="email" id="email"height="20" />
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><label for="textfield9">暱稱</label></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 20; $i++) echo "&nbsp";?><input type="text" class="form-inline" name="nickname" id="nickname" height="20"/>
        </label></td>
    </tr>
    <tr>
      <td height="40"align="right"><strong>同意會員合約</strong></td>
      <td height="40"><label>
        <?php for($i = 0; $i < 5; $i++) echo "&nbsp";?><textarea name="textarea" cols="45" rows="5" readonly="readonly" id="textarea">1.會員必須是具備完全行為能力的自然人、或合法登記的法人或團體。若會員為未成年人，應由其法定代理人閱讀、暸解、並同意會員合約之所有約定內容及其修改後之內容，始得開始使用或繼續使用本服務；如會員開始使用或繼續使用本服務，即推定其法定代理人已閱讀、暸解、並同意會員合約之所有約定內容及其修改後之內容。

2.恩逼欸得隨時修改會員合約之約定內容，包括修改已經公佈及將來可能公佈之使用規範、辦法、處理原則、政策、及相關服務說明等；修改後之內容，除另有說明者外，自公告時起生效。自生效日起，如會員繼續使用本服務，即視為會員已閱讀、暸解、並同意修改後的所有內容；如會員不同意修改後之內容，恩逼欸得終止合約，且不因此而對會員負任何賠償或補償之責任。 </textarea>
        </label></td>
    </tr>
    <tr>
      <td height="108" colspan="2"align="center"><label>
        <input type="checkbox" name="agree" id="agree" />
        我同意</label>
        <label class="error" for="agree"></label>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        </tr>
  </table>
  </form>
  <?php for($i = 0; $i < 10; $i++) echo "&emsp;"; if($signupsuccess == true) { for($i = 0; $i < 15; $i++) echo "&nbsp;";?>
  <input type="button" class="btn btn-primary" value="立即登入" onclick="location.href='member_log_in.php'">&emsp;
  <?php } else { ?>                  
  <button type="submit" class="btn btn-primary">成為87會員</button>&emsp;
  <?php } ?>
  <?php for($i = 0; $i < 10; $i++) echo "&nbsp;";?>
  <input type="button" class="btn btn-primary" value="87nba首頁" onclick="location.href='index.php'">
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
</body>
</html>
