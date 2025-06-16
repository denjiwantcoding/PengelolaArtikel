<?php
// filepath: c:\xampp\htdocs\Project_web_teori\admin\author_update.php
include "../koneksi.php";
$id = intval($_POST['id']);
$nickname = mysqli_real_escape_string($koneksi, $_POST['nickname']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = $_POST['password'];

if (!empty($password)) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE author SET nickname='$nickname', email='$email', password='$hash' WHERE id=$id";
} else {
    $sql = "UPDATE author SET nickname='$nickname', email='$email' WHERE id=$id";
}
mysqli_query($koneksi, $sql);

echo "<script>alert('Author berhasil diupdate!');window.location='author.php';</script>";
