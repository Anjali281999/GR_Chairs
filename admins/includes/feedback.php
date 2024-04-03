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

// Fetch feedback from the database
$stmt = $pdo->query("SELECT * FROM feedback ORDER BY created_at DESC");
$feedback = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="feedback-container">
    <h1>Feedback Management</h1>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Feedback Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedback as $entry): ?>
            <tr>
                <td><?php echo $entry['customer_name']; ?></td>
                <td><?php echo $entry['feedback_message']; ?></td>
                <td><?php echo $entry['created_at']; ?></td>
                <td>
                    <a href="reply_feedback.php?id=<?php echo $entry['id']; ?>">Reply</a>
                    <a href="delete_feedback.php?id=<?php echo $entry['id']; ?>">Delete</a>
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
