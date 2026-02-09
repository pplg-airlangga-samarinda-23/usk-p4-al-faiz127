<?php
require 'koneksi.php';

// Ambil data buku
$sql = "SELECT * FROM buku";
$books = $koneksi->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
</head>
<body>

<h1>Data Buku</h1>
<a href="tambah-buku.php">Tambah</a> |
<a href="dashboard.php">Kembali</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($books as $book): ?>

        <?php
        // cek apakah buku sedang dipinjam
        $cek = $koneksi->prepare("
            SELECT id, jumlah 
            FROM peminjam 
            WHERE id_buku = ? AND status = 'dipinjam'
            LIMIT 1
        ");
        $cek->bind_param("i", $book['id']);
        $cek->execute();
        $pinjam = $cek->get_result()->fetch_assoc();
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $book['judul'] ?></td>
            <td><?= $book['pengarang'] ?></td>
            <td><?= $book['stok'] ?></td>

            <td>
                <?= $pinjam ? 'Dipinjam' : 'Tersedia' ?>
            </td>

            <td>
                <?php if ($pinjam): ?>
                    <a href="kembalikan.php?id=<?= $pinjam['id'] ?>">
                       Kembalikan
                    </a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="pinjam-buku.php">Pinjam Buku</a>

</body>
</html>
