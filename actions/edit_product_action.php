<?php
include_once '../controllers/product_controller.php';

// Check if the 'id' parameter is passed via GET method
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect form inputs
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_title = $_POST['product_title'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

    
        if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES['product_image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

       
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($imageFileType, $allowed_types)) {
                if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                    $product_image = $target_file;
                } else {
                
                    die("Error uploading image.");
                }
            } else {
                die("Invalid image format. Only JPG, JPEG, PNG & GIF files are allowed.");
            }
        } else {
            $product_image = $_POST['existing_image'];
        }

        if (!empty($product_cat) && !empty($product_brand) && !empty($product_title) && !empty($product_price) && !empty($product_desc) && !empty($product_keywords)) {
            
            //  Update the product
            if (editProductController($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)) {
                header('Location: ../view/product.php');
            } 
        } 
    }
} else {
    die("Invalid product ID.");
}
?>