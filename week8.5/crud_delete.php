<?php

include_once("db_connect.php");


$id = $_GET["id"];


$sql = "DELETE FROM country WHERE id = ".$id;
$result = mysqli_query($conn, $sql);


header("location: crud_select.php");
?>