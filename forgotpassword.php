<?php
session_start();
include "connection.php";
$errors = '';
$email = $_POST['email'];
if(empty($_POST['email'])){
    $errors .="<p>Enter Email Address.</p>";
}
else{
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors .="<p>Invalid Email Address</p>";
    }
}
if($errors){
    echo "<div class='alert alert-danger'>$errors</div>";
}
else{
    $email = mysqli_real_escape_string($link,$email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($link,$sql);
        if(mysqli_error($link)){
            echo "<div class='alert alert-danger'>Error running Query:".mysqli_error($link)."</div>";
            exit;
        }
        if(mysqli_num_rows($result) !==1){
            echo "<div class='alert alert-danger'>Email not exists.</div>";
            exit;
        }
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $user_id = $row['user_id'];
    $key = bin2hex(openssl_random_pseudo_bytes(16));
    $time = time();
    $status = 'pending';
    $sql = "INSERT INTO forgotpassword (`user_id`,`rkey`,`time`,`status`) VALUES ('$user_id','$key','$time','$status')";
    $result = mysqli_query($link,$sql);
    if(mysqli_error($link)){
        echo "<div class='alert alert-danger'>Error running Query:".mysqli_error($link)."</div>";
            exit;
    }
    $message = "Please Click on this link to reset your password:\n\n";
    $message .="http://vinaykumar.host20.uk/Online%20Notes%20App/resetpassword.php?userid=".$user_id."&key=$key";
    if(mail($email,'Reset Your Password',$message,'From:'.'krvinaykr27450@gmail.com')){
        echo "<div class='alert alert-success'>A confirmation Email has been sent to $email. Please click on reset password.</div>";
    }
    
}
?>