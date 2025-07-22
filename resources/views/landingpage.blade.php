<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Siaga Banjir</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom, #d0f0ff, #ffffff);
      overflow-x: hidden;
      min-height: 100vh;
      position: relative;
      padding-bottom: 80px;
    }

    nav {
      background-color: #00a859;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 30px;
      color: white;
      position: relative;
      z-index: 2;
    }

    nav .logo {
      font-weight: bold;
      font-size: 24px;
      display: flex;
      align-items: center;
    }

    nav .logo::before {
      content: "🌀";
      margin-right: 10px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: #ffea00;
    }

    /* AWAN */
    .cloud {
    position: absolute;
    height: auto;
    opacity: 0.9;
    z-index: 0;
    }

    .cloud-left {
    left: 30px;
    top: -50px;
    width: 280px; /* lebih kecil */
    animation: moveCloudLeft 10s ease-in-out infinite;
    }

    .cloud-right {
    right: 30px;
    top: -90px;
    width: 360px; /* lebih besar */
    animation: moveCloudRight 10s ease-in-out infinite;
    }

    @keyframes moveCloudLeft {
      0% { transform: translateX(0); }
      50% { transform: translateX(30px); }
      100% { transform: translateX(0); }
    }

    @keyframes moveCloudRight {
      0% { transform: translateX(0); }
      50% { transform: translateX(-30px); }
      100% { transform: translateX(0); }
    }

    .hero-float {
        animation: floatUpDown 3s ease-in-out infinite;
        }

        @keyframes floatUpDown {
        0% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0); }
        }

    /* HERO */
    .hero {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 80px 30px 60px;
      position: relative;
      z-index: 1;
      flex-wrap: wrap;
      text-align: center;
      gap: 40px;
    }

    .hero .text {
      max-width: 600px;
    }

    .hero .text h1 {
      font-size: 48px;
      color: #0077b6;
      margin-bottom: 20px;
    }

    .hero .text p {
      font-size: 20px;
      margin-bottom: 30px;
      color: #333;
      background: #e0f7fa;
      padding: 15px 20px;
      border-radius: 10px;
    }

    .btn {
      display: inline-block;
      background-color: rgba(255, 165, 0, 0.9);
      color: black;
      padding: 12px 22px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      transition: background 0.3s;
    }

    .btn:hover {
      background-color: #ffca28;
    }

    .hero img {
      max-width: 420px;
      width: 100%;
    }

    footer {
      position: absolute;
      left: 0;
      bottom: 0;
      padding: 20px 30px;
      background-color: #00a859;
      color: white;
      font-size: 14px;
      width: 100%;
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- NAVIGASI -->
  <nav>
    <div class="logo">Siaga</div>
    <ul>
      <li><a href="">Beranda</a></li>
      <li><a href="#">Materi</a></li>
      <li><a href="#">Game</a></li>
      <li><a href="#">Video</a></li>
      <li><a href="login">Masuk</a></li>
    </ul>
  </nav>

  <!-- AWAN -->
  <img src="gambar/awan.png" alt="Awan Kiri" class="cloud cloud-left">
  <img src="gambar/awan.png" alt="Awan Kanan" class="cloud cloud-right">

  <!-- HERO SECTION -->
  <section class="hero">
    <div class="text">
      <h1>Belajar Siaga Banjir</h1>
      <p>Yuk, belajar tentang penyebab banjir dan cara mencegahnya dengan cara yang seru dan mudah dimengerti!</p>
      <a href="login" class="btn">Mulai Belajar</a>
    </div>
    <img src="gambar/banjir.png" alt="Ilustrasi Anak-anak" class="hero-float">
  </section>

  <!-- FOOTER -->
  <footer>
    &copy; 2025 Siaga Banjir | oleh Salman & Atul
  </footer>

</body>
</html>
