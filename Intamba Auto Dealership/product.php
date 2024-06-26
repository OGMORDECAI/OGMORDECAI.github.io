Product.php
<?php
global $conn;
session_start();
include 'db.php';

// Check if product ID is provided in the query string
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productID = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM Products WHERE ProductID = $productID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = $row['Name'];
        $productDescription = $row['Description'];
        $productPrice = $row['Price'];
        $productImage = 'img/' . $row['Image']; // Image path relative to img directory
    } else {
        // Product not found, handle error or redirect
        echo "Product not found.";
        exit;
    }
} else {
    // Redirect to homepage or handle error if no product ID provided
    header("Location: index.php");
    exit;
}

// Function to add item to cart
if (isset($_POST['add_to_cart'])) {
    // Initialize cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add item to cart
    $item = [
        'product_id' => $productID,
        'quantity' => 1, // Default quantity
        'name' => $productName,
        'price' => $productPrice,
        'image' => $productImage
    ];

    // Push item to cart array
    $_SESSION['cart'][] = $item;

    // Optional: Redirect to cart page or display a message
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $productName; ?> - Intamba Auto Dealership</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="main">
    <div class="product-details">
        <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
        <h2><?php echo $productName; ?></h2>
        <p><?php echo $productDescription; ?></p>
        <p>$<?php echo number_format($productPrice, 2); ?></p>

        <!-- Form to add product to cart -->
        <form method="post" action="">
            <input type="hidden" name="product_id" value="<?php echo $productID; ?>">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>


