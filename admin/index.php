<?php

$con = mysqli_connect('localhost','root','') or die("Could not reach the server");

$dbtest = mysqli_select_db($con,"evotedb");
if(!$dbtest){
    include_once("crtdb.php");



}




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>WESoft.-Electronic voting system</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

     <link href="css/dashboard.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="js/wescript.js" type="text/javascript"></script>
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Electronic Voting- Admin. Portal </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Strong Room</a></li>
            <li><a href="#">Voters Portal</a></li>
            <li><a href="#">Public View</a></li>
           
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Verify Voter<span class="sr-only">(current)</span></a></li>
            <li><a href="regvoters.php">Register Voters</a></li>
            <li><a href="regoffice.php">Register Offices</a></li>
            <li><a href="regconts.php">Register Candidates</a></li>
          </ul>
          <ul class="nav nav-sidebar">
              <li><a href="viewvoters.php">View Voters</a></li>

              <li><a href="viewcont.php">View Candidates</a></li>
            <li><a href="result.php">Election Results</a></li>
            </ul>
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="panel panel-primary">
                
                <div class="panel-heading">
                    <p>Verify Voter <span class="glyphicon glyphicon-check"></span></p>
                    
                </div>
                
                <div class="panel-body">
                    
                    <div class="well well-lg">
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <label class="control-label">ID Number</label>
                                    <input id="index" type="text" class="form-control input-lg" placeholder="Enter ID number to verify" />
                                    
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="control-label">Security code</label>
                                    <input style="color:red; font-weight:bold;" id="code" type="text" class="form-control input-lg" readonly="" />
                                    
                                </div>  
                            </div>
                            <br/>
                            
                            <button onclick="get_keycode();" type="button" class="btn btn-primary">Verify</button>
                            
                            <label id="wait_label" class="text-danger" style="display:none;">Please Wait...</label>
                            
                            
                        </form>
                        
                        
                        
                        
                    </div>
                    
                    
                </div>
                
            </div>
            
            
            
            
      </div>
	  </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
