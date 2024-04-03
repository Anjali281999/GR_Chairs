<?php
// Connect to database
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username ="root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "contact_us"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt->execute();

echo "Thank you! Your message has been submitted.";

$stmt->close();
$conn->close();
?>
