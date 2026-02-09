<?php
require 'koneksi.php';

// Ambil semua data peminjam
$sql = "SELECT id_buku, nik, nama, telp, id, jumlah, status FROM peminjam";
$data = $koneksi->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjam</title>
</head>
<body>

<h1>Data Peminjam</h1>

<a href="dashboard.php">Kembali</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Buku</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>No. Telp</th>
            <th>ID</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php if (count($data) > 0): ?>
        <?php $no = 1; foreach ($data as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['id_buku'] ?></td>
            <td><?= $row['nik'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td><?= $row['id'] ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td><?= ucfirst($row['status']) ?></td>
            <td>
                <a href="edit_peminjam.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus_peminjam.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9" align="center">Data belum tersedia</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>

</body>
</html>
