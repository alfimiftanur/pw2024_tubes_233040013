<?php
require_once '../functions.php';
$users = getUsers();
// $baseUrl = "localhost/pw2024_tubes_233040013";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar h2 {
            margin-top: 0;
            font-weight: bold;
            color: #333;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar li a {
            display: block;
            color: #007bff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .sidebar li a:hover {
            background-color: #f2f2f2;
            color: #0056b3;
        }

        .sidebar li a.active {
            background-color: #007bff;
            color: #fff;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
        }

        .main-content h1 {
            margin-top: 0;
            font-weight: bold;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px 10px 0 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .edit-button {
            background-color: blue;
            color: white;
        }
        form {
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-top: 10px;
        }

        form input[type="text"], form input[type="email"], form input[type="password"], form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            margin: 10px 5px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        form input[type="submit"], form button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        form input[type="submit"]:hover, form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#dashboard" class="active">Dashboard</a></li>
            <li><a href="#users">Users</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1 id="dashboard">Dashboard</h1>
        <p>Welcome to the admin dashboard!</p>

        <h1 id="users">Users</h1>
        <table id="usersTable">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Image</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
            <?php
            $id = 1;
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?php echo $id++; ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['id_role']); ?></td>
                    <td>
                    <?php
                            if (!empty($user['gambar'])) {
                                    echo '<img src="' . htmlspecialchars($user['gambar']) . '" alt="Profile Image" width="50">';
                            } else {
                                echo '<img src="assets/img/default.jpg" alt="Default Profile Image" width="50">';
                            }
                            ?>
                    </td>                    
                    <td>
                        <?php echo htmlspecialchars($user['password']); ?>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $user['id']; ?>&username=<?php echo urlencode($user['username']); ?>&email=<?php echo urlencode($user['email']); ?>&id_role=<?php echo urlencode($user['id_role']); ?>" class="btn btn-primary">Edit</a>
                        <form style="display:inline;" method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>


        </table>
        <button onclick="window.location.href='add.php'">Add New User</button>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.sidebar a');
        const mainContentSections = document.querySelectorAll('.main-content h1');

        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                links.forEach(function(item) {
                    item.classList.remove('active');
                });

                link.classList.add('active');

                const target = link.getAttribute('href');
                const targetSection = document.querySelector(target);

                mainContentSections.forEach(function(section) {
                    section.style.display = 'none';
                });

                targetSection.style.display = 'block';
            });
        });
    });

    // for update
    function redirectToUpdate(id, username, email, idRole) {
    const url = `update.php?id=${id}&username=${username}&email=${email}&id_role=${idRole}`;
    window.location.href = url;
}
    </script>
</body>
</html>