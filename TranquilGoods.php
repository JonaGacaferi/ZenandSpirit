<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <link rel="icon" href="yogalogo.png" type="image/x-icon">
    
    <title>TranquilGoods</title>
</head>
<body>

    <header>
        <div class="menu">
            <nav class="navbar">
                <img src="yogalogo.png" class="logo1" >
    
                <p class="logo">Zen & Spirit</p>
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

<div id="login-container">
    <h2>Login to see available products </h2>
    <form id="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="button" onclick="login()">Login</button>
    </form>
</div>

<section id="product-container" style="display: none;">
    <h2 class="product-title">Yoga & Meditation Equipment</h2>
    
    <div class="product-box">


        <img src="img_jona/product1.jpg" alt="Yoga Mat">
        <h3 id="titulli-prod">Premium Yoga Mat</h3>
        <p>Experience ultimate comfort in your practice with our high-quality yoga mat.</p>
        <span class="price">$29.99</span>
        <box-icon name='add-to-cart-bag'></box-icon>
    </div>
    <div class="product-card">
        <img src="img_jona/product2.jpg" alt="Yoga blocks">
        <h3 id="titulli-prod"> Yoga Blocks for stretches </h3>
        <p>Elevate your Yoga practice with stability and comfort</p>
        <span class="price">$29.99</span>
        <box-icon name='add-to-cart-bag'></box-icon>
    </div>
    <div class="product-card">
        <img src="img_jona/product4.jpg" alt="Yoga Mat">
        <h3 id="titulli-prod">Meditation Singing Bowls</h3>
        <p>The mallet and bowl bring a calming focus to a meditation practice</p>
        <span class="price">$29.99</span>
        <box-icon name='add-to-cart-bag'></box-icon>
    </div>
    <div class="product-card">
        <img src="img_jona/product3.jpg" alt="Yoga Mat">
        <h3 id="titulli-prod">Premium Yoga Mat</h3>
        <p>Experience ultimate comfort in your practice with our high-quality yoga mat.</p>
        <span class="price">$29.99</span>
        <box-icon name='add-to-cart-bag'></box-icon>
    </div>

    <div class="product-card">
        <img src="img_jona/product3.jpg" alt="Yoga Mat">
        <h3 id="titulli-prod">Premium Yoga Mat</h3>
        <p>Experience ultimate comfort in your practice with our high-quality yoga mat.</p>
        <span class="price">$29.99</span>
        <box-icon name='add-to-cart-bag'></box-icon>
    </div>

    <div class="product-card">
        <img src="img_jona/product3.jpg" alt="Yoga Mat">
        <h3 id="titulli-prod">Premium Yoga Ball</h3>
        <p>ZenBall: Balance Your Yoga Journey</p>
        <span class="price">$29.99</span>
        <box-icon name='add-to-cart-bag'></box-icon>
    </div>
    
</section>

<script src="products.js"></script>
</body>
</html>
