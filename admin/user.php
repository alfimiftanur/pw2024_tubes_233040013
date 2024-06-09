<?php
require_once '../functions.php';

if (!isAdmin()) {
    header("Location: ../login.php");
    exit;
}

$sortBy = $_GET['sortBy'] ?? 'id';
$sortOrder = $_GET['sortOrder'] ?? 'ASC';
$newSortOrder = ($sortOrder === 'ASC') ? 'DESC' : 'ASC';

$users = getUsers($sortBy, $sortOrder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="image.php">Image</a></li>
            <li><button onclick="logout()"  class="logout">Log Out</button></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
        <h1 id="users">Users</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="add.php" class="btn btn-primary">Add User</a>
            <a href="../index.php" class="btn btn-secondary">Return to Home</a>
        </div>
        <table id="usersTable">
            <tr>
                <th><a href="?sortBy=id&sortOrder=<?= $newSortOrder; ?>" class="text-decoration-none text-reset">ID <i class="bi bi-arrow-<?= ($sortBy === 'id' && $sortOrder === 'ASC') ? 'up' : 'down'; ?> text-dark"></i></a></th>
                <th><a href="?sortBy=username&sortOrder=<?= $newSortOrder; ?>" class="text-decoration-none text-reset">Name <i class="bi bi-arrow-<?= ($sortBy === 'username' && $sortOrder === 'ASC') ? 'up' : 'down'; ?> text-dark"></i></a></th>
                <th><a href="?sortBy=email&sortOrder=<?= $newSortOrder; ?>" class="text-decoration-none text-reset">Email <i class="bi bi-arrow-<?= ($sortBy === 'email' && $sortOrder === 'ASC') ? 'up' : 'down'; ?> text-dark"></i></a></th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $id = 1;
            foreach ($users as $index => $user) {
            ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                    <?php
                            if (!empty($user['gambar'])) {
                                    echo '<img src="' . $user['gambar'] . '" alt="Profile Image" width="50">';
                            } else {
                                echo '<img src="assets/img/default.jpg" alt="Default Profile Image" width="50">';
                            }
                            ?>
                    </td>
                    <td>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <button type="submit" onclick="return confirm('Are You Sure Want to Delete This Data?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
    </div>


    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </script>
</body>
</html>