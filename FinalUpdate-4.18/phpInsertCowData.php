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

$TAG_ID = $_REQUEST['TAG_ID'];
$VET_ID = $_REQUEST['VET_ID'];
$BUTCHER_DATE = $_REQUEST['BUTCHER_DATE'];
$APT_DATE = $_REQUEST['APT_DATE'];
$PASTURE_ID = $_REQUEST['PASTURE_ID'];

$sql = "INSERT INTO CATTLE (TAG_ID, VET_ID, BUTCHER_DATE, APT_DATE, PASTURE_ID, CATTLE_DEATH) VALUES ('$TAG_ID', '$VET_ID', '$BUTCHER_DATE', '$APT_DATE', '$PASTURE_ID', 'Alive')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>data stored in a database successfully." . " check php my admin" . " to view the upDATE_IDd data</h3>";

    echo nl2br("TAG ID: $TAG_ID\n VET ID:$VET_ID\n " . "BUTCHER DATE: $BUTCHER_DATE\n APT DATE:$APT_DATE\n PASTURE ID: $PASTURE_ID");
} else {
    echo "ERROR: $sql. " . mysqli_error($conn);
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
