<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving options</title>
</head>

<body>
<h1>CONGRATULATIONS Your data has been saved</h1>
<?php

$year = $_POST['year'];
$make = $_POST['make'];
$model = $_POST['model'];
$colour = $_POST['colour'];
$milage = $_POST['milage'];

//step 1 - connect to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
    'gc200359541', 'wl3tDZWsQf');

//step 2 - create the SQL command to INSERT a record

$sql = "INSERT INTO tbl_cars (year,  make, model, colour, milage) VALUES (:year,  :make, :model, :colour, :milage)";

//step 3 - prepare the SQL command and bind the arguments to prevent SQL injection

$cmd = $conn->prepare($sql);

$cmd->bindParam(':year', $year, PDO::PARAM_INT, 4);
$cmd->bindParam(':make', $make, PDO::PARAM_STR, 50);
$cmd->bindParam(':model', $model, PDO::PARAM_STR, 20);
$cmd->bindParam(':colour', $colour, PDO::PARAM_STR, 20);
$cmd->bindParam(':milage', $milage, PDO::PARAM_INT, 10);


//step 4 - execute
$cmd->execute();
//step 5 - disconnect from database
$conn = null;
//step 6 - redirect to the albums page

?>
<h1><a href="tablecar.php">a</a></h1>
</body>

</html>

