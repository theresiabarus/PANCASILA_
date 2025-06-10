<?php
include 'koneksi.php';

// Ambil semua data aksi nyata
$sql = "SELECT * FROM tbl_aksi ORDER BY tanggal DESC";
$result = mysqli_query($conn, $sql);

$status_msg = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'deleted') {
        $status_msg = 'Data berhasil dihapus.';
    } elseif ($_GET['status'] == 'updated') {
        $status_msg = 'Data berhasil diperbarui.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Aksi Nyata Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffafa;
            margin: 0; padding: 0;
        }
        header {
            background-color: #b30000;
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            margin: 0;
            font-size: 26px;
        }
        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }
        th {
            background-color: #d62828;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .aksi-btn {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            margin-right: 5px;
            display: inline-block;
        }
        .edit-btn {
            background-color: #4CAF50;
        }
        .edit-btn:hover {
            background-color: #3e8e41;
        }
        .delete-btn {
            background-color: #b30000;
        }
        .delete-btn:hover {
            background-color: #800000;
        }
        .status-msg {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        img.thumb {
            max-width: 80px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        a.back-link, a.home-link {
            display: inline-block;
            margin-top: 20px;
            color: #b30000;
            font-weight: bold;
            text-decoration: none;
            padding: 8px 15px;
            border: 2px solid #b30000;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        a.back-link:hover, a.home-link:hover {
            background-color: #b30000;
            color: white;
            text-decoration: none;
        }
        .action-links {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<header>
    <h1>Daftar Aksi Nyata Mahasiswa</h1>
</header>

<div class="container">

    <?php if ($status_msg): ?>
        <div class="status-msg"><?php echo htmlspecialchars($status_msg); ?></div>
    <?php endif; ?>

    <div class="action-links">
        <a href="beranda.php" class="home-link">🏠 Beranda</a>
        <a href="aksi_nyata.php" class="back-link">+ Tambah Aksi Nyata Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Aksi Nyata</th>
                <th>Dokumentasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id_aksi']; ?></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['judul']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($row['aksi'])); ?></td>
                        <td>
                            <?php if($row['dokumentasi'] && file_exists($row['dokumentasi'])): ?>
                                <img src="<?php echo $row['dokumentasi']; ?>" alt="Dokumentasi" class="thumb">
                            <?php else: ?>
                                Tidak ada
                            <?php endif; ?>
                        </td>
                        <td><?php echo date('d M Y H:i', strtotime($row['tanggal'])); ?></td>
                        <td>
                            <a href="edit_aksi.php?id_aksi=<?= urlencode($row['id_aksi']) ?>" class="aksi-btn edit-btn">Edit</a>
                            <a href="hapus_aksi.php?id_aksi=<?= urlencode($row['id_aksi']) ?>" class="aksi-btn delete-btn" onclick="return confirm('Yakin ingin menghapus aksi ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align:center;">Belum ada data aksi nyata.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
</body>
</html>
