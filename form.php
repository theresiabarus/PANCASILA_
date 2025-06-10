<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Forum Mahasiswa - Suaraku, Pancasila</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fefefe;
            margin: 0;
            padding: 40px 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 700px;
            background: #ffffff;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #f3dcdc;
            position: relative;
        }

        /* Tombol Beranda */
        .beranda-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #f28b82;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .beranda-btn:hover {
            background-color: #f36c60;
            box-shadow: 0 4px 12px rgba(243, 108, 96, 0.4);
        }

        h2 {
            text-align: center;
            font-size: 2.4rem;
            margin-bottom: 25px;
            color: #f28b82;
            font-weight: bold;
            letter-spacing: 1px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 1.05rem;
            color: #444;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 14px 18px;
            margin-bottom: 20px;
            border: 2px solid #fbcfd0;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #fffafa;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #f28b82;
            box-shadow: 0 0 8px rgba(242, 139, 130, 0.3);
            outline: none;
        }

        button {
            display: block;
            width: 100%;
            background-color: #f28b82;
            color: white;
            font-weight: 700;
            padding: 16px 0;
            font-size: 1.2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 6px 18px rgba(242, 139, 130, 0.3);
        }

        button:hover {
            background-color: #f36c60;
        }

        hr {
            margin: 40px 0;
            border: none;
            border-top: 2px solid #fbd5d6;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 1px;
        }

        h3 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 25px;
            color: #f36c60;
            font-weight: 700;
        }

        .diskusi {
            background: #fff0f0;
            padding: 20px 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #f9caca;
            transition: transform 0.2s ease;
        }

        .diskusi:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.07);
        }

        .nama {
            font-weight: 700;
            color: #f36c60;
            margin-bottom: 5px;
            font-size: 1.05rem;
        }

        .tanggal {
            float: right;
            font-size: 0.85rem;
            color: #fa9a92;
        }

        .topik {
            font-style: italic;
            color: #e57373;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .diskusi p:last-child {
            line-height: 1.5;
            font-size: 1rem;
            color: #555;
            white-space: pre-wrap;
        }

        .nama::after {
            content: "";
            display: table;
            clear: both;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }

            .beranda-btn {
                padding: 8px 14px;
                font-size: 0.9rem;
            }

            h2 {
                font-size: 2rem;
            }

            button {
                font-size: 1rem;
                padding: 14px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="beranda.php" class="beranda-btn">← Beranda</a>

        <h2>Forum Mahasiswa</h2>

        <form action="simpan_forum.php" method="POST" autocomplete="off">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama kamu..." required>

            <label for="topik">Topik Diskusi:</label>
            <input type="text" id="topik" name="topik" placeholder="Judul topik diskusi..." required>

            <label for="isi_pesan">Isi Pesan:</label>
            <textarea id="isi_pesan" name="isi_pesan" rows="6" placeholder="Tuliskan pendapat atau pertanyaan kamu..." required></textarea>

            <button type="submit">Kirim</button>
        </form>

        <hr>

        <h3>Diskusi Sebelumnya</h3>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM tbl_forum ORDER BY tanggal DESC");
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='diskusi'>";
                echo "<p class='nama'>{$row['nama']}<span class='tanggal'>{$row['tanggal']}</span></p>";
                echo "<p class='topik'>Topik: {$row['topik']}</p>";
                echo "<p>" . nl2br(htmlspecialchars($row['isi_pesan'])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p style='text-align:center; font-style: italic; color: #888;'>Belum ada diskusi.</p>";
        }
        ?>
    </div>
</body>
</html>
