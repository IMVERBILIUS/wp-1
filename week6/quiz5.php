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
<body style="font-size: 69px;">
    <?php 
    $side1= 10;
    $side2= 20;
    $side3= 20;


    if($side1 == $side2 && $side3 == $side1){
        echo"Equilateral triangle";
    }elseif($side1 != $side2 && $side3 != $side1 && $side3 != $side2){
        echo"Scalne Triangle";
    }else{
        echo "Isosceles Triangle";
    }


    ?>

   

</body>

</html>