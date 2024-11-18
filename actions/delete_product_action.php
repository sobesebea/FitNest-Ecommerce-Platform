<?php
include_once '../controllers/product_controller.php';

if (isset($_GET['id'])) {
    // Store the passed product ID 
    $product_id = $_GET['id'];

  // Using a GET method
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Call the controller function to delete the product
        if (deleteProductController($product_id)) {
            
            header('Location: ../view/product.php');
        } else {
            header('Location: ../views/view_product.php?error=Error deleting product');
        }
    }
} else {
    die("Invalid product ID.");
}
?>