<?php
include 'koneksi.php';

if (!isset($_GET['id_aksi'])) {
    header("Location: list_aksi.php");
    exit;
}

$id_aksi = intval($_GET['id_aksi']);

// Ambil data aksi berdasarkan id_aksi
$sql = "SELECT * FROM tbl_aksi WHERE id_aksi = $id_aksi LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: list_aksi.php?status=notfound");
    exit;
}

$row = mysqli_fetch_assoc($result);
$error = "";

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $aksi = mysqli_real_escape_string($conn, $_POST['aksi']);
    $tanggal = date('Y-m-d H:i:s');
    $dokumentasi = $row['dokumentasi']; // default

    // Proses upload dokumentasi baru (jika ada)
    if (isset($_FILES['dokumentasi']) && $_FILES['dokumentasi']['error'] == 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = pathinfo($_FILES['dokumentasi']['name'], PATHINFO_EXTENSION);
        $fileName = 'aksi_' . time() . '.' . $ext;
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $targetFile)) {
            // Hapus file lama jika ada
            if (!empty($row['dokumentasi']) && file_exists($row['dokumentasi'])) {
                unlink($row['dokumentasi']);
            }
            $dokumentasi = $targetFile;
        } else {
            $error = "Gagal mengunggah file dokumentasi.";
        }
    }

    if (empty($error)) {
        $updateSql = "UPDATE tbl_aksi SET 
            nama='$nama',
            judul='$judul',
            aksi='$aksi',
            dokumentasi='$dokumentasi',
            tanggal='$tanggal'
            WHERE id_aksi=$id_aksi";

        if (mysqli_query($conn, $updateSql)) {
            header("Location: list_aksi.php?status=updated");
            exit;
        } else {
            $error = "Gagal memperbarui data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit Aksi Nyata</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffafa;
            padding: 30px;
        }
        .form-container {
            background: white;
            max-width: 600px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #b30000;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }
        input[type=text], textarea, input[type=file] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        textarea {
            height: 100px;
        }
        button {
            background-color: #b30000;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }
        button:hover {
            background-color: #800000;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #b30000;
            font-weight: bold;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        img.thumb {
            max-width: 120px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Aksi Nyata</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($row['nama']) ?>">

        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul" required value="<?= htmlspecialchars($row['judul']) ?>">

        <label for="aksi">Aksi Nyata</label>
        <textarea id="aksi" name="aksi" required><?= htmlspecialchars($row['aksi']) ?></textarea>

        <label for="dokumentasi">Dokumentasi (jika ingin mengganti)</label>
        <input type="file" name="dokumentasi" accept="image/*">

        <?php if (!empty($row['dokumentasi']) && file_exists($row['dokumentasi'])): ?>
            <img src="<?= $row['dokumentasi'] ?>" alt="Dokumentasi Lama" class="thumb">
        <?php endif; ?>

        <button type="submit">Perbarui Data</button>
    </form>

    <a href="list_aksi.php" class="back-link">← Kembali ke Daftar Aksi Nyata</a>
</div>

</body>
</html>
