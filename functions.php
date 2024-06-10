<?php

session_start();

function koneksi()
{
    return mysqli_connect("localhost", "root", "", "pw2024_tubes_233040013");
}
// base url
function baseUrl(){
    return "localhost/pw2024_tubes_233040013/uploads/";
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// login
function login($data) {
    $conn = koneksi();
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
        
            if ($user['id_role'] == 1) {
                $_SESSION['role'] = 'admin'; 
            } else {
                $_SESSION['role'] = 'user';
            }
        
            $_SESSION['id'] = $user['id'];

            $stmt = $conn->prepare("INSERT INTO user_sessions (id, session_start) VALUES (?, NOW())");
            $stmt->bind_param("i", $user['id']);
            $stmt->execute();

            header("Location: index.php");
            exit;
        }
    }

    return [
        'error' => true,
        'pesan' => 'Email / Password is wrong!'
    ];
}

// register
function register($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars(strtolower($data['email']));
    $password1 = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['confirm_password']);
    $gambarDefault = '../assets/img/default.jpg';
    
    if (empty($username) || empty($password1) || empty($password2) || empty($email)) {
        echo "<script>
            alert('Please fill in all fields');
            </script>";
        return false;
    }

    if (query("SELECT * FROM user WHERE username = '$username'") && query("SELECT * FROM user WHERE email = '$email'")) {
        echo "<script>
            alert('Username/Email already exists');
            </script>";
        return false;
    }

    if ($password1 !== $password2) {
        echo "<script>
            alert('Passwords do not match');
            </script>";
        return false;
    }

    if (strlen($password1) < 5) {
        echo "<script>
            alert('Password is too short');
            </script>";
        return false;
    }

    $password_baru = password_hash($password1, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (gambar, username, email, password, id_role)
              VALUES ('$gambarDefault', '$username', '$email', '$password_baru', 2)";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return true;
}

// contact to database
function contact($name, $email, $message) {
    $conn = koneksi();
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);

    if ($message !== null) {
        $message = mysqli_real_escape_string($conn, $message);
    } else {
        $message = '';
    }

    $insert_query = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $insert_query)) {
        mysqli_close($conn);
        return true;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }
}

