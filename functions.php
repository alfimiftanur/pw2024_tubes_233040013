<?php

session_start();

function koneksi()
{
    return mysqli_connect("localhost", "root", "", "pw2024_tubes_233040013");
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

function login($data)
{
    $conn = koneksi();
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
        if ($user['password'] === $password) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            header("Location: index.php");
            exit;
        }
    }

    // if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    //     if (password_verify($password, $user['password'])) {
    //         $_SESSION['login'] = true;
    //         $_SESSION['id'] = $user['id'];
    //         header("Location: index.php");
    //         exit;
    //     }
    // }
    return [
        'error' => true,
        'pesan' => 'Username / Password Salah!'
    ];
}

function registrasi($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars(strtolower($data['email']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $gambar = ($data['gambar']);
    $role = ($data['id_role']);

    
    // jika password atau apapun kosong
    if (empty($username)  || empty($password1) ||  empty($password2) || empty($email)) {
        echo "<script>
      alert('Tolong isi semuanya');
      document.location.href = 'registrasi.php';
      </script>";
        return false;
    }


    // jika username sudah ada
    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
    alert('username atau passsword sudah ada');
    document.location.href = 'registrasi.php';
    </script>";
        return false;
    }
    // konfirmasi password tidak sesuai
    if ($password1 !== $password2) {
        echo "<script>
      alert('Password tidak sesuai');
      document.location.href = 'registrasi.php';
      </script>";
    }
    // jika password < 5 digit strlen untuk menghitung panjang string
    if (strlen($password1) < 5) {
        echo "<script>
              alert('password terlalu pendek!');
              document.location.href = 'registrasi.php';
            </script>";
        return false;
    }
    // jika username & password sudah sesuai
    // enkripsi password
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);
    // insert ke tabel user
    $query = "INSERT INTO user
                VALUES
              (NULL, '$gambar', '$username', '$email', '$password_baru', '$role'  )
            ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}