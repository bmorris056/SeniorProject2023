<?php
session_start();

if(isset($_SESSION['user'])) {
}
else {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gan's Hill Holdings</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <h1>Gan's Hill Holdings</h1>
    </header>
    <nav>
      <ul>
        <li><a href="Index.php">Home</a></li>
        <li><a href="About.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
		    <li><a href="product.php">Product</a></li>
      </ul>
    </nav>
    <main>
<?php
$conn = mysqli_connect("localhost", "root", "", "test");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$VET_ID = $_REQUEST['VET_ID'];

$sql = "DELETE FROM VET WHERE VET_ID=$VET_ID";

if ($conn->query($sql) === true) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
mysqli_close($conn);
?>
<br />
<br />
<input type="button" class="admin-button" onclick="location.href='AdminLandingPage.php'" value="Go Back">
    </main>
    <footer>
      <p>Copyright © Gan's Hill Holdings 2023</p>
    </footer>
  </body>
</html>
