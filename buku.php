<?php
require 'koneksi.php';

$sql = "SELECT * FROM buku";
$books = $koneksi -> query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Buku</h1>
    <a href="tambah-buku.php">Tambah</a>
    <a href="dashboard.php">kembali</a>
    <table>
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=1; foreach ($books as $book): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $book['judul'] ?></td>
                    <td><?= $book['pengarang'] ?></td>
                    <td><?= $book['stok'] ?></td>
                    <td>
                        <a href="edit-buku.php?id=<?= $book['id'] ?>">Edit</a>
                        <a href="hapus-buku.php?id=<?= $book['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>