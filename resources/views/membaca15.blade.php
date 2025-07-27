<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 15</title>
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
      display: none;
    }

    .balon1 {
      top: 530px;
      left: 620px;
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
    <img src="gambar/page15/g1.png" alt="Prof. Beka" class="prof">
    <img src="gambar/page15/g2.png" alt="Gelombang Air" class="wave" />

    <div class="balon balon1" id="balon1">
        Ketiga, <span style='color:red;'>jaga saluran air di sekitar rumah.</span> Bersihkan got <br>atau selokan <span style='color:red;'>supaya air bisa mengalir lancar saat hujan.</span>
</div>

  </div>

  <script>
    let step = 0;

    function nextStep() {
      step++;
      if (step === 1) {
        document.getElementById("balon1").style.display = "block";
      } else if (step === 2) {
        window.location.href = "membaca16"; // halaman berikutnya
      }
    }
  </script>
</body>
</html>
