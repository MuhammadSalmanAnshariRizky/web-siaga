<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 6</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      overflow: hidden;
      position: relative;
    }

    .page {
      position: relative;
      width: 100vw;
      height: 100vh;
      overflow: hidden;
      cursor: pointer;
    }

    .background {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
    }

    .beka {
      position: absolute;
      bottom: 0;
      left: 1px;
      width: 900px;
      z-index: 2;
    }

    .bubble {
      position: absolute;
      bottom: 0;
      left: 1px;
      width: 900px;
      z-index: 3;
    }

    .banyu {
      position: absolute;
      bottom: -5px;
      left: 415px;
      width: 950px;
      z-index: 2;
    }

    .wave {
      position: absolute;
      bottom: -20px;
      left: 0;
      width: 100vw;
      height: auto;
      z-index: 4;
    }

    .bubble-text {
      color: black;
      position: absolute;
      max-width: 320px;
      padding: 15px 20px;
      font-size: 14px;
      font-weight: bold;
      z-index: 5;
      display: none;
    }

    .text-beka {
      top: 200px;
      left: 295px;
    }

    .text-banyu {
      top: 220px;
      left: 1055px;
    }

    .show {
      display: block;
    }
  </style>
</head>
<body>
  <div class="page page-6" onclick="nextBubble()">
    <img src="gambar/page5/g1.png" alt="Background" class="background">
    <img src="gambar/page5/g2.png" alt="Prof Beka" class="beka">
    <img src="gambar/page6/g3.png" alt="Bubble" class="bubble">
    <img src="gambar/page6/g1.png" alt="Banyu" class="banyu">
    <img src="gambar/page6/g2.png" alt="Dekorasi G2" class="wave" />

    <!-- Bubble Text -->
    <div class="bubble-text text-beka" id="textBeka">“Makanya dulu banyak <br><span style='color:red;'>rumah dibangun di atas <br>tiang-tiang kayu</span>, supaya <br>aman dari banjir.”</div>
    <div class="bubble-text text-banyu" id="textBanyu">“Jadi bukan cuma <br>unik, tapi juga pintar<br> ya!” </div>
  </div>

  <script>
    let step = 0;

    function nextBubble() {
      step++;
      if (step === 1) {
        document.getElementById('textBeka').classList.add('show');
      } else if (step === 2) {
        document.getElementById('textBanyu').classList.add('show');
      } else if (step === 3) {
        window.location.href = "membaca7"; // Ganti dengan nama file page 7 yang sebenarnya
      }
    }
  </script>
</body>
</html>
