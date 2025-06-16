<?php
include "../koneksi.php";
$id = intval($_GET['id']);
$query = mysqli_query($koneksi, "SELECT id, nickname, email FROM author WHERE id=$id");
if ($row = mysqli_fetch_assoc($query)) {
    echo json_encode($row);
} else {
    echo json_encode([]);
}