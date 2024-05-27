<?php

require '../functions.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];
$user = getUserById($_SESSION['id']);


if (isset($_POST['submit'])) {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        $id = $_SESSION['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gambar = isset($_FILES['gambar']) ? $_FILES['gambar'] : null;

        $result = profileUpdate($id, $gambar, $username, $email, $password);
        echo $result;

        $user = getUserById($id);
    } else {
        echo "User is not logged in !";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif !important;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #4cae4c;
        }

        .profile-photo {
            text-align: center;
            margin-bottom: 15px;
        }

        .profile-photo img {
            max-width: 100px;
            /* border-radius: 50%; */
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
        <div class="profile-photo">
            <?php if (!empty($user['gambar'])): ?>
                <img src="<?php echo htmlspecialchars($user['gambar']); ?>" alt="Profile Photo">
            <?php endif; ?>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="gambar">Profile Photo:</label>
            <input type="file" name="gambar" id="gambar">
        </div>
        <div>
            <button type="submit" name="submit">Update Profile</button>
        </div>
    </form>
    <div class="button-container">
        <a href="../index.php"><button>Return to Home</button></a>
    </div>
</body>
</html>
