<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <h1>Choose your favorite car from our database</h1>


    <form method="post" action="savecar.php">
    <fieldset class="form-group">
        <label for="maker" class="col-sm-1">Choose your Manufacturer:</label>
        <select name="maker" id="maker">
            <?php
            //Step 1 - connect to the DB
            $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
                'gc200359541', 'wl3tDZWsQf');
            $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
            //Step 2 - create the SQL statement
            $sql = "SELECT * FROM manufacturers";
            //Step 3 - prepare & execute the SQL statement
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $manufacturers = $cmd->fetchAll();
            //Step 4 - loop over the results to build the list with <option> </option>
            foreach ($manufacturers as $maker)

                echo '<option>'.$maker['maker'].'</option>';

            //Step 5 - disconnect from the DB
            $conn = null;
            ?>
        </select>
    </fieldset>

    <button class="btn btn-success col-sm-offset-2">SELECT YOUR CAR</button>
    </form>
</main>
</body>