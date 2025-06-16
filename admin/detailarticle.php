<?php

include "../koneksi.php";
$id = intval($_GET['id']);
$sql = "SELECT a.*, GROUP_CONCAT(c.name) as categories, au.nickname 
        FROM article a
        JOIN article_author aa ON a.id = aa.article_id
        JOIN author au ON aa.author_id = au.id
        JOIN article_category ac ON a.id = ac.article_id
        JOIN category c ON ac.category_id = c.id
        WHERE a.id = $id
        GROUP BY a.id";
$result = $koneksi->query($sql);
$article = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Artikel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-light min-h-screen">
    <div class="container mt-5">
        <?php if($article): ?>
            <div class="card shadow-lg mx-auto max-w-2xl">
                <?php if($article['picture']): ?>
                    <img src="../img/<?php echo htmlspecialchars($article['picture']); ?>" 
                         class="card-img-top rounded-t-lg object-cover mx-auto mt-3" 
                         style="max-width: 500px; max-height: 350px;">
                <?php endif; ?>
                <div class="card-body">
                    <h2 class="card-title text-2xl font-bold text-primary mb-2"><?php echo htmlspecialchars($article['title']); ?></h2>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="badge bg-primary text-white"><?php echo htmlspecialchars($article['categories']); ?></span>
                        <span class="badge bg-secondary">Penulis: <?php echo htmlspecialchars($article['nickname']); ?></span>
                        <span class="badge bg-light text-dark border border-gray-300"><?php echo htmlspecialchars($article['date']); ?></span>
                    </div>
                    <hr class="my-3">
                    <div class="prose prose-sm max-w-none text-gray-800" style="font-size:1.1rem;">
                        <?php echo $article['content']; ?>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a href="assigment.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-4 text-center">Artikel tidak ditemukan.</div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>