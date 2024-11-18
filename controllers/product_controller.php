<?php
require('../classes/product_class.php');

$database = new db_connection(); 
$productModel = new Product($database->db); 

//  Create a product
function createProductController($category, $brand, $title, $price, $desc, $image, $keywords) {
    global $productModel; 
    return $productModel->createProduct($category, $brand, $title, $price, $desc, $image, $keywords);
}

// Edit a product 
function editProductController($product_id, $category, $brand, $title, $price, $desc, $image, $keywords) {
    global $productModel; 
    return $productModel->editProduct($product_id, $category, $brand, $title, $price, $desc, $image, $keywords);
}

// Delete a product by ID 
function deleteProductController($product_id) {
    global $productModel; 
    return $productModel->deleteProduct($product_id);
}

// View all products 
function viewProductsController() {
    global $productModel; 
    return $productModel->viewProducts();
}

// Get a product by ID 
function getProductByIdController($product_id) {
    global $productModel; 
    return $productModel->getProductById($product_id);
}
?>