<?php

include_once 'admin/includes/conect.php';
$id=$_GET['idnum'];
$secode=mysql_real_escape_string($_GET['secode']);
$test = mysql_query("select * from voters where indexnum='$id'");

if(mysql_num_rows($test)<1){
    echo "Your id number dose not exist in the voters' register, please contact your EC";
  
}else {
    $gettest = mysql_fetch_object($test);
    if($gettest->status==1){
        echo 'You have already casted your vote';
 }else if($gettest->code != $secode){
       
         echo 'You have not been verified, please contact your EC';
  }else{
      session_start();
      $_SESSION['secode'] = $secode;
      $_SESSION['id'] =$id;
      echo 'go';
        
 }
    
}


