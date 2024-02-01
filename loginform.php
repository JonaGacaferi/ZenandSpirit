<?php
session_start();

include("connection.php");
include("function.php");

$usernameError = $emailError = $passwordError = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Something was posted
  $user_name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if the user exists
  $query = "select * from users where user_name = ? limit 1";

  // Using prepared statement to prevent SQL injection
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "s", $user_name);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Check if a redirect parameter is present
  $redirect_page = isset($_GET['redirect']) ? $_GET['redirect'] : 'homepage';

  if ($result) {
    $user_data = mysqli_fetch_assoc($result);

    //Check if the user exists
    if ($user_data) {
      //Check if the email matches
      if ($user_data['user_email'] == $email) {
        //User exists, now check the password
        if ($user_data['password'] == $password) {
          $_SESSION['user_id'] = $user_data['user_id'];

          //Redirect to the specified page
          header("Location: $redirect_page.php");
          exit;
        } else {
          //Email doen't match
          $passwordError = "Wrong password!";
        }
      } else {
        //Email doesn't match
        $emailError = "Wrong email!";
      }
    } else {
      //User not found in the database
      $usernameError = "User not found. Please sign up firs!";

      echo '<script>';
      echo 'alert("User not found. Please sign up first!");';
      echo 'window.location.href = "SignUp.php"';
      echo '</script>';
      exit;
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
        <li><a href="TranquilGoods.php">TranquilGoods</a></li>
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li><a href="logout.php">LogOut</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>

  <form method="post" onsubmit="return validateForm()">
    <div class="loginForm">
      <h1>LOG IN</h1>

      <label for="Username">Username</label>
      <input type="text" id="username" name="username" />
      <span id="usernameError" class="error" style="color: red;"><?php echo $usernameError; ?></span>

      <br>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" />
      <span id="emailError" class="error" style="color: red;"><?php echo $emailError; ?></span>

      <br />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" />
      <span id="passwordError" class="error" style="color: red;"><?php echo $passwordError; ?></span>

      <div class="button">
        <a href="login.php"><button class="login">LOG IN</button></a>
      </div>
      <p>New to Zen & Spirit? <a href="SignUp.php">Sign Up</a></p>
    </div>
  </form>

  <script>
    function validateForm() {
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      var usernameError = document.getElementById("usernameError");
      var emailError = document.getElementById("emailError");
      var passwordError = document.getElementById("passwordError");

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
      return true;


    }
  </script>
</body>

</html>