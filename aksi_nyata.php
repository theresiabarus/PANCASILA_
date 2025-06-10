<?php
include 'koneksi.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $aksi = mysqli_real_escape_string($conn, $_POST['aksi']);
    $tanggal = date('Y-m-d H:i:s');

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $dokumentasi = '';
    if (isset($_FILES['dokumentasi']) && $_FILES['dokumentasi']['error'] === 0) {
        $ext = pathinfo($_FILES['dokumentasi']['name'], PATHINFO_EXTENSION);
        $fileName = 'aksi_' . time() . '.' . $ext;
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $targetFile)) {
            $dokumentasi = $targetFile;
        } else {
            $error = "Gagal mengunggah dokumentasi.";
        }
    }

    if (empty($error)) {
        $sql = "INSERT INTO tbl_aksi (nama, judul, aksi, dokumentasi, tanggal)
                VALUES ('$nama', '$judul', '$aksi', '$dokumentasi', '$tanggal')";
        if (mysqli_query($conn, $sql)) {
            $success = "Aksi berhasil disimpan!";
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Aksi Nyata Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff5f5;
            margin: 0;
            padding: 30px;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #b30000;
            text-align: center;
        }
        label {
            margin-top: 15px;
            display: block;
            font-weight: bold;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button {
            background-color: #b30000;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            font-size: 16px;
        }
        button:hover {
            background-color: #800000;
        }
        .alert {
            margin-top: 15px;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
        }
        .error {
            background-color: #fdecea;
            color: #cc0000;
        }
        .success {
            background-color: #e6ffed;
            color: #007b00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Aksi Nyata Mahasiswa</h2>

        <?php if (!empty($error)): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php elseif (!empty($success)): ?>
            <div class="alert success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required placeholder="Contoh: Theresia Evalina Barus">

            <label for="judul">Judul Aksi</label>
            <input type="text" name="judul" id="judul" required placeholder="Contoh: Penanaman Pohon di Kampus">

            <label for="aksi">Deskripsi Aksi Nyata</label>
            <textarea name="aksi" id="aksi" required placeholder="Contoh: Saya bersama rekan mahasiswa melakukan penanaman pohon sebagai bentuk pengamalan nilai cinta lingkungan."></textarea>

            <label for="dokumentasi">Upload Dokumentasi</label>
            <input type="file" name="dokumentasi" id="dokumentasi" accept="image/*">

            <button type="submit">Kirim Aksi</button>
        </form>
    </div>
</body>
</html>
