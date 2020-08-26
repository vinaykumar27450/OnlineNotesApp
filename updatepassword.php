<?php
session_start();
include ("connection.php");
$user_id = $_SESSION['user_id'];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
if(empty($_POST["password"])||empty($_POST["password1"])||empty($_POST["password2"])){
    echo "<div class='alert alert-danger'>All Fields Required.</div>";
    exit;
}
if($password1!==$password2){
    echo "<div class='alert alert-danger'><p>Password does not match.</p></div>";
    exit;
    }
if(!(strlen($_POST["password1"])>6
         and preg_match('/[A-Z]/',$_POST["password1"])
         and preg_match('/[0-9]/',$_POST["password1"])
        )
       ){
    echo "<div class='alert alert-danger'><p>Invalid New Password!<br />Password should be at least 6 characters long and include one capital letter and one number.</p></div>";
    exit;
}
$password = hash('sha256',$password); 
$password1 = hash('sha256',$password1); 
$user_id = mysqli_real_escape_string($link,$user_id);
$sql = "UPDATE users SET password='$password1' WHERE user_id='$user_id' AND password='$password'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error:".mysqli_error($link)."</div>";
    exit;
}
if(mysqli_affected_rows($link) !==1){
    echo "<div class='alert alert-danger'>Either your Current password is incorrect or your new password is same as Current Password.</div>";
    exit;
}
echo "success";
session_destroy();
?>