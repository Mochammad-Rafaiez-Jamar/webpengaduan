<?php
session_start(); // Mulai sesi
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pengaduan_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
