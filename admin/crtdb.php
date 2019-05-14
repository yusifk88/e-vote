<?php
$con = mysqli_connect('localhost','root','') or die("Could not reach the server");
mysqli_query($con,"create database evotedb");
mysqli_select_db("evotedb");
mysqli_query($con,"CREATE TABLE conts (
  id int(11)PRIMARY KEY AUTO_INCREMENT NOT NULL,
name varchar(150) NOT NULL,
  office int(11) NOT NULL,
  photo varchar(200) NOT NULL,
  vote int(11) NOT NULL
)");

mysqli_query("CREATE TABLE office (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  posname varchar(150) NOT NULL
)");

mysqli_query("CREATE TABLE voters (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  indexnum varchar(15) NOT NULL,
  code varchar(25) NOT NULL,
  status int(11) NOT NULL
)");


mysqli_query("CREATE TABLE votes (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  voter varchar(150) NOT NULL,
  office int(11) NOT NULL,
  cont int(11) NOT NULL
)");



