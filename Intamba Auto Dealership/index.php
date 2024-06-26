<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intamba Auto Dealership</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main">
        <h2>Welcome to Intamba Auto Dealership</h2>
        <p>Your one-stop shop for luxury cars.</p>
        <div class="products">
            <?php
            // Include database connection and fetch products from database
            include 'db.php';
            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='img/" . $row["Image"] . "' alt='" . $row["Name"] . "'>";
                    echo "<h3>" . $row["Name"] . "</h3>";
                    echo "<p>" . $row["Description"] . "</p>";
                    echo "<p>$" . number_format($row["Price"], 2) . "</p>";
                    echo "<a href='product.php?id=" . $row["ProductID"] . "'>View Details</a>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
