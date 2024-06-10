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
                        <a class="nav-link"  href="about.php">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" aria-current="page" href="contact.php">Contact Us</a>
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
                                    <li><a class="dropdown-item" href="admin/admindashboard.php">Admin</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="update_profile/edit_profile.php">Edit Profile</a></li>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+YE2tc0szEd4D21pRVW1g0D2Qj3gm3dY2ksxXqb" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
