<!DOCTYPE html>
<html>
<head>
    <title>Web Programming Insert</title>
</head>
<body>
    <?php 
    // calling db connection file
    include_once('../db_connect.php');

    // category data
    $categoryData = mysqli_query($conn, "SELECT * FROM country ORDER BY id");
    ?>
    
    <form action="crud_insert_submit.php" method="POST">
    <table>
        <tr>
            <td>name</td>
            <td><input type="text" name="name" value="" required></td>
        </tr>
        <tr>
            <td>country_id</td>
            <td>
                <?php while($category = $categoryData->fetch_assoc()):?>
                    <input type="radio" name="country_id" value="<?php echo $category["id"]?>" required>
                    <label><?php echo $category["name"]?></label>
                <?php endwhile?>
            </td>
        </tr>
        <tr>
            <td>population</td>
            <td><input type="text" name="population" value="" required></td>
            <td><input type="hidden" name="density" value="" required></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Save</button></td>
        </tr>
    </table>
    </form>
</body>
</html>