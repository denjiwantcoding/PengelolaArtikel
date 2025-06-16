<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['author_id'])) {
    die("Session author_id belum di-set. Silakan login ulang.");
}

$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash password sebelum disimpan (lebih aman)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO author (nickname, email, password) VALUES (
    '".$nickname."',
    '".$email."',
    '".$hashed_password."')";

$a = $koneksi->query($sql);
if ($a === TRUE) {
    header('location: author.php');
} else {
    echo "Terjadi error: " . $koneksi->error;
}
?>