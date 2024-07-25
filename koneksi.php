<?php
$servername = "localhost"; // Ganti dengan nama server MySQL Anda jika diperlukan
$username = "root";        // Ganti dengan username MySQL Anda
$password = "";            // Ganti dengan password MySQL Anda
$database = "moneymanager"; // Nama database yang telah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
