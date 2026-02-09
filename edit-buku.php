<?php
require 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("location:buku.php");
    exit;
}


$sql = "SELECT * FROM buku WHERE id = ?";
$buku = $koneksi->execute_query($sql, [$id])->fetch_assoc();

if (!$buku) {
    header("location:buku.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    $sql = "UPDATE buku SET judul=?, pengarang=?, stok=? WHERE id=?";
    $result = $koneksi->execute_query($sql, [$judul, $pengarang, $stok, $id]);

    if ($result) {
        header("location:buku.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>

<h2>Edit Buku</h2>

<form method="POST">
    <input type="text" name="judul" value="<?= htmlspecialchars($buku['judul']); ?>" required><br><br>
    <input type="text" name="pengarang" value="<?= htmlspecialchars($buku['pengarang']); ?>" required><br><br>
    <input type="number" name="stok" value="<?= $buku['stok']; ?>" required><br><br>

    <button type="submit">Update</button>
    <a href="buku.php">kembali</a>
</form>

</body>
</html>
