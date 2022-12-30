<?php
// Include the functions, and database connection files
require_once '../protected/functions.php';
require_once '../protected/db-connect.php';
?>

<!-- Display the products -->
<div class="container mt-5">
    <h2 class="mb-5 text-center">All Products</h2>
    <div class="row">
        <?php
        // Get all the products from the database
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        // Display each product as a card
        while ($product = mysqli_fetch_assoc($result)) {
            $id = $product['id'];
            $name = $product['name'];
            $price = $product['price'];
            $image = $product['image'];
            $description = $product['description'];
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?php echo $image; ?>" class="card-img-top" alt="<?php echo $name; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <p class="card-text"><?php echo $description; ?></p>
                    </div>
                    <div class="card-footer">
                        <span class="price mr-2"><?php echo $price; ?></span>
                        <a href="add-to-cart.php?id=<?php echo $id; ?>" class="btn btn-primary float-right">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>