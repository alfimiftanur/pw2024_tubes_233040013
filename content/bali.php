<?php

require '../functions.php';
?>

<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Bali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <head>
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
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../assets/img/logo.png" alt="" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact Us</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Disabled</a>
                    </li> -->
                </ul>
                <div class="login">
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="../update_profile/edit_profile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="../logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="../login.php" class="btn rounded">Sign In</a>
                        <a href="../register.php" class="btn rounded">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Explore the World</h1>
                    <p class="lead" >Discover new destinations and experiences in Bali</p>
                    <!-- <hr class="my-4"> -->
                    <p>Get ready for the adventure and enjoy the moments!</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                    <!-- <div class="col-md-6">
                        <img src="../assets/img/bali.jpg" alt="Tourism image" class="img-fluid">
                    </div> -->
                </div>
            </div>
        </div>
    </div>

<!-- footer -->
    <?php include '../layout/footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


