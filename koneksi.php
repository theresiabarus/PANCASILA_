<?php
$servername = "localhost";  // biasanya localhost
$username = "root";         // sesuaikan dengan user database kamu
$password = "";             // kosongkan kalau belum ada password
$dbname = "db_pancasila";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
