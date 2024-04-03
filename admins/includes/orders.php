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

// Fetch orders from the database
$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="orders-container">
    <h1>Orders Management</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['customer_name']; ?></td>
                <td><?php echo $order['order_total']; ?></td>
                <td>
                    <a href="order_details.php?id=<?php echo $order['order_id']; ?>">View Details</a>
                    <a href="update_payment_status.php?id=<?php echo $order['order_id']; ?>">Update Payment Status</a>
                    <a href="delete_order.php?id=<?php echo $order['order_id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
