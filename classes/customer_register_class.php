<?php
require_once('../settings/db_class.php');

class Customer extends db_connection {
    
    // Add customer
    public function add_Customer($data) {
      
        $sql = "INSERT INTO customer (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_image, user_role) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param(
            "sssssssi", 
            $data['customer_name'], 
            $data['customer_email'], 
            $data['customer_pass'], 
            $data['customer_country'], 
            $data['customer_city'], 
            $data['customer_contact'], 
            $data['customer_image'], 
            $data['user_role']
        );
        
        // Execute query and return result
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Database error: " . $stmt->error);
            return false;
        }
    }

    // Function to check if the user's email exists
    public function emailExists($email) {
        $sql = "SELECT customer_email FROM customer WHERE customer_email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }
}
?>
