<?php
// Include the header file
include('includes/header.php');

// Check if the admin is already logged in, if yes, redirect to dashboard
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}


// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials (Replace this with your own authentication logic)
    if ($username === 'admin' && $password === 'admin123') {
        // Set session variables
        $_SESSION['admin_id'] = 1; // Set admin ID (example)
        
        // Redirect to dashboard
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!-- HTML content for the login page -->
<div class="login-container">
    <h1>Admin Login</h1>
    <?php if(isset($error)): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
</div>

<?php
// Include the footer file
include('includes/footer.php');
?>
