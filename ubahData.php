<?php
include 'koneksi.php'; // Menyertakan file koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tanggal = $_POST["tanggal"];
    $sumber_pemasukan = $_POST["sumber_pemasukan"];
    $jumlah = $_POST["jumlah"];
    $kategori = $_POST["kategori"];
    $deskripsi = $_POST["deskripsi"];

    $sql = "UPDATE pemasukan SET 
            tanggal='$tanggal', 
            sumber_pemasukan='$sumber_pemasukan', 
            jumlah='$jumlah', 
            kategori='$kategori', 
            deskripsi='$deskripsi' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='pemasukan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pemasukan WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='pemasukan.php.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Pemasukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Ubah Data Pemasukan</h1>
    <hr>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="sumber_pemasukan" class="form-label">Sumber Pemasukan</label>
            <input type="text" class="form-control" id="sumber_pemasukan" name="sumber_pemasukan" value="<?php echo $row['sumber_pemasukan']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" >
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" ><?php echo $row['deskripsi']; ?></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Ubah</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
