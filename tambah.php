<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #f8fbff, #e1ecf4);
            min-height: 100vh;
        }
        .card {
            border: none;
            background: #fff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="card p-4">
        <h4 class="mb-4 text-success text-center">➕ Tambah Anggota Gym</h4>
        <form method="POST">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label>Jenis Paket</label>
                <select name="jenis_paket" class="form-control" required>
                    <option value="">-- Pilih Paket --</option>
                    <option value="Bulanan">Bulanan</option>
                    <option value="Kuartalan">Kuartalan</option>
                    <option value="Tahunan">Tahunan</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>

<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $paket = $_POST['jenis_paket'];
    $mulai = $_POST['tanggal_mulai'];
    $berakhir = $_POST['tanggal_berakhir'];

    mysqli_query($conn, "INSERT INTO anggota (nama, alamat, jenis_paket, tanggal_mulai, tanggal_berakhir)
                         VALUES ('$nama', '$alamat', '$paket', '$mulai', '$berakhir')");
    header("Location: index.php");
}
?>
    </div>
</div>
</body>
</html>
