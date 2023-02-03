<?php
// credentials
$dbhost = 'localhost';
$dbuser = 'guitarhero';
$dbpass = '!/-P@s$w0rD/!-1';
$dbname = 'my_guitar_shop1';

// create database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// if the connection fails
if(mysqli_connect_errno()) {
    header('Location: ./database_error.php');
    exit();
}
?>
