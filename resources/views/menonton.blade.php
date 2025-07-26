<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menonton</title>
  <style>
    body {
      margin: 0;
      background-color: black;
      background-image: url("gambar/menonton3.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      height: 100vh;
      padding-top: 40px;
      position: relative;
      overflow: hidden;
    }

    .screen {
      width: 90%;
      max-width: 886px;
      aspect-ratio: 16 / 9;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
      border-radius: 8px;
      overflow: hidden;
      background-color: white;
      margin-top: -40px;
      z-index: 1;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    .gorden-kiri, .gorden-kanan {
      position: absolute;
      top: 0;
      height: 100%;
      width: auto;
      z-index: 2;
    }

    .gorden-kiri {
      left: 0;
    }

    .gorden-kanan {
      right: 0;
    }

    .gorden-kiri img, .gorden-kanan img {
      height: 100vh;
    }
  </style>
</head>
<body>
  <div class="gorden-kiri">
    <img src="gambar/gorden.png" alt="Gorden Kiri">
  </div>

  <div class="gorden-kanan">
    <img src="gambar/gorden.png" alt="Gorden Kanan">
  </div>

  <div class="screen">
    <iframe src="https://www.youtube.com/embed/phrIm3Uue7A?si=TRh1SOzA3ajGMRdL" allowfullscreen></iframe>
  </div>
</body>
</html>
