<?php
include_once("includes/conect.php");
$caname = $_POST['canname'];
$office = $_POST['office'];
$picinput = $_POST['picinput'];
if(!$caname || !$office || !$picinput){
	echo"A required field is empty";
	
	}else{
		if (mysql_num_rows(mysql_query("select * from conts where name = '$caname'"))>0){
			echo"This candidate already exist";
			
			
			}else{
		
		mysql_query("insert into conts(name,office,photo) values('$caname','$office','$picinput')");
	
	
	echo"Candidate rigistered";
		}
	}




?>