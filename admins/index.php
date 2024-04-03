<?php
// Include the header file
include('includes/header.php');

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!-- HTML content for the admin dashboard -->
<div class="dashboard-container">
    <h1>Welcome to the Admin Dashboard</h1>
    <!-- Add your dashboard content here -->
    <ul>
        <li><a href="users.php">Manage Users</a></li>
        <li><a href="content.php">Manage Content</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
