<?php
$id = $_GET['id'];
include_once './includes/conect.php';
function get_key_code($length){
    $chrs = "0123456789abcdefghijklmnopqrestuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $chrlength = strlen($chrs);
    $key_code = "";
    for($i =0;$i<$length;$i++){
        $key_code.=$chrs[rand(0, $chrlength-1)];        
    }      
    return $key_code;
    }
$chsql= mysql_query("select * from voters where indexnum = '$id'");
$vter = mysql_fetch_object($chsql);
$chck = mysql_num_rows($chsql);
if($chck >0){
    if(!$vter->status = 1){
        echo 'This voter already voted';        
      
    }else{
$vters = mysql_query("select * from voters where code is not null");
$key_code = get_key_code(5);
while ($row = mysql_fetch_object($vters)){
    if($row->code === $key_code){
    $key_code = get_key_code(5);        
}

    }
    
   mysql_query("update voters set code = '$key_code' where indexnum = '$id'");
echo $key_code;
 
    }
    }else{
        echo "This voter id dose not exist in the voters' register";   
        
    }

