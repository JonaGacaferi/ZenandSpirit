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

if(isset($_GET['deleteProductId']) && !empty($_GET['deleteProductId'])) {
    $deleteProductId = $_GET['deleteProductId'];
    $productObj->deleteProduct($deleteProductId);
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
                            <a href='edit.php?editId={$user['id']}' class='btn'>Edit</a>
                            <a href='dashboard.php?deleteUserId={$user['id']}' class='btn' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
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
                    <th>Image </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $products = $productObj->displayProducts();
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>{$product['id']}</td>";
                    echo "<td>{$product['emri']}</td>";
                    echo "<td>{$product['cmimi']}</td>";
                    echo "<td>
                            <a href='#' class='btn btn-primary mr-2'><i class='fa fa-pencil'></i></a>
                            <a href='dashboard.php?deleteProductId={$product['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\");'><i class='fa fa-trash'></i></a>
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
                    echo "<td>{$contact['id']}</td>";
                    echo "<td>{$contact['name']}</td>";
                    echo "<td>{$contact['email']}</td>";
                    echo "<td>{$contact['note']}</td>";

                    echo "<td>
                            <a href='#' class='btn btn-primary mr-2'><i class='fa fa-pencil'></i></a>
                            <a href='dashboard.php?deleteProductId={$contact['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this contact form?\");'><i class='fa fa-trash'></i></a>
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
    
    var deleteButtons = document.querySelectorAll('.btn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var confirmDelete = confirm("Are you sure you want to delete this item?");
            if (!confirmDelete) {
                event.preventDefault();
            }
        });
    });
</script>
</body>
</html>
