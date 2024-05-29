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
    $age=20;
    if($age <= 5){
        echo"Toddler";
    }elseif($age >=6 && $age <=12){
        echo"Kids";
    }elseif($age >= 13&& $age <= 25){
        echo "Youth";
    }else{
        echo "Adult";
    }


    ?>

   

</body>

</html>