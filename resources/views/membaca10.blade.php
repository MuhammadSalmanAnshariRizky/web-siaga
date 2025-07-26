<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 10</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      overflow: hidden;
    }

    .container {
      position: relative;
      width: 100%;
      height: 100vh;
      background-image: url('gambar/page9/g1.png');
      background-size: cover;
      background-position: center;
      cursor: pointer;
    }

    .banyu {
      position: absolute;
      bottom: 0;
      left: 120px;
      width: 900px;
      z-index: 2;
    }

    .bubble {
      position: absolute;
      bottom: 0;
      left: 120px;
      width: 800px;
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

    .speech {
      position: absolute;
      padding: 15px;
      max-width: 300px;
      z-index: 5;
      font-size: 14px;
      font-weight: bold;
      border-radius: 10px;
      display: none;
      text-align: justify;
    }

    .speech.banyu1 {
      top: 330px;
      left: 140px;
    }

    .speech.beka1 {
      top: 200px;
      right: 610px;
    }

    .speech.beka2 {
      top: 405px;
      right: 620px;
    }

  </style>
</head>
<body>
  <div class="container" onclick="handleClick()">
    <div class="narration">
      <span id="narrationText" class="typewriter"></span>
    </div>

    <img src="gambar/page9/g2.png" alt="Banyu" class="banyu">
    <img src="gambar/page10/g1.png" alt="Bubble" class="bubble">
    <img src="gambar/page10/g2.png" alt="Gelombang Air" class="wave" />

    <!-- BALON BICARA -->
    <div id="banyu1" class="speech banyu1">
      “Jadi meski zaman <br>berubah, kita tetap <br>bisa lihat warisan <br>dari masa lalu, ya <br>Prof?”
    </div>

    <div id="beka1" class="speech beka1">
      “Benar. Jalan darat <br>sudah berkembang. Tapi <br><span style='color:red;'>Pasar Terapung Siring <br>masih jadi simbol<br> kebiasaan warga <br>Banjarmasin </span>yang hidup <br>dekat dengan sungai.”
    </div>

    <div id="beka2" class="speech beka2">
      “Tepat sekali, Banyu. <br>Sungai tetap jadi <br>bagian penting dari <br>kehidupan kota ini.”
    </div>

    </div>
  </div>

  <script>
    let charIndex = 0;
    let clickStep = 0;
    const narration = ""; // narasi jika ingin ditampilkan ketik awal
    const narrationText = document.getElementById("narrationText");

    function typeWriter() {
      if (charIndex < narration.length) {
        narrationText.innerHTML += narration.charAt(charIndex);
        charIndex++;
        setTimeout(typeWriter, 40);
      }
    }

    typeWriter();

    function handleClick() {
      if (charIndex < narration.length) return;

      clickStep++;

      if (clickStep === 1) {
        document.getElementById("beka1").style.display = "block";
      } else if (clickStep === 2) {
        document.getElementById("banyu1").style.display = "block";
      } else if (clickStep === 3) {
        document.getElementById("beka2").style.display = "block";
      } else if (clickStep === 6) {
        window.location.href = "membaca11"; // Ganti ke halaman selanjutnya
      }
    }
  </script>
</body>
</html>
