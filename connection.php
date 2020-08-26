<?php
$link = @mysqli_connect("localhost","vinaykum_notes","vinaykumar27450","vinaykum_onlinenotes");
if(mysqli_connect_error()){
   die("<div class='alert alert-danger'>Failed to connect to Database<br /><strong>".mysqli_connect_error()."</strong></div>");
}
?>