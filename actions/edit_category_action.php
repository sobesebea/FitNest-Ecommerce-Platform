<?php
include_once '../controllers/category_controller.php'; 

// Checking if the 'id' parameter is being passed via GET method
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Check if the form was submitted successfully
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['cat_name'];
        
        //  Update the category
        if (updateCategoryController($id, $name)) {
            header('Location: ../view/category.php'); 
        } 
    }
}
?>