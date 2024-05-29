<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];
$country_id = $_POST["country_id"];
$name = $_POST["name"];
$population = $_POST["population"];
if ($population>1000){
    $density ="high";
}elseif($population>=500 && $population<=1000){
    $density ="medium";
}else{
    $density ="low";
}


// update data
$sql = "UPDATE city SET country_id = '$country_id', name = '$name', population = '$population', density = '$density' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

// redirect to table page
header("location: crud_select.php");
?>