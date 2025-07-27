<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 16</title>
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
      left: 230px;
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
      top: 520px;
      left: 320px;
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
    <img src="gambar/page16/g1.png" alt="Prof. Beka" class="prof">
    <img src="gambar/page16/g2.png" alt="Gelombang Air" class="wave" />

    <div class="balon balon1" id="balon1">
        Keempat, kalau rumah dekat sungai, pastikan <span style='color:red;'>tidak menutup <br>jalur air </span>atau membangun terlalu dekat dengan tepian.
  
</div>

  </div>

  <script>
    let step = 0;

    function nextStep() {
      step++;
      if (step === 1) {
        document.getElementById("balon1").style.display = "block";
      } else if (step === 2) {
        window.location.href = "membaca17"; // halaman berikutnya
      }
    }
  </script>
</body>
</html>
