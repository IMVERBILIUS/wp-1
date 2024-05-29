<?php

include_once("db_connect.php");

$name = $_POST["name"];
$continent = $_POST["continent"]; 
$leader =$_POST["leader"];


$sql = "INSERT INTO country (name, continent, leader) VALUES ('".$name."','".$continent."','".$leader."')" ;
$result = mysqli_query($conn, $sql);


header("location: crud_select.php");
?>
