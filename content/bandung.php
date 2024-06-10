<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bandung</title>
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa; 
    }
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


    .jumbotron {
      background-image: url('../assets/img/gedung-sate.jpg');
      background-position: center;
      background-size: cover;
      color: black;
      text-align: center;
      padding: 100px 0; 
    }
    .jumbotron h1 {
      font-size: 3rem; 
      margin-bottom: 20px;
    }
    .jumbotron p {
      font-size: 1.2rem;
    }
    .section-title {
      text-align: center;
      margin-bottom: 50px;
    }
    .attraction-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
    .attraction-card img {
      border-radius: 8px;
      margin-bottom: 15px;
      max-width: 100%;
      height: auto;
    }
    .attraction-card h3 {
      margin-bottom: 10px;
    }
    .attraction-card p {
      font-size: 0.9rem;
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

  <div class="jumbotron">
    <h1>Welcome to Bandung</h1>
    <p>Bandung is the capital of West Java province in Indonesia. Known as the "Paris van Java," Bandung offers a unique blend of culture, history, and natural beauty.</p>
  </div>

  <div class="container" id="about">
    <div class="row">
      <div class="col">
        <h2 class="section-title">About Bandung</h2>
        <p>Bandung is the capital of West Java province in Indonesia. Known as the "Paris van Java," Bandung offers a unique blend of culture, history, and natural beauty.</p>
      </div>
    </div>
  </div>

  <section id="popular-attractions" class="container">
  <h2 class="section-title">Popular Attractions</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/tangkuban-parahu.jpg" alt="Tangkuban Perahu">
        <h3>Tangkuban Perahu</h3>
        <p>An active volcano offering stunning views.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/kawah-putih.jpg" alt="Kawah Putih">
        <h3>Kawah Putih</h3>
        <p>A mesmerizing crater lake with turquoise-colored water.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/farm-house.jpeg" alt="Farmhouse Susu Lembang">
        <h3>Farmhouse Susu Lembang</h3>
        <p>A European-style theme park with beautiful gardens.</p>
      </div>
    </div>
  </div>
</section>


<section id="cultural-highlights" class="container">
  <h2 class="section-title">Cultural Highlights</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/saung-angklung.jpg" alt="Saung Angklung Udjo">
        <h3>Saung Angklung Udjo</h3>
        <p>Experience traditional Sundanese music and dance performances.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/batik-workshop.jpg" alt="Batik Workshop">
        <h3>Batik Workshop</h3>
        <p>Learn about the art of batik-making in a traditional workshop.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/angklung-festival.jpg" alt="Angklung Festival">
        <h3>Angklung Festival</h3>
        <p>Attend the annual Angklung Festival celebrating the bamboo musical instrument.</p>
      </div>
    </div>
  </div>
</section>


<section id="famous-hotels" class="container">
  <h2 class="section-title">Famous Hotels</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/trans-luxury.webp" alt="Trans Luxury Hotel">
        <h3>Trans Luxury Hotel</h3>
        <p>A luxurious 5-star hotel offering world-class amenities and services.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/sheraton.jpg" alt="Sheraton Bandung Hotel & Towers">
        <h3>Sheraton Bandung Hotel & Towers</h3>
        <p>An upscale hotel with elegant rooms and stunning views of the city.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/hilton.jpg" alt="Hilton Bandung">
        <h3>Hilton Bandung</h3>
        <p>A contemporary hotel located in the heart of Bandung's business district.</p>
      </div>
    </div>
  </div>
</section>


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
