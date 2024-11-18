<?php
include_once '../controllers/brand_controller.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    if (deleteBrandController($id)) {

        header('Location: ../view/brand.php?success=Brand deleted successfully');
        exit; 
    } else {
        
        header('Location: ../view/brand.php?error=Failed to delete brand');
        exit; 
    }
} else {
    
    header('Location: ../view/brand.php?error=No brand ID provided');
    exit; 
}
?>
