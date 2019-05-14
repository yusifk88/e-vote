<?php
include_once"../admin/includes/conect.php";
header("refresh:1, ./");
?>

<!DOCTYPE HTML >
<html>
    <head>
        <title>Electronic voting-Public Dashboard</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/jquery.min.js" type="text/javascript"></script>

    </head>
<body>
    <div class="container" style="margin-top: 120px;;;">
        <div class="row" style="border-bottom: 1px solid #333;">
            <div class="col-lg-12 col-md-12">
                <center>
                <h1>PUBLIC DASHBOARD</h1>
                    </center>
            </div>
        </div>
        <hr style="color: #080808;">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php
        $regvtrs = mysql_result(mysql_query("select count(id) from voters"),0);
        $total_tnout = mysql_result(mysql_query("select count(id) from voters where status = 1"),0);
        $perc = ($total_tnout/$regvtrs)*100;
        ?>
        <h2>TOTAL NUMBER OF REGISTERED VOTERS: <?=$regvtrs;?></h2>
        <h2>CURRENT TOTAL VOTE TURNOUT: <?=$total_tnout;?> (<?=number_format($perc,2)?>%)</h2>
        <h2>TOTAL REMAINING VOTES: <?=($regvtrs-$total_tnout);?> (<?=number_format(100-$perc,2)?>%)</h2> <br clear="all">
        <div class="progress progress-striped" style="height: 60px; box-shadow: 0 0 10px;">
            <div class="progress-bar" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?=floor($perc)?>" style="width: <?=$perc?>%"></div>

        </div>


    </div>

</div>
    </div>
</body>
</html>