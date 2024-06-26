global$conn; global$conn;
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Intamba Auto Dealership</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main">
        <h2>Shopping Cart</h2>
        <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty.</p>";
        } else {
            echo "<table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>";
            $total = 0;
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $product_id = intval($product_id); // Ensure the product ID is an integer
                $sql = "SELECT * FROM Products WHERE ProductID = $product_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['Name'];
                        $price = $row['Price'];
                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                        echo "<tr>
                                <td>$name</td>
                                <td>$quantity</td>
                                <td>$" . number_format($price, 2) . "</td>
                                <td>$" . number_format($subtotal, 2) . "</td>
                            </tr>";
                    }
                }
            }
            echo "<tr>
                    <td colspan='3'>Total</td>
                    <td>$" . number_format($total, 2) . "</td>
                </tr>
            </table>";
        }
        ?>
        <a href="checkout.php">Proceed to Checkout</a>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
