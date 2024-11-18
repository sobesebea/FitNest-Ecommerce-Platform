<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/brand.css"> 
    <title>Brand Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBrandModal">
        Add New Brand
    </button>

    <!-- Table to show details of brands-->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name of Brand</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
include_once '../controllers/brand_controller.php';
$brands = viewBrandsController(); 

if ($brands) {
    foreach ($brands as $brand) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($brand['brand_name']) . "</td>";
        
        // Correct format in the URL for deletion
        echo "<td>
                <a href='../actions/delete_brand_action.php?id=" . htmlspecialchars($brand['brand_id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Do you want to delete this brand?\")'>
                    <i class='bi bi-trash-fill'></i> Delete
                </a>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No brands found</td></tr>";
}
?>

        </tbody>
    </table>
</div>

<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Add a Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                <form action="../actions/add_brand_action.php" method="POST">
                    <div class="mb-3">
                        <label for="brandName" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="brandName" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Add Brand</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

</body>
</html>