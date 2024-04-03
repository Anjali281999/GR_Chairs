<?php
// Include the header file
include('includes/header.php');

// Check if the admin is logged in, if not, redirect to login page
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!-- HTML content for the user management page -->
<div class="user-management-container">
    <h1>User Management</h1>
    <!-- Add your user management functionality here -->
    <ul>
        <li>User 1</li>
        <li>User 2</li>
        <li>User 3</li>
        <!-- Display user list dynamically from the database -->
    </ul>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
