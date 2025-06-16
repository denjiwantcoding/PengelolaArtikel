<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['nickname'])) {
    header("Location: ../login.php");
}
$nickname = $_SESSION['nickname'];
$sql = "SELECT * from author where nickname='$nickname'";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

// Ambil keyword pencarian jika ada
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    // Query untuk mendapatkan artikel (dengan pencarian jika ada)
    $query = "SELECT a.id, a.date, a.title, a.content, a.picture, 
                     GROUP_CONCAT(c.name) AS categories, au.nickname 
              FROM article a
              JOIN article_category ac ON a.id = ac.article_id
              JOIN category c ON ac.category_id = c.id
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              WHERE a.status = 'setuju'";

    // Tambahkan filter pencarian jika ada keyword
    if ($search !== '') {
        $safe_search = mysqli_real_escape_string($koneksi, $search);
        $query .= " AND (a.title LIKE '%$safe_search%' OR a.content LIKE '%$safe_search%')";
    }

    $query .= " GROUP BY a.id";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        throw new Exception("Query gagal: " . mysqli_error($koneksi));
    }

    $articles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }

    if (empty($articles) && $search !== '') {
        $notfound_message = "<p class='text-center'>Tidak ada artikel yang cocok dengan pencarian Anda.</p>";
    } elseif (empty($articles)) {
        $notfound_message = "<p class='text-center'>Tidak ada artikel yang ditemukan.</p>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
// Ambil kategori dari database untuk dropdown navbar
$kategori_nav = [];
$kategori_nav_query = mysqli_query($koneksi, "SELECT * FROM category");
while ($row = mysqli_fetch_assoc($kategori_nav_query)) {
    $kategori_nav[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home </title>

    <!-- Custom fonts for this template-->
    <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>

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
           .container-custom {
        max-width: 1300px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 24px;
        padding-right: 24px;
    }
    @media (max-width: 991.98px) {
        .container-custom {
            padding-left: 12px;
            padding-right: 12px;
        }
    }
    </style>
    
</head>

<body id="page-top" class="bg-light">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Topbar Navbar ala SB Admin 2 -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
       <!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="index.php">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari artikel judul/isi..."
            aria-label="Search" aria-describedby="basic-addon2" name="search" value="<?php echo htmlspecialchars($search); ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Notifikasi</h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Hari ini</div>
                            <span class="font-weight-bold">Selamat datang di BlogKu!</span>
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Notifikasi</a>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- untuk kategori -->
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
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($nickname); ?></span>
                    <img class="img-profile rounded-circle"
                        src="../img/undraw_profile.svg" alt="profile" style="object-fit:cover;">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profil.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <a class="dropdown-item" href="tambahArtikel.php">
                        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Tambah Artikel
                    </a>
                    <a class="dropdown-item" href="artikelSaya.php">
                        <i class="fa-solid fa-newspaper mr-2 text-gray-400"></i>
                        Artikel Saya
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End Topbar -->

    <header class="bg-gradient-primary py-5 mb-4 shadow-sm">
        <div class="container text-center text-white">
            <h1 class="display-4 font-weight-bold mb-2">BlogKu</h1>
            <p class="lead mb-0">Temukan dan bagikan artikel menarik setiap hari</p>
        </div>
    </header>

    
<div class="container-custom">
    <div class="row">
        <!-- Sidebar Kiri: Artikel Terbaru -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-clock"></i> Artikel Terbaru
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                    $recent_query = mysqli_query($koneksi, "
                        SELECT a.id, a.title, a.date 
                        FROM article a
                        WHERE a.status = 'setuju'
                        ORDER BY a.date DESC
                        LIMIT 5
                    ");
                    while ($recent = mysqli_fetch_assoc($recent_query)): ?>
                        <li class="list-group-item">
                            <a href="detail.php?id=<?php echo $recent['id']; ?>" class="text-decoration-none text-primary">
                                <?php echo htmlspecialchars($recent['title']); ?>
                            </a>
                            <br>
                            <small class="text-muted"><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($recent['date']); ?></small>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <!-- Konten Utama: Artikel -->
        <div class="col-lg-6 mb-4">
            <div class="row">
                <?php if (!empty($articles)): ?>
                    <?php foreach ($articles as $article): ?>
                        <div class="col-md-12 mb-4">
                            <div class="card h-100 shadow border-0 card-animate">
                                <img src="../img/<?php echo htmlspecialchars($article['picture'] ?: 'default.jpg'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($article['title']); ?>" style="height:200px;object-fit:cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary"><?php echo htmlspecialchars($article['title']); ?></h5>
                                    <p class="card-text mb-1">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($article['date']); ?> &nbsp;
                                            <i class="fas fa-user"></i> <?php echo htmlspecialchars($article['nickname']); ?>
                                        </small>
                                    </p>
                                    <p class="card-text flex-grow-1"><?php echo mb_substr(strip_tags($article['content']), 0, 120) . '...'; ?></p>
                                    <p class="card-text mb-2"><span class="badge bg-info text-white"><i class="fas fa-tag"></i> <?php echo htmlspecialchars($article['categories']); ?></span></p>
                                    <a href="detail.php?id=<?php echo $article['id']; ?>" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center shadow-sm">Tidak ada artikel yang ditemukan.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar Kanan: Kategori & Tentang -->
        <div class="col-lg-3 mb-4">
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
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <!-- <script src="../vendor/chart.js/Chart.min.js"></script> -->
    <!-- <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script> -->
    <script>
$(document).ready(function(){
    $('.card-animate').each(function(i){
        setTimeout(() => {
            $(this).addClass('visible');
        }, 150 * i);
    });
});
</script>

</body>

</html>