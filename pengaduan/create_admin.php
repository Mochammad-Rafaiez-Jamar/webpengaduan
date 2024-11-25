<?php
include 'config.php';

$passwordHash = password_hash('admin', PASSWORD_DEFAULT);
$conn->query("INSERT INTO users (username, password, role) VALUES ('admin', '$passwordHash', 'admin')");

echo "Admin created successfully!";
?>
