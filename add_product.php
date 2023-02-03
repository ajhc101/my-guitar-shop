<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    mysqli_query($connection, "INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES ('{$category_id}', '{$code}', '{$name}', '{$price}')");

    // Redirect to error page if there is an error
    if (mysqli_connect_errno()) {
        header('Location: ./database_error.php');
    } else {
         // Or display the Product List page
        header('Location: ./index.php');
    }
}
?>
