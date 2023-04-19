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
        <li><a href="logout.php"name="logout">Logout</a></li>
      </ul>
    </nav>
    <main>
      <div id="Admin Login">
        <h1>Welcome</h1>
        <h2>Administrator Functions</h2>

    <input type="button" class="admin-button" onclick="location.href='InsertData.php'" value="Insert Cattle or Hay Data">
    <input type="button" class="admin-button" onclick="location.href='CreateAccount.php'" value="TEMPORARY LINK TO CREATE ACCOUNT">
    <input type="button" class="admin-button" onclick="location.href='VetTable.php'" value="Insert Vet Data">
    <input type="button" class="admin-button" onclick="location.href='UpdateData.php'" value="Update Cattle Data">
    <input type="button" class="admin-button" onclick="location.href='DeleteD.php'" value="Delete Data">
    <br />
                        <br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="submit" class="admin-button" name="refresh" value="Refresh Data">
    </form>
<?php if (isset($_POST['refresh'])) {
    header("Refresh:0");
} ?>
        <h2>VET TABLE</h2>
         <table>
            <tr>
               <th>VET ID</th>
               <th>VET NAME</th>
               <th>VET PHONE NUMBER</th>
            </tr>
            <?php foreach ($vets as $vet): ?>
               <tr>
                  <td><?php echo $vet['VET_ID']; ?></td>
                  <td><?php echo $vet['VET_NAME']; ?></td>
                  <td><?php echo $vet['VET_PHONE_NUM']; ?></td>
               </tr>
            <?php endforeach; ?>
         </table>
         <div ID="Cattle Finder">
                <h2>Cattle Finder</h2>
                <form action="" method="get">
                    
                    <div class="mainContainer">
                    <label for="TAG_ID">TAG ID:</label>
                        <input type="text" placeholder="Enter TAG ID" name="TAG_ID" />
                        <br />
                        <br />
                        <table class =>
            <tr>
               <th>CATTLE ID</th>
               <th>TAG ID</th>
               <th>VET NAME</th>
               <th>VET APT DATE</th>
               <th>BUTCHER DATE</th>
			   <th>PASTURE NAME</th>
               <th>CATTLE STATUS</th>
            </tr>
            <?php if (isset($_GET['TAG_ID']) && !empty($_GET['TAG_ID'])) {
    $TAG_ID = $_GET['TAG_ID'];
    $queryCattle = "SELECT c.*, v.vet_name, p.pasture_name FROM CATTLE c
                    INNER JOIN vet v ON c.VET_ID = v.VET_ID
                    INNER JOIN pasture p ON c.PASTURE_ID = p.PASTURE_ID
                    WHERE c.TAG_ID = '$TAG_ID'";
    $statement2 = $db->prepare($queryCattle);
    $statement2->execute();
    $cattles = $statement2->fetchAll();
    $statement2->closeCursor();
    foreach ($cattles as $cattle): ?>
        <tr>
            <td><?php echo $cattle['CATTLE_ID']; ?></td>
            <td><?php echo $cattle['TAG_ID']; ?></td>
            <td><?php echo $cattle['vet_name']; ?></td>
            <td><?php echo $cattle['APT_DATE']; ?></td>
            <td><?php echo $cattle['BUTCHER_DATE']; ?></td>
            <td><?php echo $cattle['pasture_name']; ?></td>
            <td><?php echo $cattle['CATTLE_DEATH']; ?></td>
        </tr>
    <?php endforeach;
} ?>
            </table>
            <br />
                        <br />
                        <button type="submit" name="cattle_submit">Find Cattle</button>
                        <br />
                        <br />
                    </div>
                </form>
            </div>
            <h2>HAY ON HAND</h2>
            <table>
            <tr>
               <th>HAY BATCH ID</th>
               <th>HAY BATCH AMOUNT</th>
               <th>STORAGE NAME</th>
               <th>FIELD NAME</th>
               <th>PASTURE NAME</th>
               <th>HAY BATCH DATE</th>
               <th>TYPE</th>
            </tr>
            <?php 
    $queryHay = 'SELECT hb.HAY_BATCH_ID, hb.HAY_BATCH_AMOUNT, s.storage_name, f.field_name, p.pasture_name, hb.HAY_BATCH_DATE, hb.TYPE_ID 
                FROM Hay_Batch hb
                JOIN hay_storage s ON hb.STORAGE_ID = s.storage_id
                JOIN fields f ON hb.FIELD_ID = f.field_id
                JOIN pasture p ON hb.PASTURE_ID = p.pasture_id';
    $statement3 = $db->prepare($queryHay);
    $statement3->execute();
    $hays = $statement3->fetchAll();
    $statement3->closeCursor();
    foreach ($hays as $hay): ?>
        <tr>
            <td><?php echo $hay['HAY_BATCH_ID']; ?></td>
            <td><?php echo $hay['HAY_BATCH_AMOUNT']; ?></td>
            <td><?php echo $hay['storage_name']; ?></td>
            <td><?php echo $hay['field_name']; ?></td>
            <td><?php echo $hay['pasture_name']; ?></td>
            <td><?php echo $hay['HAY_BATCH_DATE']; ?></td>
            <td><?php echo $hay['TYPE_ID']; ?></td>
        </tr>
<?php endforeach; ?>
</table>
    </div>
    </main>
    <footer>
      <p>Copyright © Gan's Hill Holdings 2023</p>
    </footer>
  </body>
</html>
