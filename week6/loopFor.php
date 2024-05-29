<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Basic PHP</title>
</head>

<body>
    <?php 
    $color1 = array("red","green","blue","Yellow");
    $color2 = ["red","green","blue","Yellow"];

    foreach ($color1 as $value) {
        echo $value."<br>";
    }

    echo $color1[1];

    ?>

   

</body>

</html>