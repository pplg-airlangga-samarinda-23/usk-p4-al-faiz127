<?php
include 'koneksi.php';


$buku = $koneksi->query("SELECT id, judul FROM buku");


if (isset($_POST['pinjam'])) {
    $id_buku = $_POST['id_buku'];
    $nik     = $_POST['nik'];
    $nama    = $_POST['nama'];
    $telp    = $_POST['telp'];
    $jumlah  = $_POST['jumlah'];


    $status = 'dipinjam';

    $sql = "INSERT INTO peminjam
            (id_buku, nik, nama, telp, jumlah, status)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("isssis", $id_buku, $nik, $nama, $telp, $jumlah, $status);

    if ($stmt->execute()) {
        header("location:petugas.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman Buku</title>
</head>
<body>

<h2>Form Peminjaman Buku</h2>

<form method="post">

    <label>Buku</label><br>
    <select name="id_buku" required>
        <option value="">-- Pilih Buku --</option>
        <?php while ($row = $buku->fetch_assoc()) : ?>
            <option value="<?= $row['id'] ?>">
                <?= $row['judul'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <label>NIK</label><br>
    <input type="text" name="nik" required><br><br>

    <label>Nama Peminjam</label><br>
    <input type="text" name="nama" required><br><br>

    <label>No. Telp</label><br>
    <input type="text" name="telp" required><br><br>

    <label>Jumlah</label><br>
    <input type="number" name="jumlah" min="1" required><br><br>

    <button type="submit" name="pinjam">Pinjam</button>
    <a href="index.php">Kembali</a>

</form>

</body>
</html>