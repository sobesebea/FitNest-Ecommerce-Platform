<?php
require('../settings/db_class.php');

class Brand {
    private $conn; 

    // Initialize the database 
    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function addBrand($name) {
        $sql = "INSERT INTO brands (brand_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("s", $name); 
        return $stmt->execute(); 
    }

    // Delete a brand by id
    public function deleteBrand($id) {
        $sql = "DELETE FROM brands WHERE brand_id = ?";
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("i", $id); 
        return $stmt->execute(); 
    }

    // Get all brands
    public function getBrands() {
        $sql = "SELECT * FROM brands";
        $result = $this->conn->query($sql); 
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    
    public function getBrandById($id) {
        $sql = "SELECT * FROM brands WHERE brand_id = ?";
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("i", $id); 
        $stmt->execute(); 
        return $stmt->get_result()->fetch_assoc(); 
    }

    
}
?>
