<?php
require 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("location:admin.php");
    exit;
}

$sql = "DELETE FROM pengguna WHERE id = ?";
$result = $koneksi->execute_query($sql, [$id]);

if ($result) {
    header("location:admin.php");
    exit;
}
?>