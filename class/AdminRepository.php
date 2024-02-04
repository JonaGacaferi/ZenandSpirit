<?php
include_once 'Admin.php';
include_once 'connection.php';

class AdminRepository
{
    private $connection;

    function __construct()
    {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertAdmin($admin)
    {
        $conn = $this->connection;

        $username = $admin->getUsername();
        $email = $admin->getEmail();
        $password = $admin->getPassword();

        $sql = "INSERT INTO user_form (username, email, password) VALUES (?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$username, $email, $password]);

        echo "<script> alert('Admin has been inserted successfuly!'); </script>";
    }

    function getAllAdmins()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user_form";
        $statement = $conn->query($sql);
        $admins = $statement->fetchAll();

        return $admins;
    }

    function getAdminById($id)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user_form WHERE id = '$id'";
        $statement = $conn->query($sql);
        $admin = $statement->fetch();

        return $admin;
    }

    function updateAdmin($username, $email, $password, $role)
    {
        $conn = $this->connection;

        $sql = "UPDATE user_form SET username = ?, email = ?, password = ? WHERE role = ?";
        $statement = $conn->prepare($sql);
        $statement->execute($username, $email, $password);

        //echo "<script>alert('update was successful'); </script>";
    }

    function deleteAdmin($id)
    {
        $conn = $this->connection;

        $sql = "DELETE FROM user_form WHERE id = ?";
        $statement = $conn->prepare($sql);
        $statement->execute($id);

        //echo "<script>alert('delete was successful'); </script>";
    }

    function adminExists($username, $email)
    {
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) AS count FROM user_form WHERE username = ? OR email = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$username, $email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'] > 0;
    }

    function getAdminByUsername($username)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user_form WHERE name = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$username]);
        $adminRecord = $statement->fetch(PDO::FETCH_ASSOC);

        if ($adminRecord) {
            $admin = new Admin(
                $adminRecord['name'],
                $adminRecord['email'],
                $adminRecord['password'],
                $adminRecord['user_type']
            );
            return $admin;
        }
        return null;
    }
}
