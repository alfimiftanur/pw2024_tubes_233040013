<?php
require '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    if (deleteUser($id)) {
        echo "<script>alert('Image deleted successfully.'); window.location.href='user.php';</script>";
    } else {
        echo "<script>alert('Error deleting image.'); window.location.href='user.php';</script>";
    }
}
?>
