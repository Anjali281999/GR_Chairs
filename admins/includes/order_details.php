<?php
// Include the header file
include('includes/header.php');

// Check if the admin is logged in, if not, redirect to login page
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Include the database connection
require 'config/db.php';

// Check if the order ID is provided in the URL
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    
    // Fetch the order details from the database
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->execute([$order_id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$order) {
        // Redirect to orders page if the order ID is invalid or not found
        header("Location: orders.php");
        exit;
    }
} else {
    // Redirect to orders page if the order ID is not provided
    header("Location: orders.php");
    exit;
}
?>

<div class="order-details-container">
    <h1>Order Details</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <td><?php echo $order['order_id']; ?></td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td><?php echo $order['customer_name']; ?></td>
        </tr>
        <tr>
            <th>Order Total</th>
            <td><?php echo $order['order_total']; ?></td>
        </tr>
        <!-- Add more order details here as needed -->
    </table>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
