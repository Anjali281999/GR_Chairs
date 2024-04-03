<?php
// Check if the current page is the login page
$current_page = basename($_SERVER['PHP_SELF']);
$is_login_page = ($current_page == 'login.php');
?>

<footer>
    <div class="footer-container">
        <?php if ($is_login_page): ?>
            <!-- Footer content specific to the login page -->
           
        <?php else: ?>
            <!-- Footer content for other pages -->
           
        <?php endif; ?>
    </div>
</footer>
