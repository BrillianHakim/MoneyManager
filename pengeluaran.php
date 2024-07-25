<?php
include 'koneksi.php'; // Menyertakan file koneksi

// Query untuk mengambil data dari tabel pemasukan
$sql = "SELECT * FROM pengeluaran";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money Manager|Brillian Hakim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MoneyManager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pemasukan.php">Pemasukan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pengeluaran.php">Pengeluaran</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <div class="container mt-5">
    <h1>Pengeluaran</h1>
    <hr>
    <a href="tambahData.php" class="btn btn-primary mb-2">Tambah Data</a>
    <table class="table table-bordered table-striped mt-3 py- text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>jumlah pengeluaran	</th>
                <th>Digunakan Untuk</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if ($result->num_rows > 0) {
        $no = 1;
        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            $formattedDate = date("d-m-Y", strtotime($row["tanggal"]));
            $formattedJumlah = "Rp " . number_format($row["jumlah_pengeluaran"], 0, ',', '.');
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $formattedDate . "</td>";
            echo "<td>" . $formattedJumlah . "</td>";
            echo "<td>" . $row["digunakan_untuk"] . "</td>";
            echo "<td>" . $row["deskripsi"] . "</td>";
            echo "<td width='15%' class='text-center'>
                    <a href='UbahDataPengeluaran.php?id=" . $row['id'] . "' class='btn btn-success'>Ubah</a>
                    <a href='HapusDataPengeluaran.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
    }
    $conn->close(); // Menutup koneksi
    ?>
</tbody>

    </table>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
