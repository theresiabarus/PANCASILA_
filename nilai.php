<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nilai Pancasila</title>
  
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #fbeaea;
      color: #4d2c2c;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    header {
      background-color: #bb4b4b;
      color: white;
      padding: 1.5rem 0;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.15);
    }
    header img {
      max-width: 180px;
      height: auto;
      margin-bottom: 0.8rem;
      filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.3));
    }
    header h1 {
      font-weight: 700;
      font-size: 2.8rem;
      letter-spacing: 2px;
      margin-bottom: 0.2rem;
    }
    .label {
      background-color: #fff9f9;
      color: #bb4b4b;
      font-weight: 600;
      display: inline-block;
      padding: 6px 18px;
      border-radius: 30px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.12);
      font-size: 0.9rem;
      letter-spacing: 1px;
    }

    /* Navbar styling baru yang estetik */
    nav {
      background-color: #7a2f2f;
      box-shadow: 0 4px 12px rgba(122, 47, 47, 0.6);
      display: flex;
      justify-content: center;
      gap: 2rem;
      padding: 0.6rem 0;
      border-radius: 12px;
      margin: 1.5rem auto 2rem auto;
      max-width: 900px;
    }

    nav a {
      color: #fff9f9;
      font-weight: 600;
      font-size: 1.1rem;
      padding: 10px 20px;
      border-radius: 30px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
      position: relative;
    }

    nav a::before {
      content: "";
      position: absolute;
      bottom: -6px;
      left: 50%;
      transform: translateX(-50%);
      width: 0%;
      height: 3px;
      background-color: #fff9f9;
      border-radius: 3px;
      transition: width 0.3s ease;
    }

    nav a:hover::before,
    nav a.active::before {
      width: 60%;
    }

    nav a:hover,
    nav a.active {
      background-color: #a44a4a;
      color: #fff9f9;
      box-shadow: 0 6px 15px rgba(164, 74, 74, 0.5);
      text-decoration: none;
    }

    main.container {
      flex-grow: 1;
      max-width: 900px;
      background-color: #fff9f9;
      margin: 3rem auto 4rem;
      padding: 2.5rem 3rem;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.08);
    }
    main h2 {
      border-bottom: 3px solid #bb4b4b;
      padding-bottom: 8px;
      margin-bottom: 2rem;
      font-weight: 700;
      letter-spacing: 1px;
    }
    .sila-list li {
      margin-bottom: 1.3rem;
      font-size: 1.1rem;
      line-height: 1.6;
      padding-left: 0.7rem;
      position: relative;
    }
    .sila-list li::before {
      content: "✓";
      color: #bb4b4b;
      font-weight: bold;
      position: absolute;
      left: 0;
      top: 0.2rem;
    }
    footer {
      background-color: #fbeaea;
      color: #6b4e4e;
      text-align: center;
      padding: 1.5rem 1rem;
      font-size: 0.9rem;
      box-shadow: inset 0 1px 5px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <header>
    <img src="pancasila.jpeg" alt="Garuda Pancasila" />
    <h1>Nilai Pancasila</h1>
    <div class="label">Falsafah Bangsa Indonesia</div>
  </header>

  <nav>
    <a href="index.html" class="active">Beranda</a>
    <a href="tentang.php">Tentang</a>
    <a href="nilai.php">Nilai Pancasila</a>
  </nav>
   
  <main class="container">
    <h2>Nilai-nilai Dalam Pancasila</h2>
    <ul class="sila-list list-unstyled">
      <li><strong>Sila 1: Ketuhanan Yang Maha Esa</strong> – Mewujudkan keimanan, ketakwaan, serta sikap toleransi antar umat beragama, sebagai dasar moral dan spiritual bangsa.</li>
      <li><strong>Sila 2: Kemanusiaan yang Adil dan Beradab</strong> – Menjunjung tinggi harkat dan martabat manusia, memberikan perlakuan adil, tanpa diskriminasi, serta menjaga nilai-nilai kemanusiaan universal.</li>
      <li><strong>Sila 3: Persatuan Indonesia</strong> – Memperkokoh rasa persatuan dan kesatuan bangsa tanpa memandang perbedaan suku, agama, ras, dan golongan demi keutuhan NKRI.</li>
      <li><strong>Sila 4: Kerakyatan yang Dipimpin oleh Hikmat Kebijaksanaan dalam Permusyawaratan/Perwakilan</strong> – Mengutamakan musyawarah mufakat sebagai proses demokrasi untuk mengambil keputusan demi kebaikan bersama.</li>
      <li><strong>Sila 5: Keadilan Sosial bagi Seluruh Rakyat Indonesia</strong> – Mengusahakan pemerataan kesejahteraan sosial dan keadilan dalam kehidupan bermasyarakat, berbangsa, dan bernegara.</li>
    </ul>

    <section class="mt-4">
      <h3 class="mb-3" style="color:#bb4b4b;">Makna Nilai Pancasila dalam Kehidupan Sehari-hari</h3>
      <p>Pancasila bukan sekedar dasar negara, tapi juga pedoman etika dan moral bangsa Indonesia dalam menjalani kehidupan bermasyarakat. Berikut beberapa contoh implementasi nilai-nilai Pancasila:</p>
      <ul>
        <li><strong>Sila 1:</strong> Menjaga toleransi antar umat beragama dengan saling menghargai perbedaan keyakinan.</li>
        <li><strong>Sila 2:</strong> Menghormati hak asasi manusia dan memperlakukan orang lain dengan adil.</li>
        <li><strong>Sila 3:</strong> Menjaga persatuan bangsa dengan menghindari konflik dan perpecahan.</li>
        <li><strong>Sila 4:</strong> Berpartisipasi aktif dalam musyawarah desa atau organisasi untuk mengambil keputusan secara demokratis.</li>
        <li><strong>Sila 5:</strong> Mendukung program-program sosial untuk meningkatkan kesejahteraan masyarakat kurang mampu.</li>
      </ul>
    </section>

    <section class="mt-4">
      <h3 class="mb-3" style="color:#bb4b4b;">Permasalahan dan Tantangan</h3>
      <p>Walaupun nilai-nilai Pancasila sudah tertulis jelas, dalam praktiknya masih banyak tantangan seperti:</p>
      <ul>
        <li>Kurangnya pemahaman dan kesadaran generasi muda tentang pentingnya Pancasila.</li>
        <li>Meningkatnya intoleransi dan konflik sosial akibat perbedaan agama dan budaya.</li>
        <li>Kesenjangan sosial yang masih terjadi menghambat keadilan sosial.</li>
        <li>Pengaruh globalisasi yang bisa melemahkan jiwa nasionalisme.</li>
      </ul>
      <p>Oleh sebab itu, edukasi dan implementasi nilai Pancasila harus terus digalakkan di segala aspek kehidupan.</p>
    </section>
  </main>

  <footer>
    &copy; 2025 Website Edukasi Pancasila — Dibuat oleh Mahasiswa Politeknik Negeri Medan
  </footer>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
