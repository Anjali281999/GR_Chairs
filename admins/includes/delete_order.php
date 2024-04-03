<?php
// Include the database connection
require 'config/db.php';

// Check if the order ID is provided in the URL
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    
    // Delete the order from the database
    $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->execute([$order_id]);
    
    // Redirect to the orders page after deletion
    header("Location: orders.php");
    exit;
} else {
    // Redirect to orders page if the order ID is not provided
    header("Location: orders.php");
    exit;
}
?>
