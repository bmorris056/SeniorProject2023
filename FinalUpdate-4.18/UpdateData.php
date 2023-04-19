
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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gan's Hill Holdings</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
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
            <div ID="Cattle update Data">
                <h2>Cattle Data Update:</h2>
                <form action="phpUpdateCattle.php" method="post">
                    <div class="mainContainer">
                    <label for="CATTLE_ID">CATTLE ID:</label>
                        <input type="text" placeholder="Enter CATTLE ID" name="CATTLE_ID" value="<?php echo isset($cattle['CATTLE_ID']) ? $cattle['CATTLE_ID'] : ''; ?>" required />
                        <br />
                        <br />
                        <label for="VET_ID">VET NAME:</label>
<select name="VET_ID" id="VET_ID" value="" required>
    <?php
    $TAG_ID = isset($_GET['TAG_ID']) ? $_GET['TAG_ID'] : '';
    $queryVet = "SELECT DISTINCT VET.vet_id, VET.vet_name FROM CATTLE INNER JOIN VET ON CATTLE.VET_ID = VET.vet_id WHERE CATTLE.TAG_ID = ?";
    $stmtVet = $db->prepare($queryVet);
    $stmtVet->execute([$TAG_ID]);
    $vets = $stmtVet->fetchAll();
    $stmtVet->closeCursor();
    foreach ($vets as $vet): ?>
        <option value="<?php echo $vet['vet_id']; ?>"><?php echo $vet['vet_name']; ?></option>
    <?php endforeach;
    ?>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT vet_id, vet_name FROM VET WHERE vet_id NOT IN (SELECT DISTINCT VET_ID FROM CATTLE WHERE TAG_ID = ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $TAG_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['vet_id'] . '">' . $row['vet_name'] . '</option>';
    }
    mysqli_close($conn);
    ?>
</select>
                        <br />
                        <br />
                        <label for="PASTURE_ID">PASTURE:</label>
<select name="PASTURE_ID" id="PASTURE_ID" value="" required>
    <?php
    $TAG_ID = isset($_GET['TAG_ID']) ? $_GET['TAG_ID'] : '';
    $queryPasture = "SELECT DISTINCT PASTURE.pasture_id, PASTURE.pasture_name FROM CATTLE INNER JOIN PASTURE ON CATTLE.PASTURE_ID = PASTURE.pasture_id WHERE CATTLE.TAG_ID = ?";
    $stmtPasture = $db->prepare($queryPasture);
    $stmtPasture->execute([$TAG_ID]);
    $pastures = $stmtPasture->fetchAll();
    $stmtPasture->closeCursor();
    foreach ($pastures as $pasture): ?>
        <option value="<?php echo $pasture['pasture_id']; ?>"><?php echo $pasture['pasture_name']; ?></option>
    <?php endforeach;
    ?>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT pasture_id, pasture_name FROM PASTURE WHERE pasture_id NOT IN (SELECT DISTINCT PASTURE_ID FROM CATTLE WHERE TAG_ID = ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $TAG_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['pasture_id'] . '">' . $row['pasture_name'] . '</option>';
    }
    mysqli_close($conn);
    ?>
</select>
                        <br />
                        <br />
                        <label for="APT_DATE">VET APT DATE:</label>
                        <input type="DATE" name="APT_DATE" value="<?php echo isset($cattle['APT_DATE']) ? $cattle['APT_DATE'] : ''; ?>" required />
                        <br />
                        <br />
                        <label for="BUTCHER_DATE">BUTCHER DATE:</label>
                        <input type="DATE" name="BUTCHER_DATE" value="<?php echo isset($cattle['BUTCHER_DATE']) ? $cattle['BUTCHER_DATE'] : ''; ?>" required/>
                        <br />
                        <br />
                        <label for="CATTLE_DEATH">CATTLE STATUS:</label>
                        <select name="CATTLE_DEATH" id="CATTLE_DEATH" required>
    <option value="Alive" <?php echo isset($cattle['CATTLE_DEATH']) && $cattle['CATTLE_DEATH'] == 'Alive' ? 'selected' : ''; ?>>Alive</option>
    <option value="Dead" <?php echo isset($cattle['CATTLE_DEATH']) && $cattle['CATTLE_DEATH'] == 'Dead' ? 'selected' : ''; ?>>Dead</option>
</select>
                        <br />
                        <br />
                        <button type="submit" name = "UpdateSubmit">Update Cattle</button>
                    </div>
                </form>
            </div>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>


