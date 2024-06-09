<?php
require 'functions.php';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $conn = koneksi();
    
    $stmt = $conn->prepare("UPDATE user_sessions SET session_end = NOW() WHERE id = ? AND session_end IS NULL");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
}
session_unset();
session_destroy();

echo "<script>
        alert('You have been successfully logged out.')
        window.location.href = 'index.php'
    </script>";
?>