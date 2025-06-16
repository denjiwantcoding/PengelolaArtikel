<?php
// filepath: c:\xampp\htdocs\Project_web_teori\admin\get_article.php
require "../koneksi.php";

$id = intval($_GET['id']);
$query = mysqli_query($koneksi, "SELECT a.id, a.title, a.content, a.picture, ac.category_id 
    FROM article a 
    LEFT JOIN article_category ac ON a.id = ac.article_id 
    WHERE a.id = $id");
if ($row = mysqli_fetch_assoc($query)) {
    echo json_encode($row);
} else {
    echo json_encode([]);
}
?>