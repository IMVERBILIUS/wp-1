<!DOCTYPE html>
<html>
<head>
	<title>Web Programming Insert</title>
</head>
<body>
<?php 

		include_once('db_connect.php');

		$result = mysqli_query($conn, "SELECT * FROM country");
		?>
	<form action="crud_insert_submit.php" method="POST">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value=""></td>
		</tr>
        <tr>
			<td>continent</td>
			<td><input type="text" name="continent" value=""></td>
		</tr>
        <tr>
			<td>Leader</td>
            <td>
            <select name="leader" >
                <option value="PM">PM</option>
                <option value="President">President</option>
                <option value="King">King</option>
            </select>
            </td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit">Save</button></td>
		</tr>
	</table>
	</form>
</body>
</html>