<?php
require_once('../classes/customer_register_class.php'); 
require_once('../settings/db_class.php'); 

$customer = new Customer(); 
$customer_image = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $errors = [];

    // Validation of  data input
    if (empty($_POST['customer_name'])) {
        $errors[] = 'Name is required.';
    }
    if (empty($_POST['customer_email']) || !filter_var($_POST['customer_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required, it should be an Ashesi email.';
    }
    if (empty($_POST['customer_pass']) || strlen($_POST['customer_pass']) < 6) {
        $errors[] = 'Password must be at least 6 characters long.';
    }
    if (empty($_POST['customer_country'])) {
        $errors[] = 'Country is required.';
    }
    if (empty($_POST['customer_city'])) {
        $errors[] = 'City is required.';
    }

    // Validate contact number with country code
    if (empty($_POST['customer_contact']) || !preg_match('/^\+?\d{1,4}?[-.\s]?(\d{10,15})$/', $_POST['customer_contact'])) {
        $errors[] = 'Valid contact number is required with country code.';
    }

    // upload an Image
    if (isset($_FILES['customer_image']) && $_FILES['customer_image']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'images/';
        
        // Check if the directory exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); 
        }

        // Define the file path of the uploaded image
        $customer_image = $upload_dir . basename($_FILES['customer_image']['name']);

       
        if (!move_uploaded_file($_FILES['customer_image']['tmp_name'], $customer_image)) {
            $errors[] = "Failed to upload image.";
        }
    }

    // Add a customer with no errors 
    if (empty($errors)) {
        // Combine country code with contact number
        $data = [
            'customer_name' => $_POST['customer_name'],
            'customer_email' => $_POST['customer_email'],
            'customer_pass' => password_hash($_POST['customer_pass'], PASSWORD_BCRYPT), 
            'customer_country' => $_POST['customer_country'],
            'customer_city' => $_POST['customer_city'],
            'customer_contact' => $_POST['customer_contact'], 
            'user_role' => 2,
            'customer_image' => $customer_image,
        ];

        // Verify user success after adding a customer 
        if ($customer->add_Customer($data)) {
           
            header('Location: ../view/login.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($customer->db);
        }
    } else {  
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
