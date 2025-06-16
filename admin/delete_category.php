<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM category WHERE id=$id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: category.php?msg=deleted");
        exit;
    } else {
        echo "Gagal menghapus kategori: " . mysqli_error($koneksi);
    }
} else {
    header("Location: category.php");
    exit;
}