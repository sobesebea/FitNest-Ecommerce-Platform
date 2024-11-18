<?php
require('../controllers/product_controller.php');

function createProductAction() {
    // Check for form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['product_cat'], $_POST['product_brand'], $_POST['product_title'], $_POST['product_price'], $_POST['product_desc'], $_POST['product_keywords'])) {
            // Use a POST request
            $category = $_POST['product_cat'];
            $brand = $_POST['product_brand'];
            $title = $_POST['product_title'];
            $price = $_POST['product_price'];
            $desc = $_POST['product_desc'];
            $keywords = $_POST['product_keywords'];

            //Image uploading
            $image = null; 
            if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
                $image = handleImageUpload($_FILES['product_image']);
            }

            // Craete a product
            $result = createProductController($category, $brand, $title, $price, $desc, $image, $keywords);

            
            if ($result) {
                header('Location: ../view/product.php');
                exit();
            } 
        } 
    }
}

function handleImageUpload($file) {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($file["name"]);

    // Upload image
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file; 
    }
    return null; 
}

//Create a product 
createProductAction();
?>