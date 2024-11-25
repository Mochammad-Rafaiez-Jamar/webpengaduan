<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Password dan konfirmasi password tidak cocok.";
    } else {
        // Hash password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Periksa apakah username sudah ada
        $checkUser = $conn->query("SELECT * FROM users WHERE username='$username'");
        if ($checkUser->num_rows > 0) {
            $error = "Username sudah terdaftar.";
        } else {
            // Simpan data pengguna
            $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$passwordHash', 'user')");
            header('Location: login.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm_password">Konfirmasi Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
    </div>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">PengaduanApp</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="content">
</body>
</html>
