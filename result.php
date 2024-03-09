<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['UserLogin'])) {
  echo "Welcome ".$_SESSION['UserLogin'];
} else {
  echo "Welcome Guest";
}

include_once ("connections/connections.php");

$connection = connections();

$search = $_GET['search'];
$sql = "SELECT * FROM tblusers WHERE FirstName || LastName LIKE '%$search%' ORDER BY UID DESC";
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
  <h1>Tambayan Ng Mga Gwapo</h1>

  <form action="result.php" method="get">
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>
  </form>


  <?php if (isset($_SESSION['UserLogin'])) {
    ?>
    <a href="logout.php">Log Out</a>
    <?php
  } else {
    ?>
    <a href="login.php">Log In</a>

    <?php
  } ?>


  <a href="add.php">Add New</a>
  <table>
    <thead>
      <tr>
        <th></th>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>
    <tbody>
      <?php do {
        ?>
        <tr>
          <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "admin") {
            ?>

            <td><a href="details.php?ID=<?php echo $row['UID'] ?>">Edit</a><?php echo $row['UID']; ?> </td>

            <?php
          } else {
            ?>
            <td><?php echo $row['UID']; ?> </td>
            <?php
          } ?>
          <td><?php echo $row['FirstName']; ?> </td>
          <td><?php echo $row['LastName']; ?></td>
        </tr>
        <?php
      }while ($row = $members->fetch_assoc()); ?>
    </tbody>
  </table>

</body>
</html>