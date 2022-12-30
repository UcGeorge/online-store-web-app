<?php
// Start the session
session_start();

// Include the functions, and database connection files
require_once '../protected/functions.php';
require_once '../protected/db-connect.php';

// Check if the user is already logged in
if (isLoggedIn()) {
    // Redirect the user to the home page
    header('Location: index.php');
    exit;
}

// Check if the form was submitted
if (isset($_POST['login'])) {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // If the user was found, log them in
    if ($user) {
        // Store the user's information in the session
        $_SESSION['user'] = $user;

        // Redirect the user to the home page
        header('Location: index.php');
        exit;
    } else {
        // Display an error message
        $error = 'Invalid username or password';
    }
}
?>

<!-- Display the login form -->
<div class="container mt-5">
    <h2 class="mb-5 text-center">Login</h2>
    <?php if (isset($error)) : ?>
        <div class="alert
<div class=" alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>