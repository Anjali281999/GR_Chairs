<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="registration_login.css">
</head>
<body>
    <div class= "contanier">
        <?php
        if(isset($_POST["submit"])){
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $fulladdress = $_POST["fulladdress"];
            $phone  = $_POST["phone"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirm_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if(empty($fullname) OR empty($username) OR empty($email) OR empty($fulladdress) OR empty( $phone) OR empty($password) OR empty( $confirmpassword ) )    {
            array_push($errors,"All fields are required");  
            }
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password)<8) {
                array_push($errors,"Password must be at least 8 characters long");
            }
            if ($password!==$confirmpassword){
                array_push($errors,"Password does not match");
            }
             require_once "database.php";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors,"Email already exists!");
            }
            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alrt alert-danger'>$error</div>";
                    
                }
            }else{
                
                $sql = "INSERT INTO user (full_name,user_name,email,full_address,phone,password) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"ssssss", $fullname, $username, $email, $fulladdress, $phone, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class= 'alert alert-success'>You are registered successfully.</div>";
                }else{
                    die("Something went wrong");
                }
            }
            }
        
            ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="User Name:">
            </div>
            <div class="form-group">
                <input type="email"class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="fulladdress" placeholder="Full Address:">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" name="phone" placeholder="Phone_number:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm_password:">
            </div>
                <div class="form-group">
                <input type="checkbox" required> I hereby declare that the above information provided is true and correct
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primry" value="Register" name="submit">
            </div>
            </form>
        <div>
            <p>Already Registered <a href="login.php">Login Here</a></p>
        </div>
    
</body>
</html>