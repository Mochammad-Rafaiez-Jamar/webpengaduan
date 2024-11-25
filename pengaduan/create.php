<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO pengaduan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Form Pengaduan</h1>
        <form action="" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?= isset($data) ? $data['nama'] : '' ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= isset($data) ? $data['email'] : '' ?>">

            <label for="pesan">Pesan:</label>
            <textarea name="pesan" id="pesan" required><?= isset($data) ? $data['pesan'] : '' ?></textarea>

            <button type="submit"><?= isset($data) ? 'Update' : 'Kirim' ?></button>
        </form>
    </div>
</body>
</html>

