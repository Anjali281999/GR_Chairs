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

<!-- HTML content for the settings management page -->
<div class="settings-management-container">
    <h1>Settings Management</h1>
    <!-- Add your settings management functionality here -->
    <form action="#" method="post">
        <label for="site_title">Site Title:</label>
        <input type="text" id="site_title" name="site_title" value="Your Site">
        <br>
        <label for="site_description">Site Description:</label>
        <textarea id="site_description" name="site_description">Description of your site</textarea>
        <br>
        <input type="submit" value="Save Settings">
    </form>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
