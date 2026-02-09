<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_peminjam = $_GET['id'];

    // ambil data peminjaman
    $ambil = $koneksi->prepare(
        "SELECT id_buku, jumlah FROM peminjam 
         WHERE id = ? AND status = 'dipinjam'"
    );
    $ambil->bind_param("i", $id_peminjam);
    $ambil->execute();
    $data = $ambil->get_result()->fetch_assoc();

    if ($data) {
        // update status peminjaman
        $koneksi->query(
            "UPDATE peminjam 
             SET status = 'dikembalikan' 
             WHERE id = $id_peminjam"
        );

        // tambah stok buku
        $koneksi->query(
            "UPDATE buku 
             SET stok = stok + {$data['jumlah']} 
             WHERE id = {$data['id_buku']}"
        );
    }
}

header("Location: petugas.php");
exit;
