<?php

require "koneksi.php";

$sql = "SELECT * FROM pengguna";
$rows = $koneksi-> execute_query($sql) -> fetch_all(MYSQLI_ASSOC);

$no =0 ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pak sena</title>
</head>
<body>
    <div class="manage-container">
        <h2>daftar Akun</h2>
        <div class="table-wrapper">
        <thead>
            <table>
            <tr>
                <th>No</th>
                <th>username</th>
                <th>password</th>
                <th>role</th>
                <th>aksi</th>
            </tr>
        
        </thead>
        <tbody id="table-body">
            <?php foreach($rows as $row) : ?>

            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['role'] ?></td>
                <td>
                    <a href="edit-user.php?id=<?=$row['id']?>">Edit</a>
                    <a href="hapus-user.php?id=<?=$row['id']?>">Hapus</a>
                </td>

            </tr>

            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <div class="manage-actions">
        <a href="tambah-user.php" class="btn-back">tambah</a>
        <a href="dashboard.php" class="btn-back">kembali</a>
    </div>
    </div>
</body>
</html>