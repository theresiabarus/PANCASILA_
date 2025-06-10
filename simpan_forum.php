<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan bersihkan agar aman
    $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $topik = trim(mysqli_real_escape_string($conn, $_POST['topik']));
    $isi_pesan = trim(mysqli_real_escape_string($conn, $_POST['isi_pesan']));
    $tanggal = date('Y-m-d H:i:s');

    // Validasi sederhana: cek jika ada yang kosong
    if (empty($nama) || empty($topik) || empty($isi_pesan)) {
        echo "<script>alert('Semua kolom harus diisi!'); window.history.back();</script>";
        exit;
    }

    // Query simpan ke database
    $sql = "INSERT INTO tbl_forum (nama, topik, isi_pesan, tanggal) VALUES ('$nama', '$topik', '$isi_pesan', '$tanggal')";

    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman forum setelah sukses
        header("Location: form.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika bukan POST, langsung redirect ke forum.php
    header("Location: form.php");
    exit;
}
?>
