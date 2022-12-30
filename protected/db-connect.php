<?php
// Set the database connection variables
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'online_business';

// Connect to the database
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
