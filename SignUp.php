<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zen & Spirit</title>
  <link rel="stylesheet" href="signupform.css" />
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
        </ul>
      </nav>
    </div>
  </header>

  <form onsubmit="return validateForm()">
    <div class="loginForm">
      <h1>SIGN UP</h1>

      <input type="text" id="username" name="username" placeholder="Username" required />
      <span id="usernameError" class="error"></span>

      <br />

      <input type="email" id="email" name="email" placeholder="Email Address" required />
      <span id="emailError" class="error"></span>

      <br />

      <input type="password" id="password" name="password" placeholder="Create Password" required />
      <span id="passwordError" class="error"></span>

      <br />

      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required />
      <span id="confirmPasswordError" class="error"></span>

      <div class="button">
        <a href="#"><button class="login">SIGN UP</button></a>
      </div>
      <p>
        Already part of the community? <a href="loginform.php">Log In</a>
      </p>
    </div>
  </form>

  <script>
    function validateForm() {
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      if (username.trim() === "") {
        document.getElementById("usernameError").innerText =
          "Username cannot be empty";
        return false;
      } else {
        document.getElementById("usernameError").innerText = "";
      }

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

      if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerText =
          "Passwords do not match";
        return false;
      } else {
        document.getElementById("confirmPasswordError").innerText = "";
      }
      return true;
    }
  </script>
</body>

</html>