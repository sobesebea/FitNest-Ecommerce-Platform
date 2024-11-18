<?php
require_once('../actions/customer_login_action.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Using a POST function for login 
    loginCustomer($_POST);
} else {
    echo "Invalid request method.";
}
?>

