  <?php
  session_start();
  $page=$_GET['page'];
  $num=$_GET['num'];
  $Renum=$_GET['Renum'];
  $delID=$_GET['delID'];
  $fixID=$_SESSION['editID'];
  $nickname = $_SESSION['nickname'];
  $account = $_SESSION['account'];
  $ReID = $_SESSION['ReID'];
  require('link.php');
  $sql = "SELECT * FROM member_data where account = '$account'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  if($_SESSION['login'] != true)
    $_SESSION['loginboard'] = true;
  else
    $_SESSION['loginboard'] = false;
  if(isset($_POST[guestContent])){
    if($account == 'rootroot')
      $sqlInsert = "insert into board value(NULL, '$account','$row[nickname]', NOW(), '$_POST[guestContent]','', NULL, '1')";
    else
      $sqlInsert = "insert into board value(NULL, '$account','$row[nickname]', NOW(), '$_POST[guestContent]','', NULL, '0')";
    if($result = mysqli_query($link, $sqlInsert)) $msg = "<span style = 'color:blue'>留言成功!!!</span>";
    else  $msg = "<span style = 'color:red'>新增資料失敗!!! (". mysqli_error($link) . ")</span>";
    require('referer.php');
  }
  if(isset($_POST[editContent])){
  ?>
      <script>
      alert("編輯成功!");
      </script>
      <?php
    $sqlUpdate = "update board set guestContent = '$_POST[editContent]', guestTime = NOW() where guestID='$fixID'";
    if(mysqli_query($link, $sqlUpdate)) $msgUpdate = "<span style = 'color:blue'>修改成功!!!</span>";
    else  $msgUpdate = "<span style = 'color:red'>修改失敗!!! (". mysqli_error($link) . ")</span>";
    //require('referer.php');
  }
  if(isset($_POST[ReplyContent])){
    $sqlRe = "update board set ReplyContent = '$_POST[ReplyContent]', ReplyTime = NOW() where guestID='$ReID'";
    if(mysqli_query($link, $sqlRe)) $msgRe = "<span style = 'color:blue'>修改成功!!!</span>";
    else  $msgRe = "<span style = 'color:red'>修改失敗!!! (". mysqli_error($link) . ")</span>";
    //require('referer.php');
  }
  if($delID){
    ?>
      <script>
      alert("刪除成功!");
      </script>
      <?php
      $sqlDel = "update board set guestContent = '<span style = \"color:red\"><strong>已被刪除的留言</strong></span>' where guestID='$delID'";
      if(mysqli_query($link, $sqlDel)) $msgRe = "<span style = 'color:blue'>修改成功!!!</span>";
      else  $msgRe = "<span style = 'color:red'>修改失敗!!! (". mysqli_error($link) . ")</span>";
      require('referer.php');
  }
  //$sql = "select * From board "
  $sql="SELECT * FROM board where guestAccount = 'rootroot'
        union all
        SELECT * FROM board where guestAccount != 'rootroot'";
  $data = mysqli_query($link,$sql);
  mysqli_close($link);
 ?>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                alert("留言成功");
                form.submit();
            },
            rules: {
                guestContent: {
                    required: true,
                },
            },
            messages: {
                guestContent: {
                    required: "請輸入文字",
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
.top{
 margin:auto;
 width:60vw;
 text-align:right;
 padding:15vh 0 0 0;
 font-family:微軟正黑體;
}
/*.nav{
 background-color:#339;
 padding: 10px 0px;
 }*/
.nav a {
  color: #5a5a5a;
  font-size: 11px;
  font-weight: bold;
  text-transform: uppercase;
}

.nav li {
  display: inline;
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
 color:white;
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
#container {
  position:absolute;
	top: 10%;
  left: 20%;
}
#no_account{
  position: absolute;
  top:100%;
  left: 0%;
}
.style1 {font-size: 12px}
.style3 {font-size: 20px}
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
</style>
</head>
<body>
  <div id="title" align="center">
    <ul class="drop-down-menu">
    <?php  if($_SESSION['login'] != true) { ?>
        <li><a href="index.php"><img src="images/恩逼欸.png" width="100px" height="40px" border="0"></a></li>
        <li><a href="member_log_in.php" style="color:white;"><i class="material-icons">perm_identity</i><strong>登入</strong></a></li>
        <li><a href="member_sign_up.php" style="color:white;"><i class="material-icons">subtitles</i><strong>註冊</strong></a></li>
        <li><a href="merchandise.php?search=+" style="color:white;"><i class="material-icons">store</i><strong>87商品</strong></a></li>
        <li><a href="#" style="color:white;"><i class="material-icons">info_outline</i><strong>關於我們</strong></a>
        <ul>
        <li><a href="https://www.facebook.com/87nba-137666573465851" style="color:white;"><i class="fa fa-facebook-square" style="font-size:24px"></i> <strong>粉絲專頁</strong></a></li>
        <li><a href="designidea.php" style="color:white;"><i class="fa fa-envira" style="font-size:24px;"></i><strong>經營理念</strong></a></li>
        </ul>
        </ul>
    <?php } else { ?>
      <li><a href="index.php"><img src="images/恩逼欸.png" width="100px" height="40px" border="0"></a></li>
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
<div align="center">
<div class="container" id="container">
  <span style="font-size:30pt;color:#000000;font-weight:bold"><a href="index.php"><img src="images/恩逼欸.png" width="130" height="50" /></a>留言版</span>
  <div class="CSSTableGenerator">
      <table style="text-align:center;">
        <tr>
          <td>留言編號</td>
          <td>暱稱</td>
          <td>留言內容</td>
          <td>版主回復</td>
        </tr>
        <?php
          $total_records=mysqli_num_rows($data);
          $total_page = ceil($total_records / 8);
          mysqli_data_seek($data,($_GET['page']-1)*8);

        for($i=0;$i<8;$i++){
          $row = mysqli_fetch_array($data);
          if($row[guestID]!=NULL){
            echo"<tr>";
            echo"<td width='5%'>$row[guestID]</td>";
            if($account == $row[guestAccount])
              echo"<td width='15%' ><span style = 'color:blue'><strong>$row[guestName]</span></strong></td>";
            else
              echo"<td width='15%' >$row[guestName]</td>";
              if($num==$row[guestID]){
              $_SESSION['editID']=$num;
              echo "<td width='40%'>
              <form id='form2' action='board.php?page=$page' method='post'>
                <textarea name='editContent' rows='5'>$row[guestContent]</textarea>
                <input  type='submit' name='button' value='確定修改'>
              </form>
              </td>";
            }
            else if($account == $row[guestAccount]){
              $editID=$row[guestID];
              if($row[guestContent] == '<span style = "color:red"><strong>已被刪除的留言</strong></span>'){
                echo"<td width='40%'>$row[guestContent]<br>($row[guestTime])</td>";
              }
              else{
                echo"<td width='40%'>$row[guestContent]<br>($row[guestTime])
                <input type='button' value='我要修改'  onclick='location.href=\"board.php?num=$editID&page=$page\"'>
                <input type='button' value='刪除留言'  onclick='location.href=\"board.php?delID=$editID&page=$page\"'>
                </td>";
              }
             }
            else if($account == 'rootroot'){
              $delID=$row[guestID];
              if($row[guestContent] == '<span style = "color:red"><strong>已被刪除的留言</strong></span>'){
                echo"<td width='40%'>$row[guestContent]<br>($row[guestTime])</td>";
              }
              else{
                echo"<td width='40%'>$row[guestContent]<br>($row[guestTime])
                <input type='button' value='刪除留言'  onclick='location.href=\"board.php?delID=$delID&page=$page\"'>
                </td>";
              }
            }
            else{
              echo"<td width='40%'>$row[guestContent]($row[guestTime])</td>";
            }
            if($account == 'rootroot' && $Renum == $row[guestID]){
              $_SESSION['ReID']=$Renum;
              echo "<td width='40%'>
              <form id='form3' action='board.php?page=$page' method='post'>
                <textarea name='ReplyContent' rows='5'>$row[ReplyContent]</textarea>
                <input  type='submit' name='button' value='確定回復'>
              </form>
              </td>";
            }
            else if($account == 'rootroot' && $row[ReplyContent] == NULL){
              $ReplyID=$row[guestID];
              echo"<td width='40%'>
              <input type='button' value='回復' onclick='location.href=\"board.php?Renum=$ReplyID&page=$page\"'>
              </td>";
            }
            else if($row[ReplyContent] != NULL){
              if($account == 'rootroot'){
                $ReplyID=$row[guestID];
                echo"<td width='40%'>$row[ReplyContent]<br>($row[ReplyTime])<input type='button' value='修改留言' onclick='location.href=\"board.php?Renum=$ReplyID&page=$page\"'></td>";
              }
              else {
                echo"<td width='40%'>$row[ReplyContent]<br>($row[ReplyTime])</td>";
              }
            }
            else {
              echo"<td width='40%'><br></td>";
            }
            echo"</tr>";
          }
        }
        mysqli_free_result($data); // 釋放佔用的記憶體
        mysqli_close($link); // 關閉資料庫連結

        if($total_records != 0){
          echo "<tr> <td colspan = '4'>";
          echo "<div align = 'center'>";
          $pre_page=$page-1;
          $next_page=$page+1;
          if($page > 1)
            echo "<a href='board.php?page=$pre_page'>上一頁</a>&nbsp;&nbsp;";
          for($j = 1; $j <= $total_page; $j++){
            if($j == $_GET['page']) echo "<span style = 'color:#4c4c4c'>$j</span>&nbsp;&nbsp;";
            else echo "<a href = 'board.php?page=$j'> $j </a>&nbsp;&nbsp;";
          }
          if($next_page <= $total_page)
            echo "<a href='board.php?page=$next_page'>下一頁</a>&nbsp;&nbsp;";
          echo "</td><tr>";
          echo "</div>";
        }
        ?>
        </table>
 </div>

<?php echo "<form id='form1' action='board.php?page=$total_page' method='post'>";?>
  <?php
    if(isset($account)){
      ?>
  <h1>提出問題</h1>
  <p>
    為保障會員交易安全，留言請勿填寫個人資料、外部連結或任何導私下交易之內容，否則您送出的內容可能無法正常顯示。
  </p>
  <div>

    <div align="center">
        <textarea name="guestContent" cols = "60" rows="10" id="questionTextarea" ></textarea>
        <div><span class="">(250個中文字以內)</span></div>
      </div>
    <div >
      <input  type="submit" name="button" value="提出問題" />
      <input  type="reset" name="reset" value="重新填寫" />
    </div>
  </div>
    <?php } else { ?>
    <div id = "no_account" style="width:100%;height:20%;background-color:#D4E6F8;">
      　<div style="background-color:#ffffff;width:90%;height:70%;">
          </br>
　         想要留言嗎，請先<a href="member_log_in.php">登入</a>或<a href="member_sign_up.php">註冊</a>
　      </div>
    </div>

  <?php } ?>


</form>
<span> <?php echo "$msg"; ?> </span>
</div>
</body>

</html>
