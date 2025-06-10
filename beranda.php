<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Suaraku, Pancasila - Beranda</title>
    <style>
        /* Reset & dasar */
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f0f4f8, #dbe9f4);
            color: #2c3e50;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-size: 16px;
        }
        header {
            background: #c62828; /* merah Pancasila yang agak gelap */
            color: white;
            padding: 25px 0;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0,0,0,0.12);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        header h1 {
            font-size: 2.8rem;
            margin-bottom: 6px;
            font-weight: 800;
            letter-spacing: 2px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        header p {
            font-size: 1.2rem;
            font-style: italic;
            letter-spacing: 0.5px;
            opacity: 0.85;
        }
        nav {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: background-color 0.35s ease, box-shadow 0.35s ease;
            user-select: none;
        }
        nav a:hover, nav a:focus {
            background: #b71c1c;
            box-shadow: 0 4px 16px rgba(183, 28, 28, 0.6);
            outline: none;
        }
        .hero {
            position: relative;
            background: url('images/hero-mahasiswa.jpg') no-repeat center center/cover;
            height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.85);
            padding: 20px;
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.3);
            z-index: 1;
            border-radius: 12px;
        }
        .hero-text {
            position: relative;
            z-index: 2;
            max-width: 850px;
            text-align: center;
        }
        .hero-text h2 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 12px;
            letter-spacing: 1.5px;
            line-height: 1.2;
        }
        .hero-text blockquote {
            font-style: italic;
            font-size: 1.4rem;
            margin: 15px auto 25px;
            border-left: 6px solid #f9d342;
            padding-left: 20px;
            max-width: 600px;
            color: #f9f3c5;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
        }
        .btn-primary {
            display: inline-block;
            background: #f9d342; /* warna kuning Pancasila */
            color: #2c3e50;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(249, 211, 66, 0.6);
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            user-select: none;
            letter-spacing: 1px;
        }
        .btn-primary:hover, .btn-primary:focus {
            background: #f7c600;
            box-shadow: 0 8px 22px rgba(247, 198, 0, 0.8);
            transform: scale(1.07);
            outline: none;
        }
        .container {
            max-width: 900px;
            margin: 45px auto 70px;
            padding: 0 24px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.07);
        }
        .container h2 {
            font-size: 2.8rem;
            text-align: center;
            margin-bottom: 24px;
            font-weight: 800;
            color: #1b2838;
        }
        .container p {
            font-size: 1.15rem;
            margin-bottom: 18px;
            color: #3b4a59;
            line-height: 1.7;
            text-align: justify;
            text-justify: inter-word;
        }
        footer {
            background: #2c3e50;
            color: white;
            padding: 18px 10px;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 -4px 8px rgba(0,0,0,0.15);
            margin-top: auto;
            user-select: none;
        }
        /* Responsive */
        @media (max-width: 720px) {
            header h1 {
                font-size: 2rem;
            }
            header p {
                font-size: 1rem;
            }
            nav {
                gap: 12px;
            }
            .hero-text h2 {
                font-size: 2rem;
            }
            .hero-text blockquote {
                font-size: 1rem;
                max-width: 90%;
            }
            .btn-primary {
                font-size: 1rem;
                padding: 12px 28px;
            }
            .container {
                margin: 30px 12px 50px;
                padding: 15px 18px;
            }
            .container h2 {
                font-size: 2.2rem;
            }
            .container p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Suaraku, Pancasila</h1>
        <p>Suara Mahasiswa, Jiwa Kebangsaan</p>
        <nav>
            <a href="tentang.php" tabindex="1">Tentang Kami</a>
            <a href="mengenal_pancasila.php" tabindex="2">Nilai Pancasila</a>
            <a href="peran_mahasiswa.php" tabindex="3">Peran Mahasiswa</a>
            <a href="aksi.php" tabindex="4">Aksi Nyata</a>
            <a href="form.php" tabindex="5">Forum</a>
            <a href="kontak.php" tabindex="6">Kontak</a>
        </nav>
    </header>

    <section class="hero" role="banner" aria-label="Banner utama">
        <div class="hero-text">
            <h2>Bersama Menjaga Ideologi Bangsa</h2>
            <blockquote>
                “Pancasila adalah jiwa bangsa yang harus kita jaga dan amalkan dalam setiap langkah kehidupan.”
            </blockquote>
            <a href="aksi.php" class="btn-primary" tabindex="7">Gabung Aksi Pancasila</a>
        </div>
    </section>

    <main class="container" role="main">
        <h2>Selamat Datang di Suaraku, Pancasila</h2>
        <p>Website ini hadir sebagai sarana edukasi dan inspirasi bagi mahasiswa dan generasi muda untuk meningkatkan kesadaran, pemahaman, dan pengamalan nilai-nilai Pancasila dalam kehidupan nyata.</p>
        <p>Kami mengajak kamu untuk berperan aktif menjaga ideologi bangsa dengan berbagai cara: mengenal Pancasila lebih dalam, berdiskusi di forum, dan ikut dalam aksi nyata kebangsaan.</p>

        <a href="mengenal_pancasila.php" class="btn-primary" tabindex="8">Pelajari Nilai Pancasila</a>
    </main>

    <footer role="contentinfo">
        &copy; 2025 Theresia Evalina Barus | POLITEKNIK NEGERI MEDAN
    </footer>
</body>
</html>
