<?php
include 'config.php';
// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$result = $conn->query("SELECT * FROM pengaduan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h1>Selamat Datang, <?= $_SESSION['username'] ?></h1>
        <p><a href="logout.php">Logout</a></p>
        <p><a href="admin.php">Kelola Pengguna</a></p>
    </div>
    
    <div class="container">
        <h1>Daftar Pengaduan</h1>
        <a href="create.php">Tambah Pengaduan</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['pesan'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <footer>© 2024 Sistem Pengaduan</footer>
</body>
</html>

