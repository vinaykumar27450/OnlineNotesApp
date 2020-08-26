<?php
include "connection.php";
if($_POST['userid']&&$_POST['key']&&$_POST['password1']&&$_POST['password2']){
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $password1 = filter_var($password1,FILTER_SANITIZE_STRING);
    $password2 = filter_var($password2,FILTER_SANITIZE_STRING);

    if($password1 !== $password2){
        echo "<div class='alert alert-danger'><p>Password doesn't Match.</p><div>";
        exit;
    }
    else if(!(strlen($password1)>6
         and preg_match('/[A-Z]/',$password1)
         and preg_match('/[0-9]/',$password1))){
    echo "<div class='alert alert-danger'><p>Invalid Password!<br />Password should be at least 6 characters long and include one capital letter and one number.</p></div>";
    exit;}
    $user_id= $_POST['userid'];
    $key = $_POST['key'];
    $password = $password1;
    $password = hash('sha256',$password);
    $user_id = mysqli_real_escape_string($link,$user_id);
    $key = mysqli_real_escape_string($link,$key);
    $sql = "UPDATE forgotpassword SET status = 'used' WHERE user_id ='$user_id' AND rkey='$key'";
    $result = mysqli_query($link,$sql);
    if(mysqli_error($link)){
        echo "<div class='alert alert-danger'>Error Occured while running the query.".mysqli_error($link)."</div>";
        exit;
    }
    if(mysqli_affected_rows($link) !==1){
        echo "<div class='alert alert-danger'>Key already Used for resetting Password.</div>";
        exit;
    }
    $sql = "UPDATE users SET password = '$password' WHERE user_id ='$user_id'";
    $result = mysqli_query($link,$sql);
    if(mysqli_error($link)){
        echo "<div class='alert alert-danger'>Error Occured while running the query.".mysqli_error($link)."</div>";
        exit;
    }
    if(mysqli_affected_rows($link) !==1){
        echo "<div class='alert alert-danger'>Key Used for resetting Password.</div>";
        exit;
    }
    
    echo "success";
}
else{
    echo "<div class='alert alert-danger'><p>Please enter Password</p><div>";
}
?>