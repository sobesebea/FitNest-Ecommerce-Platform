<?php
include_once '../classes/brand_class.php'; 

// Add a brand 
function addBrandController($name) {
    $database = new db_connection(); 
    $brand = new Brand($database->db); 
    return $brand->addBrand($name); 
}

//Delete a brand  
function deleteBrandController($id) {
    $database = new db_connection(); 
    $brand = new Brand($database->db); 
    return $brand->deleteBrand($id); 
}


function viewBrandsController() {
    $database = new db_connection(); 
    $brand = new Brand($database->db); 
    return $brand->getBrands(); 
}


// Get brand 
function getBrandByIdController($id) {
    $database = new db_connection(); 
    $brand = new Brand($database->db); 
    return $brand->getBrandById($id); 
}
?>