<?php

include "../koneksi.php";
session_start();

if (!isset($_SESSION['author_id'])) {
    die("Anda belum login.");
}
$author_id = $_SESSION['author_id'];

// Query untuk mendapatkan artikel milik user yang login
$query = "SELECT a.id, a.date, a.title, a.content, a.picture, 
                 GROUP_CONCAT(c.name) AS categories, au.nickname, a.status
          FROM article a
          JOIN article_category ac ON a.id = ac.article_id
          JOIN category c ON ac.category_id = c.id
          JOIN article_author aa ON a.id = aa.article_id
          JOIN author au ON aa.author_id = au.id
          WHERE aa.author_id = $author_id
          GROUP BY a.id
          ORDER BY a.date DESC";
$result = mysqli_query($koneksi, $query);

$articles = [];
while ($row = mysqli_fetch_assoc($result)) {
    $articles[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    
  
</head>
<body class="bg-light min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.php"><i class="fas fa-home"></i> BlogKu</a>
            <div>
                <a href="tambahArtikel.php" class="btn btn-primary btn-sm me-2"><i class="fas fa-plus"></i> Tambah Artikel</a>
                <a href="logout.php" class="btn btn-outline-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>
    <div class="container pb-5">
        <h2 class="mb-4 text-primary fw-bold text-center">Artikel Saya</h2>
        <div class="row g-4">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-article h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="../img/<?php echo htmlspecialchars($article['picture'] ?: 'default.jpg'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($article['title']); ?>" style="height:200px;object-fit:cover;">
                                <span class="position-absolute top-0 end-0 m-2 badge bg-info text-white shadow-sm">
                                    <i class="fas fa-tag"></i> <?php echo htmlspecialchars($article['categories']); ?>
                                </span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-primary"><?php echo htmlspecialchars($article['title']); ?></h5>
                                <div class="mb-2 text-muted small">
                                    <i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($article['date']); ?> &nbsp; 
                                    <i class="fas fa-user"></i> <?php echo htmlspecialchars($article['nickname']); ?>
                                </div>
                                <div class="card-text truncate-3 mb-2"><?php echo mb_substr(strip_tags($article['content']), 0, 180) . '...'; ?></div>
                                <div class="mb-2">
                                    Status: 
                                    <?php if ($article['status'] == 'pending'): ?>
                                        <span class="badge bg-warning text-dark badge-status">Menunggu Persetujuan</span>
                                    <?php elseif ($article['status'] == 'setuju' || $article['status'] == 'approved'): ?>
                                        <span class="badge bg-success badge-status">Disetujui</span>
                                    <?php elseif ($article['status'] == 'rejected'): ?>
                                        <span class="badge bg-danger badge-status">Ditolak</span>
                                    <?php endif; ?>
                                </div>
                                <div class="mt-auto d-flex gap-2">
                                    <a href="detail.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-primary btn-sm flex-fill"><i class="fas fa-eye"></i> Baca</a>
                                    <a href="editArtikel.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-warning btn-sm flex-fill"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="hapusArtikel.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-danger btn-sm flex-fill" onclick="return confirm('Yakin ingin menghapus artikel ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center shadow-sm py-4">
                        <i class="fas fa-info-circle fa-2x mb-2"></i><br>
                        Anda belum memiliki artikel.<br>
                        <a href="tambahArtikel.php" class="btn btn-primary mt-3"><i class="fas fa-plus"></i> Tulis Artikel Pertama</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer class="text-center text-muted py-3 mt-5 small">
        &copy; <?php echo date('Y'); ?> BlogKu by Tian
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>