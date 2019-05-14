<?php
include_once "includes/conect.php";
$offid = $_GET['offid'];
$ofic = mysql_result(mysql_query("select posname from office where id = '$offid'"),0);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap-print.css" type="text/css" />
<title>Election results</title>
    <style type="text/css">
        table, th, tr, td{
            border:1px solid #000 !important;
        }
        @media print{
           table, th, tr, td{
                border:1px solid #000 !important;


            }

        }

    </style>
</head>
    <body>
    <div class="container">
        <h2 class="text-center"><U>TUMU MIDWIFERY TRAINING COLLEGE</U></h2>
        <h4 class="text-center">ELECTION RESULTS FOR 2017/2018 ACADEMIC YEAR (<span class="text-uppercase"><?=$ofic;?>)</span></h4>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">S/N</th>
                            <th class="text-center">CANDIDATE</th>
                            <th>VOTES/PERCENTAGES</th>
                        </tr>

                    </thead>
                    <tbody>
              <?php
              $totvts = mysql_result(mysql_query("select count(*) from voters"),0);


              $totlcnt = mysql_result(mysql_query("select count(*) from voters where status = '1' "),0);

              $validvts = mysql_result(mysql_query("select count(*) from votes where office = '$offid' and cont <> '0'"),0);
              $novts = mysql_result(mysql_query("select count(*) from votes where office = '$offid' and cont = '0'"),0);
              $conts = mysql_query("select * from conts where office = '$offid'");
              $cncont = mysql_num_rows($conts);
             $i = 1;
              if($cncont>1){
                  while($row = mysql_fetch_object($conts)){
                      $perc = ($row->vote/$totlcnt)*100;

?>
<tr>
    <td class="text-center " style="vertical-align: middle;"><?=$i;?></td>
    <td class="text-center"><img src="<?=$row->photo?>" alt="<?=$row->name;?>" width="90" height="100"> <br> <h4 class="text-uppercase"><?=$row->name;?></h4></td>
    <td  style="vertical-align: middle;">
        <h4><?=$row->vote?> OUT OF <?=$totlcnt;?> VOTES (<?=number_format($perc,2)?>%)</h4>

    </td>

</tr>

<?php
         $i++; }
              }else{

              while($row = mysql_fetch_object($conts)) {
                  $perc = ($row->vote / $totlcnt) * 100;
              ?>

          <tr>
              <td class="text-center " style="vertical-align: middle;"><?= $i; ?></td>
              <td class="text-center"><img src="<?= $row->photo ?>" alt="<?= $row->name; ?>" width="90" height="100"> <br> <h4 class="text-uppercase"><?= $row->name; ?></h4>
              </td>
              <td style="vertical-align: middle;">
                  <h4><?= $row->vote;?> YES | <?= $novts; ?> NO (<?= number_format($perc, 2) ?>%)</h4>

              </td>

          </tr>


                  <?php

              $i++; }  }
              ?>

                    </tbody>
              </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p><h3><u>SUMMARY OF ELECTION</u></h3></p>
                <strong>TOTAL NUMBER OF REGISTERED VOTERS:</strong> <?=$totvts;?> <br>
                <strong>TOTAL VOTE TURNOUT :</strong> <?=$totlcnt;?> (<?=number_format(($totlcnt/$totvts)*100,2)?>%) <br>
                <?php

                if($cncont>1){
                    ?>
                    <strong><?=$novts ?> VOTER(S) VOTED NONE UNDER THIS OFFICE</strong>

                    <?php
                }


                ?>
            </div>
        </div>

        <div class="row" style="border-bottom: 1px solid #000;"></div>
        <h3><U>ORDER RESULTS</U></h3>
        <div class="row">
            <div class="col-lg-12 col-md-12">
        <table class="table table-condensed table-striped">
        <?php
        $order = mysql_query("select posname,id from office where id <> '$offid'");
        while($row = mysql_fetch_object($order)){
            ?>
            <tr><th colspan="2"><center><?=strtoupper($row->posname);?></center></th></tr>

            <?php
            $cnts = mysql_query("select name,vote from conts where office = '$row->id' order by vote DESC");
            if(mysql_num_rows($cnts)>1){
            while($row1 = mysql_fetch_object($cnts)){
                $nperc = (($row1->vote/$totlcnt)*100)
            ?>
            <tr>
                <td><h4><?=$row1->name;?></h4></td>
                <td><h4><?=$row1->vote?> OUT OF <?=$totlcnt;?> VOTES (<?=number_format($nperc,2)?>%)</h4>
                </td>
            </tr>
            <?php
        } }else{
                while($row1 = mysql_fetch_object($cnts)) {
                    $nperc = (($row1->vote/$totlcnt)*100);
                $nos = mysql_result(mysql_query("select count(*) from votes WHERE office='$row->id' and cont='0'"),0);
                    ?>

                    <tr>
                        <td><h4><?= $row1->name; ?></h4></td>
                        <td><h4><?= $row1->vote ?> YES ||<?= $nos; ?> NO
                                (<?= number_format($nperc, 2) ?>%)</h4>
                        </td>
                    </tr>


                    <?php
                }
            }}

        ?>
</table>
                </div>
            </div>
        <div class="row" style="border-bottom: 1px solid #000;"></div>


        <div class="row">
            <div class="col-lg-4 col-md-4 pull-left">
                <center>

                <br /> <br/>
              <strong>.......................................................</strong><br/>
               <strong>(CHAIRPERSON, ELECTORAL COMMISSION)</strong>
            </center>

            </div>
            <div class="col-lg-4 col-md-4 pull-right">

                <center>

                    <br /> <br/>
                    <strong>.......................................................</strong><br/>
                   <strong>(POLLING AGENT)</strong>
                </center>

            </div>
        </div>
    </div>
</body>
</html>
