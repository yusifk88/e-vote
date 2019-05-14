<?php
include_once"includes/conect.php";

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
    <link href="css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/wecss.css" rel="stylesheet" />
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
                <li ><a href="./">Verify Voter<span class="sr-only">(current)</span></a></li>
                <li ><a href="regvoters.php">Register Voters</a></li>
                <li ><a href="regoffice.php">Register Offices</a></li>
                <li><a href="regconts.php">Register Candidates</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="viewvoters.php">View Voters</a></li>
                <li><a href="viewcont.php">View Candidates</a></li>
                <li class="active"><a href="result.php">Election Results</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php
$total = mysql_result(mysql_query("select count(id) from voters where status = 1"),0);

    $office = mysql_query("select id,posname from office");
    while($row = mysql_fetch_object($office)){

        ?>
    <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="panel-title"><?=$row->posname;;?></p>
            </div>
            <div class="panel-body">
    <?php
            $conts = mysql_query("select * from conts where office = '$row->id' ORDER BY vote ASC");
    $count_cont = mysql_num_rows($conts);
    while($row1 = mysql_fetch_object($conts)){
        if($total <1){
            $perc = 0;

        }else{
            $perc = number_format(($row1->vote/$total)*100,2);

        }

        ?>
        <div class="well well-lg">
            <div class="row">
                <div class="col-lg-2 col-md-2"  style="border-right: 1px solid #ccc; text-align: center;">
                    <img height="90" src="<?=$row1->photo;?>"/>
                </div>
                <div class="col-lg-4 col-md-4"  style="border-right: 1px solid #ccc; vertical-align: middle; height: 90px;">
                   <h4><?=strtoupper($row1->name);?></h4>

                </div>
                <div class="col-lg-6 col-md-6">
                    <?php
                    if($count_cont >1) {
                        ?>
                        <h4> <?= $row1->vote; ?> Votes Out Of <?= $total; ?> (<?= $perc; ?>%) </h4>


                        <?php
                    }else{
                        $total_no = mysql_result(mysql_query("select count(id) from votes where office = '$row->id' and cont = 0"),0);

                        ?>

                        <h4><?=$row1->vote?> YES (<?= ($total<1) ? "0%" : number_format(($row1->vote/$total)*100,2);?>%) | <?=$total_no;?> NO (<?= ($total < 1) ? "0%" : number_format(($total_no/$total)*100,2);?>%) out of <?=$total?> Voters</h4>


                        <?php
                    }

                    ?>
                    <div class="progress progress-striped" style="box-shadow: 0 0 3px;">
                    <div class="progress-bar" aria-valuenow="<?= floor($perc);?>" aria-valuemin="0" aria-valuetext="<?=$perc;?>" aria-valuemax="100" style="width: <?=$perc;?>%;"></div>
                </div>
                    </div>
            </div>
        </div>
    <?php
    }

    ?>

            </div>
        <div class="panel-footer">
            <button class="btn btn-primary" onclick="printrslt(<?=$row->id;?>)">print <span class="glyphicon glyphicon-print"></span> </button>
        </div>

        </div>










        <?php
    }



?>



        </div>
    </div>
</div>


<script>
    function printrslt(id){

        window.open("printrslt.php?offid="+id,"Election results","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");

    }



</script>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


</body>
</html>
