<?php
// calling db connection file
include_once("../db_connect.php");

// data from crud_insert form
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



// insert data
$sql = "INSERT INTO city (country_id, name, population, density) VALUES ('".$country_id."', '".$name."', '".$population."', '".$density."')";
$result = mysqli_query($conn, $sql);

// redirect to table page
header("location: crud_select.php");
?>