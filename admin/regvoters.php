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

    <title>Electronic voting system</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

     <link href="../css/dashboard.css" rel="stylesheet">
 <script src="../js/jquery.min.js"></script>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	<script src="js/wescript.js"></script>
    
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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li ><a href="./">Verify Voter<span class="sr-only">(current)</span></a></li>
                <li class="active" ><a href="regvoters.php">Register Voters</a></li>
                <li ><a href="regoffice.php">Register Offices</a></li>
                <li><a href="regconts.php">Register Candidates</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="viewvoters.php">View Voters</a></li>

                <li><a href="viewcont.php">View Candidates</a></li>
                <li><a href="result.php">Election Results</a></li>
            </ul>
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        
        <div class="row"> 
        <div class=" col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        	<div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span>Generate IDs</div>
            <div class="panel-body">
            <form method="post" action="genid.php" id="frmgen">
            <div class="row">
            <div class="col-lg-12 col-md-12">
           
            <label class="control-label">School Code</label>
            <input type="text" class="form-control" name="schcode"  placeholder="Enter constant school code"/>
           
            </div>
            </div>
            
             <div class="row">
            <div class="col-lg-6 col-md-6">
        
            <label class="control-label">Start ID</label>
            <input type="text" name="stid" class="form-control"  placeholder="Enter first index number" value="1"/>
            
            </div>
            
             <div class="col-lg-6 col-md-6">
            
            <label class="control-label">End ID</label>
            <input type="text" class="form-control" name="endid"  placeholder="Enter last index number"/>
            </div>
            
             <div class="col-lg-12 col-md-12">
            
            <label class="control-label">Skip IDs</label>
            <input type="text" class="form-control" name="skipid"  placeholder="Enter skiped ids separated by commas"/>
            </div>
            </div>
            </form>
            </div>
            <div class="panel-footer">
            <button type="button" id="btngenids" class="btn btn-primary">Generate</button>
            </div>
            </div>
          <div class="row">
        	<div class="col-lg-12 col-md-12">
            	<div class="alert alert-info" id="status-alert" style="display:none;">
                
                </div>
            
            
            </div>
        
        
        </div>
        </div>
        </div>
             
      
   
        
        
        
        
      </div>
	  </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
