<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Anggota Gym</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #f8fbff, #e1ecf4);
            min-height: 100vh;
        }
        .header-title {
            font-family: 'Segoe UI', sans-serif;
            letter-spacing: 1px;
        }
        .content-wrapper {
            background:rgb(248, 249, 248);
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
    </style>
</head>
<body class="py-5 px-2">
<div class="container">
    <div class="content-wrapper p-4">
        <h2 class="mb-4 text-primary text-center header-title">🏋️‍♂️ Daftar Anggota Gym</h2>
        <div class="text-end mb-3">
            <a href="tambah.php" class="btn btn-success">+ Tambah Anggota</a>
        </div>
        <table class="table table-bordered table-hover table-striped" id="tabelAnggota">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Paket</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($conn, "SELECT * FROM anggota");
                $no = 1;
                while($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($d['nama']) ?></td>
                    <td><?= htmlspecialchars($d['alamat']) ?></td>
                    <td><?= htmlspecialchars($d['jenis_paket']) ?></td>
                    <td><?= $d['tanggal_mulai'] ?></td>
                    <td><?= $d['tanggal_berakhir'] ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $d['id_anggota'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $d['id_anggota'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabelAnggota').DataTable();
    });
</script>
</body>
</html>
