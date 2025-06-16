<?php
// filepath: c:\xampp\htdocs\Project_web_teori\admin\article_reject.php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['nickname'])) {
    header("Location: ../login.php");
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Pastikan artikel ada
$cek = $koneksi->query("SELECT id FROM article WHERE id = $id");
if ($cek->num_rows === 0) {
    die("Artikel tidak ditemukan.");
}

// Update status artikel menjadi 'rejected'
$koneksi->query("UPDATE article SET status='rejected' WHERE id = $id");

// Redirect kembali ke halaman artikel admin
header("Location: article.php?tolak=success");
exit;