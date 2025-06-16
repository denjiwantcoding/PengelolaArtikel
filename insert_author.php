<?php
include "koneksi.php";
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO author (nickname, email, password) VALUES (
 '".$nickname."',
 '".$email."',
  '".$password."')";

$a= $koneksi->query($sql);
if ($a === TRUE) {
    header('location: login.php');
} else {
    echo "ueroorr cikk " . $koneksi->error;
}
?>