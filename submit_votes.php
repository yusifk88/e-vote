<?php
/**
 * Created by PhpStorm.
 * User: Godson
 * Date: 3/24/2017
 * Time: 12:23 PM
 */

include_once 'admin/includes/conect.php';
session_start();

$id = $_SESSION['id'];


$my_votes = mysql_query("select cont from votes where voter = '$id'");

while($row = mysql_fetch_object($my_votes)){
    mysql_query("update conts set vote = vote+1 where id = '$row->cont'");

}

mysql_query("update voters set status = 1 where indexnum = '$id'");
session_destroy();


