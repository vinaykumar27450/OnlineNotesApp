<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Activation Page</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <style>
          .contactForm{
              border:1px solid #7c73f6;
              margin-top:50px;
              border-radius: 15px;
          }
          .btn{
              border-radius: 10px;
          }
      </style>
    
  </head>
  <body>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-offset-1 col-sm-10 contactForm">
        <h1>Activation:</h1>
<?php
session_start();
include "connection.php";
if(!isset($_GET['email'])||!isset($_GET['key'])){
    echo "<div class='alert alert-danger'>There was an error. Please click on the link you received in your registerd Email.</div>";
    exit;
}
else{
    $email = urldecode($_GET['email']);
    $key = $_GET['key'];
    $email = mysqli_real_escape_string($link,$email);
    $key = mysqli_real_escape_string($link,$key);
$sql = "UPDATE users SET activation='Activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
    $result = mysqli_query($link,$sql);
    if(mysqli_affected_rows($link) ==1){
        echo "<div class='alert alert-success'>Your account has been Activated</div>";
        echo "<a href='index.php' class='btn btn-lg btn-success'>Login</a><br />";
    }
    else{
        echo "<div class='alert alert-danger'>Either Your Account is already activated or there was an error. Your account could not be activated. Please try again later</div>";
    }
}
?>


    </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>