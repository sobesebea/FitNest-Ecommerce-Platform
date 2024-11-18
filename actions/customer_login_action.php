<?php
require_once('../classes/customer_login_class.php'); 
require_once('../settings/db_class.php');

function loginCustomer($postData) {
    // Instantiate the CustomerLogin class
    $customerLogin = new CustomerLogin();
    $errors = [];

    // Validate email
    if (empty($postData['customer_email']) || !filter_var($postData['customer_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email is required.';
    }

    // Validate password
    if (empty($postData['customer_pass'])) {
        $errors[] = 'Password is required.';
    }

    // If there are no validation errors, proceed
    if (empty($errors)) {
        $email = $postData['customer_email'];
        $password = $postData['customer_pass'];

        // Check credentials
        if ($customerLogin->checkCredentials($email, $password)) {
            // Set up session or other login mechanisms
            session_start();
            $_SESSION['customer_email'] = $email;

            // Redirect to the dashboard after successful login
            header('Location: ../view/homepage.php');
            exit();
        } else {
            // If credentials are invalid, show an error
            echo "<p style='color:red;'>Invalid email or password.</p>";
        }
    } else {
        // Show validation errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
