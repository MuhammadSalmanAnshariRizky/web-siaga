<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 5</title>
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

    .narration {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      width: 100%;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.85);
      font-size: 16px;
      color: black;
      line-height: 1.6;
      padding-left: 50px;
      z-index: 4;
    }

    .typewriter {
      white-space: pre-line;
      overflow: hidden;
      border-right: .15em solid orange;
      animation: blink-caret 0.75s step-end infinite;
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: orange; }
    }

    .bubble-text {
      display: none;
      color: black;
      position: absolute;
      max-width: 320px;
      padding: 15px 20px;
      font-size: 14px;
      font-weight: bold;
      z-index: 5;
    }

    .text-beka,
    .text-beka-2 {
      left: 220px;
      z-index: 6;
    }

    .text-beka {
      top: 180px;
      left: 290px;
    }

    .text-banyu {
      top: 225px;
      left: 1055px;
    }

    .text-beka-2 {
      top: 415px;
      left: 280px;
    }

  </style>
</head>
<body>
  <div class="page page-5">
    <img src="gambar/page5/g1.png" alt="Background" class="background">
    <img src="gambar/page5/g2.png" alt="Prof Beka" class="beka">
    <img src="gambar/page5/g3.png" alt="Bubble" class="bubble">
    <img src="gambar/page5/g4.png" alt="Banyu" class="banyu">
    <img src="gambar/page5/g5.png" alt="Dekorasi G2" class="wave" />

    <div class="narration">
      <div id="typewriter-text" class="typewriter"></div>
    </div>

    <!-- Bubble Text -->
    <div class="bubble-text text-beka">"Kota Banjarmasin ini <br>berada di dataran rendah, <br>Banyu. Tingginya rata-rata <br> cuma <span style='color:red;'>0,16 meter di atas <br>permukaan laut</span>, bahkan <br>ada yang lebih rendah."</div>
    <div class="bubble-text text-banyu">"Wah! Jadi <br>gampang kebanjiran <br>dong?"</div>
    <div class="bubble-text text-beka-2">“Betul sekali. <span style='color:red;'>Karena <br>tanahnya rendah dan <br>datar, banyak bagian kota <br> ini berupa lahan rawa</span>.<br> Saat hujan deras atau air<br> laut pasang, air bisa<br> menggenang di mana- <br>mana.”</div>
  </div>

  <script>
    const text = `Petualangan Banyu dan Prof. Beka pun dimulai!\nProf Beka mulai menjelaskan pada Banyu tentang tata letak kota seribu sungai.`;
    const container = document.getElementById('typewriter-text');
    const textBeka = document.querySelector('.text-beka');
    const textBanyu = document.querySelector('.text-banyu');
    const textBeka2 = document.querySelector('.text-beka-2');

    let i = 0;
    let step = 0;
    let narrationDone = false;

    function typeWriter() {
      if (i < text.length) {
        container.innerHTML += text.charAt(i);
        i++;
        setTimeout(typeWriter, 35);
      } else {
        narrationDone = true;
      }
    }

    window.onload = typeWriter;

    document.body.addEventListener('click', () => {
      if (!narrationDone) return;

      if (step === 0) {
        textBeka.style.display = 'block';
        step++;
      } else if (step === 1) {
        textBanyu.style.display = 'block';
        step++;
      } else if (step === 2) {
        textBeka2.style.display = 'block';
        step++;
      } else if (step === 3) {
        window.location.href = 'membaca6'; // lanjut ke halaman berikutnya
      }
    });
  </script>
</body>
</html>
