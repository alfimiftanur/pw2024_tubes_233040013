<?php

session_start();

function koneksi()
{
    return mysqli_connect("localhost", "root", "", "pw2024_tubes_233040013");
    // return $conn;
}
//base url
// $base_url = "http://localhost";


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

    $user = query("SELECT * FROM user WHERE email = '$email'");

    if ($user && password_verify($password, $user['password'])) {
        $role = $user['id_role'];

        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['id_role'] = $role; 


        header("Location: index.php");
        exit;
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

    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
            alert('Username already exists');
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


// update profile/edit profile
function fileUpload($gambar) {
    $errors = [];
    $gambarpath = '';

    if (!empty($gambar['name'])) {
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

function getUserById($id) {
    $conn = koneksi();
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_assoc();
}

// CRUD admin dashboard
function getUsers() {
    $conn = koneksi();
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);
    
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    mysqli_close($conn);
    return $users;
}


function addUser($gambar, $username, $email, $password, $role) {
    $conn = koneksi();

    $targetDir = "uploads/"; 
    $defaultGambar = "../assets/img/default.jpg";
    if (empty($_FILES['image']['name'])) {
        $targetFile = $targetDir . $defaultGambar;
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
    $query = "DELETE FROM user WHERE id = $id";
    mysqli_query($conn, $query);
    mysqli_close($conn);
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



?>
