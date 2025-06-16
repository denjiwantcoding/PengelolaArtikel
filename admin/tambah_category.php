<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);

    $sql = "INSERT INTO category (name, description) VALUES ('$name', '$description')";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: category.php?msg=added");
        exit;
    } else {
        echo "Gagal menambah kategori: " . mysqli_error($koneksi);
    }
} else {
    header("Location: category.php");
    exit;
}