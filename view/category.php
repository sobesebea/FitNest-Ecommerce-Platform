<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/view_category.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../js/category.js" defer></script>
    <title>Manage Categories</title>
    <style>
        
        body {
            background-color: #f0f8ff; 
        }

        .container {
            background-color: #ffffff; 
            border-radius: 10px; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
            padding: 30px; 
        }

        h2 {
            color: #2c3e50; 
            margin-bottom: 20px; 
            text-align: center; 
            font-family: 'Arial', sans-serif; 
        }

        .btn-primary {
            background-color: #3498db; 
            border: none;
            transition: background-color 0.3s ease; 
        }

        .btn-primary:hover {
            background-color: #2980b9; 
        }

        .btn-success {
            background-color: #2ecc71; 
            border: none;
        }

        .btn-success:hover {
            background-color: #27ae60; 
        }

        .btn-warning {
            background-color: #f1c40f; 
            border: none;
        }

        .btn-warning:hover {
            background-color: #f39c12; 
        }

        .btn-danger {
            background-color: #e74c3c; 
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b; 
        }

        .btn-sm {
            font-size: 0.85rem; 
        }

        .table th {
            background-color: #3498db; 
            color: white; 
        }

        .table {
            border-radius: 10px; 
            overflow: hidden;
        }

        .modal-content {
            border-radius: 10px; 
        }

        .modal-header {
            background-color: #2c3e50; 
            color: white; 
        }

        .modal-body {
            padding: 20px; 
        }
    </style>
</head>
<body>

<div class="container mt-5">
    
    <h2>Manage Categories</h2> 

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="bi bi-plus-circle-fill"></i> Add New Category
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../controllers/category_controller.php';
            $categories = viewCategoriesController(); 

            if ($categories) {
                foreach ($categories as $category) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($category['cat_name']) . "</td>";
                    echo "<td>
                            <button class='btn btn-warning btn-sm edit-btn' 
                                    data-id='" . $category['cat_id'] . "' 
                                    data-name='" . htmlspecialchars($category['cat_name']) . "'>
                                <i class='bi bi-pencil-fill'></i> Edit
                            </button>
                            <a href='../actions/delete_category_action.php?id=" . $category['cat_id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this category?\")'>
                                <i class='bi bi-trash-fill'></i> Delete
                            </a>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No categories found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/add_category_action.php" method="POST">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="cat_name" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" method="POST">
                    <input type="hidden" id="editCategoryId" name="id">
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" name="cat_name" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="edit_category">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const categoryId = button.getAttribute('data-id');
            const categoryName = button.getAttribute('data-name');

            document.getElementById('editCategoryId').value = categoryId;
            document.getElementById('editCategoryName').value = categoryName;

            const editCategoryModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
            editCategoryModal.show();
        });
    });
});
</script>

</body>
</html>
