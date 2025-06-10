<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Suaraku, Pancasila - <?php echo $page_title ?? 'Beranda'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f9fc; margin:0; padding:0; }
        header {
            background: #007bff; color: white; padding: 15px 40px;
            display: flex; justify-content: space-between; align-items: center;
        }
        header h1 { margin: 0; font-size: 24px; }
        nav a {
            color: white; text-decoration: none; margin-left: 20px; font-weight: 600;
        }
        nav a:hover { text-decoration: underline; }
        footer {
            background: #222; color: #ccc; text-align: center;
            padding: 15px; margin-top: 40px;
            font-size: 14px;
        }
        .container { width: 90%; max-width: 900px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ddd; }
        .hero {
            background: url('hero-image.jpg') center center/cover no-repeat;
            height: 250px;
            border-radius: 10px;
            margin-bottom: 30px;
            color: white;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            text-shadow: 0 0 8px #000;
        }
        .hero h2 { font-size: 32px; margin: 0; }
        .hero p { font-size: 18px; margin-top: 10px; }
        button.btn {
            background-color: #007bff; border: none; color: white;
            padding: 12px 20px; font-size: 16px; border-radius: 6px;
            cursor: pointer; margin-top: 20px;
        }
        button.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<header>
    <h1>Suaraku, Pancasila</h1>
    <nav>
        <a href="home.php">Beranda</a>
        <a href="tentang.php">Tentang Kami</a>
        <a href="nilai_pancasila.php">Nilai Pancasila</a>
        <a href="peran_mahasiswa.php">Peran Mahasiswa</a>
        <a href="aksi.php">Aksi Nyata</a>
        <a href="forum.php">Forum</a>
        <a href="kontak.php">Kontak</a>
    </nav>
</header>
<div class="container">
