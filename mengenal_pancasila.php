<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Mengenal Pancasila - Suaraku, Pancasila</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #fafafa;
        margin: 0; padding: 20px;
        color: #333;
    }
    header {
        background: #8b0000; /* merah marun kalem */
        color: white;
        padding: 18px 15px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        font-weight: 600;
    }
    nav {
        margin-top: 12px;
    }
    nav a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 4px;
        transition: background 0.25s ease;
        font-size: 0.95rem;
    }
    nav a:hover {
        background: rgba(255,255,255,0.15);
    }
    main {
        max-width: 700px;
        margin: 30px auto;
        background: white;
        padding: 25px 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border-radius: 8px;
    }
    h1 {
        color: #8b0000;
        margin-bottom: 25px;
        font-weight: 700;
        text-align: center;
        font-size: 2.2rem;
    }
    .sila-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .sila-list li {
        background: #fff7f7;
        margin: 12px 0;
        padding: 18px 20px;
        border-radius: 8px;
        cursor: pointer;
        border: 1.5px solid transparent;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }
    .sila-list li:hover {
        background: #f1e3e3;
        border-color: #8b0000;
    }
    .sila-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #8b0000;
        user-select: none;
    }
    .sila-description {
        margin-top: 12px;
        display: none;
        color: #555;
        line-height: 1.5;
        font-size: 1rem;
    }
    footer {
        text-align: center;
        color: #888;
        margin-top: 50px;
        font-size: 0.9rem;
        font-style: italic;
        user-select: none;
    }

    /* Responsive */
    @media (max-width: 600px) {
        body {
            padding: 12px 10px;
        }
        nav a {
            margin: 0 8px;
            padding: 6px 10px;
            font-size: 0.9rem;
        }
        main {
            padding: 20px 20px;
            margin: 20px 10px;
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        .sila-title {
            font-size: 1.1rem;
        }
        .sila-description {
            font-size: 0.95rem;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const items = document.querySelectorAll('.sila-list li');
        items.forEach(item => {
            item.addEventListener('click', () => {
                const desc = item.querySelector('.sila-description');
                const isVisible = desc.style.display === 'block';
                document.querySelectorAll('.sila-description').forEach(d => d.style.display = 'none');
                desc.style.display = isVisible ? 'none' : 'block';
            });
        });
    });
</script>
</head>
<body>
<header>
    <h1>Suaraku, Pancasila</h1>
    <nav>
        <a href="beranda.php">Beranda</a>
        <a href="tentang.php">Tentang Kami</a>
        <a href="mengenal_pancasila.php">Nilai Pancasila</a>
        <a href="peran_mahasiswa.php">Peran Mahasiswa</a>
        <a href="aksi.php">Aksi Nyata</a>
        <a href="form.php">Forum</a>
        <a href="kontak.php">Kontak</a>
    </nav>
</header>

<main>
    <h1>5 Sila Pancasila</h1>
    <ul class="sila-list" aria-label="Daftar sila Pancasila">
        <li tabindex="0" role="button" aria-expanded="false" aria-controls="desc1">
            <div class="sila-title" id="desc1-label">Sila 1: Ketuhanan Yang Maha Esa</div>
            <div class="sila-description" id="desc1" aria-labelledby="desc1-label">
                Mengajarkan kita untuk selalu beriman dan bertakwa kepada Tuhan Yang Maha Esa serta menghormati agama dan kepercayaan orang lain.<br><br>
                <strong>Contoh:</strong> Mahasiswa menjalankan ibadah sesuai agama masing-masing dan menghormati teman yang berbeda keyakinan.
            </div>
        </li>
        <li tabindex="0" role="button" aria-expanded="false" aria-controls="desc2">
            <div class="sila-title" id="desc2-label">Sila 2: Kemanusiaan yang Adil dan Beradab</div>
            <div class="sila-description" id="desc2" aria-labelledby="desc2-label">
                Menghargai hak asasi manusia, berbuat adil, dan menjunjung tinggi nilai kemanusiaan.<br><br>
                <strong>Contoh:</strong> Melawan diskriminasi dan membantu sesama yang membutuhkan.
            </div>
        </li>
        <li tabindex="0" role="button" aria-expanded="false" aria-controls="desc3">
            <div class="sila-title" id="desc3-label">Sila 3: Persatuan Indonesia</div>
            <div class="sila-description" id="desc3" aria-labelledby="desc3-label">
                Menjaga persatuan dan kesatuan bangsa, menempatkan kepentingan bersama di atas kepentingan pribadi.<br><br>
                <strong>Contoh:</strong> Mahasiswa bersatu dalam organisasi dan kegiatan sosial tanpa memandang suku, agama, atau ras.
            </div>
        </li>
        <li tabindex="0" role="button" aria-expanded="false" aria-controls="desc4">
            <div class="sila-title" id="desc4-label">Sila 4: Kerakyatan yang Dipimpin oleh Hikmat Kebijaksanaan dalam Permusyawaratan/Perwakilan</div>
            <div class="sila-description" id="desc4" aria-labelledby="desc4-label">
                Mengutamakan musyawarah untuk mencapai mufakat dalam pengambilan keputusan.<br><br>
                <strong>Contoh:</strong> Mengadakan rapat organisasi yang demokratis dan menghargai pendapat semua anggota.
            </div>
        </li>
        <li tabindex="0" role="button" aria-expanded="false" aria-controls="desc5">
            <div class="sila-title" id="desc5-label">Sila 5: Keadilan Sosial bagi Seluruh Rakyat Indonesia</div>
            <div class="sila-description" id="desc5" aria-labelledby="desc5-label">
                Mewujudkan kesejahteraan dan keadilan sosial bagi seluruh warga negara.<br><br>
                <strong>Contoh:</strong> Mengikuti program sosial yang membantu masyarakat kurang mampu.
            </div>
        </li>
    </ul>
</main>

<footer>
    &copy; 2025 Theresia Evalina Barus | POLITEKNIK NEGERI MEDAN
</footer>
</body>
</html>
