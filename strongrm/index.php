<?php
    include_once"../admin/includes/conect.php";

header("refresh:2");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Strong room view</title>
    <link href="css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js" type="text/javascript"></script>

</head>
<body>
<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
    <?php
    $countv = mysql_result(mysql_query("select count(id) from voters WHERE status = 1"),0);
        $offices = mysql_query("select * from office");
    while($row = mysql_fetch_object($offices)){

$cntoff = mysql_result(mysql_query("select count(*) from conts WHERE office ='$row->id'"),0);
        if($cntoff >1) {

            ?>
            <div class="col-lg-4 col-md-4" style="margin-left: 0; margin-right: 0;">
                <div class="panel panel-primary" style="border-radius: 0; padding-bottom: 0; margin: 0;">
                    <div class="panel-heading" style="border-radius: 0;">
                        <p class="panel-title"><?= $row->posname; ?></p>
                    </div>
                    <div class="panel-body" style="padding: 0;">
                        <?php
                        $conts = mysql_query("select * from conts where office = '$row->id'");
                        while ($row1 = mysql_fetch_object($conts)){
                            if($countv <1) {
                                $contperc = 0;
                            }else{

                                $contperc = ($row1->vote / $countv) * 100;

                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="well well-lg" style="margin: 0; padding: 5px;; border-radius: 0;">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"
                                                 style="border-right: 1px solid #cccccc;">
                                                <img src="../admin/<?= $row1->photo ?>" class="img-responsive"/>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <span
                                                    class="text-nowrap"><strong><?= strtoupper($row1->name); ?></strong></span>
                                                <br/>
                                                <span class="text-nowrap" style="font-weight: bold;"><?= $row1->vote; ?>
                                                    out of <?= $countv ?>(<?= number_format($contperc, 2) ?>
                                                    %)</span><br>

                                                <div class="progress progress-striped"
                                                     style="margin: 0; box-shadow: 0 0 5px;">
                                                    <div class="progress-bar" aria-valuenow="<?= floor($contperc) ?>"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         aria-valuetext="<?= $contperc ?>"
                                                         style="width: <?= $contperc ?>%;">

                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <?php
                        }


                        ?>


                    </div>
                    <div class="panel-footer">

                        <?php
                    $nones = mysql_result(mysql_query("select count(*) from votes where cont = '0' and office = '$row->id'"),0);
                        ?>
<strong><?=$nones?> voted none</strong>



                    </div>
                </div>
            </div>
            <?php


        }else{
            //section two
        ?>

            <div class="col-lg-4 col-md-4" style="margin-left: 0; margin-right: 0;">
                <div class="panel panel-primary" style="border-radius: 0; padding-bottom: 0; margin: 0;">
                    <div class="panel-heading" style="border-radius: 0;">
                        <p class="panel-title"><?= $row->posname; ?></p>
    </div>
    <div class="panel-body" style="padding: 0;">
        <?php
        $conts = mysql_query("select * from conts where office = '$row->id'");
        while ($row1 = mysql_fetch_object($conts)) {
            if($countv <1){
                $contperc = 0;
            }else{
                $contperc = ($row1->vote / $countv) * 100;

            }
            $nones = mysql_result(mysql_query("select count(*) from votes where cont = '0' and office = '$row->id'"),0);
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="well well-lg" style="margin: 0; padding: 5px;; border-radius: 0;">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"
                                 style="border-right: 1px solid #cccccc;">
                                <img src="../admin/<?= $row1->photo ?>" class="img-responsive"/>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <span class="text-nowrap"><strong><?= strtoupper($row1->name); ?></strong></span>
                                <br/>
                                                <span class="text-nowrap" style="font-weight: bold;"><?= $row1->vote; ?>
                                                    YES  | <?=$nones?> NO | Out Of <?=$countv?> Votes (<?= number_format($contperc, 2) ?>
                                                    %)</span><br>

                                <div class="progress progress-striped"
                                     style="margin: 0; box-shadow: 0 0 5px;">
                                    <div class="progress-bar" aria-valuenow="<?= floor($contperc) ?>"
                                         aria-valuemin="0" aria-valuemax="100"
                                         aria-valuetext="<?= $contperc ?>"
                                         style="width: <?= $contperc ?>%;">

                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <?php
        }


        ?>


    </div>

</div>
</div>
<?php



//end of section tw

        }
    }

    ?>
    </div>
</div>
</body>
</html>