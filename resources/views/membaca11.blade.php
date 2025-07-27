<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 11</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      position: relative;
      overflow: hidden;
    }

    .container {
      width: 100%;
      height: 100vh;
      background-image: url('gambar/page11/g1.png');
      background-size: cover;
      background-position: center;
      position: relative;
      cursor: pointer; /* Menunjukkan elemen dapat diklik */
    }

    .papan {
      position: absolute;
      top: 0;
      width: 1000px;
      z-index: 1;
    }

    .balon {
      position: absolute;
      top: 120px;
      left: 35px;
      width: 260px;
      padding: 15px;
      font-size: 14px;
      font-weight: bold;
      text-align: center;
      z-index: 3;
      display: none; /* awalnya disembunyikan */
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
  <div class="container" onclick="handleClick()">
    <img src="gambar/page11/g2.png" alt="Papan" class="papan">
    <img src="gambar/page10/g2.png" alt="Gelombang Air" class="wave" />

    <div class="balon" id="balon">
      "Kota Banjarmasin <br>berbatasan dengan: 
      <span style='color:red;'>Utara <br>dan Barat: Kabupaten Barito Kuala</span> 
      sedangkan 
      <span style='color:blue;'>Timur dan <br>Selatan: Kabupaten Banjar</span>.
      Wilayah kota ini relatif datar,<br> 
      tapi ada sedikit perbedaan<br> 
      ketinggian di beberapa<br> kecamatan."
    </div>
  </div>

  <script>
    let clickCount = 0;

    function handleClick() {
      clickCount++;

      if (clickCount === 1) {
        document.getElementById("balon").style.display = "block";
      } else if (clickCount === 2) {
        window.location.href = "membaca12"; // ganti dengan nama halaman selanjutnya
      }
    }
  </script>
</body>
</html>
