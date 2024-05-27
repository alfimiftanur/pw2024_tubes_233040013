<?php
require '../functions.php';

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
    header("Location: admindashboard.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="file"] {
            padding: 3px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #009bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="id_role">Role:</label>
                <select name="id_role" id="id_role">
                    <option value="Admin" <?php echo ($user['id_role'] == 1 ? 'selected' : ''); ?>>Admin</option>
                    <option value="User" <?php echo ($user['id_role'] == 2 ? 'selected' : ''); ?>>User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gambar">Profile Image:</label>
                <input type="file" name="gambar" id="gambar">
            </div>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</body>
</html>