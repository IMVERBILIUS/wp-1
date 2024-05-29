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

    <a href="crud_insert.php">Insert</a>
    <br />

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>population</th>
                <th>density</th>
                <th>update</th>
            </tr>
        </thead>
        <tbody>
        <!-- data output from query -->
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["country_name"]; ?></td>
                <td><?php echo $row["population"]; ?></td>
                <td><?php echo $row["density"]; ?></td>
                <td><a href="crud_update.php?id=<?php echo $row["id"]; ?>">Update</a></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
