<?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbpassword = "";
    $dbName = "feedback";
    $conn = mysqli_connect($hostName, $dbUser, $dbpassword, $DBnAME);
    if (!$conn) {
        die("Something went wrong;");
    }
    ?>