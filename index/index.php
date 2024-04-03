<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.R.Chairs - Home</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>

<header>
    <h1>Welcome to G.R.Chairs</h1>
</header>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="cart.php">View Cart</a></li>
        <!-- Add more navigation links as needed -->
    </ul>
</nav>

<main>
    <h2>Featured Products</h2>
    <?php
    // Include database connection file
    include 'db_connection.php';

    // Fetch featured products from the database
    $sql = "SELECT * FROM product WHERE featured = 1";
    $result = $conn->query($sql);

    // Display featured products
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row["name"] . "</h3>";
            echo "<p>Price: " . $row["price"] . "</p>";
            echo "<p>Description: " . $row["description"] . "</p>";
            echo "<a href='add_to_cart.php?id=" . $row["id"] . "'>Add to Cart</a>";
            echo "</div>";
        }
    } else {
        echo "No featured products available.";
    }
    ?>
</main>



</body>
</html>
