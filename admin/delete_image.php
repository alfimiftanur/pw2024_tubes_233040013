<?php
require '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_images'];

    if (deleteImage($id)) {
        echo "<script>alert('Image deleted successfully.'); window.location.href='image.php';</script>";
    } else {
        echo "<script>alert('Error deleting image.'); window.location.href='image.php';</script>";
    }
}

?>
