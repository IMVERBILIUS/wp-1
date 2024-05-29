<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];

// delete data
$sql = "DELETE FROM book WHERE id = ".$id;
$result = mysqli_query($conn, $sql);

// redirect to table page
header("location: crud_select.php");
?>