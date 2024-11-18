<?php
require_once('../settings/db_class.php');

class Product extends db_connection {

    // Method to fetch all products from the database
    public function getAllProducts() {
        $sql = "SELECT product_id, product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords FROM products";
        $result = mysqli_query($this->db, $sql); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

