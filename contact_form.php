<?php

class contact_form
{
    private $server = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "person";
    public  $con;

    public function __construct()
    {
        $this->con = new mysqli($this->server, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }

    // Insert contact form data into contact_forms table
    public function insertContactForm($post)
    {
        $name = $this->con->real_escape_string($_POST['name']);
        $email = $this->con->real_escape_string($_POST['email']);
        $note = $this->con->real_escape_string($_POST['note']);
    
        $query="INSERT INTO contact_form(name,email,note) VALUES('$name','$email','$note')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:Dashboard.php?msg1=insert");
            }else{
                echo "Registration failed try again!";
            }
    }

    // Fetch contact form records for listing
    // Fetch contact form records for listing
public function displayContactForms()
{
    $query = "SELECT * FROM contact_form";
    $result = $this->con->query($query);

    if (!$result) {
        // Handle query error
        echo "Error: " . $this->con->error;
        return []; // Return empty array
    }

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
               $data[] = $row;
        }
         return $data;
    } else {
         return []; // Return empty array if no records found
    }
}


    // Fetch single contact form data for edit
    public function getContactFormById($id)
    {
        $query = "SELECT * FROM contact_form WHERE id = '$id'";
        $result = $this->con->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
        }else{
        echo "Record not found";
        }    }

    // Update contact form data in the contact_forms table
    public function updateContactForm($postData)
    {
        $name = $this->con->real_escape_string($_POST['uname']);
        $email = $this->con->real_escape_string($_POST['uemail']);
        $note = $this->con->real_escape_string($_POST['unote']);
        $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
        $query = "UPDATE contact_form SET name = '$name', email = '$email', note = '$note' WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:Dashboard.php?msg2=update");
        }else{
            echo "Registration updated failed try again!";
        }
        }    }

    // Delete contact form data from the contact_forms table
    public function deleteContactForm($id)
    {
        $query = "DELETE FROM contact_form WHERE id = '$id'";
        $sql = $this->con->query($query);
    if ($sql==true) {
        header("Location:Dashboard.php?msg3=delete");
    }else{
        echo "Record does not delete try again";
        }    }
}

?>
