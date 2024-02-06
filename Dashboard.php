<?php
include 'user_form.php';
include 'products.php';
include 'contact_form.php';

$userObj = new userat();
$productObj = new products();
$contactObj = new contact_form();

$products = $productObj->displayProducts();

if (isset($_GET['deleteUserId']) && !empty($_GET['deleteUserId'])) {
    $deleteUserId = $_GET['deleteUserId'];
    $userObj->deleteRecord($deleteUserId);
}

if(isset($_GET['editUserId']) && !empty($_GET['editUserId'])) {
    $editUserId = $_GET['editUserId'];
    header("Location: edit.php?editId=$editUserId");
    exit;
}

if (isset($_GET['deleteProductId']) && !empty($_GET['deleteProductId'])) {
    $deleteProductId = $_GET['deleteProductId'];
    $productObj->deleteProduct($deleteProductId);
}

if(isset($_GET['editProductId']) && !empty($_GET['editProductId'])) {
    $editProductId = $_GET['editProductId'];
    header("Location: edit_products.php?editId=$editProductId");
    exit;
}

if (isset($_GET['deleteContactFormId']) && !empty($_GET['deleteContactFormId'])) {
    $deleteContactFormId = $_GET['deleteContactFormId'];
    $contactObj->deleteContactForm($deleteContactFormId);
}

if(isset($_GET['editContactFormId']) && !empty($_GET['editContactFormId'])) {
    $editContactFormId = $_GET['editContactFormId'];
    header("Location: edit_contactform.php?editId=$editContactFormId");
    exit;
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

        header {
            height: 10vh;
        }

        nav {
            left: 0;
            top: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            position: fixed;
            background-color: #c3c3c3;
            opacity: 0.9;

        }

        .logo1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        img {
            margin-left: 25px;
        }

        .logo {
            width: 710px;
            color: #333;
            margin-left: 25px;
        }

        .logo :hover {
            color: #333;
            transition-duration: 0.3s;
        }

        nav ul li {
            display: inline-block;
            list-style-type: none;
            margin: 10px 20px;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            position: relative;

        }

        nav ul li a::after {
            content: '';
            width: 0;
            left: 0;
            height: 3px;
            background: #333;
            position: absolute;
            transition-duration: 0.3s;
            bottom: -5px;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        .container {
            max-width: 1050px;
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

        th,
        td {
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
            color: gray;
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

        @media screen and (max-width: 1024px) {
            header {
                height: auto;
            }

            .logo {
                width: auto;
            }

            nav ul {
                flex-direction: row;
                justify-content: space-around;
            }

        }

        @media screen and (max-width: 767px) {
            .logo {
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            table {
                width: 100%;
                overflow-x: auto;
            }

            th,
            td {
                white-space: nowrap;
                max-width: 100%;
                box-sizing: border-box;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            th {
                position: -webkit-sticky;
                position: sticky;
                top: 0;
                background-color: #f2f2f2;
                z-index: 1;
            }
        }
    </style>
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
        <a href='edit.php?editUserId={$user['id']}' class='btn'>Edit</a>

              </td>";
                        echo "<td>
        <a href='Dashboard.php?deleteUserId={$user['id']}' class='btn' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>

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
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>" . (isset($product['id']) ? $product['id'] : '') . "</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td><img src='images/{$product['image']}' alt='{$product['name']}' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>" . (isset($product['description']) ? $product['description'] : '') . "</td>"; 
            echo "<td>
                    <a href='edit_products.php?editProductId=". (isset($product['id']) ? $product['id'] : '') . "' class='btn'>Edit</a>
                    <a href='dashboard.php?deleteProductId=" . (isset($product['id']) ? $product['id'] : '') . "' class='btn' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>
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
                      echo "<td>" . (isset($contact['id']) ? $contact['id'] : '') . "</td>";
          
                      echo "<td>{$contact['name']}</td>";
                      echo "<td>{$contact['email']}</td>";
                      echo "<td><{$contact['note']}</td>";
                      echo "<td>
                              <a href='edit_contacts.php?editContactFormId=". (isset($contact['id']) ? $contact['id'] : '') . "' class='btn'>Edit</a>
                              <a href='dashboard.php?deleteContactFormId=" . (isset($contact['id']) ? $contact['id'] : '') . "' class='btn' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>
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