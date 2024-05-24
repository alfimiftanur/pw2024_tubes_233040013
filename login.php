<?php
require 'functions.php'; 

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = login($_POST);
    if (isset($result['error']) && $result['error']) {
        $error = $result['pesan'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if ($error) : ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
        <form action="login.php" method="post">
            <div class="input">
                <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="forget">
            <a href="#">Forgot Password?</a>
            <a href="register.php">Don't have an account?</a>
        </div>
    </div>

</body>
</html>
