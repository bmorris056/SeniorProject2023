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
            <div id="Account Recovery">
                <h3>Recover Your Account Bellow</h3>
                <form action="" method="post">
                    <div class="mainContainer">
                        <br />
                        <br />
                        <label for="username">Username:</label>
                        <input type="text" placeholder="Enter Username" name="username" required />
                        <br />
                        <br />
                        <label for="login_recovery_email">Email:</label>
                        <input type="text" placeholder="Enter Email" name="login_recovery_email" required />
                        <br />
                        <br />
                        <button type="recover" name="recover">Recover</button>
                    </div>
                </form>
                <?php
#section for forgot password php stuff
?>
            </div>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>
