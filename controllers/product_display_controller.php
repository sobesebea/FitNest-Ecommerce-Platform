<?php
// product_display_controller.php
require_once('../classes/product_display_class.php');

// Instantiate the Product class
$productModel = new Product();
$products = $productModel->getAllProducts();
