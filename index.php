<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Journey Guide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto justfy-content-center ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " >Disabled</a>
              </li>
            </ul>
            <div class="login">
            <a href="login.php" class="btn rounded">Sign In</a>
            <a href="register.php" class="btn rounded">Sign Up</a>
          </div>
          </div>
        </div>
      </nav>
      <!-- navbar ends -->

      <!-- starts jumbotron -->
      <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading m-5">Where To?</h1>
            <div class="search-container ms-auto">
            <form class="d-flex " role="search" autocomplete="off">
                <input class="form-control bi bi-search" type="search" placeholder="Places to go, things to do, hotels..." aria-label="Search">
                <button class="btn btn-search" type="submit">Search</button>
            </form>
    </div>
        <p class="lead text-muted">Journey Guide adalah situs web panduan perjalanan yang menyediakan informasi tentang berbagai tujuan wisata di seluruh Indonesia. Situs ini menawarkan detail
            informasi tentang berbagai tempat, termasuk sejarah, budaya, atraksi, dan aktivitas. Journey Guide dirancang untuk membantu wisatawan membuat keputusan yang tepat tentang ke mana harus pergi dan apa yang 
            harus dilakukan</p>
        </div>
      <!-- end jumbotron -->
      <!-- starts carousel -->
      <section class="container">
        <h4 class="title d-flex justify-content-start">Stay Somewhere Best Places</h4>
        <p class="sub-title d-flex justify-content-start">Travelers' Choice Best of the Best</p>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/bali.jpg" class="card-img-top" alt="Bali" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Bali</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/borobudur.jpg" class="card-img-top" alt="Borobudur" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Borobudur</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/bromo.jpg" class="card-img-top" alt="Bromo" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Bromo</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/flores.jpeg" class="card-img-top" alt="Flores" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Flores</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/lake-toba.jpg" class="card-img-top" alt="Danau Toba" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Danau Toba</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <img src="assets/img/raja-ampat.jpg" class="card-img-top" alt="Raja-Ampat" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Raja Ampat</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-3">
                  <div class="card">
                    <img src="../assets/img/bali.jpg" class="card-img-top" alt="Bali" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Bali</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card">
                    <img src="../assets/img/borobudur.jpg" class="card-img-top" alt="Borobudur" height="270" width="270">
                    <div class="card-body">
                      <h5 class="card-title">Borobudur</h5>
                      <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" id="left" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" id="right" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <!-- footer -->
      <?php include 'footer.php'; ?>


      <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>