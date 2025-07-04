<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// Ambil ID kategori dari URL
$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil nama kategori
$kategori_query = mysqli_query($koneksi, "SELECT name FROM category WHERE id = $category_id");
$kategori = mysqli_fetch_assoc($kategori_query);

// Ambil semua kategori untuk dropdown navbar
$kategori_nav = [];
$kategori_nav_query = mysqli_query($koneksi, "SELECT * FROM category");
while ($row = mysqli_fetch_assoc($kategori_nav_query)) {
    $kategori_nav[] = $row;
}

// Query artikel berdasarkan kategori
$query = "
    SELECT a.id, a.date, a.title, a.content, a.picture, 
           GROUP_CONCAT(c.name) AS categories, au.nickname
    FROM article a
    JOIN article_category ac ON a.id = ac.article_id
    JOIN category c ON ac.category_id = c.id
    JOIN article_author aa ON a.id = aa.article_id
    JOIN author au ON aa.author_id = au.id
    WHERE a.status = 'setuju' AND ac.category_id = $category_id
    GROUP BY a.id
";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artikel Kategori <?php echo htmlspecialchars($kategori['name'] ?? 'Tidak Ditemukan'); ?> | BlogKu</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <style>
        .card-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(.4, 0, .2, 1);
        }

        .card-animate.visible {
            opacity: 1;
            transform: none;
        }
    </style>
</head>

<body class="bg-light">
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

    <header class="bg-gradient-primary py-5 mb-4 shadow-sm">
        <div class="container text-center text-white">
            <h1 class="display-5 font-weight-bold mb-2">
                Kategori: <?php echo htmlspecialchars($kategori['name'] ?? 'Tidak Ditemukan'); ?>
            </h1>
            <p class="lead mb-0">Artikel dengan kategori ini</p>
        </div>
    </header>
<div class="container-fluid" style="max-width:1200px;">
    <div class="row">
        <!-- Bagian Kiri: Artikel Berdasarkan Kategori -->
        <div class="col-lg-8 mb-4">
           
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="card mb-4 shadow-sm border-0">
                        <?php if (!empty($article['picture'])): ?>
                            <img src="../img/<?php echo htmlspecialchars($article['picture']); ?>" class="card-img-top" style="max-height:200px;object-fit:cover;" alt="<?php echo htmlspecialchars($article['title']); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($article['title']); ?></h5>
                            <div class="mb-2">
                                <span class="badge bg-info text-white"><i class="fas fa-tag"></i> <?php echo htmlspecialchars($article['categories']); ?></span>
                            </div>
                            <div class="mb-2 text-muted small">
                                <i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($article['date']); ?> &nbsp;
                                <i class="fas fa-user"></i> <?php echo htmlspecialchars($article['nickname']); ?>
                            </div>
                            <div class="mb-2"><?php echo mb_substr(strip_tags($article['content']), 0, 150) . '...'; ?></div>
                            <a href="detail.php?id=<?php echo $article['id']; ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info text-center shadow-sm">Tidak ada artikel pada kategori ini.</div>
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
                            <input type="text" class="form-control" placeholder="Cari artikel..." name="search" value="<?php echo htmlspecialchars($search ?? ''); ?>">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Menu Kategori -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-list"></i> Kategori
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($kategori_nav as $kat): ?>
                        <li class="list-group-item">
                            <a href="kategori.php?id=<?php echo $kat['id']; ?>" class="text-decoration-none text-primary">
                                <?php echo htmlspecialchars($kat['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- Tentang -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-info-circle"></i> Tentang
                </div>
                <div class="card-body">
                    <p class="mb-0">
                        <b>BlogKu</b> adalah platform berbagi artikel menarik setiap hari. Temukan inspirasi, pengetahuan, dan cerita dari berbagai kategori!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="bg-white mt-5 py-4 shadow-sm">
        <div class="container text-center">
            <span class="text-muted">&copy; <?php echo date('Y'); ?> BlogKu by Tian</span>
        </div>
    </footer>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.card-animate').each(function(i) {
                setTimeout(() => {
                    $(this).addClass('visible');
                }, 150 * i);
            });
        });
    </script>
</body>

</html>