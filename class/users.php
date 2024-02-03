<?php
include_once 'connection.php';
include_once 'class/UserRepository.php';

$userRepository = new UserRepository();
$users = $userRepository->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="loginform.css" />
</head>

<body>
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
    <main>
        <h1>Users</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email Address</th>
                <th>Password</th>
                <th>User_Type</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['user_type']; ?></td>
                    <td><a href='editUser.php?id=<?php echo $student['id'] ?>'>Edit</a></td>
                    <td><a href='deleteUser.php?id=<?php echo $student['id'] ?>'>Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </main>

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
                <p><a href="ContactUs.php" style="text-decoration: none; color: #c3c3c3;">Contact Us</a></p>
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
</body>

</html>