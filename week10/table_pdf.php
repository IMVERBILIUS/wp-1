<?php 
// calling db connection file
include_once('../db_connect.php');

// sql data book join category
    $sql = "SELECT city.*, country.name AS country_name
            FROM city 
            JOIN country ON city.country_id = country.id
            ORDER BY country.name ASC, city.name ASC";

// query data
$result = mysqli_query($conn, $sql);

// pdf library
require '../php_report/vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();



// generate pdf
$html = '<table border="1">
			<thead>
				<tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>population</th>
					
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

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('book.pdf');
?>