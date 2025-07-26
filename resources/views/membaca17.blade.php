<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 17</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      overflow: hidden;
      cursor: pointer;
    }

    .container {
      width: 100vw;
      height: 100vh;
      background-image: url('gambar/page17/g1.png');
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .banyu {
      position: absolute;
      bottom: 0;
      left: 270px;
      width: 950px;
      z-index: 2;
    }

    .balon {
      position: absolute;
      width: 180px;
      padding: 15px;
      font-size: 14px;
      font-weight: bold;
      border-radius: 50%;
      display: none;
      z-index: 3;
      text-align: center;
      line-height: 1.4;
    }

    .balon1 {
      top: 200px;
      left: 520px;
    }

    .balon2 {
      top: 250px;
      right: 195px;
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
      border-right: 2px solid orange;
      animation: blink-caret 0.75s step-end infinite;
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: orange; }
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
  <div class="container" id="container">
    <div class="narration">
      <span id="narrationText" class="typewriter"></span>
    </div>

    <img src="gambar/page17/g2.png" alt="Banyu" class="banyu">
    <img src="gambar/page17/g3.png" alt="Gelombang Air" class="wave" />

    <div class="balon balon1" id="balon1">
      “Wah, ternyata <br>banyak hal yang <br>bisa aku lakukan!”
    </div>

    <div class="balon balon2" id="balon2">
      “Kamu memang <br>calon peneliti <br>hebat, Banyu!”
    </div>
  </div>

  <script>
    const narrationText = "Banyu mencatat cepat di buku kecilnya.";
    const narrationEl = document.getElementById("narrationText");
    const balon1 = document.getElementById("balon1");
    const balon2 = document.getElementById("balon2");
    const container = document.getElementById("container");

    let i = 0;
    let clickCount = 0;
    let typingDone = false;

    function typeWriter() {
      if (i < narrationText.length) {
        narrationEl.innerHTML += narrationText.charAt(i);
        i++;
        setTimeout(typeWriter, 40);
      } else {
        typingDone = true;
      }
    }

    typeWriter();

    container.addEventListener("click", () => {
      if (!typingDone) return;

      clickCount++;

      if (clickCount === 1) {
        balon1.style.display = "block";
      } else if (clickCount === 2) {
        balon2.style.display = "block";
      } else if (clickCount === 3) {
        window.location.href = "membaca18"; // ganti sesuai halaman berikutnya
      }
    });
  </script>
</body>
</html>
