<?php
require 'functions.php';

session_start();
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $conn = koneksi();
    
    $stmt = $conn->prepare("UPDATE user_sessions SET session_end = NOW() WHERE user_id = ? AND session_end IS NULL");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
}
session_unset();
session_destroy();
header("Location: index.php");
exit;
?>