<?php
include 'user_form.php'; 
include 'products.php';
include 'contact_form.php';

$userObj = new userat();
$productObj = new products();
$contactObj = new contact_form();



if(isset($_GET['deleteUserId']) && !empty($_GET['deleteUserId'])) {
    $deleteUserId = $_GET['deleteUserId'];
    $userObj->deleteRecord($deleteUserId);
}

if(isset($_GET['editUserId']) && !empty($_GET['editUserId'])) {
  $editUserId = $_GET['editUserId'];
  // Redirect to edit.php with the user ID for editing
  header("Location: edit.php?editId=$editUserId");
  exit; // Stop further execution to prevent accidental output
}

if(isset($_GET['deleteProductId']) && !empty($_GET['deleteProductId'])) {
    $deleteProductId = $_GET['deleteProductId'];
    $productObj->deleteProduct($deleteProductId);
}

if(isset($_GET['editProductId']) && !empty($_GET['editProductId'])) {
  $editProductId = $_GET['editProductId'];
  // Redirect to edit.php with the product ID for editing
  header("Location: edit_products.php?editId=$editProductId");
  exit; // Stop further execution to prevent accidental output
}


if(isset($_GET['deleteContactFormId']) && !empty($_GET['deleteContactFormId'])) {
    $deleteContactFormId = $_GET['deleteContactFormId'];
    $contactObj->deleteContactForm($deleteContactFormId);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
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
        .col {
            width: 30%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        table {
          width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-container">
        <h2>Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            ...
<tbody>
    <?php
    $users = $userObj->displayData();
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>{$user['id']}</td>";
        echo "<td>{$user['name']}</td>";
        echo "<td>{$user['email']}</td>";
        echo "<td>{$user['password']}</td>";
        echo "<td>
        <a href='edit.php?editUserId={$user['id']}' class='btn'>Edit</a>

              </td>";
        echo "<td>
        <a href='Dashboard.php?deleteProductId={$user['id']}' class='btn' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>

              </td>";
        echo "</tr>";
    }
    ?>
</tbody>
...

        </table>
    </div>

    <div class="table-container">
            <h2>Products</h2>
            <table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $products = $productObj->displayProducts();
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td><img src='images/{$product['image']}' alt='{$product['name']}' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>
                    <a href='edit_products.php?editProductId={$product['id']}' class='btn'>Edit</a>
                    <a href='dashboard.php?deleteProductId={$product['id']}' class='btn' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
        </div>
        <div class="table-container">
            <h2>Contact us </h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $contacts = $contactObj->displayContactForms();
                foreach ($contacts as $contact) {
                    echo "<tr>";
                    echo "<td>{$contact['name']}</td>";
                    echo "<td>{$contact['email']}</td>";
                    echo "<td>{$contact['note']}</td>";

                    echo "<td>
                            <a href='#' class='btn btn-primary mr-2'><i class='fa fa-pencil'></i></a>
                            <a href='Dashboard.php?deleteProductId=" . (isset($contact['id']) ? $contact['id'] : '') . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this contact form?\");'><i class='fa fa-trash'></i></a>
                          </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    
    document.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn')) {
        var button = event.target;
        if (button.textContent === 'Delete') {
            var confirmDelete = confirm("Are you sure you want to delete this item?");
            if (!confirmDelete) {
                event.preventDefault(); 
            }
        } else if (button.textContent === 'Edit') {
            var editURL = button.getAttribute('href');
            window.location.href = editURL; 
            event.preventDefault(); 
        }
    }
});

</script>
</body>
</html>
