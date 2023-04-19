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
            <div id="Cattle Data">
                <h2>Cattle Data Insert:</h2>
                <form action="phpInsertCowData.php" method="post">
                    <div class="mainContainer">
                        <label for="TAG_ID">TAG ID:</label>
                        <input type="text" placeholder="Enter TAG ID" name="TAG_ID" required/>
                        <br />
                        <br />
                        <label for="VET_ID">VET:</label>
                        <select name="VET_ID" id="VET_ID" required>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "test");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT vet_id, vet_name FROM VET";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['vet_id'] . '">' . $row['vet_name'] . '</option>';
                        }
                        mysqli_close($conn);
                        ?>
                        </select>
                        <br />
                        <br />
                        <label for="PASTURE_ID">PASTURE:</label>
                        <select name="PASTURE_ID" id="PASTURE_ID" required>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "test");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT PASTURE_ID, pasture_name FROM pasture";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['PASTURE_ID'] . '">' . $row['pasture_name'] . '</option>';
                        }
                        mysqli_close($conn);
                        ?>
                        </select>
                        <br />
                        <br />
                        <label for="APT_DATE">VET APPOINTMENT DATE:</label>
                        <input type="DATE" name="APT_DATE" />
                        <br />
                        <br />
                        <label for="BUTCHER_DATE">BUTCHER DATE:</label>
                        <input type="DATE" name="BUTCHER_DATE" />
                        <br />
                        <br />
                        <input type="submit" name="login" value="Insert Cattle">
                    </div>
                </form>
            </div>
            <div id="Hay Data">
                <h2>Hay Data Insert:</h2>
                <form action="phpInsertHayData.php" method="post">
                    <div class="mainContainer">
                        <label for="HAY_BATCH_AMOUNT">HAY BATCH AMOUNT:</label>
                        <input type="text" placeholder="Enter Total Hay Bales" name="HAY_BATCH_AMOUNT" required/>
                        <br />
                        <br />
                        <label for="TYPE_ID">TYPE:</label>
                        <select name="TYPE_ID" id="TYPE_ID" required>
                            <option value="Round">Round</option>
                            <option value="Square">Square</option>
                        </select>
                        <br />
                        <br />
                        <label for="FIELD_ID">FIELD:</label>
                        <select name="FIELD_ID" id="FIELD_ID" required>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "test");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT FIELD_ID, field_name FROM fields";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['FIELD_ID'] . '">' . $row['field_name'] . '</option>';
                        }

                        mysqli_close($conn);
                        ?>
                        </select>
                        <br />
                        <br />
                        <label for="HAY_STORAGE_ID">HAY STORAGE:</label>
                        <select name="HAY_STORAGE_ID" id="HAY_STORAGE_ID" required >
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "test");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT STORAGE_ID, storage_name FROM hay_storage";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['STORAGE_ID'] . '">' . $row['storage_name'] . '</option>';
                        }

                        mysqli_close($conn);
                        ?>
                        </select>
                        <br />
                        <br />
                        <label for="PASTURE_ID">PASTURE:</label>
                        <select name="PASTURE_ID" id="PASTURE_ID" required>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "test");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT PASTURE_ID, pasture_name FROM pasture";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['PASTURE_ID'] . '">' . $row['pasture_name'] . '</option>';
                        }

                        mysqli_close($conn);
                        ?>
                        </select>
                        <br />
                        <br />
                        <label for="DATE_ID">DATE:</label>
                        <input type="DATE" name="DATE_ID" required />
                        <br />
                        <br />
                        <button type="recover" name = "recover">Insert Hay</button>
                    </div>
                </form>
            </div>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>
