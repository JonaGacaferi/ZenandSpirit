<?php
include_once 'connection.php';

class UserRepository
{
    private $connection;

    function __construct()
    {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user)
    {
        $conn = $this->connection;

        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user_form (name, email, password, user_type) VALUES (?,?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$username, $email, $password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";
    }

    function getAllUsers()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user";
        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user_form WHERE id = '$id'";
        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($name, $email, $password, $user_type)
    {
        $conn = $this->connection;

        $sql = "UPDATE user_form SET username = ?, email = ?, password = ?, type = ?, dateAdded = ?";
        $statement = $conn->prepare($sql);
        $statement->execute($name, $email, $password, $user_type);

        //echo "<script>alert('update was successful'); </script>";
    }

    function deleteUser($id)
    {
        $conn = $this->connection;

        $sql = "DELETE FROM user_form WHERE id = ?";
        $statement = $conn->prepare($sql);
        $statement->execute($id);

        //echo "<script>alert('delete was successful'); </script>";
    }

    public function userExists($name, $email)
    {
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) AS count FROM user_form WHERE username = ? OR email = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'] > 0;
    }
}
