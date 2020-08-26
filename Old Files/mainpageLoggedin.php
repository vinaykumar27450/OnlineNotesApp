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
    <li><a href="#">Profile</a></li>
    <li><a href="#">Help</a></li>
    <li><a href="#">Contact Us</a></li>
    <li class="active"><a href="#">My Notes</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="profile.php">Logged in as <strong><span id="username">XYZ</span></strong></a></li>        
    <li><a href="index.php">Logout</a></li></ul>
    </div>
         </div> 
        </nav>
        
      
    
<div class="jumbotron">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
        <div class="col-sm-12">
        <button type="button" class="btn btn-lg btn-info pull-left" id="addnotebtn">Add Note</button>
        <button type="button" class="btn btn-lg btn-info pull-right" id="edit">Edit</button>
        <button type="button" class="btn btn-lg btn-success" id="done">Done</button>       <button type="button" class="btn btn-lg btn-info pull-left" id="allnote">All Notes</button>

        </div>
        <div id="addnotearea">
            <form><textarea class="form-control" id="textarea" rows="10"></textarea>
            </form>
        </div>
        <div id="notes" class="notes">
<!--        Ajax Call    -->
        </div>
        </div>
        </div>
    </div>
</div>
      
  
<!--Footer-->
      <footer class="footer">Developed By Vinay Kumar Copyright &copy; 2020-2021</footer>
      
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>