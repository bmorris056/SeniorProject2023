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

$HAY_BATCH_AMOUNT = $_REQUEST['HAY_BATCH_AMOUNT'];
$FIELD_ID = $_REQUEST['FIELD_ID'];
$HAY_STORAGE_ID = $_REQUEST['HAY_STORAGE_ID'];
$PASTURE_ID = $_REQUEST['PASTURE_ID'];
$DATE_ID = $_REQUEST['DATE_ID'];
$TYPE_ID = $_REQUEST['TYPE_ID'];

$sql = "INSERT INTO hay_batch (HAY_BATCH_AMOUNT, FIELD_ID, STORAGE_ID, PASTURE_ID, HAY_BATCH_DATE, TYPE_ID) VALUES ('$HAY_BATCH_AMOUNT', '$FIELD_ID', '$HAY_STORAGE_ID', '$PASTURE_ID', '$DATE_ID', '$TYPE_ID')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>data stored in a database successfully.";
    echo nl2br("HAY BATCH AMOUNT: $HAY_BATCH_AMOUNT\n FIELD ID:$FIELD_ID\n " . "HAY STORAGE ID: $HAY_STORAGE_ID\n PASTURE ID:$PASTURE_ID\n DATE ID: $DATE_ID\n Type ID: $TYPE_ID");
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
