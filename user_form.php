<?php

    class userat
    {
        private $server = "localhost";
        private $username   = "root";
        private $password   = "";
        private $database   = "person";
        public  $con;


        // Database Connection 
        public function __construct()
        {
            $this->con = new mysqli($this->server, $this->username,$this->password,$this->database);
            if(mysqli_connect_error()) {
             trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
            }else{
            return $this->con;
            }
        }

        // Insert customer data into customer table
        public function insertData($post)
        {
           
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $password = $this->con->real_escape_string($_POST['password']);
           // $user_type = $this->con->real_escape_string($_POST['user_type']);


            $query="INSERT INTO user_form(name,email,password) VALUES('$name','$email','$password')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:Dashboard.php?msg1=insert");
            }else{
                echo "Registration failed try again!";
            }
        }

        // Fetch customer records for show listing
        public function displayData()
        {
            $query = "SELECT * FROM user_form";
            $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;
            }else{
             echo "No found records";
            }
        }

        // Fetch single data for edit from customer table
        public function displayRecordById($id)
        {
            $query = "SELECT * FROM user_form WHERE id = '$id'";
            $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
            }else{
            echo "Record not found";
            }
        }

        // Update customer data into customer table
        public function updateRecord($postData)
        {
            $name = $this->con->real_escape_string($_POST['uname']);
            $email = $this->con->real_escape_string($_POST['uemail']);
            $password = $this->con->real_escape_string($_POST['upassword']);
            $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE user_form SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:Dashboard.php?msg2=update");
            }else{
                echo "Registration updated failed try again!";
            }
            }
            
        }

        // Delete customer data from customer table
        public function deleteRecord($id)
        {
            $query = "DELETE FROM user_form WHERE id = '$id'";
            $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:Dashboard.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
            }
        }
    }
?>