<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pangandaran</title>
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
      background: url('../assets/img/pangandaran.jpg') no-repeat bottom;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 200px 0;
    }
    .section-title {
      font-weight: 600;
      margin-top: 50px;
      margin-bottom: 30px;
    }
    .image-gallery img {
      width: 100%;
      height: auto;
      border-radius: 5px;
    }
    .image-gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }
    .image-gallery .col {
      flex: 1 1 calc(33.333% - 15px);
      box-sizing: border-box;
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
            <h1>Welcome to Pangandaran</h1>
            <p>Discover the beauty and culture of Pangandaran</p>
        </div>
    </div>

  <section id="about-pangandaran" class="container">
    <h2 class="section-title">About Pangandaran</h2>
    <p>Pangandaran is a regency in West Java, Indonesia, known for its stunning beaches, vibrant marine life, and rich cultural heritage. It offers a variety of attractions ranging from natural wonders to historical sites.</p>
  </section>

  <section id="fun-facts" class="container">
    <h2 class="section-title">Fun Facts About Pangandaran</h2>
    <ul>
      <li>Pangandaran is home to the Green Canyon, a beautiful river canyon with clear turquoise water.</li>
      <li>It's one of the best spots in Indonesia for surfing, snorkeling, and diving.</li>
      <li>Pangandaran Beach hosts an annual kite festival attracting participants from around the world.</li>
      <li>The area is rich in seafood, and its fish market is a must-visit for seafood lovers.</li>
    </ul>
  </section>

<section id="popular-attractions" class="container">
  <h2 class="section-title">Popular Attractions</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/green-canyon.jpg" class="card-img-top" alt="Green Canyon">
        <div class="card-body">
          <h5 class="card-title">Green Canyon</h5>
          <p class="card-text">A stunning river canyon with clear turquoise water.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/pangandaran-beach.jpg" class="card-img-top" alt="Pangandaran Beach">
        <div class="card-body">
          <h5 class="card-title">Pangandaran Beach</h5>
          <p class="card-text">Famous for its beautiful sunset and annual kite festival.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/citumang.jpg" class="card-img-top" alt="Citumang">
        <div class="card-body">
          <h5 class="card-title">Citumang</h5>
          <p class="card-text">A natural water park perfect for swimming and rafting.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="cultural-highlights" class="container">
  <h2 class="section-title">Cultural Highlights</h2>
  <p>Pangandaran has a rich cultural heritage influenced by Sundanese traditions. Local festivals, traditional music, and dance are integral parts of the community. Visitors can experience the unique blend of traditional and modern cultural expressions throughout the region.</p>
</section>

<section id="famous-hotels" class="container py-5">
  <h2 class="section-title">Famous Hotels</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/laut-biru.jpg" class="card-img-top" alt="Hotel 1">
        <div class="card-body">
          <h5 class="card-title">Hotel Laut Biru</h5>
          <p class="card-text">A luxurious beachfront hotel offering stunning views and top-notch amenities.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/hotel-sunrise.jpg" class="card-img-top" alt="Hotel 2">
        <div class="card-body">
          <h5 class="card-title">Hotel Sunrise</h5>
          <p class="card-text">Known for its beautiful sunrise views and excellent hospitality.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="../assets/img/hotel-green-canyon.jpg" class="card-img-top" alt="Hotel 3">
        <div class="card-body">
          <h5 class="card-title">Hotel Green Canyon</h5>
          <p class="card-text">A perfect blend of comfort and adventure, located near the famous Green Canyon.</p>
        </div>
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
