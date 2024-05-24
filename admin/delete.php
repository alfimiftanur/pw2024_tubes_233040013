<?php
require '../functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    deleteUser($id);
    header("Location: admindashboard.php");
    exit();
}
?>
