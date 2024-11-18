<?php
include_once('../controllers/customer_register_controller.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer = new Customer();


    $customer_image = null;
    if (isset($_FILES['customer_image']) && $_FILES['customer_image']['error'] == UPLOAD_ERR_OK) {
        $allowed_type = ['image/jpeg', 'image/png', 'image/gif']; // Different type of files allowed
        $file_types = mime_content_type($_FILES['customer_image']['tmp_name']);
        
        if (in_array($file_types, $allowed_type)) {
            $upload_directory = 'images/';
            $customer_image = $upload_directory . basename($_FILES['customer_image']['name']);
            move_uploaded_file($_FILES['customer_image']['tmp_name'], $customer_image);
        } else {
            die("Invalid file type. Only PNG,JPG and GIF is allowed.");
        }
    }

   
    if (empty($_POST['customer_email']) || empty($_POST['customer_pass']) || empty($_POST['customer_name'])) {
        die("All required fields must be filled out.");
    }

    // Validation of email 
    if (!filter_var($_POST['customer_email'], FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address.");
    }

    // Hash the password to prevent unauntorize access 
    $hashed_password = password_hash($_POST['customer_pass'], PASSWORD_BCRYPT);

   
    $data = [
        'customer_name' => $_POST['customer_name'],
        'customer_email' => $_POST['customer_email'],
        'customer_pass' => $hashed_password,
        'customer_country' => $_POST['customer_country'],
        'customer_city' => $_POST['customer_city'],
        'customer_contact' => $_POST['customer_contact'],
        'user_role' => 2,
        'customer_image' => $customer_image,
    ];

   
    if ($customer->add_Customer($data)) {
        header("Location: ../view/login.php");
        exit();
    } else {
        echo "Error during registration. Please try again.";
    }
}
?>