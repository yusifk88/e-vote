<?php
include_once"includes/conect.php";
$id = $_GET['id'];
mysql_query("delete from voters where id = '$id'");

