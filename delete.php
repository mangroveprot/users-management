<?php
include_once ("connections/connections.php");

$connection = connections();

 if(isset($_POST['delete'])) {

    $uid = $_POST['ID'];
    $sql = "DELETE FROM tblusers WHERE UID ='$uid'";
    $connection->query($sql) or die ($connection->error);
    echo header("Location: index.php");
 }