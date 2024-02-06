<?php
include 'products.php';

$productObj = new products();

// a osht submit forma ? 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // upload file 
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

   // is the file uploaded w success
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
       
        if ($productObj->insertProduct($name, $price, $fileName, $description)) {
            header("Location: Dashboard.php?msg1=insert");
            exit; 
        } else {
            echo "Error inserting product into database.";
        }
    } else {
        echo "Error uploading image.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Products</title>
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
        <h2>Add New Product</h2>
        <form action="add_products.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" accept="image/png, image/jpeg, image/jpg, image/gif" name="image" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" rows="4" placeholder="Enter description" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>

</body>
</html>
