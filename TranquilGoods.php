<?php
session_start();

//if (!isset($_SESSION['user_id']) || !isset($_SESSION['admin_id'])) {
//    header("Location: loginform.php");
//    die;
//}

require_once 'connection.php';

if (isset($_POST['add_product'])) {
    $product_emri = $_POST['product_emri'];
    $product_cmimi = $_POST['product_cmimi'];
    $product_foto = $_FILES['product_foto']['name'];
    $product_foto_tmp_name = $_POST['product_foto']['tmp_name'];
    $product_foto_folder = 'img_Jona/' . $product_foto;

    if (empty($product_emri) || empty($product_cmimi) || empty($product_foto)) {
        $message[] = 'Fill all the boxes';
    }
}

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

<body>




    <header>
        <div class="menu">
            <nav>
                <div class="logo1">
                    <img src="yogalogo.png" height="40px" width="40px" class="logo1" />
                    <p class="logo">Zen & Spirit</p>
                </div>
                <ul>
                    <li><a href="homepage.php">Home</a></li>

                    <?php if (isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])) : ?>
                        <li><a href="logout.php">Log Out</a></li>
                    <?php else : ?>
                        <li><a href="loginform.php">Log In</a></li>
                    <?php endif; ?>

                    <li><a href="YogaClasses.php">Yoga Classes</a></li>
                    <li><a href="Meditation.php">Meditation Classes</a></li>
                    <li><a href="TranquilGoods.php">TranquilGoods</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<span class="message">' . $msg . '</span>';
        }
    }
    ?>

    <section id="product-container">
        <h2 class="product-title">Yoga & Meditation Equipment</h2>
        <div class="cart"></div>
        <div class="shopping">

            <div class="product-box">
                <img src="img_jona/product1.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Mat</h3>
                <p>Practice with our high-quality yoga mat.</p>
                <span class="price">$19.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="product-box">
                <img src="img_jona/product2.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod"> Yoga Blocks for stretches </h3>
                <p>Elevate your practice </p>
                <span class="price">$22.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="product-box">
                <img src="img_jona/product4.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Meditation Singing Bowls</h3>
                <p>The singing mallet and bowl </p>
                <span class="price">$15.49</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="product-box">
                <img src="img_jona/product3.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Mat</h3>
                <p>Experience ultimate mat comfort </p>
                <span class="price">$19.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>

            <div class="product-box">
                <img src="img_jona/product3.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Mat</h3>
                <p>Experience ultimate mat comfort </p>
                <span class="price">$20.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>

            <div class="product-box">
                <img src="img_jona/product3.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Ball</h3>
                <p>ZenBall: Balance Your Yoga Journey</p>
                <span class="price">$9.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>

            <div class="product-box">
                <img src="img_jona/product3.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Ball</h3>
                <p>ZenBall: Balance Your Yoga Journey</p>
                <span class="price">$29.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <div class="product-box">
                <img src="img_jona/product3.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Ball</h3>
                <p>ZenBall: Balance Your Yoga Journey</p>
                <span class="price">$29.99</span>
                <i class='bx bx-shopping-bag  add-cart'></i>
            </div>
            <div class="product-box">
                <img src="img_jona/product3.jpg" alt=" " class="product-images">
                <h3 id="titulli-prod">Premium Yoga Ball</h3>
                <p>ZenBall: Balance Your Yoga Journey</p>
                <span class="price">$29.99</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
    </section>
    <div id="cart-popup" class="cart-popup">
        <div class="cart-content" id="draggable-cart">
            <span class="close" onclick="closeCart()">&times;</span>
            <h2>Shopping Cart</h2>
            <ul id="cart-items">
            </ul>
            <div id="total-price"></div>
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>

    <div class="container-admin">
        <div class="admin-product-form">
            <form action="<?php $_SERVER['PHP_SELF'] ?>">
                <h3>Add a new product</h3>
                <input type="text" placeholder="enter product name" name="product_emri" class="box">
                <input type="number" placeholder="enter product price" name="product_cmimi" class="box">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_foto" class="box">
                <input type="submit" class="btn" name="add_product" value="add product">
            </form>

        </div>


    </div>



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

<script src="products.js"></script>


</html>