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

function login($data) {
    $conn = koneksi();
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $user = query("SELECT * FROM user WHERE email = '$email'");
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        header("Location: index.php");
        exit;
    }

    return [
        'error' => true,
        'pesan' => 'Email / Password Salah!'
    ];
}


function register($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars(strtolower($data['email']));
    $password1 = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['confirm_password']);
    $gambar = 'default.jpg';
    
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
              VALUES ('$gambar', '$username', '$email', '$password_baru', 2)";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return true;
}

function contact($name, $email, $phone, $message) {
    $conn = koneksi();
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $message = mysqli_real_escape_string($conn, $message);

    $insert_query = "INSERT INTO feedback (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if(mysqli_query($conn, $insert_query)) {
        mysqli_close($conn);
        return true;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }
}


// function handleFileUpload($gambar) {
//     $conn = koneksi();
//     $errors = [];
//     $gambarpath = '';

//     if (!empty($gambar['name'])) {
//         $targetDir = "uploads/";
//         $targetFile = $targetDir . basename($gambar["name"]);
//         $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//         $check = getimagesize($gambar["tmp_name"]);
//         if ($check === false) {
//             $errors[] = "File is not an image.";
//         }

//         if ($gambar["size"] > 5000000) {
//             $errors[] = "Sorry, your file is too large.";
//         }

//         $allowedFormats = ['jpg', 'jpeg', 'png'];
//         if (!in_array($imageFileType, $allowedFormats)) {
//             $errors[] = "Sorry, only JPG, JPEG, PNG files are allowed.";
//         }

//         if (empty($errors)) {
//             if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
//                 $gambarpath = $targetFile;
//             } else {
//                 $errors[] = "Sorry, there was an error uploading your file.";
//             }
//         }
//     }

//     return [$errors, $gambarpath];
// }

// function hashPassword($password) {
//     if (!empty($password)) {
//         return password_hash($password, PASSWORD_DEFAULT);
//     }
//     return '';
// }

// function updateUserProfile($id, $gambarpath, $username, $email, $hashedPassword) {
//     $conn = koneksi();
//     $sql = "UPDATE user SET username = ?, email = ?";
//     if (!empty($hashedPassword)) {
//         $sql .= ", password = ?";
//     }
//     if (!empty($gambarpath)) {
//         $sql .= ", profile_photo = ?";
//     }
//     $sql .= ",WHERE id = ?";

//     $stmt = $conn->prepare($sql);

//     if (!empty($hashedPassword) && !empty($gambarpath)) {
//         $stmt->bind_param("ssssi", $username, $email, $hashedPassword, $gambarpath, $id);
//     } elseif (!empty($hashedPassword)) {
//         $stmt->bind_param("sssi", $username, $email, $hashedPassword, $id);
//     } elseif (!empty($gambarpath)) {
//         $stmt->bind_param("sssi", $username, $email, $gambarpath, $id);
//     } else {
//         $stmt->bind_param("ssi", $username, $email, $id);
//     }

//     if ($stmt->execute()) {
//         $stmt->close();
//         $conn->close();
//         return "Profile updated successfully.";
//     } else {
//         $error = "Error updating profile: " . $stmt->error;
//         $stmt->close();
//         $conn->close();
//         return $error;
//     }
// }

// function profileUpdate($id, $gambar, $username, $email, $password) {
//     $conn = koneksi();
//     $errors = [];

//     list($fileErrors, $gambarpath) = handleFileUpload($gambar);
//     $errors = array_merge($errors, $fileErrors);

//     $hashedPassword = hashPassword($password);

//     if (empty($errors)) {
//         return updateUserProfile($id, $gambarpath, $username, $email, $hashedPassword);
//     }

//     return implode(', ', $errors);
// }

// CRUD
function getUsers() {
    $conn = koneksi();
    $query = "SELECT id, gambar, username, email, password,  id_role  FROM user";
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
    $targetFile = $targetDir . basename($gambar["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($gambar["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if ($gambar["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($gambar["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $gambar["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if ($uploadOk == 1) {
        $id_role = ($role == 'Admin') ? 1 : 2;     
        $query = "INSERT INTO user (gambar, username, email, password, id_role) VALUES ('$targetFile', '$username', '$email', '$password', '$id_role')";
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

function updateUser($id, $name, $email, $role) {
    $conn = koneksi();
    $query = "UPDATE user SET name = '$name', email = '$email', id_role = '$role' WHERE id = $id";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}

?>
