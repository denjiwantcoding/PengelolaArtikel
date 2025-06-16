<?php
session_start();
include "../koneksi.php";
$nickname = $_SESSION['nickname'];
$sql = "SELECT * from author where nickname='$nickname'";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

$kategori = [];
$kategori_query = mysqli_query($koneksi, "SELECT * FROM category");
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategori[] = $row;
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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Gamtenk <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="article.php">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Article</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="author.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Author</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="assigment.php">
                    <i class="fa-solid fa-list-check"></i>
                    <span>assigment</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="category.php">
                    <i class="fa-solid fa-list"></i>
                    <span>Category</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nickname; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex justify-between items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Data Article</h6>
                            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambahArtikel">
                                <i class="fas fa-plus"></i> Tambah Artikel
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Penulis</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT a.id, a.title, a.date, au.nickname, GROUP_CONCAT(c.name) as categories
                            FROM article a
                            JOIN article_author aa ON a.id = aa.article_id
                            JOIN author au ON aa.author_id = au.id
                            JOIN article_category ac ON a.id = ac.article_id
                            JOIN category c ON ac.category_id = c.id
                            GROUP BY a.id";
                                        $result = $koneksi->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                <td><?php echo htmlspecialchars($row['date']); ?></td>
                                                <td><?php echo htmlspecialchars($row['nickname']); ?></td>
                                                <td><?php echo htmlspecialchars($row['categories']); ?></td>
                                                <td>
                                                    <a href="editArtikel.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-warning btn-sm edit-article-btn"
                                                        >
                                                        Edit
                                                    </a>

                                                    <a href="article_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->


                        <!-- Pie Chart -->

                    </div>

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BlogKu by Tian.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Edit Artikel -->
    <div class="modal fade" id="modalEditArtikel" tabindex="-1" role="dialog" aria-labelledby="modalEditArtikelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="editArticleForm" action="editArtikel.php.php" method="POST" enctype="multipart/form-data" class="modal-content">
                <input type="hidden" name="id" id="edit-article-id">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalEditArtikelLabel">Edit Artikel</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label font-bold">Judul Artikel</label>
                        <input type="text" class="form-control" id="edit-title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-content" class="form-label font-bold">Isi Artikel</label>
                        <textarea class="form-control" id="edit-content" name="content" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-picture" class="form-label font-bold">Ganti Gambar (opsional)</label>
                        <input class="form-control" type="file" id="edit-picture" name="picture" accept="image/*">
                        <div id="edit-current-picture" class="mt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-bold">Kategori</label>
                        <select class="form-control" name="category" id="edit-category" required>
                            <option value="" disabled>Pilih kategori</option>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?php echo $kat['id']; ?>"><?php echo htmlspecialchars($kat['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">anda yakin mau logout?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tekan logout jika ingin keluar</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
    <div class="modal fade" id="modalTambahArtikel" tabindex="-1" role="dialog" aria-labelledby="modalTambahArtikelLabel" aria-hidden="true" modal-radius="40px">
        <div class="modal-dialog modal-lg" role="document">
            <form action="aksiTambahArtikel.php" method="POST" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalTambahArtikelLabel">Tambah Artikel</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label font-bold">Judul Artikel</label>
                        <input type="text" class="form-control" id="modal-title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-content" class="form-label font-bold">Isi Artikel</label>
                        <textarea class="form-control" id="modal-content" name="content" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="modal-picture" class="form-label font-bold">Upload Gambar</label>
                        <input class="form-control" type="file" id="modal-picture" name="picture" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label font-bold">Kategori</label>
                        <select class="form-control" name="category" required>
                            <option value="" disabled selected>Pilih kategori</option>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?php echo $kat['id']; ?>"><?php echo htmlspecialchars($kat['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Artikel</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            // ...existing code...
            $('.edit-article-btn').on('click', function() {
                const id = $(this).data('id');
                const title = $(this).data('title');
                const content = $(this).data('content');
                const category = $(this).data('category');
                const picture = $(this).data('picture');

                $('#edit-article-id').val(id);
                $('#edit-title').val(title);
                $('#edit-category').val(category);

                // CKEditor
                if (editModalEditor) {
                    editModalEditor.setData(content || '');
                } else {
                    ClassicEditor.create(document.querySelector('#edit-content'))
                        .then(editor => {
                            editModalEditor = editor;
                            editor.setData(content || '');
                        });
                }

                // Gambar
                if (picture) {
                    $('#edit-current-picture').html('<img src="../img/' + picture + '" class="img-fluid" style="max-width:150px;">');
                } else {
                    $('#edit-current-picture').html('');
                }

                $('#modalEditArtikel').modal('show');
            });
            // ...existing code...

            // Saat modal ditutup, destroy editor
            $('#modalEditArtikel').on('hidden.bs.modal', function() {
                if (editModalEditor) {
                    editModalEditor.destroy().then(() => {
                        editModalEditor = null;
                        $('#edit-content').val('');
                        $('#edit-current-picture').html('');
                        $('#edit-category').val('');
                    });
                }
            });
        });
    </script>

    <script>
        var modalEditor;
        $('#modalTambahArtikel').on('shown.bs.modal', function() {
            if (!modalEditor) {
                ClassicEditor
                    .create(document.querySelector('#modal-content'))
                    .then(editor => {
                        modalEditor = editor;
                        $('#modalTambahArtikel form').on('submit', function(e) {
                            if (!editor.getData().trim()) {
                                alert('Isi artikel tidak boleh kosong!');
                                e.preventDefault();
                            }
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>

</body>

</html>