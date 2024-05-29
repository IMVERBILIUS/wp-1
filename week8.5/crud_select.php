<!DOCTYPE html>
<html>
	<head>
		<title>Web Programming</title>
	</head>
	<body>
		<?php 
		// calling db connection file
		include_once('db_connect.php');


		$result = mysqli_query($conn, "SELECT * FROM country");
		?>

		<a href="crud_insert.php">Insert</a>
		<br />

		<table border="1">
			<thead>
				<tr>
					<th>Name</th>
					<th>continent</th>
					<th>Leader</th>
                    <th>update</th>
				</tr>
			</thead>
			<tbody>
			<!-- data output from query -->
			<?php while($row = $result->fetch_assoc()):?>
				<tr>
					<td><?php echo $row["name"];?></td>
                    <td><?php echo $row["continent"];?></td>
					<td><?php echo $row["leader"];?></td>
					<td><a href="crud_update.php?id=<?php echo $row["id"];?>">Update</a></td>
				</tr>
        	<?php endwhile;?>
			</tbody>
		  </table>
		  
	</body>
</html>