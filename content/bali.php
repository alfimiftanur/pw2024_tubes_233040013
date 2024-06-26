<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bali</title>
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
* {
    box-sizing: border-box;
}

body{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
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

.jumbotron{
    padding-top: 30%;
    position: relative;
    background: url('../assets/img/content-bali.jpg') no-repeat center ;
    background-size: cover;
    color: white;
    z-index: 2;
    border: 1px black solid;
}
.header-text .display-4, .header-text .lead{
    display: flex;
    align-items: center;
    justify-content: center;
}
h2{
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
  <div class="jumbotron jumbotron-fluid text-center rounded ">
    <div class="header-text">
      <h1 class="display-4">Welcome to Bali!</h1>
      <p class="lead">Discover the beauty of the Island of the Gods.</p>
    </div>
  </div>
<div class="container">
  <h2 style="padding-top:1rem;">About Bali</h2>
  <p>Bali is an Indonesian island known for its forested volcanic mountains, iconic rice paddies, beaches, and coral reefs. It's part of the Coral Triangle, which has the highest biodiversity of marine species.</p>
</div>

<div class="container">
  <h2 style="padding-top:1rem;">Fun Fact</h2>
  <p>Bali is home to over 20,000 temples, earning it the nickname "Island of a Thousand Puras" or "Island of the Gods".</p>
</div>

<div class="container">
  <h2 style="padding-top:1rem;">Popular Destinations</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/kuta-beach.jpg" class="card-img-top" alt="Kuta Beach" height="250" width="250">
        <div class="card-body">
          <h5 class="card-title text-center">Kuta Beach</h5>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/pura-besakih.jpg" class="card-img-top" alt="Pura Besakih" height="250" width="250">
        <div class="card-body">
          <h5 class="card-title text-center">Pura Besakih</h5>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/melasti-beach.jpg" class="card-img-top" alt="Melasti Beach" height="250" width="250">
        <div class="card-body">
          <h5 class="card-title text-center ">Melasti Beach</h5>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <h2 style="padding-top:1rem;">Culture</h2>
  <p>Balinese culture is a mix of Balinese Hindu-Buddhist religion and Balinese customs. It is perhaps most known for its dance, drama, and sculpture.</p>
</div>

<div class="container">
  <h2 style="padding-top:1rem;">Popular Hotel/Resort</h2>
  <div class="row">
    <div class="col-md-4 ">
      <div class="card">
        <img src="../assets/img/the-kayon-jungle-resort.jpeg" class="card-img-top" alt="Kuta Beach" height="250" width="250">
        <div class="card-body">
          <h5 class="card-title text-center">The Kayon Jungle Resort</h5>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/adiwana-suweta.jpeg" class="card-img-top" alt="Pura Besakih" height="250" width="250">
        <div class="card-body">
          <h5 class="card-title text-center">Adiwana Suweta</h5>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/padma-resort-ubud.webp" class="card-img-top" alt="Melasti Beach" height="250" width="250">
        <div class="card-body">
          <h5 class="card-title text-center ">Padma Resort Ubud</h5>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <h2 style="padding-top:1rem;">Famous Club</h2>
  <div class="row">
    <div class="col-md-6 align-items-center">
      <p>The Famous Club is where the party never stops. With renowned DJs, vibrant atmosphere, and signature cocktails, it's the ultimate nightlife destination in Bali.</p>
    </div>
    <div class="col-md-6">
      <div class="card">
        <img src="../assets/img/atlas.jpg" class="card-img-top" alt="Melasti Beach" height="400" width="250">
        <div class="card-body">
          <h5 class="card-title text-center ">W Atlas</h5>
        </div>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
