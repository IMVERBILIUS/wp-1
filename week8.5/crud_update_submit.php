<?php

include_once("db_connect.php");


$id = $_GET["id"];


$name = $_POST["name"];
$continent = $_POST["continent"]; 
$leader = $_POST["leader"]; 

$sql = "UPDATE country SET name = '".$name."', continent = '".$continent."', Leader = '".$leader."' WHERE id = ".$id;
$result = mysqli_query($conn, $sql);

header("location: crud_select.php");
?>
