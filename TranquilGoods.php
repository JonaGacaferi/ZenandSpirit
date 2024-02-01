<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: loginform.php');
    exit;
}


include("connection.php");
include("function.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <link rel="icon" href="yogalogo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <title>TranquilGoods</title>
</head>


<header>
        <div class="menu">
            <nav>
                <div class="logo1">
                    <img src="yogalogo.png" height="50px" width="40px" class="logo1" />
                    <p class="logo">Zen & Spirit</p>
                </div>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="loginform.php">Log In</a></li>
                    <li><a href="YogaClasses.php">Yoga Classes</a></li>
                    <li><a href="Meditation.php">Meditation Classes</a></li>
                    <li><a href="TranquilGoods.php">TranquilGoods</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        


<section id="product-container" style="display: none;">
    <h2 class="product-title">Yoga & Meditation Equipment</h2>
    <!-- Cart Icon -->
<!-- Cart Icon -->
<div id="cart-icon">
    <img src="img_jona/cart-icon.png" alt="Cart Icon">
</div>


<!-- Cart Popup -->
<div id="cart-popup">
    <div id="cart-items">
        <!-- Cart items will be displayed here -->
    </div>
    <div id="total-price">Total: $0.00</div>
</div>


    <div class="shopping">

    <div class="product-box">
        <img src="img_jona/product1.jpg" alt=" "  class="product-images"  >
        <h3 id="titulli-prod">Premium Yoga Mat</h3>
        <p>Practice with our high-quality yoga mat.</p>
        <span class="price">$22.49</span>
        <i class='bx bx-shopping-bag add-cart add-to-cart'></i>

    </div>
    <div class="product-box">
        <img src="img_jona/product2.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod"> Yoga Blocks to stretch </h3>
        <p>Elevate your practice </p>
        <span class="price">$19.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>
    </div>
    <div class="product-box">
        <img src="img_jona/product4.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Meditation Singing Bowls</h3>
        <p>The singing mallet and bowl </p>
        <span class="price">$29.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>
    </div>
    <div class="product-box">
        <img src="img_jona/product3.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Premium Yoga Mat</h3>
        <p>Experience ultimate mat comfort </p>
        <span class="price">$16.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>
    </div>

    <div class="product-box">
        <img src="img_jona/product3.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Premium Yoga Mat</h3>
        <p>Experience ultimate mat comfort </p>
        <span class="price">$9.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>
    </div>

    <div class="product-box">
        <img src="img_jona/product3.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Premium Yoga Ball</h3>
        <p>ZenBall: Balance Your Yoga Journey</p>
        <span class="price">$25.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>    
    </div>

    <div class="product-box">
        <img src="img_jona/product3.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Premium Yoga Ball</h3>
        <p>ZenBall: Balance Your Yoga Journey</p>
        <span class="price">$5.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>
    </div>
    <div class="product-box">
        <img src="img_jona/product3.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Premium Yoga Ball</h3>
        <p>ZenBall: Balance Your Yoga Journey</p>
        <span class="price">$12.49</span>
        <i class='bx bx-shopping-bag  add-cart'></i>
    </div>
    <div class="product-box">
        <img src="img_jona/product3.jpg" alt=" "  class="product-images">
        <h3 id="titulli-prod">Premium Yoga Ball</h3>
        <p>ZenBall: Balance Your Yoga Journey</p>
        <span class="price">$20.99</span>
        <i class='bx bx-shopping-bag add-cart'></i>
    </div>
</div>
</section>

<script src="products.js"></script>
</body>
<footer>
        <div class="f">
            <h2 class="about">About Our Page</h2>
            <h2 class="links">Our Links</h2>
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
                <p><a href="ContactUs.php">Contact Us</a></p>
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
</html>
