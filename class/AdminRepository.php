<?php
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

        $sql = "INSERT INTO admin (username, email, password) VALUES (?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$username, $email, $password]);

        echo "<script> alert('Admin has been inserted successfuly!'); </script>";
    }

    function getAllAdmins()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM admin";
        $statement = $conn->query($sql);
        $admins = $statement->fetchAll();

        return $admins;
    }

    function getAdminById($id)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM admin WHERE id = '$id'";
        $statement = $conn->query($sql);
        $admin = $statement->fetch();

        return $admin;
    }

    function updateAdmin($username, $email, $password, $role)
    {
        $conn = $this->connection;

        $sql = "UPDATE admin SET username = ?, email = ?, password = ? WHERE role = ?";
        $statement = $conn->prepare($sql);
        $statement->execute($username, $email, $password);

        //echo "<script>alert('update was successful'); </script>";
    }

    function deleteAdmin($id)
    {
        $conn = $this->connection;

        $sql = "DELETE FROM admin WHERE id = ?";
        $statement = $conn->prepare($sql);
        $statement->execute($id);

        //echo "<script>alert('delete was successful'); </script>";
    }

    public function adminExists($username, $email)
    {
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) AS count FROM admin WHERE username = ? OR email = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$username, $email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'] > 0;
    }
}
