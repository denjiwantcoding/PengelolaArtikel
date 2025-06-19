<?php
include '../koneksi.php';

// Ambil ID artikel dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mendapatkan detail artikel berdasarkan ID
$query = "
    SELECT 
        a.id,
        a.title AS judul_artikel,
        a.date AS tanggal_publikasi,
        au.nickname AS nama_penulis,
        GROUP_CONCAT(c.name SEPARATOR ', ') AS nama_kategori,
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
    GROUP BY a.id
";
$result = mysqli_query($koneksi, $query);
$article = mysqli_fetch_assoc($result);

// Artikel terkait (berdasarkan kategori yang sama, kecuali artikel ini)
$related = [];
if ($article) {
    $kategori = explode(',', $article['nama_kategori']);
    $kategori_ids = [];
    $kat_query = mysqli_query($koneksi, "SELECT id FROM category WHERE name IN ('" . implode("','", array_map('trim', $kategori)) . "')");
    while ($kat = mysqli_fetch_assoc($kat_query)) {
        $kategori_ids[] = $kat['id'];
    }
    if ($kategori_ids) {
        $related_query = mysqli_query($koneksi, "
            SELECT a.id, a.title 
            FROM article a
            JOIN article_category ac ON a.id = ac.article_id
            WHERE ac.category_id IN (" . implode(',', $kategori_ids) . ")
            AND a.id != $id AND a.status = 'setuju'
            GROUP BY a.id
            ORDER BY a.date DESC
            LIMIT 5
        ");
        while ($row = mysqli_fetch_assoc($related_query)) {
            $related[] = $row;
        }
    }
}

// Untuk pencarian sidebar
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $article ? htmlspecialchars($article['judul_artikel']) : 'Detail Artikel'; ?> | BlogKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .article-img {
            max-width: 100%;
            max-height: 350px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(78,115,223,0.10);
        }
        .meta-info {
            font-size: 0.95rem;
            color: #6c757d;
        }
        .badge-category {
            background: #36b9cc;
            color: #fff;
            font-size: 0.85rem;
            margin-right: 5px;
        }
        .card-article {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 24px rgba(0,0,0,0.07);
            padding: 2rem 2.5rem;
        }
        @media (max-width: 991.98px) {
            .card-article { padding: 1rem; }
        }
    </style>
</head>
<body>
    <!-- Navigasi -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="navbar-brand fw-bold text-primary" href="index.php"><i class="fas fa-home"></i> BlogKu</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Kategori
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="kategoriDropdown">
                    <?php foreach ($kategori_nav as $kat): ?>
                        <a class="dropdown-item" href="kategori.php?id=<?php echo $kat['id']; ?>">
                            <?php echo htmlspecialchars($kat['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        </ul>
    </nav>

    <div class="container" style="max-width:1200px;">
        <div class="row">
            <!-- Bagian Kiri: Detail Artikel -->
            <div class="col-lg-8 mb-4">
                <?php if ($article): ?>
                <div class="card-article mb-4">
                    <?php if (!empty($article['picture'])): ?>
                        <img src="../img/<?php echo htmlspecialchars($article['picture']); ?>" class="article-img mb-4" alt="<?php echo htmlspecialchars($article['judul_artikel']); ?>">
                    <?php endif; ?>
                    <h2 class="fw-bold mb-2"><?php echo htmlspecialchars($article['judul_artikel']); ?></h2>
                    <div class="meta-info mb-2">
                        <i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($article['tanggal_publikasi']); ?>
                        &nbsp; | &nbsp;
                        <i class="fas fa-user"></i> <?php echo htmlspecialchars($article['nama_penulis']); ?>
                        &nbsp; | &nbsp;
                        <?php foreach (explode(',', $article['nama_kategori']) as $cat): ?>
                            <span class="badge badge-category"><?php echo htmlspecialchars(trim($cat)); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                    <div class="fs-5 lh-lg" style="text-align:justify;">
                        <?php echo $article['isi_artikel']; ?>
                    </div>
                </div>
                <?php else: ?>
                    <div class="alert alert-danger text-center shadow-sm mt-5">
                        Artikel tidak ditemukan.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Bagian Kanan: Sidebar -->
            <div class="col-lg-4 mb-4">
                <!-- Search Sidebar -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="fas fa-search"></i> Pencarian
                    </div>
                    <div class="card-body">
                        <form method="get" action="index.php">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari artikel..." name="search" value="<?php echo htmlspecialchars($search); ?>">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Artikel Terkait -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">
                        <i class="fas fa-link"></i> Artikel Terkait
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if (!empty($related)): ?>
                            <?php foreach ($related as $rel): ?>
                                <li class="list-group-item">
                                    <a href="detail.php?id=<?php echo $rel['id']; ?>" class="text-decoration-none text-primary">
                                        <?php echo htmlspecialchars($rel['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-group-item text-muted">Tidak ada artikel terkait.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow-sm py-4 mt-5">
        <div class="container text-center">
            <span class="text-muted">&copy; <?php echo date('Y'); ?> BlogKu by Tian.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script src="../js/sb-admin-2.min.js"></script>
