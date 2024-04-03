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

// Fetch orders with their payment status from the database
$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="payments-container">
    <h1>Payment Status Management</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Total</th>
                <th>Payment Status</th>
                <th>Update Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['customer_name']; ?></td>
                <td><?php echo $order['order_total']; ?></td>
                <td><?php echo $order['payment_status']; ?></td>
                <td>
                    <form action="update_payment_status.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <select name="payment_status">
                            <option value="Paid">Paid</option>
                            <option value="Pending">Pending</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
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
