<?php
require('../settings/db_class.php');

class Product {
    private $db;

    public function __construct() {
        $this->db = new db_connection();
    }

    // Create a service
    public function createProduct($category, $brand, $title, $price, $desc, $image, $keywords) {
        $sql = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->db->db, $sql);
        
        mysqli_stmt_bind_param($stmt, 'iisssss', $category, $brand, $title, $price, $desc, $image, $keywords);
        return mysqli_stmt_execute($stmt);
    }
    public function getAllBrands() {
        $sql = "SELECT brand_id, brand_name FROM brands";
        $result = mysqli_query($this->db->db, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllCategories() {
        $sql = "SELECT cat_id, cat_name FROM categories";
        $result = mysqli_query($this->db->db, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
        
    

    // Edit a service 
    public function editProduct($category, $brand, $title, $price, $desc, $image, $keywords) {
        $sql = "UPDATE products 
                SET product_cat=?, product_brand=?, product_title=?, product_price=?, product_desc=?, product_image=?, product_keywords=? 
                WHERE product_id=?";
        $stmt = mysqli_prepare($this->db->db, $sql);
        mysqli_stmt_bind_param($stmt, 'ssdsssi', $category, $brand, $title, $price, $desc, $image, $keywords, $id); // Changed type for price
        return mysqli_stmt_execute($stmt);
    }

    // Delete a service by id
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE product_id=?";
        $stmt = mysqli_prepare($this->db->db, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return mysqli_stmt_execute($stmt);
    }

    // View  all service
    public function viewProducts() {
        $sql = "SELECT p.product_id, c.cat_name, b.brand_name, p.product_title, p.product_price, 
                       p.product_desc, p.product_image, p.product_keywords
                FROM products p
                JOIN categories c ON p.product_cat = c.cat_id
                JOIN brands b ON p.product_brand = b.brand_id";
        $result = mysqli_query($this->db->db, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Get product by ID
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE product_id=?";
        $stmt = mysqli_prepare($this->db->db, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    public function getCategories() {
        $sql = "SELECT * FROM categories"; 
        $result = mysqli_query($this->db->db, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
}
?>