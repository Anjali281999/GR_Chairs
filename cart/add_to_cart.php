<?php
session_start();

// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if the product is already in the cart
    $sql = "SELECT * FROM cart WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update quantity if the product is already in the cart
        $row = $result->fetch_assoc();
        $new_quantity = $row['quantity'] + $quantity;
        $sql = "UPDATE cart SET quantity = $new_quantity WHERE product_id = $product_id";
    } else {
        // Add new product to the cart
        $sql = "INSERT INTO cart (product_id, quantity) VALUES ($product_id, $quantity)";
    }

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
