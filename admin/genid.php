<?php
set_time_limit(3600);
include_once("includes/conect.php");

$schcd = $_POST['schcode'];
$strtid =  $_POST['stid'];
$endid = $_POST['endid'];
$skip = $_POST['skipid'];
function saveid($id){
	$q = mysql_query("select * from voters where indexnum = '$id'");
	if(mysql_num_rows($q)<1){
		mysql_query("insert into voters(indexnum) values('$id')");
	}
}
	

///-------------------------------------------------------------------------------------------

	$x=0;
	for($i = $strtid; $i <= $endid; $i++){
		if($i < 10 && $i >= 1){
			
			
				$id = $schcd."000".$i;
				saveid($id);
				
			
			}elseif($i < 100 && $i >=10){
				$id = $schcd."00".$i;
			saveid($id);
				
				}elseif($i <1000 && $i >= 100){
					$id = $schcd."0".$i;
			saveid($id);
					
					
					}elseif($i < 10000 && $i >= 1000){
						$id = $schcd.$i;
						saveid($id);
						
						
						
						}
		
		
		
		
		}
		echo"voter IDs were saved successfully";








?>