<?php
include_once("includes/conect.php");
$des = $_POST['Ofdes'];
if(!$des){
	echo"Empty field, please enter office description";
	}else{
if(mysql_num_rows(mysql_query("select * from office where posname='$des'"))>0){
	echo "This office was already entered";
	}else{
mysql_query("insert into office(posname) values('$des')");
		echo "Record saved";
		}
	}
?>