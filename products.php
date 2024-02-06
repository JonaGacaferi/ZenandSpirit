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

  
    public function insertProduct($name, $price, $image, $description){
        $query = "INSERT INTO products (name, price, image, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("ssss", $name, $price, $image, $description);
        $stmt->execute();
        $stmt->close();
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
            $name = $this->con->real_escape_string($_POST['uname']);
            $price = $this->con->real_escape_string($_POST['uprice']);
           
            $image = isset($_POST['uimage']) ? $this->con->real_escape_string($_POST['uimage']) : '';
            $description = $this->con->real_escape_string($_POST['description']);
            $id = $this->con->real_escape_string($_POST['id']);
        
            if (!empty($id) && !empty($postData)) {
                $query = "UPDATE products SET name = '$name', price = '$price', image = '$image'  , description='$description' WHERE id = '$id'";
                $sql = $this->con->query($query);
                if ($sql == true) {
                    header("Location:Dashboard.php?msg2=update");
                } else {
                    echo "Registration updated failed try again!";
                }
            }
        }
        
   
        public function deleteProduct($id)
        {
            $id = $this->con->real_escape_string($id);
            $query = "DELETE FROM products WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                return true; 
            } 
        }
    }        

?>
