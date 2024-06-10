<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flores</title>
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
        }
        .jumbotron {
            background: url('../assets/img/flores.jpeg') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 200px 0;
        }
        .jumbotron h1 {
            font-size: 4rem;
            font-weight: 600;
        }
        .jumbotron p {
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 2.5rem;
            margin-bottom: 30px;
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
        <h1>Welcome to Flores</h1>
        <p>Explore the beauty and culture of Flores Island</p>
    </div>
</div>

<div class="container my-5">
    <h2 class="section-title">About Flores</h2>
    <p>Flores is an island in Indonesia known for its stunning natural landscapes, diverse culture, and unique wildlife, including the famous Komodo dragons.</p>
</div>

<div class="container my-5">
    <h2 class="section-title">Fun Facts about Flores</h2>
    <ul>
        <li>Flores means "flowers" in Portuguese.</li>
        <li>The island is home to the Komodo National Park, a UNESCO World Heritage Site.</li>
        <li>It boasts some of the most beautiful coral reefs in the world.</li>
        <li>Flores is known for its traditional ikat weaving.</li>
        <li>The island has numerous volcanoes, offering great trekking opportunities.</li>
    </ul>
</div>

<div class="container my-5">
    <h2 class="section-title">Most Visited Places in Flores</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="../assets/img/komodo-national-park.jpg" class="card-img-top" alt="Komodo National Park">
                <div class="card-body">
                    <h5 class="card-title">Komodo National Park</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="../assets/img/kelimutu-volcano.jpg" class="card-img-top" alt="Kelimutu Volcano">
                <div class="card-body">
                    <h5 class="card-title">Kelimutu Volcano</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="../assets/img/labuan-bajo.jpeg" class="card-img-top" alt="Labuan Bajo">
                <div class="card-body">
                    <h5 class="card-title">Labuan Bajo</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="section-title">Culture of Flores</h2>
        <p class="card-text">Flores has a rich cultural heritage, with influences from Portuguese colonization and traditional Indonesian practices. The island is known for its traditional music, dance, and craftsmanship.</p>
</div>

<div class="container my-5">
    <h2 class="section-title">Famous Hotels in Flores</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="../assets/img/ayana-komodo-resort.jpg" class="card-img-top" alt="Hotel 1">
                <div class="card-body">
                    <h5 class="card-title">Ayana Komodo Resort, Waecicu Beach</h5>
                    <p class="card-text">This luxurious resort offers stunning views of the sea, elegant rooms, and a variety of dining options. It’s located on Waecicu Beach and provides easy access to Komodo National Park.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="../assets/img/sudamala-resort.jpg" class="card-img-top" alt="Hotel 2">
                <div class="card-body">
                    <h5 class="card-title">Sudamala Resort, Seraya</h5>
                    <p class="card-text">Situated on Seraya Kecil Island, this resort provides an intimate escape with beachfront bungalows, clear waters, and abundant marine life.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="../assets/img/luwansa-beach-resort.jpg" class="card-img-top" alt="Hotel 3">
                <div class="card-body">
                    <h5 class="card-title">Luwansa Beach Resort</h5>
                    <p class="card-text">This resort is ideal for both relaxation and adventure, with modern amenities, beachfront access, and proximity to Labuan Bajo’s attractions.</p>
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
