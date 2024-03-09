<?php
if(!isset($_SESSION)) {
    session_start();
}

if(null !== $_SESSION['Access'] && $_SESSION['Access'] == "admin") {
    echo "Welcome ".$_SESSION['UserLogin'];
}else {
    echo header("Location: index.php");
}



include_once ("connections/connections.php");

$connection = connections();



$uid = $_GET['ID'];


$sql = "SELECT * FROM tblusers WHERE UID ='$uid'";
$members = $connection->query($sql) or die ($connection->error);
$row = $members->fetch_assoc();


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
    <br>
    <a href="index.php"><-Back</a>
    <br>
    <a href="edit.php?ID=<?php echo $row['UID'];?>">Edit</a>
    <br>
    <form action="delete.php" method="post">
    <button type="submit" name="delete">Delete</button>
    <input type="hidden" name="ID" value="<?php echo $row['UID'];?>">
    </form>
    <br>
    <h2><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></h2>
</body>
</html>