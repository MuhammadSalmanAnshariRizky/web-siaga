<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 12</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      overflow: hidden;
    }

    .container {
      width: 100vw;
      height: 100vh;
      background-image: url('gambar/page12/g1.png');
      background-size: cover;
      background-position: center;
      position: relative;
      cursor: pointer;
    }

    .prof {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 900px;
      z-index: 2;
    }

    .balon {
      position: absolute;
      width: 260px;
      padding: 15px;
      font-size: 14px;
      font-weight: bold;
      border-radius: 50%;
      z-index: 3;
      display: none;
    }

    .balon1 {
      top: 120px;
      left: 150px;
    }

    .balon2 {
      top: 360px;
      left: 300px;
    }

    .balon3 {
      top: 280px;
      right: 520px;
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
  <div class="container" onclick="nextStep()">
    <img src="gambar/page12/g2.png" alt="Prof. Beka" class="prof">
    <img src="gambar/page12/g3.png" alt="Gelombang Air" class="wave" />

    <div class="balon balon1" id="balon1">
      "Dan yang penting, karena <br>dekat laut, <span style='color:red;'>air sungai di kota<br> ini sangat dipengaruhi oleh <br>pasang surut air laut</span>. Saat air<br> laut naik, air sungai bisa ikut<br> naik dan menyebabkan banjir <br>di daratan."
    </div>

    <div class="balon balon2" id="balon2">
      "Tepat sekali, Banyu! <br>Ada banyak hal yang <br>bisa kita lakukan, <br>bahkan sejak kecil. Nih,<br> Prof kasih beberapa tips <br>khusus untuk anak-anak <br>seperti kamu!"
    </div>

    <div class="balon balon3" id="balon3">
      "Jadi kita harus pintar<br> mengelola air dan <br>lingkungan, ya Prof?"
    </div>
  </div>

  <script>
    let step = 0;

    function nextStep() {
      step++;
      if (step === 1) {
        document.getElementById("balon1").style.display = "block";
      } else if (step === 2) {
        document.getElementById("balon3").style.display = "block";
      } else if (step === 3) {
        document.getElementById("balon2").style.display = "block";
      } else if (step === 4) {
        window.location.href = "membaca13"; // ganti sesuai halaman berikutnya
      }
    }
  </script>
</body>
</html>
