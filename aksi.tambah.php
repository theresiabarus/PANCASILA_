<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $aksi = mysqli_real_escape_string($conn, $_POST['aksi']);
    $tanggal = date('Y-m-d H:i:s');
    $foto = NULL;

    // Upload foto jika ada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $fileName = basename($_FILES['foto']['name']);
        $fileTmp = $_FILES['foto']['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExt, $allowedExt)) {
            $newFileName = uniqid('foto_') . '.' . $fileExt;
            $uploadFile = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $uploadFile)) {
                $foto = $newFileName;
            } else {
                $error = "Gagal mengunggah foto.";
            }
        } else {
            $error = "Format foto tidak diperbolehkan.";
        }
    }

    if (!$error) {
        $sql = "INSERT INTO tbl_aksi (nama, judul, aksi, dokumentasi, tanggal) 
                VALUES ('$nama', '$judul', '$aksi', '$foto', '$tanggal')";
        if (mysqli_query($conn, $sql)) {
            header("Location: list_aksi.php");
            exit;
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<title>Tambah Aksi Baru</title>
<style>
    body { font-family: Arial, sans-serif; background: #f4f9ff; color: #023e8a; padding: 20px; }
    form { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
    label { display: block; margin: 12px 0 6px; font-weight: bold; }
    input[type=text], textarea, input[type=file] { width: 100%; padding: 10px; border: 2px solid #90e0ef; border-radius: 6px; }
    textarea { resize: vertical; }
    button { background: #0077b6; color: white; padding: 12px 20px; border: none; border-radius: 8px; cursor: pointer; margin-top: 15px; }
    button:hover { background: #0096c7; }
    .error { color: red; margin-bottom: 15px; }
    a { display: inline-block; margin-top: 10px; color: #0077b6; text-decoration: none; }
    a:hover { text-decoration: underline; }
</style>
</head>
<body>
<h2>Tambah Aksi Baru</h2>
<?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="POST" action="" enctype="multipart/form-data">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" required>

    <label for="judul">Judul Aksi</label>
    <input type="text" id="judul" name="judul" required>

    <label for="aksi">Cerita / Deskripsi</label>
    <textarea id="aksi" name="aksi" rows="6" required></textarea>

    <label for="foto">Foto Dokumentasi (opsional)</label>
    <input type="file" id="foto" name="foto" accept="image/*">

    <button type="submit">Simpan</button>
</form>
<a href="list_aksi.php">← Kembali ke daftar aksi</a>
</body>
</html>
