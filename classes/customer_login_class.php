<?php
require('../settings/db_class.php'); 

class CustomerLogin {
    private $db;

    public function __construct() {
        
        $this->db = new db_connection(); 
    }

    //Verification of email and password
    public function checkCredentials($email, $password) {
        // SQL query to get the customer by email
        $query = "SELECT * FROM customer WHERE customer_email = ?"; 

        // Prepare the statement
        $stmt = $this->db->db->prepare($query); 
        if ($stmt === false) {
            error_log("Database prepare error: " . $this->db->db->error);
            return false; 
        }

        // Bind parameters
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result(); 

        // Fetch the customer data
        $customer = $result->fetch_assoc();

        
        if ($customer && password_verify($password, $customer['customer_pass'])) {
            return true; 
        }

        return false; 
    }
}
?>
