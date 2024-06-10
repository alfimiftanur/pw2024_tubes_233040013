<?php
require '../../functions.php';
$sortBy = $_GET['sortBy'] ?? 'id';
$sortOrder = $_GET['sortOrder'] ?? 'ASC';
$newSortOrder = ($sortOrder === 'ASC') ? 'DESC' : 'ASC';


$users = searchUser($_GET['keyword']);
?>

<div class="result">
        <table id="usersTable" >
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
