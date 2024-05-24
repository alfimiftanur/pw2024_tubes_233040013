<?php
require '../functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['id_role'];
    $password = ""; 
    
    $gambar = $_FILES['image']; 

    addUser($gambar, $username, $email, $password, $role);

    header("Location: admindashboard.php");
    exit();
}

?>
