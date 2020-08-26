<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Password Reset</title>

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
        <h1>Reset Password:</h1>
        
<?php
session_start();
include "connection.php";
if(!isset($_GET['userid'])||!isset($_GET['key'])){
    echo "<div class='alert alert-danger'>There was an error. Please click on the link you received in your registerd Email.</div>";
    exit;
}
else{
    $user_id = urldecode($_GET['userid']);
    $key = $_GET['key'];
    $time = time()-86400;
    $user_id = mysqli_real_escape_string($link,$user_id);
    $key = mysqli_real_escape_string($link,$key);
    
//    $sql = "SELECT user_id FROM forgotpassword WHERE (key='$key' AND user_id='$user_id' AND time > '$time'' AND status='pending')";
//    
$sql = "SELECT * FROM forgotpassword WHERE rkey = '$key' AND time > '$time' AND status='pending'";
    $result = mysqli_query($link,$sql);
    if(mysqli_error($link)){
        echo "<div class='alert alert-success'>Error:".mysqli_error($link)."</div>";
        exit;
    }
    if(mysqli_num_rows($result) !==1){
        echo "<div class='alert alert-danger'>Error Occured! Your Paswword could not be resetted. Please try again later</div>";
        exit;
    }
    else{
        echo "<form method='post' id='resetform'>
        
        <input type=hidden name=key value= $key>
        <input type=hidden name=userid value= $user_id>
        
        <div id='resetmessage'>
        </div>
        <div class='form-group'><label for='password1'>Enter New Password:</label><input type='password' placeholder='Choose a Password' name='password1' id='password2' class='form-control'>
        </div>
        <div class='form-group'><label for='password2'>Confirm Password:</label>
        <input type='password' placeholder='Confirm Password' name='password2' if='password2' class='form-control'>
        </div>
        <button type='submit' name='submit' class='btn btn-lg btn-success'>Reset Password</button>
        <br />
         </form>";
        
    }
}
?>


    </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      <script>
      $("#resetform").submit(function(event){
          
    $("#resetmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    $.ajax({
        url:"storeresetpassword.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data=="success"){
                $("#resetmessage").html("<div class='alert alert-success'><p>Password Resetted</p><br /><a href='index.php'>Login</a></div>");
            }
            else{
                $("#resetmessage").html(data);
            }
        },
        error:function(){
        $("#resetmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});
      
      </script>
  </body>
</html>