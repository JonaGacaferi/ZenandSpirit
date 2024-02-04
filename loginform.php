<?php
session_start();

include("connection.php");
include("class/User.php");
include("class/Admin.php");
include("class/UserRepository.php");
include("class/AdminRepository.php");

$usernameError = $passwordError = "";

function redirectTo($user)
{
  echo "<script>window.location.href = '" . ($user->isAdmin() ? "Dashboard.php" : "homepage.php") . "';</script>";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user_name = $_POST['username'];
  $password = $_POST['password'];

  $userRepository = new UserRepository();
  $adminRepository = new AdminRepository();

  $user = $userRepository->getUserByUsername($user_name);
  $admin = $adminRepository->getAdminByUsername($user_name);

  if ($user && password_verify($password, $user->getPassword())) {
    $_SESSION['user_id'] = $user->getId();
    redirectTo($user);
  } elseif ($admin && password_verify($password, $admin->getPassword())) {
    $_SESSION['admin_id'] = $admin->getId();
    redirectTo($admin);
  } else {
    if (!$user) {
      echo '<script>alert("User not found.");</script>';
    } elseif (!password_verify($password, $user->getPassword())) {
      echo '<script>alert("Incorrect password.");</script>';
    }
    // Uncomment the following line to redirect to the login page instead of signup
    // echo '<script>window.location.href = "loginform.php";</script>';

    //echo '<script>alert("User not found. Please sign up first.");</script>';
    //echo '<script>window.location.href = "SignUp.php";</script>';
    //exit;
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
      </ul>
    </nav>
  </div>

  <form method="post" onsubmit="return validateForm(event)">
    <div class="loginForm">
      <h1>LOG IN</h1>

      <label for="Username">Username</label>
      <input type="text" id="username" name="username" />
      <span id="usernameError" class="error" style="color: red;"><?php echo $usernameError; ?></span>

      <br>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" />
      <span id="passwordError" class="error" style="color: red;"><?php echo $passwordError; ?></span>

      <div class="button">
        <button class="login">LOG IN</button>
      </div>
      <p>New to Zen & Spirit? <a href="SignUp.php">Sign Up</a></p>
    </div>
  </form>

  <script>
    function validateForm(event) {
      let usernameInput = document.getElementById('username');
      let usernameError = document.getElementById('usernameError');

      let passwordInput = document.getElementById('password');
      let passwordError = document.getElementById('passwordError');

      usernameError.innerText = '';
      passwordError.innerText = '';

      let usernameRegex = /^[a-zA-Z0-9\-]+$/;;

      let isValid = true;

      if (usernameInput.value.trim() === '') {
        usernameError.innerText = 'Please enter a valid username!';
        isValid = false;
      } else if (!usernameRegex.test(usernameInput.value)) {
        usernameError.innerText = 'Invalid characters in the username!';
        isValid = false;
      }

      if (passwordInput.value.length < 8) {
        passwordError.innerText = 'Password must be at least 8 characters long!';
        isValid = false;
      }
      if (!isValid) {
        event.preventDefault();
      }
    }
  </script>
</body>

</html>