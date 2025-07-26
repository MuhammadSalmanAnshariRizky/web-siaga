<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman 1</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #f9f1dc;
      background-image: url('gambar/page1/e2.png'); /* Layer 1: background */
      background-size: cover;
      background-position: center;
      font-family: sans-serif;
      overflow: hidden;
      height: 100vh;
      position: relative;
      cursor: pointer; /* Tunjukkan bahwa bisa diklik */
    }

    .wrapper {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .sunburst {
      position: absolute;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      z-index: 1;
    }

    .characters {
      position: absolute;
      bottom: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 1000px;
      z-index: 2;
    }

    .text-bubble {
      position: absolute;
      top: 135px;
      left: 50%;
      transform: translateX(-50%);
      width: 700px;
      z-index: 3;
    }

    .waves-scroll {
      position: absolute;
      bottom: -10px;
      height: 50vw;
      width: 100vw;
      z-index: 2;
    }

    .gelombang,
    .judul {
      position: absolute;
      bottom: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 1000px;
      z-index: 1;
    }
  </style>
</head>
<body onclick="goToPage2()">
  <div class="wrapper">
    <img class="sunburst" src="gambar/page1/e1.png" alt="Sunburst">
    <img class="characters" src="gambar/page1/e5.png" alt="Banyu dan Prof">
    <img class="text-bubble" src="gambar/page1/e4.png" alt="Teks">
    <img class="waves-scroll" src="gambar/page1/e3.png" alt="Ombak dan Scroll">
    <img class="gelombang" src="gambar/page1/e6.png" alt="Gelombang">
    <img class="judul" src="gambar/page1/e7.png" alt="Judul">
  </div>

  <script>
    function goToPage2() {
      window.location.href = "membaca2"; // Ganti dengan nama file halaman selanjutnya
    }
  </script>
</body>
</html>
