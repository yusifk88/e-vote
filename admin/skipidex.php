<?php
include_once './includes/conect.php';
$skip_vals = $_POST['skipid'];

$schcode = $_POST['schcode'];
if($skip_vals){
    
    $skip_array = explode($skip_vals, ',');
    echo var_export($skip_array);
    $cnt = count($skip_array);
    echo $cnt;
    for($i = 0; $i< $cnt; $i++){
       $id = $skip_array[$i];
       echo $id;
       $index = "";
       if(is_numeric($id) && $id <10){
           $index = $schcode."000".$id;
           mysql_query("delefrom voters where indexnum = '$index'");
           
       }else if(is_numeric($id) && ($id >=10 && $id <100)){
           
          $index = $schcode."00".$id;
           mysql_query("delefrom voters where indexnum = '$index'");
          
           
           
       }else if(is_numeric($id) && ($id >=100 && $id <1000)){
          $index = $schcode."0".$id;
           mysql_query("delefrom voters where indexnum = '$index'");
            
           
           
       }else{
           
            $index = $schcode.$id;
           mysql_query("delefrom voters where indexnum = '$index'");
          
       }
        
        
    }
    
    
    
    
    
    
}
