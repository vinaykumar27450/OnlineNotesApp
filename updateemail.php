<?php
session_start();
include "connection.php";
$user_id = $_SESSION['user_id'];
$email = $_POST['updateemail'];
$email = str_replace(' ', '', $email);
$email = filter_var($email,FILTER_SANITIZE_EMAIL);
if(empty($email)){
    echo "<div class='alert alert-danger'>Enter Email</div>";
    exit;
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    echo "<div class='alert alert-danger'>Invalid Email Address.</div>";
    exit;
}

if(strlen($email) < 6){
    echo "<div class='alert alert-danger'>Email should be at least 6 character long.</div>";
    exit;
}
$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND email = '$email'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error:".mysqli_error($link)."</div>";
    exit;
}
if(mysqli_num_rows($result) ==1){
    echo "<div class='alert alert-danger'>Email already Exist.</div>";
    exit;
}
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "UPDATE users SET email = '$email' , activation ='$activationKey' WHERE user_id = '$user_id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error:".mysqli_error($link)."</div>";
    exit;
}
//$_SESSION['email']=$email;
session_destroy();
$message = "Please Click on this link to activate your account:\n\n";
    $message .="http://vinaykumar.host20.uk/Online%20Notes%20App/activate.php?email=".urlencode($email)."&key=$activationKey";
    if(mail($email,'Confirm your Registration',$message,'From:'.'krvinaykr27450@gmail.com')){
        echo "<div class='alert alert-success'>A confirmation Email has been sent to $email. Please click on activation link to verify your account.</div>";
    }
?>