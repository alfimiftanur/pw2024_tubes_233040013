<?php
require '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = koneksi();
    $title = $_POST["title"];
    $description = $_POST["description"];
    $IdRole = $_POST["id_role"];
    $message = uploadImage($_FILES["fileToUpload"], $title, $description, $IdRole, $conn);
    if (strpos($message, 'uploaded') !== false) {
        echo "<script>alert('$message'); window.location.href='image.php';</script>";
    } else {
        echo "<script>alert('$message');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/image.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <h1 class="card-title text-center">Upload Image</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fileToUpload" class="form-label">Select image to upload:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" onchange="previewImage(event)">
                </div>
                <div class="mb-3 text-center">
                    <img id="imagePreview" class="preview" src="" alt="Image preview...">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Image Title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter image title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Image Description:</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter image description">
                </div>
                <input type="hidden" name="id_role" value="1">
                <div class="text-center">
                    <input type="submit" value="Upload" name="submit" class="btn btn-primary">
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
