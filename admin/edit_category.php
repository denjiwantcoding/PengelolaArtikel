<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);

    $sql = "UPDATE category SET name='$name', description='$description' WHERE id=$id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: category.php?msg=updated");
        exit;
    } else {
        echo "Gagal mengedit kategori: " . mysqli_error($koneksi);
    }
} else {
    header("Location: category.php");
    exit;
}