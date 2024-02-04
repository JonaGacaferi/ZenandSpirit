<?php

class products
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

  
    public function insertProduct($post)
    {
        $emri = $this->con->real_escape_string($_POST['emri']);
        $cmimi = $this->con->real_escape_string($_POST['cmimi']);
        $image = $this->con->real_escape_string($_POST['image']); 

        $query="INSERT INTO user_form(emri,cmimi,image) VALUES('$emri','$cmimi','$image')";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:Dashboard.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        } 
    }

    
public function displayProducts()
{
    $query = "SELECT * FROM products";
    $result = $this->con->query($query);
    
    if (!$result) {
        
        echo "Error: " . $this->con->error;
        return []; 
    }
    
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
               $data[] = $row;
        }
         return $data;
    } else {
         return []; 
    }
}


    
    public function getProductById($id)
    {
        $id = $this->con->real_escape_string($id);
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null; 
        }    }

    
    public function updateProduct($postData)
    {
        $emri = $this->con->real_escape_string($_POST['uemri']);
        $cmimi = $this->con->real_escape_string($_POST['ucmimi']);
        $image = $this->con->real_escape_string($_POST['uimage']);
        $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
        $query = "UPDATE products SET emri = '$emri', cmimi = '$cmimi', image = '$image' WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:Dashboard.php?msg2=update");
        }else{
            echo "Registration updated failed try again!";
        }
        }    }

   
    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id = '$id'";
        $sql = $this->con->query($query);
    if ($sql==true) {
        header("Location:Dashboard.php?msg3=delete");
    }else{
        echo "Record does not delete try again";
        }    }
}

?>
