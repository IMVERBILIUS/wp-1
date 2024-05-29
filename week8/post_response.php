<!DOCTYPE html>
<html>

<body>

    <?php 
$name = $_POST['name'];
$age = $_POST['Age'];
$gender = $_POST['gender'];
$hobbies = $_POST['hobbies']; 

?>

    <p>Name :
        <?php echo $name; ?>
    </p>
    <p>
        <?php if ($gender == "male") {
        echo "His";
    } else {
        echo "Her";
    }
    ?> age is

        <?php
    if ($age <6) {
        echo "Toddler";
    } else if ($age >= 7 && $age <= 12) {
        echo "Kid";
    } else if ($age >= 13 && $age <= 25) {
        echo "Youth";
    } else {
        echo "Adult";
    }?>

            <p>Hobbies:</p>
            <ul>
                <?php

foreach ($hobbies as $hobby) {
    echo "<li>". $hobby. "</li>";
}
?>
            </ul>

    </p>

</body>

</html>