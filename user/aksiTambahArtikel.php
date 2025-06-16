<?php

include "../koneksi.php";
session_start();

// Ambil data dari form
$title = mysqli_real_escape_string($koneksi, $_POST['title']);
$content = mysqli_real_escape_string($koneksi, $_POST['content']);
$category = $_POST['category'];
$date = date('Y-m-d');
$status = 'pending';

// Proses upload gambar
$picture = '';
if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $filename = uniqid('img_') . '.' . $ext;
    $upload_path = '../img/' . $filename;
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $upload_path)) {
        $picture = $filename;
    } else {
        die("Gagal upload gambar.");
    }
} else {
    die("Gambar wajib diupload.");
}

// Simpan artikel ke tabel article
$query = "INSERT INTO article (title, content, picture, date, status) VALUES ('$title', '$content', '$picture', '$date', '$status')";
if (mysqli_query($koneksi, $query)) {
    $article_id = mysqli_insert_id($koneksi);


    $cat_id = intval($category);
mysqli_query($koneksi, "INSERT INTO article_category (article_id, category_id) VALUES ($article_id, $cat_id)");

    
     if (isset($_SESSION['author_id'])) {
    $author_id = intval($_SESSION['author_id']);
    mysqli_query($koneksi, "INSERT INTO article_author (article_id, author_id) VALUES ($article_id, $author_id)");
}
    // Jika ada tabel relasi author, simpan juga (opsional)
    // $author_id = $_SESSION['author_id']; // pastikan session author_id sudah ada
    // mysqli_query($koneksi, "INSERT INTO article_author (article_id, author_id) VALUES ($article_id, $author_id)");

    echo "<script>alert('Artikel berhasil ditambahkan! Menunggu persetujuan admin.');window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menambah artikel!');window.history.back();</script>";
}
?>