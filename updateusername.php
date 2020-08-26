<?php
session_start();
include "connection.php";
$user_id = $_SESSION['user_id'];
$username = $_POST['updateusername'];
$username = filter_var($username,FILTER_SANITIZE_STRING);
$username = str_replace(' ', '', $username);
if(empty($username)){
    echo "<div class='alert alert-danger'>Enter Username</div>";
    exit;
}
if(strlen($username) < 6){
    echo "<div class='alert alert-danger'>Username should be at least 6 character long.</div>";
    exit;
}
$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND username = '$username'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error:".mysqli_error($link)."</div>";
    exit;
}
if(mysqli_num_rows($result) ==1){
    echo "<div class='alert alert-danger'>Username already Exist.</div>";
    exit;
}
$sql = "UPDATE users SET username = '$username' WHERE user_id = '$user_id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error:".mysqli_error($link)."</div>";
    exit;
}
echo "<div class='alert alert-success'>Username Changed Successfully</div>";
$_SESSION['username']=$username;
?>