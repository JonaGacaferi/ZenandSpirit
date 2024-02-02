

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zen & Spirit</title>
  <link rel="stylesheet" href="homepage.css" />
  <link rel="icon" href="yogalogo.png" type="image/x-icon" />
</head>
<header>
  <div class="menu">
    <nav >
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

  <h2 id="h2-header">
    Find balance, peace, and <br />harmony within yourself.
  </h2>
  <p id="p-brenda-h2-header">
    Unleash the power of positive <br />affirmations in our empowering
    workshops. <br />
    Cultivate a mindset of self-love, resilience,and abundance as <br />
    you harness the transformative energy of words. <br />
    Through guided exercises and discussions, you'll<br />
    create a personalized practice that uplifts and empowers.
  </p>
</header>

<body>
  <section class="evente">
    <div class="titulli">
      <h1>Your Yoga and Meditation Hub</h1>
    </div>
    <div class="flex-box">
      <div class="kolonat">
        <img src="img_Jona/foto1.jpg" height="300px" width="300px" />
        <h4>Featured Classes</h4>
        <p>
          Explore a variety of classes tailored <br />
          to meet your unique needs.
        </p>


        <button class="buttons-flex-box">Learn More</button>
      </div>
      <div class="kolonat">
        <img src="img_Jona/foto2.jpg" height="300px" width="300px">
        <h4>Join Us for a Session</h4>
        <p>Connect with like-minded individuals,
          <br> and nurture your mind and body
        </p>
        <button class="buttons-flex-box">Learn More</button>
      </div>
      <div class="kolonat">
        <img src="img_Jona/foto3.jpg" height="300px" width="300px" />
        <h4>Join Us for a Session</h4>
        <p>
          Connect with like-minded individuals, <br />
          and nurture your mind, body, and
        </p>
        <button class="buttons-flex-box">Learn More</button>
      </div>
    </div>
  </section>

  <section class="video1">
    <video id="bcgr-vid" autoplay loop muted>
      <source src="img_Jona/video3.mp4" type="video/mp4">
    </video>

    <div class="text-1">
      <h2 id="h2-1">Creating Your Sacred Space</h2>
      <div class="text-1">
        <h2 id="h2-1">Creating Your Sacred Space</h2>

        <p id="p1">Find tranquility and balance as you embark on a journey of self-discovery with Zen & Spirit.<br>
          We invite you to explore the ancient practices of meditation and yoga,<br>
          guiding you toward a path of holistic well-being and inner peace.</p>
      </div>
      

    <div class="text-2">
      <h2 id="h2-2">Our Vision: Nurturing Mind, Body, and Spirit</h2>
        <p id="p2"> At Zen & Spirit, we believe in the transformative power of mindfulness<br>
          and the profound connection between mind, body, and spirit.<br>
          Our mission is to provide a sacred space for you to cultivate <br>
          a harmonious and balanced life through the timeless practices of meditation and yoga.</p>
      </div>
      <div class="text-3">
        <h2 id="h2-3">Meditation: A Journey Inward</h2>
        <p id="p3">Meditation is the art of cultivating a quiet mind and a centered spirit.<br>
          By dedicating time to stillness and mindfulness, <br>
          we can observe our thoughts without attachment and let go of unnecessary stress. </p>
      </div>
      <div class="text-3">
        <h2 id="h2-3">Meditation: A Journey Inward</h2>

        <p id="p3">Meditation is the art of cultivating a quiet mind and a centered spirit.<br>
          By dedicating time to stillness and mindfulness, <br>
          we can observe our thoughts without attachment and let go of unnecessary stress. </p>
      </div>
  </section>
  

</body>
<footer>
  <div class="f">
    <h2>About Our Page</h2>
    <h2>Our Links</h2>
    <div class="ff" style="color: #434952">
      <a href="https://www.facebook.com/"><img src="facebook_logo.png" alt=""></a>
      <a href="https://www.instagram.com/"><img src="instagram_logo.png" alt=""></a>
      <a href="https://www.youtube.com/"><img src="youtube_logo1.png" alt="" style="width: 40px;"></a>
    </div>
  </div>
  <div class="footermain">
    <div class="footerleft">
      
      <p> Harmonize Your Existence: Immerse Yourself in Tranquility with our Guided Yoga and Meditation Experiences.</p>
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
    <div class="fundi">
      <p>© 2023 Zen & Spirit. All rights reserved.</p>
      <p>Designed by B&J</p>
    </div>
  </div>
</footer>


</html>