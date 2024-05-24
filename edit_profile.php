<?php
function koneksi() {
    $conn = new mysqli("localhost", "root", "", "pw2024_tubes_233040013");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function fileUpload($gambar) {
    $errors = [];
    $gambarpath = '';

    if (!empty($gambar['name'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($gambar["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is a valid image
        $check = getimagesize($gambar["tmp_name"]);
        if ($check === false) {
            $errors[] = "File is not an image.";
        }

        // Check file size
        if ($gambar["size"] > 5000000) {
            $errors[] = "Sorry, your file is too large.";
        }

        // Allow only specific image formats
        $allowedFormats = ['jpg', 'jpeg', 'png'];
        if (!in_array($imageFileType, $allowedFormats)) {
            $errors[] = "Sorry, only JPG, JPEG, PNG files are allowed.";
        }

        // Attempt to move the uploaded file to the target directory
        if (empty($errors)) {
            if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
                $gambarpath = $targetFile;
            } else {
                $errors[] = "Sorry, there was an error uploading your file.";
            }
        }
    }

    return [$errors, $gambarpath];
}

function hashPassword($password) {
    if (!empty($password)) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    return '';
}

function updateUserProfile($id, $gambarpath, $username, $email, $hashedPassword) {
    $conn = koneksi();

    $params = [];
    $sql = "UPDATE user SET username = ?, email = ?";
    $params[] = $username;
    $params[] = $email;

    if (!empty($hashedPassword)) {
        $sql .= ", password = ?";
        $params[] = $hashedPassword;
    }
    if (!empty($gambarpath)) {
        $sql .= ", gambar = ?";
        $params[] = $gambarpath;
    }
    $sql .= " WHERE id = ?";
    $params[] = $id;

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $types = str_repeat('s', count($params) - 1) . 'i';
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return "Profile updated successfully.";
    } else {
        $error = "Error updating profile: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return $error;
    }
}

function profileUpdate($id, $gambar, $username, $email, $password) {
    $errors = [];

    if ($gambar) {
        list($fileErrors, $gambarpath) = fileUpload($gambar);
        $errors = array_merge($errors, $fileErrors);
    } else {
        $gambarpath = '';
    }

    $hashedPassword = hashPassword($password);

    if (empty($errors)) {
        return updateUserProfile($id, $gambarpath, $username, $email, $hashedPassword);
    }

    return implode(', ', $errors);
}

if (isset($_POST['submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gambar = isset($_FILES['gambar']) ? $_FILES['gambar'] : null;

    $result = profileUpdate($id, $gambar, $username, $email, $password);

    echo $result;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>

body {
    font-family: Arial, sans-serif;
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

    </style>
</head>
<body>
    <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="profile_photo">Profile Photo:</label>
            <input type="file" name="gambar" id="gambar">
        </div>
        <div>
            <button type="submit" name="submit">Update Profile</button>
        </div>
    </form>
</body>
</html>
