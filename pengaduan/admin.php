<?php
include 'config.php';

if ($_SESSION['role'] !== 'admin') {
    die("Akses ditolak.");
}

// Mengambil data pengguna
$users = $conn->query("SELECT * FROM users");

if (isset($_GET['action'])) {
    $id = $_GET['id'];

    if ($_GET['action'] === 'delete') {
        $conn->query("DELETE FROM users WHERE id=$id");
    } elseif ($_GET['action'] === 'make_admin') {
        $conn->query("UPDATE users SET role='admin' WHERE id=$id");
    }

    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Kelola Pengguna</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <?php while ($user = $users->fetch_assoc()): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <?php if ($user['role'] !== 'admin'): ?>
                        <a href="admin.php?action=make_admin&id=<?= $user['id'] ?>">Jadikan Admin</a>
                    <?php endif; ?>
                    <a href="admin.php?action=delete&id=<?= $user['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
