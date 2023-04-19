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
            <div id="Contact">
                <h2>Contact Information</h2>
                <p>Address:
                <br />
                    <br />
                    424 Gans Hill School Rd, Smithfield, PA 15478
<br />
                    <br />
Email:
<br />
                    <br />
                    Daves99@yahoo.com</p>
            </div>
            <div id="Email Form">
                <h2>Send a Message</h2>
                <p>Please fill out the form below to contact us:</p>
                <form action="mailto:Daves99@yahoo.com" method="post" enctype="text/plain">
                    Your Name:<br />
                    <input type="text" name="Name" minlength="2" maxlength="60" required /><br />
                    Your email address:<br />
                    <input type="text" name="Email" minlength="2" maxlength="60" required /><br />
                    Message:<br />
                    <textarea rows="5" cols="60" name="Message" required></textarea><br />
                    <br />
                    <input type="submit" value="Send" />
                    <input type="reset" value="Clear Form" />
                </form>

                <script>
                    document.getElementById("reset").addEventListener("click", function () {
                        var forms = document.getElementsByTagName("form");
                        for (var i = 0; i < forms.length; i++) {
                            forms[i].reset();
                        }
                    });
                </script>
            </div>
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3066.3926114249743!2d-79.87450319999999!3d39.77574370000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88356e884e48f0cb%3A0x8e74e082c37f6752!2s424%20Gans%20Hill%20School%20Rd%2C%20Smithfield%2C%20PA%2015478!5e0!3m2!1sen!2sus!4v1675439941829!5m2!1sen!2sus"
                    width="1280"
                    height="300"
                    style="border: 0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </main>
        <footer>
            <p>Copyright © Gan's Hill Holdings 2023</p>
        </footer>
    </body>
</html>
