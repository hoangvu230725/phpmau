<?php
// Include your database connection and CRUD class
require_once "crud_database.php";
$crud = new crud_database();

// Check if the product ID is passed via URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Call the function to delete the product
    $crud->deleteProduct($productId);

    // Redirect back to the product listing page after deletion
    header("Location: crud.php"); // Adjust this to the appropriate page
    exit;
}
?>
