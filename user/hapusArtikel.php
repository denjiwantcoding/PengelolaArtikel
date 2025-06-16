<?php

session_start();
include "../koneksi.php";

if (!isset($_SESSION['author_id'])) {
    die("Anda belum login.");
}

$author_id = $_SESSION['author_id'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Pastikan artikel milik user yang login
$cek = $koneksi->query("SELECT a.id FROM article a
    JOIN article_author aa ON a.id = aa.article_id
    WHERE a.id = $id AND aa.author_id = $author_id");
if ($cek->num_rows === 0) {
    die("Artikel tidak ditemukan atau Anda tidak berhak menghapusnya.");
}

// Hapus relasi kategori dan author terlebih dahulu (jika ada foreign key)
$koneksi->query("DELETE FROM article_category WHERE article_id = $id");
$koneksi->query("DELETE FROM article_author WHERE article_id = $id");

// Hapus artikel
$koneksi->query("DELETE FROM article WHERE id = $id");

// Redirect kembali ke halaman artikel saya
header("Location: artikelSaya.php?hapus=success");
exit;