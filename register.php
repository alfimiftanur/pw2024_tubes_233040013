<?php
require 'functions.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (register($_POST)) {
        header("Location: login.php");
        exit;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post" enctype="multipart/form-data">
            <div class="input">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required>
                <!-- <input type="file" id="gambar" name="gambar"> Allow image upload -->
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="forget">
            <a href="login.php">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>