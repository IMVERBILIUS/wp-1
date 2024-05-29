<!DOCTYPE html>
<html>
<head>
    <title>Web Programming</title>
</head>
<body>
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
    ?>



    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>population</th>
            
                
            </tr>
        </thead>
        <tbody>

        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["country_name"]; ?></td>
                <td><?php echo $row["population"]; ?></td>
                
        
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <br />
		<a href="table_export.php?type=pdf" target="_blank">Export PDF</a>
        <a href="table_export.php?type=xls" target="_blank">Export excel</a>
        
</body>
</html>


