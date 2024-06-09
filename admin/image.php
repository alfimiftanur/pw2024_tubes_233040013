<?php
require '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

$result = fetchAllImages();

$sortBy = $_GET['sortBy'] ?? 'id';
$sortOrder = $_GET['sortOrder'] ?? 'ASC';
$newSortOrder = ($sortOrder === 'ASC') ? 'DESC' : 'ASC';

$result = getImages($sortBy, $sortOrder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
        <div class="sidebar">
                <h2>Admin Dashboard</h2>
                <ul>
                    <li><a href="admindashboard.php">Dashboard</a></li>
                    <li><a href="user.php">Users</a></li>
                    <li><a href="image.php">Image</a></li>
                    <li><button onclick="logout()"  class="logout">Log Out</button></li>
                </ul>
            </div>

        <div class="main-content">
            <div class="container">
                <h1>Image List</h1>
                <div class="d-flex justify-content-between mb-4">
                    <a href="add_image.php" class="btn btn-primary">Add New Image</a>
                    <a href="../index.php" class="btn btn-secondary">Return to Home</a>
                </div>
                <table id="imagesTable" >
                    <thead>
                        <tr>
                        <th><a href="?sortBy=id_images&sortOrder=<?= $newSortOrder; ?>" class="text-decoration-none text-reset">ID <i class="bi bi-arrow-<?= ($sortBy === 'id_images' && $sortOrder === 'ASC') ? 'up' : 'down'; ?> text-dark"></i></a></th>
                        <th><a href="?sortBy=description&sortOrder=<?= $newSortOrder; ?>" class="text-decoration-none text-reset">Description <i class="bi bi-arrow-<?= ($sortBy === 'description' && $sortOrder === 'ASC') ? 'up' : 'down'; ?> text-dark"></i></a></th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        <?php foreach ($result as $image) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= htmlspecialchars($image['description']); ?></td>
                                <td>
                                    <?php
                                    if (!empty($image['image_path'])) {?>
                                        <img src=" <?= htmlspecialchars($image['image_path']); htmlspecialchars($image['description']);?>"  alt="image" width="200" height="200"> 
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="update_images.php?id=<?= $image['id_images']; ?>&description=<?= urlencode($image['description']); ?>&image_path=<?= urlencode($image['image_path']); ?>" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="delete_image.php">
                                        <input type="hidden" name="id_images" value="<?= $image['id_images']; ?>">
                                        <button type="submit" onclick="return confirm('Are you Sure You Want to Delete This Image?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>