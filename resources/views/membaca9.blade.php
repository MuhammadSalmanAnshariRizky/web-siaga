<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 9</title>
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

    .narration {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      width: 100%;
      padding: 20px 50px;
      background-color: rgba(255, 255, 255, 0.85);
      font-size: 16px;
      color: black;
      line-height: 1.6;
      z-index: 4;
    }

    .typewriter {
      white-space: pre-line;
      overflow: hidden;
      border-right: 0.15em solid orange;
      animation: blink-caret 0.75s step-end infinite;
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: orange; }
    }

    .bubble {
      position: absolute;
      bottom: 0;
      left: 150px;
      width: 800px;
      z-index: 2;
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
    }

    .speech.banyu {
      top: 363px;
      left: 160px;
    }

    .speech.beka {
      top: 200px;
      right: 595px;
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
    <div class="narration">
      <span id="narrationText" class="typewriter"></span>
    </div>

    <img src="gambar/page9/g2.png" alt="Banyu" class="banyu">
    <img src="gambar/page9/g3.png" alt="Bubble" class="bubble">
    <img src="gambar/page9/g4.png" alt="Gelombang Air" class="wave" />

    <div id="banyuSpeech" class="speech banyu">
      “Sekarang tidak <br>semua pakai<br> perahu lagi, ya, <br>Prof?”
    </div>

    <div id="bekaSpeech" class="speech beka">
      “Zaman dulu, sungai <br>adalah jalur utama <br>transportasi. Orang-<br>orang naik perahu ke <br>sekolah, ke pasar, atau ke <br>tempat kerja.”
    </div>

    <div class="halaman">9</div>
  </div>

  <script>
    const narration = "Mereka berjalan menyusuri Siring sambil melihat perahu-perahu kecil di tepi sungai.";
    const narrationText = document.getElementById("narrationText");
    let charIndex = 0;
    let clickStep = 0;

    function typeWriter() {
      if (charIndex < narration.length) {
        narrationText.innerHTML += narration.charAt(charIndex);
        charIndex++;
        setTimeout(typeWriter, 40);
      }
    }

    typeWriter();

    function handleClick() {
      if (charIndex < narration.length) return; // tunggu typewriter selesai

      clickStep++;

      if (clickStep === 1) {
        document.getElementById("bekaSpeech").style.display = "block";
      } else if (clickStep === 2) {
        document.getElementById("banyuSpeech").style.display = "block";
      } else if (clickStep === 3) {
        window.location.href = "membaca10"; // ganti sesuai nama file halaman selanjutnya
      }
    }
  </script>
</body>
</html>
