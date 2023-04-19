<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "test");
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
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
            <div id="Admin Login">
                <h2>Administrator Login</h2>
                <?php
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $conn = mysqli_connect("localhost", "root", "", "test");

            $sql = "SELECT password FROM login WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($user) {
                if (password_verify($password, $user["password"])) {
                    echo "password verified";
                    $_SESSION['user']=$username;
                    header("location: AdminLandingPage.php");
                } else {
                    echo "Incorrect Password";
                }
            } else {
                echo "Username or Password does not match";
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
                    <input type="submit" name="login" value="Login" />
                </form>
            </div>
            <div id="Forget Your password?"></div>
            <ul>
                <li><a href="ForgotPassword.php">Forget Your password?</a></li>
            </ul>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>
