<?php
$link = mysqli_connect("localhost","root","root123456","group_04");
mysqli_query($link, 'SET CHARACTER SET  utf8');
mysqli_query($link,"SET collation_connection = 'utf8_unicode_ci'");
?>
