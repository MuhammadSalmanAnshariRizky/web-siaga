<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 13</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      overflow: hidden;
    }

    .container {
      width: 100vw;
      height: 100vh;
      background-image: url('gambar/page13/g1.png');
      background-size: cover;
      background-position: center;
      position: relative;
      cursor: pointer;
    }

    .prof {
      position: absolute;
      bottom: 0;
      left: 270px;
      width: 900px;
      z-index: 2;
    }

    .balon {
      position: absolute;
      font-size: 16px;
      font-weight: bold;
      z-index: 3;
    }

    .balon1 {
      top: 530px;
      left: 350px;
    }

    .wave {
      position: absolute;
      bottom: -20px;
      left: 0;
      width: 100vw;
      height: auto;
      z-index: 4;
    }
  </style>
</head>
<body>
  <div class="container" onclick="goToNextPage()">
    <img src="gambar/page13/g2.png" alt="Prof. Beka" class="prof">
    <img src="gambar/page13/g3.png" alt="Gelombang Air" class="wave" />

    <div class="balon balon1" id="balon1">
      Pertama, <span style='color:red;'>jangan buang sampah sembarangan</span>, apalagi ke sungai. <br>
      Sampah bisa <span style='color:red;'>menyumbat aliran air</span>.
    </div>
  </div>

  <script>
    function goToNextPage() {
      window.location.href = "membaca14";
    }
  </script>
</body>
</html>
