<?php
require '../functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    updateUser($id, $name, $email, $role);
    header("Location: admindashboard.php");
    exit();
}
?>
