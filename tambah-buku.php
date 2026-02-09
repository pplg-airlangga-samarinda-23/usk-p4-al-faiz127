<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO buku (judul, pengarang, stok) VALUES (?, ?, ?)";
    $result = $koneksi->execute_query($sql, [$judul, $pengarang, $stok]);

    if ($result) {
        header("location:buku.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

<h2>Tambah Buku</h2>

<form method="POST">
    <input type="text" name="judul" placeholder="Judul Buku" required><br><br>
    <input type="text" name="pengarang" placeholder="Pengarang" required><br><br>
    <input type="number" name="stok" placeholder="Stok" required><br><br>

    <button type="submit">Simpan</button>
    <a href="index-buku.php">Kembali</a>
</form>

</body>
</html>
