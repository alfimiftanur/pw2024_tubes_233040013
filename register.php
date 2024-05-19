<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="functions.php" method="post">
            <div class="input">
                <input type="text" id="username" name="username" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confrim Password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="forget">
            <a href="login.php">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
