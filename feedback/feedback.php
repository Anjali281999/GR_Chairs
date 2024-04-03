<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GR Chair Feedback Form</title>
    <!-- You can link your CSS file here -->
    <style>
        /* Basic CSS styling */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: auto;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>GR Chair Feedback Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="feedback">Your Feedback:</label>
                <textarea id="feedback" name="feedback" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit Feedback">
            </div>
        </form>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $feedback = $_POST['feedback'];
        
        // You may add additional validation here if needed
        
        // Send email
        $to = "your_email@example.com"; // Replace with your email address
        $subject = "Feedback from GR Chair Website";
        $message = "Name: $name\n\nEmail: $email\n\nFeedback:\n$feedback";
        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "<p>Your feedback has been submitted successfully. Thank you!</p>";
        } else {
            echo "<p>Oops! Something went wrong. Please try again later.</p>";
        }
    }
    ?>
</body>
</html>
