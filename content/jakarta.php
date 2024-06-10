<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jakarta Experience</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
      background-image: url('../assets/img/jumbotron-jakarta.jpg');
      background-position: center;
      background-size: cover;
      color: white;
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
  <h1>Welcome to Jakarta</h1>
  <p>Discover the vibrant culture, bustling streets, and rich heritage of Indonesia's bustling megacity, Jakarta.</p>
</div>

<section id="popular-attractions" class="container">
  <h2 class="section-title">Popular Attractions</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/monas.jpg" alt="National Monument">
        <h3>National Monument (Monas)</h3>
        <p>The National Monument is an iconic landmark in Jakarta, symbolizing the country's struggle for independence. Visitors can ascend to the top for panoramic views of the city.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/tmii.jpeg" alt="Taman Mini Indonesia Indah">
        <h3>Taman Mini Indonesia Indah</h3>
        <p>Taman Mini Indonesia Indah is a cultural park that showcases the diversity of Indonesia's culture and heritage through replicas of traditional houses, museums, and cultural performances.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/ancol.jpeg" alt="Ancol Dreamland">
        <h3>Ancol Dreamland</h3>
        <p>Ancol Dreamland is a recreational complex offering various attractions, including a theme park, water park, beach, and golf course. It's a popular destination for families and thrill-seekers.</p>
      </div>
    </div>
  </div>
</section>

<section id="cultural-highlights" class="container">
  <h2 class="section-title">Cultural Highlights</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/kotu.jpeg" alt="Kota Tua Jakarta">
        <h3>Kota Tua Jakarta</h3>
        <p>Kota Tua, also known as Old Town Jakarta, is a historic area that showcases the city's colonial past. It features Dutch colonial architecture, museums, and vibrant street life.</p>
      </div>
    </div>
    <div class="col-md-4">
  <div class="attraction-card">
    <img src="../assets/img/betawi-dance.jpeg" alt="Betawi Dance">
    <h3>Betawi Dance</h3>
    <p>Betawi Dance is a traditional dance form native to Jakarta, reflecting the unique culture of the Betawi people. It incorporates dynamic movements, colorful costumes, and traditional music, showcasing Jakarta's rich cultural heritage.</p>
  </div>
</div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/ondel-ondel.jpeg" alt="Ondel-ondel">
        <h3>Ondel-ondel</h3>
        <p>Ondel-ondel is a giant puppet figure originating from Jakarta. It is a symbol of Betawi culture and is often paraded during traditional festivals and ceremonies.</p>
      </div>
    </div>
  </div>
</section>

<section id="famous-hotels" class="container">
  <h2 class="section-title">Famous Hotels</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/mandarin-oriental.jpeg" alt="Mandarin Oriental Jakarta">
        <h3>Mandarin Oriental Jakarta</h3>
        <p>Mandarin Oriental Jakarta is a luxurious 5-star hotel located in the heart of Jakarta's business district. It offers elegant accommodations, world-class dining, and impeccable service.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/ritz-hotel.jpeg" alt="Ritz-Carlton Jakarta">
        <h3>Ritz-Carlton Jakarta</h3>
        <p>Ritz-Carlton Jakarta is a prestigious hotel known for its opulent amenities and breathtaking views of the city skyline. It provides a luxurious retreat for discerning travelers.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="attraction-card">
        <img src="../assets/img/fairmont.jpeg" alt="Fairmont Jakarta">
        <h3>Fairmont Jakarta</h3>
        <p>Fairmont Jakarta is an upscale hotel offering stylish accommodations, gourmet dining options, and an array of leisure facilities. It promises a memorable stay in Jakarta.</p>
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
