<?php
require 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("location:buku.php");
    exit;
}

$sql = "DELETE FROM buku WHERE id = ?";
$result = $koneksi->execute_query($sql, [$id]);

if ($result) {
    header("location:buku.php");
    exit;
}
