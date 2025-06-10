<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_pancasila");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$status = "";

// Proses saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $aksi = mysqli_real_escape_string($conn, $_POST['aksi']);
    $tanggal = date('Y-m-d H:i:s');

    // Upload file dokumentasi
    $target_dir = "uploads/";
    $file_name = basename($_FILES["dokumentasi"]["name"]);
    $target_file = $target_dir . $file_name;

    // Buat folder jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["dokumentasi"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO tbl_aksi (nama, judul, aksi, dokumentasi, tanggal)
                VALUES ('$nama', '$judul', '$aksi', '$target_file', '$tanggal')";
        if (mysqli_query($conn, $sql)) {
            $status = "success";
        } else {
            $status = "fail";
        }
    } else {
        $status = "fail";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aksi Nyata Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffafa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #b30000;
            color: white;
            text-align: center;
            padding: 25px 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin: 0;
            font-size: 26px;
        }

        .container {
            width: 90%;
            max-width: 620px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #a11;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            margin-top: 25px;
            background-color: #b30000;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #870000;
        }

        .alert-success,
        .alert-fail {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-weight: 600;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-fail {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        footer {
            margin-top: 60px;
            padding: 15px;
            background-color: #b30000;
            color: white;
            text-align: center;
        }

        .back-link {
            display: block;
            margin-top: 25px;
            color: #b30000;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Form Aksi Nyata Mahasiswa</h1>
    <p>Menginspirasi lewat tindakan nyata berdasarkan nilai Pancasila</p>
</header>

<div class="container">
    <?php if ($status == "success"): ?>
        <div class="alert-success">✅ Aksi berhasil dikirim dan disimpan ke database!</div>
    <?php elseif ($status == "fail"): ?>
        <div class="alert-fail">❌ Gagal menyimpan data. Coba lagi.</div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" name="nama" id="nama" required placeholder="Contoh: Theresia Evalina Barus">

        <label for="judul">Judul Aksi</label>
        <input type="text" name="judul" id="judul" required placeholder="Contoh: Bersih-Bersih Lingkungan Sekitar Kampus">

        <label for="aksi">Deskripsi Aksi</label>
        <textarea name="aksi" id="aksi" rows="5" required placeholder="Contoh: Saya mengajak teman-teman membersihkan taman kampus sebagai wujud gotong royong."></textarea>

        <label for="dokumentasi">Upload Dokumentasi (Foto)</label>
        <input type="file" name="dokumentasi" id="dokumentasi" accept="image/*" required>

        <input type="submit" value="Kirim Aksi Nyata">
    </form>

    <a href="list_aksi.php" class="back-link">← Lihat Daftar Aksi</a>
</div>

<footer>
    &copy; 2025 Suaraku Pancasila – Politeknik Negeri Medan
</footer>

</body>
</html>
