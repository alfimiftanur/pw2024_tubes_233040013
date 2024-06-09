<?php
require '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$user = null;

if ($id) {
    $conn = koneksi();
    $query = "SELECT * FROM user WHERE id = " . mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    }
    mysqli_close($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $gambar = isset($_FILES['gambar']) ? $_FILES['gambar'] : null;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? $_POST['password'] : null;
    $role = $_POST['id_role'];

    updateUser($id, $gambar, $username, $email, $password, $role);
    header("Location: user.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="id_role">Role:</label>
                <select name="id_role" id="id_role">
                    <option value="Admin" <?= ($user['id_role'] == 1 ? 'selected' : ''); ?>>Admin</option>
                    <option value="User" <?= ($user['id_role'] == 2 ? 'selected' : ''); ?>>User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gambar">Profile Image:</label>
                <input type="file" name="gambar" id="gambar">
            </div>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>