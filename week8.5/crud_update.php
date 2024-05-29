<!DOCTYPE html>
<html>
<head>
	<title>Web Programming Update</title>
</head>
<body>
	<?php
	// calling db connection file
	include_once("db_connect.php");

	// data from url
	$id = $_GET["id"];


	// query data
	$result = mysqli_query($conn, "SELECT * FROM country WHERE id = ".$id);

	// return data
	$row = $result->fetch_assoc();
	?>
	
	<form action="crud_update_submit.php?id=<?php echo $id ?>" method="POST">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $row["name"]?>"></td>
		</tr>
        <tr>
			<td>continent</td>
            <td>
            <select name="continent" >
                <option value="Asia"<?php echo ($row["continent"] == 'Asia') ? "selected" : ""; ?>>Asia</option>
                <option value="Amerika"<?php echo ($row["continent"] == 'Amerika') ? "selected" : ""; ?>>Amerika</option>
                <option value="Africa"<?php echo ($row["continent"] == 'Africa') ? "selected" : ""; ?>>Africa</option>
                </td>
		</tr>
        <tr>
			<td>leader</td>
            <td>
            <input type="radio" name="leader" value="PM"<?php echo ($row["leader"] == 'PM') ? "checked" : ""; ?>> PM
            <input type="radio" name="leader" value="President"<?php echo ($row["leader"] == 'President') ? "checked" : ""; ?>> President
            <input type="radio" name="leader" value="Kings"<?php echo ($row["leader"] == 'Kings') ? "checked" : ""; ?>> Kings
            </td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit">Save</button>
				<a href="crud_delete.php?id=<?php echo $id?>" onclick="return confirm('Are you sure guys?')" >Delete</a>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>