
<?php
include_once "includes/conect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>WESoft.-Electronic voting system</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>
    <script src="js/wescript.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var scrnh =  screen.height-350;

    $(".table").dataTable({
        stateSave: true,
        "scrollY":        scrnh+"px",
        "scrollCollapse": true

    });

            $(".delicon").click(function(){
                var self = $(this);
                var id = $(this).attr("data-id");
                $.get("delvoter.php?id="+id,function(){
                    self.parent().parent().remove();
                });


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
                <li class="active"><a href="viewvoters.php">View Voters</a></li>

                <li><a href="viewcont.php">View Candidates</a></li>
                <li><a href="result.php">Election Results</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <table class="table table-striped table-hover">
               <thead>

               <tr>
               <th>Voter ID</th>
                   <th>Voter Status</th>
                   <th>Action</th>

               </tr>

               </thead>
               <tbody>
                <?php
                $voters = mysql_query("select * from voters order by indexnum ASC ");
                    while($row= mysql_fetch_object($voters)){
                        
                       ?> 
                        <tr>
                            <td><?=$row->indexnum;?></td>
                            <td><?=($row->status == 0) ? "Not Voted" : "Voted";?></td>
                            <td>
                                <span data-id="<?=$row->id;?>"  class="delicon glyphicon glyphicon-trash" style="color: red; cursor:pointer;"></span>
                                
                                
                            </td>
                            
                        </tr>
                        <?php
                    }
               
                ?>
               
               
               
               </tbody>
           </table>

        </div>
    </div>
</div>


</body>
</html>
