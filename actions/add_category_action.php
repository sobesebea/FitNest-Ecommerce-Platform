<?php
include_once '../controllers/category_controller.php'; 


if (isset($_POST['submit'])) {
    // Retrieve the category name 
    $name = $_POST['cat_name'];
    
    // Add the category
    if (addCategoryController($name)) {
        header('Location: ../view/category.php'); 
    } else {
        header('Location: ../view/category.php'); 
    }
}
?>