<?php
// filepath: c:\xampp\htdocs\Project_web_teori\admin\profile.php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['nickname'])) {
    header("Location: ../login.php");
    exit;
}
$nickname = $_SESSION['nickname'];

// Ambil data admin (author)
$sql = "SELECT * FROM author WHERE nickname='$nickname'";
$query = $koneksi->query($sql);
$user = $query->fetch_assoc();

// Proses update profil
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_nickname = trim($_POST['nickname']);
    $new_email = trim($_POST['email']);
    $new_password = trim($_POST['password']);

    if ($new_nickname === '' || $new_email === '') {
        $error = "Nickname dan email tidak boleh kosong.";
    } else {
        if ($new_password !== '') {
            $hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $update = $koneksi->query("UPDATE author SET nickname='$new_nickname', email='$new_email', password='$hashed' WHERE id='{$user['id']}'");
        } else {
            $update = $koneksi->query("UPDATE author SET nickname='$new_nickname', email='$new_email' WHERE id='{$user['id']}'");
        }
        if ($update) {
            $_SESSION['nickname'] = $new_nickname;
            $success = "Profil berhasil diperbarui.";
            $sql = "SELECT * FROM author WHERE id='{$user['id']}'";
            $query = $koneksi->query($sql);
            $user = $query->fetch_assoc();
        } else {
            $error = "Gagal memperbarui profil.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile | BlogKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .profile-card {
            border-radius: 1rem;
            box-shadow: 0 2px 24px rgba(0,0,0,0.07);
            background: #fff;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #4e73df;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.php"><i class="fas fa-home"></i> BlogKu Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="profile-card p-4 mb-4">
                    <div class="text-center">
                        <img src="../img/undraw_profile.svg" alt="Avatar" class="profile-avatar mb-2">
                        <h3 class="fw-bold mb-0"><?php echo htmlspecialchars($user['nickname']); ?></h3>
                        <div class="text-muted mb-3"><?php echo htmlspecialchars($user['email']); ?></div>
                        <span class="badge bg-primary">Admin</span>
                    </div>
                    <hr>
                    <h5 class="mb-3">Edit Profil Admin</h5>
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label for="nickname" class="form-label">Nickname</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo htmlspecialchars($user['nickname']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password Baru <span class="text-muted">(Kosongkan jika tidak ingin mengubah)</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password baru">
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <a href="index.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white shadow-sm py-4 mt-5">
        <div class="container text-center">
            <span class="text-muted">&copy; <?php echo date('Y'); ?> BlogKu by Tian.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>