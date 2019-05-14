
<?php
include './includes/conect.php';



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

    <link href="../css/bootstrap.min.css" rel="stylesheet">

     <link href="../css/dashboard.css" rel="stylesheet">

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
                <li ><a href="./">Verify Voter<span class="sr-only">(current)</span></a></li>
                <li ><a href="regvoters.php">Register Voters</a></li>
                <li ><a href="regoffice.php">Register Offices</a></li>
                <li><a href="regconts.php">Register Candidates</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="viewvoters.php">View Voters</a></li>

                <li class="active" ><a href="viewcont.php">View Candidates</a></li>
                <li><a href="result.php">Election Results</a></li>
            </ul>
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr>
                            <th   style="text-align:center; vertical-align: middle;">S/N</th>
                            <th  style="text-align:center; vertical-align: middle;">Photo</th>
                            <th  style="text-align:center; vertical-align: middle;">Full Name</th>
                            <th  style="text-align:center; vertical-align: middle;">Office</th>
                            <th  style="text-align:center; vertical-align: middle;">Votes</th>
                            <th  style="text-align:center; vertical-align: middle;">Action</th>
                            
                        </tr>
                        
                        
                        
                    </thead>
                    <tbody>
                        
                    
                    
                             
                
                
                <?php
                
                $i = 0;
                $cont = mysql_query("select conts.id,conts.name,conts.photo,conts.vote,office.posname from conts,office where conts.office = office.id order by office.posname ASC");
                while ($row = mysql_fetch_object($cont)) {
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center; vertical-align: middle;"><?=$i?></td>
                            <td  style="text-align:center; vertical-align: middle;"><img width="90" height="120" alt="<?=$row->name;?>" src="<?=$row->photo;?>" /></td>
                            <td  style="text-align:center; vertical-align: middle;"><?=$row->name;?></td>
                            <td  style="text-align:center; vertical-align: middle;"><?=$row->posname;?></td>
                            <td  style="text-align:center; vertical-align: middle;"><?=$row->vote;?></td>
                            <td  style="text-align:center; vertical-align: middle;"><span style="color:red; cursor:pointer;" class="glyphicon glyphicon-trash" onclick="delconts(<?=$row->id;?>)"></span></td>
                            
                        </tr>
                    
                    <?php
    
                }
                
                ?>
                    </tbody>
                
                
                
                
                
                
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

