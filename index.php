<?php
session_start();
include('connection.php');
if($_SESSION['user_id']&&!$_GET['logout']){
    header("Location:mainpageLoggedin.php");
}
//logout
include('logout.php');
//
//remember me


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Notes App</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link href="style.css" type="text/css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav role="navigation" class="navbar-custom navbar-default navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="index.php">Online Notes</a>
    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>   
    <span class="icon-bar"></span>   
    <span class="icon-bar"></span>    

    </button>
    </div>
    <div class="navbar-collapse collapse" id="navbarCollapse">
    <ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">Help</a></li>
    <li><a href="#">Contact Us</a></li>

    </ul>
<!--    <ul class="nav navbar-nav navbar-right"><li><a href="#login" data-toggle="modal">Login</a></li></ul>-->
    </div>
         </div> 
        </nav>
        
<!--        Login Form-->
      <form method="post" id="loginform">
        <div class="modal" id="login" role="dialog" aria-labelledby="mymodallabel2" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 id="mymodallabel2"><strong>Login:</strong></h4>
    </div>
    <div class="modal-body">
        <div id="loginmessage"></div>
        <div class="form-group"><input type="text" placeholder="Email Address" name="email" class="form-control">
        </div>
        <div class="form-group">
        <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="form-group">
<!--        <input type="checkbox" id="remember" name="rememberme">&nbsp;Remember me-->
        <a class="pull-right" href="#forgot" data-toggle="modal" data-dismiss="modal">Forget Password?</a>
        </div>
        <br />
    </div>
    <div class="modal-footer">
        <button class="btn btn-default pull-left" data-target="#signup" data-toggle="modal" data-dismiss="modal">Register</button>
        <button class="btn btn-success">Login</button>
        <button class="btn btn-default" data-dismiss="modal" id="cancellogin">Cancel</button>
    </div>
</div>
</div>
</div>
        
        </form>   

<!--      Forget Password Form    -->
  
      <form method="post" id="forgotform">
        <div class="modal" id="forgot" role="dialog" aria-labelledby="mymodallabel3" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 id="mymodallabel3"><strong>Forgot Password? Enter Your email address:</strong></h4>
    </div>
    <div class="modal-body">
        <div id="forgotmessage"></div>
        <div class="form-group"><input type="email" placeholder="Email Address" name="email" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-default pull-left" data-target="#signup" data-toggle="modal" data-dismiss="modal">Register</button>
        <button class="btn btn-success">Submit</button>
        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
</div>
</div>
</div>
        
        </form>
      
    
<div class="jumbotron">
    <div class="container-fluid">
        <h1>Online Notes App</h1>
        <h3>Your Notes with you wherever you go.</h3>   
        <h3>Easy to use. Protect all your notes!</h3>
        <button class="btn btn-lg btn-success"href="#login" data-toggle="modal" id="loginbutton">Login</button>
        <button class="btn btn-success btn-lg" data-target="#signup" data-toggle="modal" id="signupbutton">Sign up-It's Free</button>
        
    </div>
</div>
      
      <!--Sign up Form        -->
     <form method="post" id="signupform">
        <div class="modal" id="signup" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 id="mymodallabel">Fill the Details for Sign Up:</h4>
    </div>
    <div class="modal-body">
        <div id="signupmessage">
        
        </div>
        <div class="form-group"><input type="text" placeholder="Username" name="username" class="form-control">
        </div>
        <div class="form-group">
        <input type="text" placeholder="Email Address" name="email" class="form-control">
        </div>
        <div class="form-group">
        <input type="password" placeholder="Choose a Password" class="form-control"  name="password">
        </div>
        <div class="form-group">
        <input type="password" placeholder="Confirm Password" name="password2" class="form-control">
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="signup">Sign Up</button>
        <button class="btn btn-default" data-dismiss="modal" id="cancel">Cancel</button>

    </div>
</div>
</div>
</div>
        
         </form>
    
<!--Footer-->
      <div id="footer">Developed By Vinay Kumar Copyright &copy; 2020-2021</div>
      
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
  </body>
</html>