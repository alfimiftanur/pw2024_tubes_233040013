<?php
require "functions.php";

$result = fetchAllImages();

// $images = query("SELECT * FROM images");

// // ketika tombol cari diklik
// if (isset($_POST['search'])) {
//   $rows = search($_POST['keyword']);
// }
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Journey Guide</title>
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <!-- BS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- BS icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header.css">

  </head> 
  <body>
    <div class="wrapper">
      <!-- navbar starts -->
      <?php include 'layout/header.php'; ?>
      <!-- navbar ends -->

        <!-- starts jumbotron -->
        <section class="jumbotron text-center">
          <div class="container">
            <div class="jumbotron-content">
              <h1 class="jumbotron-heading">Where To?</h1>
              <div class="search-container ms-auto">
                <form class="d-flex" role="search" autocomplete="off" id="searchForm">
                  <input class="form-control bi bi-search keyword" type="search" id="searchInput" placeholder="Places to go, things to do, hotels..." aria-label="Search">
                  <button class="btn btn-search search-button" type="submit">Search</button>
                </form>
                <div class="search-results"></div>
              </div>
            </div>
            <p class="lead text-muted py-3 ">
              Journey Guide adalah situs web panduan perjalanan yang menyediakan informasi tentang berbagai tujuan wisata di seluruh Indonesia. Situs ini menawarkan detail
              informasi tentang berbagai tempat, termasuk sejarah, budaya, atraksi, dan aktivitas. Journey Guide dirancang untuk membantu wisatawan membuat keputusan yang tepat tentang ke mana harus pergi dan apa yang 
              harus dilakukan.
            </p>
          </div>
        </section>
        <!-- end jumbotron -->

        <!-- starts carousel -->
        <section >
          <div class="container">
          <h4 class="title d-flex justify-content-start">Best Trip</h4>
          <p class="sub-title d-flex justify-content-start">Travelers' Choice Best of the Best</p>
          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner result">
              <?php
              if ($result->num_rows > 0) {
                $rows = [];
                while ($row = $result->fetch_assoc()) {
                  $rows[] = $row;
                }
                $chunks = array_chunk($rows, 4);
                foreach ($chunks as $index => $chunk) {
                  ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                    <div class="row">
                      <?php foreach ($chunk as $row) { ?>
                        <div class="col-md-3">
                          <div class="card">
                            <img src="<?= 'uploads/' . htmlspecialchars($row['image_path']); ?>" 
                                class="card-img-top" 
                                alt="<?= htmlspecialchars($row['description']); ?>" 
                                title="<?= htmlspecialchars($row['description']); ?>" height="270"  width="270">
                              <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']); ?></h5>
                                <a href="content/<?= htmlspecialchars(strtolower($row['description'])) ?>.php" class="btn btn-primary">View Details</a>
                              </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <?php
                }
              } else {
                ?>
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-12">
                      <p>No images found.</p>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          </div>
          <!-- Dream trip -->

          <div class="container">
          <h4 class="title d-flex justify-content-start py-5">Dream Your Next Trip</h4>
          <p class="sub-title d-flex justify-content-start">Weekend Recommendations Trip</p>
          </div>
        </section>



      <!-- footer -->
      <?php include 'layout/footer.php'; ?>
    </div>


    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

  </body>
</html>
