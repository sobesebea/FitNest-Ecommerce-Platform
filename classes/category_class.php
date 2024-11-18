<?php
require('../settings/db_class.php');

class Category {
    private $conn;

    // Initiate the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a category
    public function createCategory($name) {
        $stmt = $this->conn->prepare("INSERT INTO categories (cat_name) VALUES (?)");
        $stmt->bind_param('s', $name);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Edit the category
    public function editCategory($id, $name) {
        $stmt = $this->conn->prepare("UPDATE categories SET cat_name = ? WHERE cat_id = ?");
        $stmt->bind_param('si', $name, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Delete a category by id
    public function deleteCategory($id) {
        $stmt = $this->conn->prepare("DELETE FROM categories WHERE cat_id = ?");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Get all categories
    public function getCategories() {
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Get category by ID
    public function getCategoryById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM categories WHERE cat_id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();
        $stmt->close();
        return $category;
    }
}
?>