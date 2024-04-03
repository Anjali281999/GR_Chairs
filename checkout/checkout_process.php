<?php
// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "checkout";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("something went wrong;");
}
<form action="checkout-page.html" method="POST"> </form>
    <label for="product">Product:</label>

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $officeChairQty = $_POST['officeChairQty'];
    // Calculate amount
    $pricePerChair = 2900; // Set the actual price per chair
    $amount = $officeChairQty * $pricePerChair;

    // Display the calculated amount
    echo "Amount: RS." . $amount;

    // Here you can further process the order, save it to the database, etc.
    // Ensure to sanitize and validate user inputs before saving to the database.
}
?>
