<?php
session_start();
include "connection.php";
$errors ='';
$missing = "<p>All Fields are Required.</p>";
$email = $_POST['email'];
$password = $_POST['password'];
if(empty($_POST['email'])||empty($_POST['password'])){
    $errors .=$missing;
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors .="<p>Invalid Email Address.</p>";
}
else{
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $password = filter_var($password,FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($link,$email);
    $password = mysqli_real_escape_string($link,$password);
    $password = hash('sha256',$password);
    $sql = "SELECT * FROM users WHERE (email = '$email' AND password = '$password' AND activation ='Activated') LIMIT 1";
    $result = mysqli_query($link,$sql);
    if(mysqli_error($link)){
        echo "<div class='alert alert-danger'>Error running Query:".mysqli_error($link)."</div>";
        exit;
    }
    if(mysqli_num_rows($result) !==1){
        echo "<div class='alert alert-danger'>Incorrect Email and Password!</div>";
        exit;
    }
    else{
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        if(empty($_POST['remember'])){
            echo "success";
        }
        else{
            $authenticator1 = bin2hex(openssl_random_pseudo_bytes(10));             $authenticator2 = openssl_random_pseudo_bytes(20);
            function f1($a,$b){
                $c = $a . "." . bin2hex($b);
                return $c;
            }
            $cookievalue = f1($authenticator1,$authenticator2);
            setcookie(
            "rememberme",
                $cookievalue,
                time()+15*24*60*60
            );
            function f2($a){
                $b = hash('sha256',$a);
                return $b;
            }
            $f2authenticator2 = f2($authenticator2);
            $user_id = $_SESSION['user_id'];
            $expiration = date('Y-m-d H:i:s',time()+15*24*60*60);
            $sql = "INSERT INTO rememberme (`authenticator1`,`f2authenticator2`,`user_id`,`expires`) VALUES ('$authenticator1','$f2authenticator2','$user_id','$expiration')";
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link)){
                echo "<div class='alert alert-danger'>Error running Query:".mysqli_error($link)."</div>";
                exit;
                }
            else{
                echo "success";
            }
        }
    }
    
    
    
    
}
if($errors){
    echo "<div class='alert alert-danger'>$errors</div>";
} 
?>