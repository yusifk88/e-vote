<?php

include_once './includes/conect.php';
$id = $_GET['id'];
mysql_query("delete from conts where id = '$id'");