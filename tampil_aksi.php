<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Aksi Nyata Mahasiswa - Suaraku, Pancasila</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
            color: #2c3e50;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(44, 62, 80, 0.15);
        }
        h1 {
            text-align: center;
            color: #2980b9;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .aksi-item {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }
        .aksi-item:last-child {
            border-bottom: none;
        }
        .aksi-foto {
            flex-shrink: 0;
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.3);
        }
        .aksi-foto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .aksi-content {
            flex-grow: 1;
        }
        .aksi-judul {
            font-size: 1.3rem;
            font-weight: 700;
            color: #34495e;
            margin: 0 0 8px;
        }
        .aksi-nama {
            font-style: italic;
            color: #7f8c8d;
            margin-bottom: 12px;
        }
        .aksi-cerita {
            line-height: 1.5;
            color: #2c3e50;
        }
        .aksi-tanggal {
            margin-top: 12px;
            font-size: 0.85rem;
            color: #95a5a6;
            text-align: right;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: #95a5a6;
            margin-top: 40px;
        }
        @media (max-width: 600px) {
            .aksi-item {
                flex-direction: column;
                align-items: center;
            }
            .aksi-foto {
                width: 100%;
                height: 200px;
            }
            .aksi-tanggal {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Aksi Nyata Mahasiswa</h1>
        <?php
        $query = "SELECT * FROM tbl_aksi ORDER BY tanggal DESC";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $fotoPath = $row['foto'] ? "uploads/" . htmlspecialchars($row['foto']) : "https://via.placeholder.com/150?text=No+Image";
                $nama = htmlspecialchars($row['nama']);
                $judul = htmlspecialchars($row['judul']);
                $cerita = nl2br(htmlspecialchars($row['cerita']));
                $tanggal = date('d M Y, H:i', strtotime($row['tanggal']));
                echo "<div class='aksi-item'>";
                echo "<div class='aksi-foto'><img src='$fotoPath' alt='Foto aksi oleh $nama'></div>";
                echo "<div class='aksi-content'>";
                echo "<h2 class='aksi-judul'>$judul</h2>";
                echo "<p class='aksi-nama'>oleh $nama</p>";
                echo "<p class='aksi-cerita'>$cerita</p>";
                echo "<p class='aksi-tanggal'>$tanggal</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-data'>Belum ada aksi nyata yang dibagikan.</p>";
        }
        ?>
    </div>
</body>
</html>
