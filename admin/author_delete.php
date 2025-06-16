<?php
session_start();
include "../koneksi.php";

// Pastikan hanya admin yang bisa menghapus
if (!isset($_SESSION['nickname'])) {
    header("Location: ../login.php");
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Cegah admin menghapus dirinya sendiri (opsional, bisa dihapus jika tidak perlu)
$nickname = $_SESSION['nickname'];
$cek = $koneksi->query("SELECT id, nickname FROM author WHERE id = $id");
$row = $cek->fetch_assoc();
if ($row && $row['nickname'] === $nickname) {
    // Tidak boleh hapus diri sendiri
    header("Location: author.php?hapus=gagal");
    exit;
}

$koneksi->query("DELETE FROM article_author WHERE author_id = $id");

// Hapus author
$koneksi->query("DELETE FROM author WHERE id = $id");

header("Location: author.php?hapus=success");
exit;