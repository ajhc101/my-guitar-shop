<?php
require_once('database.php');

// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
mysqli_query($connection, "DELETE FROM products WHERE productID = {$product_id} AND categoryID = {$category_id}");

// Redirect to error page if there is an error
if (mysqli_connect_errno()) {
    header('Location: ./database_error.php');
} else {
     // Or display the Product List page
    header('Location: ./index.php');
}
?>
