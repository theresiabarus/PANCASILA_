<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kontak Kami - Suaraku Pancasila</title>
    <style>
        /* Gunakan style serupa forum.php agar konsisten */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f9ff;
            margin: 0; padding: 0 15px 40px;
            color: #034078;
        }
        header {
            background-color: #023e8a;
            color: white;
            padding: 25px 15px;
            text-align: center;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        header h1 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 1.2px;
        }
        main {
            max-width: 600px;
            margin: 30px auto 0;
            background: white;
            padding: 30px 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #023e8a;
        }
        form input[type=text], form input[type=email], form textarea {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border: 2px solid #90e0ef;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
            resize: vertical;
        }
        form input[type=text]:focus, form input[type=email]:focus, form textarea:focus {
            border-color: #0077b6;
            outline: none;
            background: #caf0f8;
        }
        button {
            background-color: #0077b6;
            color: white;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
        }
        button:hover {
            background-color: #0096c7;
        }
        footer {
            text-align: center;
            margin-top: 60px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
<header>
    <h1>Kontak Kami</h1>
    <p>Hubungi kami jika ada pertanyaan atau saran</p>
</header>
<main>
    <form action="proses_kontak.php" method="POST">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Nama lengkap..." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email aktif..." required>

        <label for="pesan">Pesan</label>
        <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan atau saranmu..." required></textarea>

        <button type="submit">Kirim Pesan</button>
    </form>
</main>
<footer>
    &copy; 2025 Suaraku Pancasila - Semua Hak Dilindungi
</footer>
</body>
</html>
