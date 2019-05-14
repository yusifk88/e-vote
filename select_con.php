<?php
include_once './admin/includes/conect.php';
session_start();
$office = $_GET['office'];
$cont = $_GET['cont'];
$id = $_SESSION['id'];
$test = mysql_query("select * from votes where voter = '$id' and office = '$office'");
if(mysql_num_rows($test)>0){
    mysql_query("update votes set office = '$office',cont = '$cont' where voter = '$id' and office = '$office'");
    
}else{
    mysql_query("insert into votes(voter,office,cont) values('$id','$office','$cont')");    
    
}$ballot = mysql_query("select votes.id, office.posname, votes.office from votes,office where votes.voter = '$id' and votes.office = office.id");
if(mysql_num_rows($ballot) >0){
    while ($row = mysql_fetch_object($ballot)) {
        $cont =  mysql_result(mysql_query("select cont from votes where id = '$row->id' "),0);
        $count_cont = mysql_result(mysql_query("select count(id) from conts where office = '$row->office'"),0);
        if($cont!=0){
            $sbalot = mysql_query("select * from conts WHERE id = '$cont'");
            $myballot = mysql_fetch_object($sbalot);
            $photo = $myballot->photo;
            $name = $myballot->name;
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="alert alert-info" style="padding-top: 0;">
                        <h3 style="border-bottom: 1px solid #ffffff;"><?=$row->posname;?></h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <img height="90" class="img-responsive" src="admin/<?=$photo;?>" />
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <strong>  <?= strtoupper($name);?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="alert alert-info" style="padding-top: 0;">
                        <h3 style="border-bottom: 1px solid #ffffff;"><?=$row->posname;?></h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <strong><?= $count_cont > 1 ? "NONE" :"NO" ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }}}
