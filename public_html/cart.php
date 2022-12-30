<?php
// Include the header, functions, and database connection files
require_once '../protected/header.php';
require_once '../protected/functions.php';
require_once '../protected/db-connect.php';

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    // Display a message and a button to continue shopping
    echo '<div class="container mt-5">';
    echo '<h2 class="mb-5 text-center">Your cart is empty</h2>';
    echo '<a href="products.php" class="btn btn-primary mb-5">Continue shopping</a>';
    echo '</div>';
} else {
    // Calculate the total price of the products in the cart
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $query = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        $price = $product['price'];
        $total += $price * $quantity;
    }
?>

    <!-- Display the cart -->
    <div class="container mt-5">
        <h2 class="mb-5 text-center">Your Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display each product in the cart as a row in the table
                foreach ($_SESSION['cart'] as $id => $quantity) {
                    $query = "SELECT * FROM products WHERE id = $id";
                    $result = mysqli_query($conn, $query);
                    $product = mysqli_fetch_assoc($result);
                ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1" max="99" class="form-control w-25 d-inline">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </form>
                        </td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td>
                            <form action="" method="post">
                                <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="float-right">
            <p class="text-muted">Total: $<?php echo $total; ?></p>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </div>

<?php } ?>

<?php
// Include the footer file
require_once '../protected/footer.php';
?>