<?php
global $conn;
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Intamba Auto Dealership</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main">
        <h2>Search Results</h2>
        <?php
        if (isset($_GET['query'])) {
            $search_query = $conn->real_escape_string($_GET['query']);
            $sql = "SELECT * FROM Products WHERE Name LIKE '%$search_query%' OR Description LIKE '%$search_query%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='products'>";
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='img/" . $row["Image"] . "' alt='" . $row["Name"] . "'>";
                    echo "<h3>" . $row["Name"] . "</h3>";
                    echo "<p>" . $row["Description"] . "</p>";
                    echo "<p>$" . number_format($row["Price"], 2) . "</p>";
                    echo "<a href='product.php?id=" . $row["ProductID"] . "'>View Details</a>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>No results found for '<strong>$search_query</strong>'</p>";
            }
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
