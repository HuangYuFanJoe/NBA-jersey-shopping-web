<?php
$account =  trim($_POST['account']) ;
require("link.php");
$sql = "SELECT * from member_data where account='$account'";
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link,"SET collation_connection = 'utf8_unicode_ci'");
if ( $result = mysqli_query($link, $sql) ) {
  if( $row = mysqli_fetch_assoc($result) ) echo "此帳號已存在";
    mysqli_free_result($result);
}
mysqli_close($link);
?>
