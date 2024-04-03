<?php
// Include the database connection
require 'config/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the payment status value
    $payment_status = $_POST['payment_status'];
    if (!in_array($payment_status, ['Paid', 'Pending', 'Cancelled'])) {
        $error = "Invalid payment status";
    } else {
        // Update the payment status in the database
        $order_id = $_POST['order_id'];
        $stmt = $pdo->prepare("UPDATE orders SET payment_status = ? WHERE order_id = ?");
        $stmt->execute([$payment_status, $order_id]);
        $success = "Payment status updated successfully";
    }
}

// Redirect to the orders page
header("Location: orders.php");
exit;
?>
