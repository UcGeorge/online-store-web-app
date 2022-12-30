<?php
// Require the database connection and functions file
require_once 'protected/db-connect.php';
require_once 'protected/functions.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isLoggedIn()) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit;
}

// Get the user's account information
$user = getUser();

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Validate the form data
    $errors = validateAccountForm();

    // If there are no errors, update the user's account information
    if (empty($errors)) {
        updateAccount($user['id']);
    }
}

// Display the account management form
?>
<div class="container mt-5">
    <h2>Account Management</h2>
    <p>Update your account information here.</p>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post" action="account-management.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>