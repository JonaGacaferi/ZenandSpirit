<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zen & Spirit</title>
    <link rel="stylesheet" href="ContactUs.css" />
    <link rel="icon" href="yogalogo.png" type="image/x-icon" />
</head>

<body>
    <header>
        <div class="menu">
            <nav>
                <div class="logo1">
                    <img src="yogalogo.png" height="50px" class="logo1" />
                    <p class="logo">Zen & Spirit</p>
                </div>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="loginform.php">Log In</a></li>
                    <li><a href="YogaClasses.php">Yoga Classes</a></li>
                    <li><a href="Meditation.php">Meditation Classes</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main-content">
        <div class="left-section">
            <img src="img/ContactPhoto.jpg" alt="Your Image">
        </div>

        <form onsubmit="return validateContactForm()" class="contact-form">
            <h2>CONTACT US</h2>
            <p type="Name:"><input placeholder="Your Name"></input></p>
            <p type="Email:"><input placeholder="Your Email"></input></p>
            <p><textarea placeholder="Type your message here..."></textarea></p>
            <button type="submit">Send Message</button>

            <div class="NumriKontaktues">
                <span class="numri"></span>041 332 223
                <span class="email"></span> zen_spirit@gmail.com
            </div>
        </form>
    </div>

    <div style="height: 100px;"></div>

    <footer>
        <div class="f">
            <h2>About Our Page</h2>
            <h2>Our Links</h2>
            <div class="ff" style="color: #434952">
                <a href="https://www.facebook.com/"><img src="facebook_logo.png" alt="" /></a>
                <a href="https://www.instagram.com/"><img src="instagram_logo.png" alt="" /></a>
                <a href="https://www.youtube.com/"><img src="youtube_logo1.png" alt="" style="width: 40px" /></a>
            </div>
        </div>
        <div class="footermain">
            <div class="footerleft">
                <p>
                    Harmonize Your Existence: Immerse Yourself in Tranquility with our
                    Guided Yoga and Meditation Experiences.
                </p>
            </div>
            <div class="footercenter">
                <p>Help</p>
                <p>Support</p>
                <p>Contact</p>
            </div>
            <div class="footerright">
                <p>Terms of use</p>
                <p>Privacy Policy</p>
            </div>
        </div>
        <div class="fundi">
            <p>© 2023 Zen & Spirit. All rights reserved.</p>
            <p>Designed by B&J</p>
        </div>
    </footer>

    <script>
        function validateContactForm() {
            var name = document.getElementById("name").value;
            var contactEmail = document.getElementById("contactEmail").value;
            var message = document.getElementById("message").value;

            if (name.trim() === "") {
                document.getElementById("nameError").innerText = "Name cannot be empty!";
                return false;
            } else {
                document.getElementById("nameError").innerText = "";
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(contactEmail)) {
                document.getElementById("contactEmailError").innerText = "Invalid email address!";
                return false;
            } else {
                document.getElementById("contactEmailError").innerText = "";
            }

            if (message.trim() === "") {
                document.getElementById("messageError").innerText = "Message cannot be empty!";
                return false;
            } else {
                document.getElementById("messageError").innerText = "";
            }
        }
    </script>
</body>

</html>