<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $judul   = mysqli_real_escape_string($conn, $_POST['judul']); // tambahkan judul
    $aksi    = mysqli_real_escape_string($conn, $_POST['aksi']);
    $tanggal = date('Y-m-d H:i:s');
    $foto    = NULL;

    // Validasi minimal
    if (strlen($nama) < 2 || strlen($judul) < 3 || strlen($aksi) < 5) {
        echo "Nama, judul, atau cerita terlalu singkat.";
        exit;
    }

    // Upload file dokumentasi
    if (isset($_FILES['dokumentasi']) && $_FILES['dokumentasi']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName  = basename($_FILES['dokumentasi']['name']);
        $fileTmp   = $_FILES['dokumentasi']['tmp_name'];
        $fileExt   = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            echo "Folder uploads tidak tersedia atau tidak dapat ditulis.";
            exit;
        }

        if (in_array($fileExt, $allowedExt)) {
            $newFileName = uniqid('aksi_') . '.' . $fileExt;
            $uploadPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $uploadPath)) {
                $foto = $newFileName;
            } else {
                echo "Gagal mengunggah dokumentasi.";
                exit;
            }
        } else {
            echo "Format file tidak valid (hanya jpg, jpeg, png, gif).";
            exit;
        }
    }

    // Simpan ke database
    $sql = "INSERT INTO tbl_aksi (nama, judul, aksi, dokumentasi, tanggal)
            VALUES ('$nama', '$judul', '$aksi', '$foto', '$tanggal')";

    if (mysqli_query($conn, $sql)) {
        header("Location: aksi.php?status=success");
        exit;
    } else {
        echo "Gagal menyimpan ke database: " . mysqli_error($conn);
    }
} else {
    header("Location: aksi.php");
    exit;
}
?>
