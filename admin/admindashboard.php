<?php
require_once '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

$conn = koneksi();

// total akun
$result = $conn->query("SELECT COUNT(*) as total_users FROM user");
$row = $result->fetch_assoc();
$totalUsers = $row['total_users'];

// akun yang sedang login
$result = $conn->query("SELECT COUNT(DISTINCT id) as logged_in_users FROM user_sessions WHERE session_end IS NULL");
$row = $result->fetch_assoc();
$loggedInUsers = $row['logged_in_users'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="image.php">Image</a></li>
            <li><button onclick="logout()" class="logout">Log Out</button></li>
        </ul>
    </div>

    <div class="main-content">

    <div class="container">
        <h1>Welcome to Admin Dashboard</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="../index.php" class="btn btn-secondary">Return to Home</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Registered Accounts</h5>
                        <p class="card-text"><?= $totalUsers; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Currently Logged-in Accounts</h5>
                        <p class="card-text"><?= $loggedInUsers; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>