<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
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
      <style>
          #email{
              text-overflow: ellipsis;
              white-space:nowrap ;
              overflow: hidden;
          }
          #email:hover{
              overflow:visible;
/*              background: transparent*/
          }
/*
          .email{
              width:100%;
              height:100%;
          }
          .password{
              float:left;
          }
*/
      </style>
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
    <li class="active"><a href="#">Profile</a></li>
    <li><a href="#">Help</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="mainpageLoggedin.php">My Notes</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="profile.php">Logged in as <strong><span id="username"><?php session_start(); echo $_SESSION['username']; ?></span></strong></a></li>        
    <li><a href="index.php?logout=1">Logout</a></li></ul>
    </div>
         </div> 
        </nav>
        

    
<div class="jumbotron">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
        <div class="col-sm-12">
       <h2>General Account Settings:</h2>
<hr>
        </div>
        <div id="aboutsection">
            <div class="col-sm-4">
            <p>Username:</p>
            </div>
            <div class="col-sm-8">
            <p id="username" class="about" data-target="#editusername" data-toggle="modal"><?php session_start(); echo $_SESSION['username']; ?></p></div>
            <div class="col-sm-4">
            <p>Email:</p>
            </div>
            <div class="col-sm-8">
            <div class="email">
            <p id="email" class="about" data-target="#editemail" data-toggle="modal"><?php session_start(); echo $_SESSION['email']; ?></p>
                </div></div>
            <div class="col-sm-4 password">
            <p>Password:</p>
            </div>
            <div class="col-sm-8">
            <p id="password" class="about" data-target="#editpassword" data-toggle="modal">Hidden</p>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
      
<!--      Update Username Form-->
      
      <form method="post" id="editusernameform">
        <div class="modal" id="editusername" role="dialog" aria-labelledby="editusernamelabel" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 id="editusernamelabel">Edit Username:</h4>
    </div>
    <div class="modal-body">
        <div id="editusermessage"></div>
        <div class="form-group">
        <label for="updateusername">Username:</label>    
        <input type="text" placeholder="Username" name="updateusername" class="form-control">
        </div>
        
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" >Submit</button>
        <button class="btn btn-default cancel" data-dismiss="modal">Cancel</button>

    </div>
</div>
</div>
</div>
        
         </form>
      
<!--      Update Email Form-->
      
      <form method="post" id="editemailform">
        <div class="modal" id="editemail" role="dialog" aria-labelledby="editemaillabel" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 id="editemaillabel">Enter New Email Address:</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
        <div id="editemailmessage"></div>    
        <input type="text" placeholder="<?php session_start(); echo $_SESSION['email']; ?>" name="updateemail" class="form-control">
        </div>
        
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" >Submit</button>
        <button class="btn btn-default cancel" data-dismiss="modal">Cancel</button>

    </div>
</div>
</div>
</div>
        
         </form>
      
<!--      Update Password Form-->
      
      <form method="post" id="editpasswordform">
        <div class="modal" id="editpassword" role="dialog" aria-labelledby="mymodallabel" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4 id="mymodallabel">Enter Current and New Password:</h4>
    </div>
    <div class="modal-body">
        <div id="editpasswordmessage"></div>
        <div class="form-group">
        <input type="password" placeholder="Your Current Password" class="form-control"  name="password">
        </div>
        <div class="form-group">
        <input type="password" placeholder="Choose a Password" class="form-control"  name="password1">
        </div>
        <div class="form-group">
        <input type="password" placeholder="Confirm Password" name="password2" class="form-control">
        </div>
        
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" >Submit</button>
        <button class="btn btn-default cancel" data-dismiss="modal">Cancel</button>

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
      <script src="profile.js"></script>
  </body>
</html>