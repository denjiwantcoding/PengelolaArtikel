<?php
include '../koneksi.php';

// Ambil ID artikel dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mendapatkan detail artikel berdasarkan ID
$query = "
    SELECT 
        a.title AS judul_artikel,
        a.date AS tanggal_publikasi,
        au.nickname AS nama_penulis,
        c.name AS nama_kategori,
        a.picture AS picture,
        a.content AS isi_artikel
    FROM 
        article a
    JOIN 
        article_author aa ON a.id = aa.article_id
    JOIN 
        author au ON aa.author_id = au.id
    JOIN 
        article_category ac ON a.id = ac.article_id
    JOIN 
        category c ON ac.category_id = c.id
    WHERE 
        a.id = $id
";

$result = mysqli_query($koneksi, $query);
$article = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel | BlogKu</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,900&display=swap" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/detailStyle.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="index.php"><i class="fas fa-home"></i> BlogKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>

    <header class="article-header text-center">
        <div class="container">
            <h1 class="display-5 fw-bold mb-2">
                <?php echo $article ? htmlspecialchars($article['judul_artikel']) : "Artikel Tidak Ditemukan"; ?>
            </h1>
            <?php if ($article): ?>
            <div class="meta-info mb-2">
                <i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($article['tanggal_publikasi']); ?>
                &nbsp; | &nbsp;
                <i class="fas fa-user"></i> <?php echo htmlspecialchars($article['nama_penulis']); ?>
                &nbsp; | &nbsp;
                <?php foreach (explode(',', $article['nama_kategori']) as $cat): ?>
                    <span class="badge badge-category"><?php echo htmlspecialchars(trim($cat)); ?></span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </header>

    <main class="container mb-5">
        <?php if ($article): ?>
            <div class="card-article mx-auto" style="max-width: 900px;">
                <?php if (!empty($article['picture'])): ?>
                    <img src="../img/<?php echo htmlspecialchars($article['picture']); ?>" class="article-img d-block mx-auto mb-4" alt="<?php echo htmlspecialchars($article['judul_artikel']); ?>">
                <?php endif; ?>
                <div class="mb-3"></div>
                <div class="fs-5 lh-lg" style="text-align:justify;">
                    <?php echo $article['isi_artikel']; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center shadow-sm mt-5">
                Artikel tidak ditemukan.
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </main>

    
     <footer class="bg-white mt-5 py-4 shadow-sm">
        <div class="container text-center">
            <span class="text-muted">&copy; <?php echo date('Y'); ?> BlogKu by Tian</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>