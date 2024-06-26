<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($_SESSION['cart'] as $productID => $quantity) {
            $sql = "SELECT * FROM Products WHERE ProductID = $productID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display product details
                    echo "<tr>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>$" . number_format($row["Price"], 2) . "</td>";
                    echo "<td>$" . number_format($row["Price"] * $quantity, 2) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Product not found!</td></tr>";
            }
        }
        ?>
        <tr>
            <td colspan="3">Total</td>
            <td>$<?php echo number_format($totalAmount, 2); ?></td>
        </tr>
    </tbody>
</table>
<form action="process_checkout.php" method="post">
    <button type="submit">Confirm and Pay</button>
</form>
