
<?php
include_once("includes/conect.php");
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

    <title>Electronic voting system</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

     <link href="../css/dashboard.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="upload-scripts/uploadify.css">
 <script src="../js/jquery.min.js"></script>
    <script src="upload-scripts/jquery.uploadify.min.js"></script>
	<script src="js/wescript.js"></script>
        
        
        <script type="text/javascript">
        $(document).ready(function(){
            		    $("#upphoto").uploadify({
                       'uploader'  : 'upload-scripts/uploadify.php',
                       'swf'  : 'upload-scripts/uploadify.swf',                                                               
                        'cancelImg' : 'upload-scripts/uploadify-cancel.png',
                        'folder'    : 'photos',
                        'auto'      : true,
                       'onUploadSuccess' : function(file, data, response) {
        var path = "photos/"+file.name;
		
        $("#picinput").val(path);
              
        var tmp = "<img width='180' height='200' src='"+path+"' />";
            $("#imgcont").fadeOut(function(){
            $("#imgcont").html(tmp);             
                $("#imgcont").fadeIn(500);
                
                
            
        });
        
        
       
    }  
    
    
    
    
                  });
        
        
            
        });
        
        </script>
    
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
          <a class="navbar-brand" href="./">Electronic Voting- Admin. Portal</a>
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
                <li ><a href="regvoters.php">Register Voters</a></li>
                <li><a href="regoffice.php">Register Offices</a></li>
                <li class="active"><a href="regconts.php">Register Candidates</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="viewvoters.php">View Voters</a></li>

                <li><a href="viewcont.php">View Candidates</a></li>
                <li><a href="result.php">Election Results</a></li>
            </ul>
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row">
        	<div class="alert alert-info" id="regstatus" style="display:none;">
            
            </div>
        </div>
        <div class="row"> 
        <div class=" col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        	<div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span><sup><span class="glyphicon glyphicon-plus"></span></sup>Register Candidate</div>
            <div class="panel-body">
            <form method="post" action="regcan.php" id="frmregcan">
            <div class="row">
            	<div class="col-lg-2 col-md-2">
                <div id="imgcont">
                	<img src="img/photo.jpg" alt="Passport picture" width="180" height="200" /> 
                   </div> 
                    <br/>
                    <input type="file" id="upphoto" />
                
                
                </div>
            
            
            </div>
            
                <div class="row">
            <div class="col-lg-12 col-md-12">
           
            <label class="control-label">Office</label>
            <select class="form-control" name="office">
            	<?php
                $off = mysql_query("select * from office order by posname");
				while($row = mysql_fetch_assoc($off)){
					?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['posname'];?></option>
					
					<?php
					}
				
				?>
            </select>
            
               </div>
            </div>
            
            
            <div class="row">
            <div class="col-lg-12 col-md-12">
           
            <label class="control-label">Full Name</label>
            <input type="text" class="form-control" name="canname" value=""  placeholder="Enter candidate's full name"/>
               </div>
            </div>
                <input type="hidden" id="picinput" name="picinput" value="" />
            </form>
            </div>
            <div class="panel-footer">
            <button type="button" id="btnregcan" class="btn btn-primary">Save</button>
            </div>
            </div>
          <div class="row">
        	<div class="col-lg-12 col-md-12">
            	<div class="alert alert-info" id="regalert" style="display:none;">
                
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
