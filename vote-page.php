<?php
session_start();
if(!$_SESSION['id'] || !$_SESSION['secode']){
    
    header("location:./");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Electronic Voting System ||Cast your vote</title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/wecss.css" rel="stylesheet" type="text/css" />
        <script src="js/wejs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                show_prog();
                 $.get("my_ballots.php",function(data){
        $("#bilots").fadeOut(100);
        $("#bilots").html(data); 
        $("#bilots").fadeIn(200);
         
     });   
      
                
                $.get("getconts.php",function(data){                
                    $("#vote_area").html(data);
                }).done(function(){hide_prog();});


            });
        </script>
    </head>
    <body>
        <div class="container-fluid" style="padding-top:20px; padding-bottom:20px;">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-lg-offset-1 col-md-offset-1" id="vote_area">
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">Your Ballots</p>                            
                        </div>
                        <div class="panel-body" id="bilots">
                        </div>  

                    </div>
                </div>
                
            </div>
            
        </div>
    </body>
</html>


<div class="load-label" style="display: none;">
    PLEASE WAIT...

</div>