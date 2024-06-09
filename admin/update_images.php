<?php
require '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

$imagePath = "";
$description = "";
$id_images = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_images = $_POST["id_images"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $file = $_FILES["fileToUpload"];

    $conn = koneksi();
    //mengambil path gambar sebelum di update
    $stmt = $conn->prepare("SELECT image_path FROM images WHERE id_images = ?");
    $stmt->bind_param("i", $id_images);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    $conn->close();
    $message = updateImage($id_images, $description, $file, $conn, $imagePath);

    if (strpos($message, 'updated') !== false) {
        echo "<script>alert('$message'); window.location.href='image.php';</script>";
    } else {
        echo "<script>alert('$message');</script>";
    }
}else if (isset($_GET["id"])) {
    $id_images = $_GET["id"];

    // mengabil detail gambar dari database
    $conn = koneksi();
    $stmt = $conn->prepare("SELECT image_path, title, description FROM images WHERE id_images = ?");
    $stmt->bind_param("i", $id_images);
    $stmt->execute();
    $stmt->bind_result($imagePath, $title, $description);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/image.css">
</head>
<body>
<div class="container">
    <div class="card shadow-sm">
        <h1 class="card-title text-center">Update Image</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_images" value="<?= htmlspecialchars($id_images); ?>">
            <div class="mb-3">
                <label for="fileToUpload" class="form-label">Select new image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" onchange="previewImage(event)">
            </div>
            <div class="mb-3 text-center">
                Current image:
                <br>
                <img id="imagePreview" class="preview" src="<?= htmlspecialchars($imagePath); ?>" alt="Image preview...">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Image Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($title ?? ''); ?>" placeholder="Enter image title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Image Description:</label>
                <input type="text" name="description" id="description" class="form-control" value="<?= htmlspecialchars($description ?? ''); ?>" placeholder="Enter image description">
            </div>
            <div class="text-center">
                <input type="submit" value="Update Image" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
