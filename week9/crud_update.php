<!DOCTYPE html>
<html>
<head>
	<title>Web Programming Update</title>
</head>
<body>
	<?php
	// calling db connection file
	include_once("../db_connect.php");

	// data from url
	$id = $_GET["id"];

	// query data for the specific book
	$bookData = mysqli_query($conn, "SELECT city.*, country.name AS country_name
    FROM city 
    JOIN country ON city.country_id = country.id
    WHERE city.id = '$id'");

	if ($bookData) {
	    $book = $bookData->fetch_assoc();
	} else {
	    echo "Error retrieving book data: " . mysqli_error($conn);
	    exit;
	}

	// query data for categories
	$categoryData = mysqli_query($conn, "SELECT id, name FROM country ORDER BY name ASC");

	if (!$categoryData) {
	    echo "Error retrieving category data: " . mysqli_error($conn);
	    exit;
	}
	?>

	<form action="crud_update_submit.php?id=<?php echo $id ?>" method="POST">
	<table>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="<?php echo ($book["name"])?>">
            </td>
        </tr>
        <tr>
			<td>Category</td>
			<td>
			<?php while($category = $categoryData->fetch_assoc()): ?>
                <input type="radio" name="country_id" value="<?php echo $category["id"]?>" <?php if($category["id"] == $book["country_id"]) echo "checked"; ?> required>
                <label><?php echo ($category["name"])?></label>
            <?php endwhile; ?>
			</td>
		</tr>
        <tr>
            <td>Population</td>
            <td>
                <input type="text" name="population" value="<?php echo ($book["population"])?>">
            </td>
        </tr>
		<tr>
			<td>
				<button type="submit">Save</button>
				<a href="crud_delete.php?id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
