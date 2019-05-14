<?php
include_once './admin/includes/conect.php';
session_start();
$id = $_SESSION['id'];
$page_query =  mysql_num_rows(mysql_query("select id from office where office.id not in (select office from votes where voter = '$id')"));
$per_page = 1;
$pages = ceil($page_query/$per_page);
$page = ( isset($_GET['page'])) ? (int) $_GET['page']:1;
$start = ($page-1) * $per_page;
$offices = mysql_query("select id,posname from office where office.id not in (select office from votes where voter = '$id') LIMIT ".$start.",". $per_page);
if(mysql_num_rows($offices)>0){
while ($row = mysql_fetch_object($offices)) {
    ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title"><?=$row->posname;?></h2>
    </div>
    <div class="panel-body">
        <?php
    $conts = mysql_query("select * from conts where office = '$row->id'");
        $contcoount = mysql_num_rows($conts);
        $contid = 0;
        $offid = 0;
    while ($row1 = mysql_fetch_object($conts)){
        $contid =  $row1->id;
        $offid = ($contcoount == 0)? $row->id : 0;
        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div data-toggle="tooltip" class="well well-lg ballot" title="Click to vote <?=$row1->name;?> as your <?=$row->posname;?> " onclick="select_cont(<?=$row->id.",".$row1->id;?>,this)">
                    <div class="row">
                        <div class="col-lg-4 col-md-4" style="border-right: 1px solid #ccc;">
                            <img height="90" src="<?="admin/".$row1->photo?>" alt="<?=$row1->name;?>" />
                        </div>
                         <div class="col-lg-8 col-md-8">
                            <h3><?=  strtoupper($row1->name)?></h3>
                        <!--   <button  type="button" class="btn btn-primary btn-block">Vote <span class="glyphicon glyphicon-thumbs-up"></span></button>-->
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
        if($contcoount == 1){
            ?>

            <button  onclick="select_cont(<?=$row->id.",".$contid;?>,this)" type="button" class="btn btn-primary">Yes <span class="glyphicon glyphicon-thumbs-up"></span></button>


            <button onclick="select_cont(<?=$row->id.",". 0;?>)" type="button" class="btn btn-danger">No <span class="glyphicon glyphicon-thumbs-down"></span></button>

            <?php

        }else {
            ?>

            <button title="click here if you do not want any of the candidates as your <?=$row->posname;?>" onclick="select_cont(<?= $row->id . "," . 0; ?>)" type="button" class="btn btn-danger btn-block">None <span class="glyphicon glyphicon-thumbs-down"></span></button>


            <?php
        }
             ?>

            </div>
            </div>
            <?php
    if($pages==1){
        ?>
        <button  id="nextbtn"  style="display:none;" type="button" onclick="get_next();" class="btn btn-success pull-right">Finish <span class="glyphicon glyphicon-ok" </button>


        <?php
    }else{

        ?>
        <button title="Click here to go to to the next category. PLEASE BE SURE OF YOUR CHOICE BEFORE YOU CLICK THIS BUTTON " id="nextbtn"  style="display:none;" type="button" onclick="get_next();" class="btn btn-primary pull-right">Next &GreaterGreater;</button>

        <?php


    }
    }}else{
    ?>

    <div class="alert alert-success" style="margin-top: 40%;">
        <center><h4>YOUR BALLOTS WERE GATHERED SUCCESSFULLY <span class="glyphicon glyphicon-info-sign"></span> </h4></center>
        please click on the submit votes button to complete the prosess
        <button title="Click here to submit your choices. YOUR VOTES WILL NOT BE RECORDED IF THIS IS NOT DONE"  onclick="submit_votes()" id="submitbtn" type="button" class="btn btn-primary btn-block">Submit Votes <span class="glyphicon glyphicon-send"></span></button>
     </div>
    <?php
}
?>
<script>
    $(document).ready(function(){
        $("div, button").tooltip();
        $(".ballot").click(function(){
            $(".ballot").removeClass("ballot-selected");
            $(this).addClass("ballot-selected");
        });
    });
    function select_cont(office,cont,self){
        $(".ballot").removeClass("ballot-selected");
show_prog();
        $.get("select_con.php?office="+office+"&cont="+cont,function(data){
            $("#nextbtn").fadeIn(200);
            $("#bilots").fadeOut(100);
            $("#bilots").html(data);
            $("#bilots").fadeIn(200);
        }).done(function(){
            hide_prog();
        });
    }
</script>