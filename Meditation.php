<?php
session_start();

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen & Spirit</title>
    <link rel="stylesheet" href="meditation.css">
    <link rel="icon" href="yogalogo.png" type="image/x-icon">
</head>
<header>
    <<div class="menu">
        <nav>
            <div class="logo1">
                <img src="yogalogo.png" height="40px" class="logo1" />
                <p class="logo">Zen & Spirit</p>
            </div>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li><a href="logout.php">LogOut</a></li>
                <?php else : ?>
                    <li><a href="loginform.php">Log In</a></li>
                <?php endif; ?>
                <li><a href="YogaClasses.php">Yoga Classes</a></li>
                <li><a href="Meditation.php">Meditation Classes</a></li>
                <li><a href="TranquilGoods.php">TranquilGoods</a></li>
            </ul>
        </nav>
        </div>


        <p id="p-header"> Immerse your consciousness in a state of deep peace</p>
</header>

<body>
    <div class="container">
        <div class="slide-pics">
            <img name="slider" id="slideshow" />
            <div class="next-button" onclick="nextImg()"></div>
            <div class="prev-button" onclick="prevImg()"></div>

        </div>
        <div class="meditation-gallery">
            <div class="image-container">
                <img src="img_Jona/foto1.jpg" alt="Meditation foto 1">

                <div class="text-meditation-gallery">
                    <h2>Discover Inner Peace Through Meditation</h2>

                    <p>Embrace the tranquility that meditation offers as <br>you embark on a journey to discover the profound stillness within.<br>
                        Let go of the chaos of daily life and find solace in the present moment.<br>
                        Meditation is the key to unlocking the door to inner peace.</p>
                </div>
            </div>
            <div class="image-container">
                <img src="img_Jona/meditation3.jpg" alt="Meditation foto 3">
                <div class="text-meditation-gallery">
                    <h2>Mindful Meditation for Stress Relief</h2>

                    <p>In the hustle and bustle of our modern lives, stress can often overwhelm us. <br>
                        Explore the transformative power of mindful meditation to cultivate a calm mind. <br>
                        Through focused breath and awareness,<br>
                        you can navigate the challenges with a sense of peace.</p>
                </div>
            </div>
            <div class="image-container">
                <img src="img_Jona/meditation4.jpg" alt="Meditation foto 4">
                <div class="text-meditation-gallery">
                    <h2>Serenity Within: Guided Meditation Sessions</h2>

                    <p>Immerse yourself in guided meditation sessions to lead you to a place of deep serenity.<br>
                        Allow the soothing voice to gently guide your mind, creating a space for relaxation and renewal.<br>
                        Each session is a step towards a more centered and balanced life.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        var i = 0;
        var imgArray = [
            "img_Jona/foto10.jpg",
            "img_Jona/foto2.jpg",
            "img_Jona/foto3.jpg",
            "img_Jona/foto4.jpg",
            "img_Jona/foto5.jpg",
        ];

        function nextImg() {
            document.getElementById('slideshow').src = imgArray[i];
            if (i < imgArray.length - 1) {
                i++;
            } else {
                i = 0;
            }

        }
        document.body.addEventListener('load', nextImg());

        function prevImg() {
            document.getElementById('slideshow').src = imgArray[i];
            if (i >= 0) {
                i--;
            } else {
                i = imgArray.length - 1;
            }
        }
        document.body.addEventListener('load', prevImg());
    </script>
</body>
<footer>
    <div class="f">
        <h2>About Our Page</h2>
        <h2>Our Links</h2>
        <div class="ff" style="color: #434952">
            <a href="https://www.facebook.com/"><img src="facebook_logo.png" alt=""></a>
            <a href="https://www.instagram.com/"><img src="instagram_logo.png" alt=""></a>
            <a href="https://www.youtube.com/"><img src="youtube_logo1.png" alt="" style="width: 40px"></a>
        </div>
    </div>

    <div class="footermain">
        <div class="footerleft">
            <p style="color: #c3c3c3"> Harmonize Your Existence: Immerse Yourself in Tranquility with our Guided Yoga and Meditation Experiences.</p>
        </div>
        <div class="footercenter" style="color: #c3c3c3">
            <p>Help</p>
            <p>Support</p>
            <p><a href="ContactUs.php" style="text-decoration: none; color: #c3c3c3;">Contact Us</a></p>

        </div>
        <div class="footerright" style="color: #c3c3c3">
            <p>Terms of use</p>
            <p>Privacy Policy</p>
        </div>
    </div>
    <div class="fundi" style="color: #a895b4">
        <p>© 2023 Zen & Spirit. All rights reserved.</p>
        <p>Designed by B&J</p>
    </div>


</footer>

</html>