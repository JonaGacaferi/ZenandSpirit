<?php
session_start();
include 'connection.php';
include_once 'class/User.php';
include_once 'class/UserRepository.php';
include_once 'class/Admin.php';
include_once 'class/AdminRepository.php';

function checkForErrors($name, $email, $password, $confirm, $user)
{
  $userRepository = new UserRepository();

  if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
    return "<span style='color: red;'>Please fill all the fields!</span>";
  } elseif ($userRepository->userExists($name, $email)) {
    return "<span style='color: red;'>User with the given username or email already exists!</span>";
  }
  return null;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm = $_POST['confirmPassword'];
  $role = $_POST['user_type'];

  $user = new User($name, $email, $password, $role);

  $error = checkForErrors($name, $email, $password, $confirm, $user);

  if ($error) {
    echo "<p class='error-message'>$error</p>";
  } else {
    $userRepository = new UserRepository();
    $userRepository->insertUser($user);
    header("Location: loginform.php");
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
          <li><a href="loginform.php">Log In</a></li>
          <li><a href="YogaClasses.php">Yoga Classes</a></li>
          <li><a href="Meditation.php">Meditation Classes</a></li>
          <li><a href="TranquilGoods.php">TranquilGoods</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <form method="post" action="SignUp.php" onsubmit="validateForm(event)">
    <div class="loginForm">
      <h1>SIGN UP</h1>

      <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST" && $error) {
        echo "<p class='error-message'>$error</p>";
      }
      ?>

      <input type="text" id="username" name="username" placeholder="Username" />
      <span id="usernameError" class="error" style="color: red;"></span>

      <br />

      <input type="email" id="email" name="email" placeholder="Email Address" />
      <span id="emailError" class="error" style="color: red;"></span>

      <br />

      <input type="password" id="password" name="password" placeholder="Create Password" />
      <span id="passwordError" class="error" style="color: red;"></span>

      <br />

      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" />
      <span id="confirmPasswordError" class="error" style="color: red;"></span>

      <label class="form-label">Select User Type:</label>

      <select class="type" name="user_type">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <div class="button">
        <button type="submit" class="login" name="submit">SIGN UP</button>
      </div>
      <p>
        Already part of the community? <a href="loginform.php">Log In</a>
      </p>
    </div>
  </form>

  <script>
    function validateForm(event) {

      let usernameInput = document.getElementById('username');
      let usernameError = document.getElementById('usernameError');

      let emailInput = document.getElementById('email');
      let emailError = document.getElementById('emailError');

      let passwordInput = document.getElementById('password');
      let passwordError = document.getElementById('passwordError');

      let confirmpasswordInput = document.getElementById('confirmPassword');
      let confirmPasswordError = document.getElementById('confirmPasswordError');

      let usernameRegex = /^[a-zA-Z0-9\-]+$/;;
      let emailRegex = /^[a-zA-Z0-9. _-]+@[a-zA-Z0-9. -]+\.[a-zA-Z]{2,4}$/;

      usernameError.innerText = '';
      emailError.innerText = '';
      passwordError.innerText = '';
      confirmPasswordError.innerText = '';

      let isValid = true;

      if (!usernameRegex.test(usernameInput.value)) {
        usernameError.innerText = 'Please enter a valid username!';
        isValid = false;
      }
      if (!emailRegex.test(emailInput.value)) {
        emailError.innerText = 'Please enter a valid email!';
        isValid = false;
      }
      if (passwordInput.value.length < 8) {
        passwordError.innerText = 'Password must be at least 8 characters long!';
        isValid = false;
      }
      if (passwordInput.value !== confirmpasswordInput.value) {
        confirmPasswordError.innerText = 'Password does not match!';
        isValid = false;
      }

      if (!isValid) {
        event.preventDefault();
      }
    }
  </script>
</body>

</html>