// update profile/edit profile oleh user
function fileUpload($gambar) {
    $errors = [];
    $gambarpath = '';
    $gambarUrl = '';

    if (!empty($gambar['name'])) {
        $baseUrl = baseUrl();
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($gambar["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($gambar["tmp_name"]);
        if ($check === false) {
            $errors[] = "File is not an image.";
        }

        if ($gambar["size"] > 5000000) {
            $errors[] = "Sorry, your file is too large.";
        }

        $allowedFormats = ['jpg', 'jpeg', 'png'];
        if (!in_array($imageFileType, $allowedFormats)) {
            $errors[] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        }

        if (empty($errors)) {
            if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
                $gambarpath = $targetFile;
                $gambarUrl = $baseUrl . basename($gambar["name"]);
            } else {
                $errors[] = "Sorry, there was an error uploading your file.";
            }
        }
    }

    return [$errors, $gambarpath, $gambarUrl];
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
        echo "<script>alert('Profile updated successfully.')</script>";
    } else {
        $error = "Error updating profile: " . $stmt->error;
        $stmt->close();
        $conn->close();
        echo "<script>alert('Profile updated successfully.')</script>";
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

// validate the user is admin
function isAdmin() {
    $user = getUserById($_SESSION['id']);
    if ($user) {
        if ($user['id_role'] == 1) {
            return true;
        } else {
            echo "User is not an admin.";
            return false;
        }
    }
}

// CRUD admin dashboard
function getUserById($id) {
    $conn = koneksi();
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_assoc();
}

function addUser($gambar, $username, $email, $password, $role) {
    $conn = koneksi();

    $targetDir = "../uploads/"; 
    $defaultGambar = "assets/img/default.jpg";
    if (empty($_FILES['image']['name'])) {
        $targetFile = '../'. $defaultGambar;
        $uploadOk = 1; 
    } else {
        $targetFile = $targetDir . basename($gambar["name"]);
        $uploadOk = 1;

        $check = getimagesize($gambar["tmp_name"]);
        if($check === false) {
            echo "Sorry, your file is not an image.";
            $uploadOk = 0;
        }

        if ($gambar["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
                echo "The file ". htmlspecialchars(basename($gambar["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    if ($uploadOk == 1) {
        $id_role = ($role == 'Admin') ? 1 : 2;     
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (gambar, username, email, password, id_role) VALUES ('$targetFile', '$username', '$email', '$hashedPassword', '$id_role')";
        mysqli_query($conn, $query);
    }

    mysqli_close($conn);
}

function deleteUser($id) {
    $conn = koneksi();

    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    mysqli_close($conn);

    return $result;
}

function updateUser($id, $gambar, $username, $email, $password, $role) {
    $conn = koneksi();
    $targetDir = "../uploads/";

    if (!empty($gambar['name'])) {
        $targetFile = $targetDir . basename($gambar["name"]);
        $uploadOk = 1;

        $check = getimagesize($gambar["tmp_name"]);
        if ($check === false) {
            echo "Sorry, your file is not an image.";
            mysqli_close($conn);
            return;
        }

        if ($gambar["size"] > 500000) {
            echo "Sorry, your file is too large.";
            mysqli_close($conn);
            return;
        }

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            mysqli_close($conn);
            return;
        }

        if (!move_uploaded_file($gambar["tmp_name"], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            mysqli_close($conn);
            return;
        }


        $query = "UPDATE user SET gambar = '" . mysqli_real_escape_string($conn, $targetFile) . "' WHERE id = " . mysqli_real_escape_string($conn, $id);
        if (!mysqli_query($conn, $query)) {
            echo "Error updating image path: " . mysqli_error($conn);
            mysqli_close($conn);
            return;
        }
    }

    $id_role = ($role == 'Admin') ? 1 : 2;

    $query = "UPDATE user SET username = '" . mysqli_real_escape_string($conn, $username) . "', 
                              email = '" . mysqli_real_escape_string($conn, $email) . "', 
                              id_role = $id_role";

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query .= ", password = '" . mysqli_real_escape_string($conn, $hashedPassword) . "'";
    }

    $query .= " WHERE id = " . mysqli_real_escape_string($conn, $id);

    if (mysqli_query($conn, $query)) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// crud images
function fetchAllImages(){
    $conn = koneksi();
    $sql = "SELECT * FROM images";
    $result = $conn -> query($sql);
    $conn -> close();
    return $result;
}

function uploadImage($file, $title, $description, $IdRole, $conn) {
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return "File is not an image.";
    }

    if (file_exists($targetFile)) {
        return "Sorry, file already exists.";
    }

    if ($file["size"] > 5000000) { 
        return "Sorry, your file is too large.";
    }

    $allowedFormats = ["jpg", "png", "jpeg", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if (!move_uploaded_file($file["tmp_name"], $targetFile)) {
        return "Sorry, there was an error uploading your file.";
    }

    $stmt = $conn->prepare("INSERT INTO images (image_path, title, description, id_role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $targetFile, $title, $description, $IdRole);

    if ($stmt->execute()) {
        $stmt->close();
        return "The file " . basename($file["name"]) . " has been uploaded.";
    } else {
        $stmt->close();
        return "Error: " . $stmt->error;
    }
}

function updateImage($id_images, $title, $description, $file, $conn, $imagePath)
{
    if ($conn->connect_error) {
        return "Database connection error: " . $conn->connect_error;
    }

    $targetDir = "../uploads/";
    $newFileUploaded = false;
    $newTargetFile = "";
    $oldImagePath = "";

    if ($file["name"]) {
        $newTargetFile = $targetDir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($newTargetFile, PATHINFO_EXTENSION));

        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return "File is not an image.";
        }

        if (file_exists($newTargetFile)) {
            return "Sorry, file already exists.";
        }

        if ($file["size"] > 5000000) {
            return "Sorry, your file is too large.";
        }

        $allowedFormats = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        if (!move_uploaded_file($file["tmp_name"], $newTargetFile)) {
            return "Sorry, there was an error uploading your file.";
        }

        $newFileUploaded = true;

        $stmt = $conn->prepare("SELECT image_path FROM images WHERE id_images = ?");
        if (!$stmt) {
            return "Prepare statement failed: " . $conn->error;
        }
        $stmt->bind_param("i", $id_images);
        $stmt->execute();
        $stmt->bind_result($oldImagePath);
        $stmt->fetch();
        $stmt->close();
    }

    if ($newFileUploaded) {
        $stmt = $conn->prepare("UPDATE images SET image_path = ?, title = ?, description = ? WHERE id_images = ?");
        if (!$stmt) {
            return "Prepare statement failed: " . $conn->error;
        }
        $stmt->bind_param("sssi", $newTargetFile, $title, $description, $id_images);
        $imagePath = $newTargetFile; 
    } else {
        $stmt = $conn->prepare("UPDATE images SET title = ?, description = ? WHERE id_images = ?");
        if (!$stmt) {
            return "Prepare statement failed: " . $conn->error;
        }
        $stmt->bind_param("ssi", $title, $description, $id_images);
    }

    if ($stmt->execute()) {
        if ($newFileUploaded && file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        $stmt->close();
        return "Image updated successfully.";
    } else {
        $stmt->close();
        return "Error: " . $stmt->error;
    }
}


function deleteImage($id_images) {
    $conn = koneksi();
    
    $sql = "SELECT image_path FROM images WHERE id_images = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_images);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $sql = "DELETE FROM images WHERE id_images = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_images);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $result;
}

// sorting image
function getImages($sortBy = 'id_images', $sortOrder = 'ASC') {
    $conn = koneksi();
    
    $canSortBy = ['id_images', 'description'];
    $canSortOrder = ['ASC', 'DESC'];

    if (!in_array($sortBy, $canSortBy)) {
        $sortBy = 'id_images';
    }

    if (!in_array($sortOrder, $canSortOrder)) {
        $sortOrder = 'ASC';
    }

    $query = "SELECT * FROM images ORDER BY $sortBy $sortOrder";
    $result = mysqli_query($conn, $query);
    
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    mysqli_close($conn);
    return $users;
}

// sorting user
function getUsers($sortBy = 'id', $sortOrder = 'ASC') {
    $conn = koneksi();
    
    $canSortBy = ['id', 'username', 'email'];
    $canSortOrder = ['ASC', 'DESC'];

    if (!in_array($sortBy, $canSortBy)) {
        $sortBy = 'id';
    }

    if (!in_array($sortOrder, $canSortOrder)) {
        $sortOrder = 'ASC';
    }

    $query = "SELECT * FROM user ORDER BY $sortBy $sortOrder";
    $result = mysqli_query($conn, $query);
    
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    mysqli_close($conn);
    return $users;
}


// ajax
function search($keyword) {
    $conn = koneksi();

    $query = "SELECT title, description, image_path FROM images WHERE title LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($conn));
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// search user di admin dashboard menggunakan ajax
function searchUser($keyword)
{
    $conn = koneksi();

    $stmt = $conn->prepare("SELECT * FROM user WHERE username LIKE ?");
    $searchKeyword = '%' . $keyword . '%';
    $stmt->bind_param("s", $searchKeyword);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $rows;
}



?>
