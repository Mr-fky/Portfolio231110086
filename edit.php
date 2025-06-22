<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
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
        <h4 class="mb-4 text-warning text-center">✏️ Edit Anggota</h4>
<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota=$id"));
?>
        <form method="POST">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" required><?= $data['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Jenis Paket</label>
                <select name="jenis_paket" class="form-control" required>
                    <option value="Bulanan" <?= $data['jenis_paket'] == 'Bulanan' ? 'selected' : '' ?>>Bulanan</option>
                    <option value="Kuartalan" <?= $data['jenis_paket'] == 'Kuartalan' ? 'selected' : '' ?>>Kuartalan</option>
                    <option value="Tahunan" <?= $data['jenis_paket'] == 'Tahunan' ? 'selected' : '' ?>>Tahunan</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="<?= $data['tanggal_mulai'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" value="<?= $data['tanggal_berakhir'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $paket = $_POST['jenis_paket'];
    $mulai = $_POST['tanggal_mulai'];
    $berakhir = $_POST['tanggal_berakhir'];

    mysqli_query($conn, "UPDATE anggota SET nama='$nama', alamat='$alamat', jenis_paket='$paket',
                         tanggal_mulai='$mulai', tanggal_berakhir='$berakhir' WHERE id_anggota=$id");
    header("Location: index.php");
}
?>
    </div>
</div>
</body>
</html>
