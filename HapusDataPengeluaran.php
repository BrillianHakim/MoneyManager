<?php
include 'koneksi.php'; // Menyertakan file koneksi

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM pengeluaran WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='pengeluaran.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='pengeluaran.php';</script>";
}
?>