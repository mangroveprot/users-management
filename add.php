<?php

include_once ("connections/connections.php");

$connection = connections();

if(isset($_POST['submit'])) {

   $fName = $_POST['FirstName'];
    $lName = $_POST['LastName'];
    $gender = $_POST['Gender'];

    $sql = "INSERT INTO `tblusers`(`FirstName`, `LastName`, `Gender`) VALUES ( '$fName','$lName','$gender' ) ";

    $connection->query($sql) or die ($connection->error);

    echo header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambayan Ng Mga Gwapo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="FirstName" id="FirstName">
        
        <label>Last Name</label>
        <input type="text" name="LastName" id="LastName">
        
        <label>Gender</label>
        <select name="Gender" id="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        </select>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>