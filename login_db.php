<?php
session_start();
include "koneksi.php";
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $sql = "SELECT * FROM author WHERE nickname='$nickname' AND password='$password'";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['nickname'] = $data['nickname'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['author_id'] = $data['id']; 
        if ($data['level'] == "admin") {
            header("location:admin/index.php");
        } else if ($data['level'] == "user") {
            header("location:user/index.php");
        } else {
            die("password salah <a href=\"javascript:history.back()\">kembali</a>");
        }
    }
} else if ($op == "out") {
    unset($_SESSION['nickname']);
    unset($_SESSION['level']);
    header("location:login.php");
}