<?php 
include 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-nav {
            margin: 0 auto;
        }
        .btn {
            color: white;
            background-color: black;
        }
        .login .btn:hover {
            color: white;
            background-color: #2b2b2b;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.png" alt="" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto justify-content-center">
                    <li class="nav-item ">
                        <a class="nav-link"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" aria-current="page" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <div class="login">
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="update_profile/edit_profile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                                <?php if ($_SESSION['id_role'] === 'admin'): ?>
                                    <li><a class="dropdown-item" href="admin_dashboard.php">Admin Dashboard</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="btn rounded">Sign In</a>
                        <a href="register.php" class="btn rounded">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
