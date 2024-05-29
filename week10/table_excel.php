<?php

include_once('../db_connect.php');


$sql = "SELECT city.*, country.name AS country_name
        FROM city 
        JOIN country ON city.country_id = country.id
        ORDER BY country.name ASC, city.name ASC";


$result = mysqli_query($conn, $sql);

require '../php_report/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Html;



$html = '<table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody>';

while($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>'.$row['name'].'</td>
                <td>'.$row['country_name'].'</td>
                <td>'.$row['population'].'</td>
              </tr>';
}

$html .= '</tbody>
        </table>';





$spreadsheet = new Spreadsheet();
$reader = new Html();
$reader->loadFromString($html, $spreadsheet);


$writer = new Xlsx($spreadsheet);
$writer->save('hello_world.xlsx');

?>
