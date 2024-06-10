<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mount Bromo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .jumbotron {
            background: url('../assets/img/bromo.jpg') no-repeat center;
            background-size: cover;
        color: white;
        text-align: center;
        padding: 200px 0;
        }
        .jumbotron h1, .jumbotron p {
            position: relative;
            z-index: 1;
        }
        .activity, .hotel {
            margin-top: 50px;
            padding: 20px 0;
        }
        /* .card img {
            transition: transform 0.3s;
        }
        .card img:hover {
            transform: scale(1.05);
        } */
        .card-body {
            text-align: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="../assets/img/logo.png" alt="" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto justify-content-center">
                    <li class="nav-item ">
                        <a class="nav-link"  href="../index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link"  href="../about.php">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" aria-current="page" href="../contact.php">Contact Us</a>
                    </li>
                </ul>
                <div class="login">
                    <?php if (isset($_SESSION['login']) == true): ?>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <li><a class="dropdown-item" href="../admin/admindashboard.php">Admin</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="../update_profile/edit_profile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php" onclick="return confirm ('Are you sure want to log out?')">Log Out</a></li>
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

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Mount Bromo</h1>
            <p class="lead">Experience the beauty and adventure of one of Indonesia's most iconic volcanoes.</p>
        </div>
    </div>

    <div class="container activity">
        <h2 class="text-center mb-4">Activities in Bromo</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/img/bg-login.jpg" class="card-img-top" alt="Sunrise Trekking">
                    <div class="card-body">
                        <h5 class="card-title">Sunrise Trekking</h5>
                        <p class="card-text">Catch the breathtaking sunrise over Mount Bromo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/img/horse-riding.jpeg" class="card-img-top" alt="Horse Riding" height="400">
                    <div class="card-body">
                        <h5 class="card-title">Horse Riding</h5>
                        <p class="card-text">Explore the vast sea of sand on horseback.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/img/kawah-bromo.jpg " class="card-img-top" alt="Bromo Crater Visit">
                    <div class="card-body">
                        <h5 class="card-title">Bromo Crater Visit</h5>
                        <p class="card-text">Get up close to the active crater of Mount Bromo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container hotel">
        <h2 class="text-center mb-4">Recommended Hotels</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/img/jiwa-jiwa-resort.jpg" class="card-img-top" alt="Jiwa Jawa Resort Bromo">
                    <div class="card-body">
                        <h5 class="card-title">Jiwa Jawa Resort Bromo</h5>
                        <p class="card-text">Luxurious stay with stunning views and traditional Javanese architecture.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/img/bromo-terrace.jpg" class="card-img-top" alt="Bromo Terrace Hotel">
                    <div class="card-body">
                        <h5 class="card-title">Bromo Terrace Hotel</h5>
                        <p class="card-text">Cozy and charming accommodations nestled in the scenic mountains.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/img/plataran-bromo.jpg" class="card-img-top" alt="Plataran Bromo">
                    <div class="card-body">
                        <h5 class="card-title">Plataran Bromo</h5>
                        <p class="card-text">Luxury resort offering comfort, adventure, and local culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
      <div class="footer-content">
          <p>&copy; 2024 Indonesia Tour Guide |<a href="https://www.instagram.com/alfimifta31_/" target="_blank"> Alfi Mifta Nurhakim.</a> All rights reserved.</p>
        <ul class="footer-links">
          <li><a href="../privacypolicy.php">Privacy Policy</a></li>
          <li><a href="../services.php">Terms of Service</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
        </ul>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

</body>
</html>
