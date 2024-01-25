<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zen & Spirit</title>
  <link rel="stylesheet" href="loginform.css" />
  <link rel="icon" href="yogalogo.png" type="image/x-icon" />
</head>

<body>
  <div class="video">
    <video autoplay muted loop id="background_video">
      <source src="img/video_meditation.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
  </div>
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
        <li><a href="#">Products</a></li>
      </ul>
    </nav>
  </div>

  <form onsubmit="return validateForm()">
    <div class="loginForm">
      <h1>LOG IN</h1>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />
      <span id="emailError" class="error"></span>

      <br />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
      <span id="passwordError" class="error"></span>
      <div class="button">
        <a href="login.php"><button class="login">LOG IN</button></a>
      </div>
      <p>New to Zen & Spirit? <a href="SignUp.php">Sign Up</a></p>
    </div>
  </form>

  <script>
    function validateForm() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        document.getElementById("emailError").innerText =
          "Invalid email address";
        return false;
      } else {
        document.getElementById("emailError").innerText = "";
      }

      if (password.length < 8) {
        document.getElementById("passwordError").innerText =
          "Password must be at least 8 characters long";
        return false;
      } else {
        document.getElementById("passwordError").innerText = "";
      }
      return true;
    }
  </script>
</body>

</html>