<?php

include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Update status artikel menjadi 'approved'
    $sql = "UPDATE article SET status='setuju' WHERE id=$id";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Artikel berhasil disetujui!');window.location='assigment.php';</script>";
    } else {
        echo "<script>alert('Gagal menyetujui artikel!');window.location='assigment.php';</script>";
    }
} else {
    echo "<script>alert('ID artikel tidak ditemukan!');window.location='assigment.php';</script>";
}
?>