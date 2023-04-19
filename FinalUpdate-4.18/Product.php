<?php
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
      <div id="Cattle">
        <h2>Cattle On Hand</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "test");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $query = "SELECT COUNT(cattle_id) AS total_alive_cattle
                FROM cattle
                WHERE cattle_death = 'Alive';";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                  <tr>
                    <th>Total Cattle</th>
                  </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                      <td>" .
                    $row['total_alive_cattle'] .
                    "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No records found.";
        }

        mysqli_close($conn);
        ?>
      </div>
      <div id="Hay Bushels">
        <h2>Hay Bushels On Hand</h2>
        <table>
<tr>
<th>HAY BATCH AMOUNT</th>
<th>HAY BATCH DATE</th>
<th>TYPE</th>
</tr>
      </div>
      <?php
      $queryHay = 'SELECT hb.HAY_BATCH_AMOUNT, hb.HAY_BATCH_DATE, hb.TYPE_ID
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
<td><?php echo $hay['HAY_BATCH_AMOUNT']; ?></td>
<td><?php echo $hay['HAY_BATCH_DATE']; ?></td>
<td><?php echo $hay['TYPE_ID']; ?></td>
</tr>
<?php endforeach;
      ?>
</table>
      <div id="AdminPage"></div>
      <br />
      <br />
      <input type="button" class="admin-button" onclick="location.href='Admin.php'" value="Administrator Login">
    </div>
    </main>
    <footer>
      <p>Copyright © Gan's Hill Holdings 2023</p>
    </footer>
  </body>
</html>
