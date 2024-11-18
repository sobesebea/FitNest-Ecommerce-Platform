<?php
include_once '../controllers/brand_controller.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    if (addBrandController($name)) {
        header('Location: ../view/brand.php');
    } else {
        header('Location: ../view/brand.php');
    }
}
?>
