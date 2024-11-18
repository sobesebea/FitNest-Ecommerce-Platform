<?php
include_once '../classes/category_class.php'; 

//  Create a category
function addCategoryController($name) {
    $database = new db_connection(); 
    $category = new Category($database->db); 
    return $category->createCategory($name); 
}

// Update a Category 
function updateCategoryController($id, $name) {
    $database = new db_connection(); 
    $category = new Category($database->db); 
    return $category->editCategory($id, $name); 
}


// Get all categories 
function viewCategoriesController() {
    $database = new db_connection(); 
    $category = new Category($database->db); 
    return $category->getCategories();
}


// Get a Category by ID 
function getCategoryByIdController($id) {
    $database = new db_connection(); 
    $category = new Category($database->db); 
    return $category->getCategoryById($id); 
}

// Delete a category by id
function deleteCategoryController($id) {
    $database = new db_connection(); 
    $category = new Category($database->db); 
    return $category->deleteCategory($id); 
}

?>