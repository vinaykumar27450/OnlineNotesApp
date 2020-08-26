<?php
session_start();
include "connection.php";
$id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$id = $_POST['id'];
$note = $_POST['note'];
$time = time();
$sql = "UPDATE notes SET note ='$note', time = '$time' WHERE user_id = '$user_id' AND id='$id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "Error:".mysqli_error($link);
    exit;
}
else{
    echo 1;
}
?>