<?php
include 'koneksi.php';

if (!isset($_GET['id_aksi'])) {
    header("Location: list_aksi.php");
    exit;
}

$id_aksi = intval($_GET['id_aksi']);

// Ambil dokumentasi untuk hapus file
$sql = "SELECT dokumentasi FROM tbl_aksi WHERE id_aksi = $id_aksi LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row['dokumentasi']) && file_exists($row['dokumentasi'])) {
        unlink($row['dokumentasi']); // Hapus file gambar
    }
}

// Hapus data dari database
$deleteSql = "DELETE FROM tbl_aksi WHERE id_aksi = $id_aksi";
if (mysqli_query($conn, $deleteSql)) {
    header("Location: list_aksi.php?status=deleted");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
