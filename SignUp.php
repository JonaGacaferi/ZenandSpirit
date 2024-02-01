<?php
session_start();

include("connection.php");
include("function.php");

$usernameError = $emailError = $passwordError = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $user_name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //check if the user exists
  $check_query = "select * from users where user_name = '$user_name' or user_email = '$email' limit 1";
  $check_result = mysqli_query($con, $check_query);

  if ($check_result && mysqli_num_rows($check_result) > 0) {
    //User or email already exists
    echo '<script>alert("Username or email already taken. Please choose another!");</script>';
  } else {
    //Save to database
    $user_id = random_num(20);
    $query = "insert into users (user_id, user_name, user_email, password) values ('$user_id', '$user_name', '$email', '$password')";

    if (mysqli_query($con, $query)) {
      //Set session upon successful signup
      $_SESSION['user_id'] = $user_id;

      //Redirect to homepage
      header("Location: homepage.php");
      exit;
    } else {
      //Handle database error
      echo '<script>alert("Error signing up. Please try again!");</script>';
    }
  }
}
?>

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
  </header>

  <form method="post" onsubmit="return validateForm()">
    <div class="loginForm">
      <h1>SIGN UP</h1>

      <input type="text" id="username" name="username" placeholder="Username" />
      <span id="usernameError" class="error" style="color: red;"><?php echo $usernameError; ?></span>

      <br />

      <input type="email" id="email" name="email" placeholder="Email Address" />
      <span id="emailError" class="error" style="color: red;"><?php echo $emailError; ?></span>

      <br />

      <input type="password" id="password" name="password" placeholder="Create Password" />
      <span id="passwordError" class="error" style="color: red;"><?php echo $passwordError; ?></span>

      <br />

      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" />
      <span id="confirmPasswordError" class="error" style="color: red;"></span>

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