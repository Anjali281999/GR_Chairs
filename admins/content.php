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

<!-- HTML content for the content management page -->
<div class="content-management-container">
    <h1>Content Management</h1>
    <!-- Add your content management functionality here -->
    <ul>
        <li>Content 1</li>
        <li>Content 2</li>
        <li>Content 3</li>
        <!-- Display content list dynamically from the database -->
    </ul>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
