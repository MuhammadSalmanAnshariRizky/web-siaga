<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 19</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
    }

    .container {
      position: relative;
      width: 100vw;
      height: 100vh;
      background-image: url('gambar/page19/g1.png');
      background-size: cover;
      background-position: center;
      overflow: hidden;
      cursor: pointer; /* menunjukkan bahwa halaman bisa diklik */
    }

    .narration {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      width: 100%;
      text-align: center;
      padding: 15px 50px;
      background-color: rgba(255, 255, 255, 0.9);
      font-size: 16px;
      color: black;
      z-index: 2;
    }

    .teks-bangga {
      position: absolute;
      bottom: 0px;
      left: 50%;
      transform: translateX(-50%);
      width: 1000px;
      z-index: 4;
    }

    .wave {
      position: absolute;
      bottom: -20px;
      left: 0;
      width: 100vw;
      height: auto;
      z-index: 1;
    }
  </style>
</head>
<body>
  <div class="container" onclick="goToNextPage()">
    <div class="narration">
      Banyu tersenyum lebar sambil memeluk buku catatan kecilnya yang kini<br>
      penuh dengan gambar sungai, pohon, dan ide-ide hebat.
    </div>
    
    <img src="gambar/page19/g2.png" alt="Gelombang Air" class="wave" />
    <img src="gambar/page19/g3.png" alt="Teks Aku Bangga" class="teks-bangga">
  </div>

  <script>
    function goToNextPage() {
      // Ganti 'halaman20.html' dengan nama file halaman berikutnya
      window.location.href = 'membaca20';
    }
  </script>
</body>
</html>
