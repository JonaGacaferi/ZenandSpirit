<?php
include 'products.php';

$productObj = new products();

$editId = $uform = [];

if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];

    $uform = $productObj->displayProducts($editId);

    if (!$uform) {
        echo "Error: Product data not found!";
    }
}

if (isset($_POST['update'])) {
    $productObj->updateProduct($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit User</title>
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
        input[type="price"],
        input[type="image"] ,
        input[type="description"]{
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
            <h2>Edit Products</h2>
            <form action="edit_products.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="uname" value="<?php echo isset($uform['name']) ? $uform['name'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="price" name="uprice" value="<?php echo isset($uform['price']) ? $uform['price'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" value="<?php echo isset($uform['image']) ? $uform['image'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" value="<?php echo isset($uform['description']) ? $uform['description'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo isset($uform['id']) ? $uform['id'] : ''; ?>">
                    <input type="submit" name="update" value="Update">
                </div>
            </form>
        </div>
    </div>

</body>

</html>