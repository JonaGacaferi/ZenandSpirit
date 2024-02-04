<?php
include 'user_form.php';

$useratObj = new userat();

$editId = $uform = [];

if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $uform = $useratObj->displayRecordById($editId);

   if (!$uform) {
        echo "Error: User data not found!";   
     }
}

if(isset($_POST['update'])) {

    $useratObj->updateRecord($_POST);
}

if(isset($_POST['submit'])) {

    $useratObj->insertData($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit/Add User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="edit-section">
        <h2>Edit User</h2>
        <form action="edit_add.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="uname" value="<?php echo isset($uform['name']) ? $uform['name'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="uemail" value="<?php echo isset($uform['email']) ? $uform['email'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="upassword" value="<?php echo isset($uform['password']) ? $uform['password'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo isset($uform['id']) ? $uform['id'] : ''; ?>">
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </div>

    <div class="add-section">
        <h2>Add New User</h2>
        <form action="edit_add.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>

</body>
</html>
