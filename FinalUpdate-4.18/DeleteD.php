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
            <div id="Delete Cattle Data">
                <h2>Cattle Data Delete:</h2>
                <form action="phpDeleteCowData.php" method="post">
                    <div class="mainContainer">
                        <label for="CATTLE_ID">CATTLE ID:</label>
                        <input type="text" placeholder="Enter CATTLE ID" name="CATTLE_ID" required />
                        <button type="submit">Delete Cattle</button>
                    </div>
                </form>
            </div>
            <div id="Hay Data">
                <h2>Hay Data Delete:</h2>
                <form action="phpDeleteHayData.php" method="post">
                    <div class="mainContainer">
                        <label for="HAY_BATCH_ID">HAY BATCH ID:</label>
                        <input type="text" placeholder="Enter HAY BATCH ID" name="HAY_BATCH_ID" required />
                        <button type="submit">Delete Hay</button>
                    </div>
                </form>
            </div>
            <div id="Vet Data">
                <h2>Vet Data Delete:</h2>
                <form action="phpDeleteVetData.php" method="post">
                    <div class="mainContainer">
                        <label for="VET_ID">VET ID:</label>
                        <input type="text" placeholder="Enter VET ID" name="VET_ID" required />
                        <button type="submit">Delete Vet</button>
                    </div>
                </form>
            </div>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>
