<?php
// filepath: c:\xampp\htdocs\Project_web_teori\user\editArtikel.php
include "../koneksi.php";
session_start();

if (!isset($_SESSION['author_id'])) {
    die("Anda belum login.");
}
$author_id = $_SESSION['author_id'];

// Ambil data artikel berdasarkan id dan author
$id = intval($_GET['id']);
$sql = "SELECT a.*, ac.category_id FROM article a
        JOIN article_author aa ON a.id = aa.article_id
        JOIN article_category ac ON a.id = ac.article_id
        WHERE a.id = $id AND aa.author_id = $author_id";
$query = mysqli_query($koneksi, $sql);
$artikel = mysqli_fetch_assoc($query);

// Ambil kategori
$kategori = [];
$kategori_query = mysqli_query($koneksi, "SELECT * FROM category");
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategori[] = $row;
}

if (!$artikel) {
    die("Artikel tidak ditemukan atau Anda tidak berhak mengedit.");
}
?>
<?php
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $content = mysqli_real_escape_string($koneksi, $_POST['content']);
    $category = intval($_POST['category']);

    // Proses upload gambar jika ada file baru
    $picture = $artikel['picture'];
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('img_') . '.' . $ext;
        $upload_path = '../img/' . $filename;
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $upload_path)) {
            $picture = $filename;
        }
    }

    // Update artikel
    $update = mysqli_query($koneksi, "UPDATE article SET title='$title', content='$content', picture='$picture' WHERE id=$id");

    // Update kategori
    mysqli_query($koneksi, "UPDATE article_category SET category_id=$category WHERE article_id=$id");

    echo "<script>alert('Artikel berhasil diupdate!');window.location='artikelSaya.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Artikel</h4>
                </div>
                <div class="card-body">
                    <form action="editArtikel.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label font-bold">Judul Artikel</label>
                            <input type="text" class="form-control" id="title" name="title" required value="<?php echo htmlspecialchars($artikel['title']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label font-bold">Isi Artikel</label>
                            <textarea class="form-control" id="content" name="content" rows="7"><?php echo htmlspecialchars($artikel['content']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label font-bold">Ganti Gambar (opsional)</label>
                            <input class="form-control" type="file" id="picture" name="picture" accept="image/*">
                            <?php if ($artikel['picture']): ?>
                                <img src="../img/<?php echo htmlspecialchars($artikel['picture']); ?>" class="img-fluid mt-2" style="max-width:200px;">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label font-bold">Kategori</label>
                            <select class="form-select" name="category" required>
                                <option value="" disabled>Pilih kategori</option>
                                <?php foreach ($kategori as $kat): ?>
                                    <option value="<?php echo $kat['id']; ?>" <?php if ($kat['id'] == $artikel['category_id']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($kat['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update" class="btn btn-warning w-100">Simpan Perubahan</button>
                            <a href="artikelSaya.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
ClassicEditor.create(document.querySelector('#content'));
</script>
</body>
</html>