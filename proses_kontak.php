<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
    $tanggal = date('Y-m-d H:i:s');

    $query = "INSERT INTO tbl_kontak (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', '$tanggal')";
    if (mysqli_query($conn, $query)) {
        header("Location: kontak.php?status=success");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: kontak.php");
    exit;
}
?>
