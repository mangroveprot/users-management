<?php

if(!isset($_SESSION)) {
    session_start();
}

include_once ("connections/connections.php");

$connection = connections();


if(isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM dbusers  WHERE username = '$username' AND password = '$password' ";
    $user = $connection->query($sql) or die ($connection->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0 ) {
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];

        echo header("Location: index.php");
    }else {
        echo "User not found";
    }
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
    <h1>LOG IN</h1>
    <br>

    <form action="" method="post">
    <label>Username</label>
    <input type="text" name="username" id="username">
    <label>Password</label>
    <input type="texts" name="password" id="password">
    <button type="submit" name="login">Log in</button>
    </form>
</body>
</html>