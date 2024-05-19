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
        <form action="functions.php" method="post">
            <div class="input">
                <input type="text" id="username" name="username" placeholder="Email" required>
            </div>
            <div class="input">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="forget">
            <a href="#">Forgot Password?</a>
            <a href="register.php">don't have an account?</a>
        </div>
    </div>

</body>
</html>
