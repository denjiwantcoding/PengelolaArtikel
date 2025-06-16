<?php
include "../koneksi.php";

session_start();
$nickname = $_SESSION['nickname'];
$sql = "SELECT * from author where nickname='$nickname'";
$query = $koneksi->query($sql);
$data = $query->fetch_array();
if (!isset($_SESSION['author_id'])) {
    die("Session author_id belum di-set. Silakan login ulang.");
}

// Ambil kategori dari database
$kategori = [];
$kategori_query = mysqli_query($koneksi, "SELECT * FROM category");
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategori[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ea0ab0480.js" crossorigin="anonymous"></script>
    <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.php"><i class="fas fa-home"></i> BlogKu</a>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Artikel</h4>
                    </div>
                    <div class="card-body">
                        <form action="aksiTambahArtikel.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label font-bold">Judul Artikel</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label font-bold">Isi Artikel</label>
                                <textarea class="form-control" id="content" name="content" rows="7"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="picture" class="form-label font-bold">Upload Gambar</label>
                                <input class="form-control" type="file" id="picture" name="picture" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-bold">Kategori</label>
                                <select class="form-select" name="category" required>
                                    <option value="" disabled selected>Pilih kategori</option>
                                    <?php foreach ($kategori as $kat): ?>
                                        <option value="<?php echo $kat['id']; ?>"><?php echo htmlspecialchars($kat['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Tambah Artikel</button>
                                <a href="index.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => {
                window.editor = editor;
                document.querySelector('form').addEventListener('submit', function(e) {
                    if (!editor.getData().trim()) {
                        alert('Isi artikel tidak boleh kosong!');
                        e.preventDefault();
                    }
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>