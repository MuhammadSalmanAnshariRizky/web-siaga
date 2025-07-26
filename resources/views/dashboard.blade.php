<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard SIAGA</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url('gambar/bg_siaga_awan.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center top -120px;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      overflow-x: hidden;
      min-height: 100vh;
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
      top: -70px;
      width: 320px;
      animation: moveCloudLeft 10s ease-in-out infinite;
    }

    .cloud-right {
      right: 30px;
      top: -90px;
      width: 360px;
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

    .title {
      text-align: center;
      margin-top: 40px;
      color: #ffffff;
      font-size: 42px;
      font-weight: 800;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
      letter-spacing: 2px;
      z-index: 1;
    }

    .subtitle {
      text-align: center;
      color: #f1f1f1;
      font-size: 20px;
      margin-bottom: 20px;
      text-shadow: 1px 1px 6px rgba(0,0,0,0.5);
      font-style: italic;
      z-index: 1;
    }

    .start-button {
      background-color: #00cc66;
      color: white;
      border: none;
      padding: 12px 35px;
      font-size: 22px;
      font-weight: bold;
      border-radius: 25px;
      cursor: pointer;
      margin: 25px;
      box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3);
      z-index: 1;
    }

    .menu-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-top: 200px;
      max-width: 800px;
      padding: 0 20px 40px;
      z-index: 1;
    }

    .menu-item {
      background-color: rgba(255, 165, 0, 0.9);
      padding: 25px 15px;
      text-align: center;
      border-radius: 12px;
      font-weight: bold;
      cursor: pointer;
      color: #ffffff;
      font-size: 14px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s;
    }

    .menu-item:hover {
      transform: scale(1.05);
    }

    .menu-container a {
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- AWAN -->
  <img src="gambar/awan.png" alt="Awan Kiri" class="cloud cloud-left">
  <img src="gambar/awan.png" alt="Awan Kanan" class="cloud cloud-right">

  <!-- MENU -->
  <div class="menu-container">
    <a href="membaca" class="menu-item">AYO MEMBACA</a>
    <a href="menonton" class="menu-item">AYO MENONTON</a>
    <a href="berkolaborasi" class="menu-item">AYO BERKOLABORASI</a>
    <a href="bermain" class="menu-item">AYO BERMAIN</a>
    <a href="bekerja" class="menu-item">AYO BEKERJA</a>
    <a href="ayo-berlatih" class="menu-item">AYO BERLATIH</a>
  </div>

</body>
</html>
