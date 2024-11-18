<?php
include_once '../controllers/category_controller.php';

// Use a GET method
if (isset($_GET['id'])) {
   
    $id = $_GET['id'];
    
    // Delete the category
    if (deleteCategoryController($id)) {
        header('Location: ../view/category.php'); 
    } else {
        header('Location: ../view/category.php'); 
    }
}
?>