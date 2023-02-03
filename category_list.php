<?php
require_once('database.php');

// Get all categories
$categories = mysqli_query($connection, 'SELECT * FROM categories');

// Adding new categories
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $new_category = filter_input(INPUT_POST, 'new_category');
    mysqli_query($connection, "INSERT INTO categories (categoryName) VALUES ('{$new_category}')");

    // Redirect to database_error page if there is an error
    if (mysqli_connect_errno()) {
        header('Location: ./database_error.php');
    } else {
         // Or display the Product List page
        header('Location: ./index.php');
    }

}

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- Display all categories -->
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td>
                <?php echo $category['categoryName']; ?>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <h2>Add Category</h2>
    
    <!-- Form to add new categories -->
    <form action="category_list.php" method="post">
        <input type="text" name="new_category">
        <input type="submit" value="Add Category">
    </form>
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>
