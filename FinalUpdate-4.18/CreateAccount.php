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
            <div id="Admin Login">
                <h3>Test Create Account</h3>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "test");
                if ($conn === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                function hashPassword($password)
                {
                    $hash = password_hash($password, PASSWORD_BCRYPT);
                    return $hash;
                }
                if (isset($_POST['signup'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $login_recovery_email = $_POST['login_recovery_email'];

                    $hashedPassword = hashPassword($password);
                    $query = "INSERT INTO login (username, password, login_recovery_email) VALUES ('$username', '$hashedPassword', '$login_recovery_email')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo "User created successfully.";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <label>Username:</label>
                    <input type="text" name="username" required />
                    <br />
                    <br />
                    <label>Password:</label>
                    <input type="password" name="password" required />
                    <br />
                    <br />
                    <label>Recovery Email:</label>
                    <input type="login_recovery_email" name="login_recovery_email" required />
                    <br />
                    <br />
                    <input type="submit" name="signup" value="Signup" />
                </form>
            </div>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>
