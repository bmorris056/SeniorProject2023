<?php

session_start();

if(isset($_SESSION['user'])) {
}
else {
  header("location:index.php");
}

$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo '<p> Connection failed due to error : $error_message </p>';
}
$queryVet = 'SELECT * FROM VET';
$statement2 = $db->prepare($queryVet);
$statement2->execute();
$vets = $statement2->fetchAll();
$statement2->closeCursor();
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
		        <div id="Vet Data">
                <h2>Vet Data Insert:</h2>
                <form action="phpInsertVetData.php" method="post">
                    <div class="mainContainer">
                        <label for="VET_PHONE_NUM">VET PHONE NUM:</label>
                        <input type="text" placeholder="Enter VET PHONE NUM" name="VET_PHONE_NUM" required />
                        <br />
                        <br />
						<label for="VET_NAME">VET NAME:</label>
                        <input type="text" placeholder="Enter VET NAME" name="VET_NAME" required />
                        <br />
                        <br />
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
    </main>
    <footer>
      <p>Copyright © Gan's Hill Holdings 2023</p>
    </footer>
  </body>
</html>