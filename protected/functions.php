<?php
// Check if the user is logged in
function isLoggedIn()
{
    // Check if the session variable 'user_id' is set
    return isset($_SESSION['user_id']);
}

// Get the user's account information
function getUser()
{
    // Connect to the database
    require_once 'db-connect.php';
    // Get the user's ID from the session variable
    $user_id = $_SESSION['user_id'];

    // Select the user's account information from the database
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

// Validate the account form
function validateAccountForm()
{
    // Initialize an errors array
    $errors = array();
    // Validate the form data
    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    }
    if (empty($_POST['email'])) {
        $errors[] = 'Email is required';
    }
    if (!empty($_POST['password']) || !empty($_POST['confirm_password'])) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errors[] = 'Passwords do not match';
        }
    }

    // Return the errors array
    return $errors;
}

//Update the user's account information in the database
function updateAccount($user_id)
{
    // Connect to the database
    require_once 'db-connect.php';
    // Escape the form data to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Build the update query
    $query = "UPDATE users SET name = '$name', email = '$email'";
    if (!empty($password)) {
        $query .= ", password = '$password'";
    }
    $query .= " WHERE id = $user_id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        return true;
    }
    return false;
}
