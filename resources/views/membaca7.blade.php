<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 7</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      position: relative;
      overflow: hidden;
    }

    .container {
      position: relative;
      width: 100%;
      height: 100vh;
      background-image: url('gambar/page7/g1.png'); /* background sungai */
      background-size: cover;
      background-position: center;
    }

    .prof-beka {
      position: absolute;
      bottom: 0;
      left: 280px;
      width: 850px;
      z-index: 2;
    }

    .balon {
      position: absolute;
      top: 80px;
      left: 300px;
      width: 500px;
      background-color: white;
      border: 3px solid black;
      border-radius: 25px;
      padding: 20px;
      font-size: 18px;
      line-height: 1.5;
      z-index: 3;
      box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
    }

    .balon::after {
      content: '';
      position: absolute;
      bottom: -30px;
      left: 80px;
      border-width: 20px;
      border-style: solid;
      border-color: white transparent transparent transparent;
      transform: rotate(45deg);
      z-index: -1;
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

    .balon-beka {
      position: absolute;
      bottom: 210px;
      left: 330px;
      width: 350px;
      padding: 15px;
      font-size: 14px;
      font-weight: bold;
      text-align: justify;
      z-index: 5;
    }

  </style>
</head>
<body>
  <div class="container">
    <img src="gambar/page7/g3.png" alt="Prof Beka" class="prof-beka">
    <img src="gambar/page7/g2.png" alt="Dekorasi G2" class="wave" />
  </div>

  <div class="narration">
    <div id="typewriter-text" class="typewriter"></div>
  </div>

  <!-- Tambahan balon percakapan dari Prof. Beka -->
    <div class="balon-beka" id="balonBeka" style="display: none;">
    “Coba lihat sana. <span style='color:red;'>Kota kita berada di <br>pertemuan Sungai Barito dan Sungai<br> Martapura</span>. 
    Itu membuat <span style='color:red;'>Banjarmasin jadi <br>tempat yang strategis </span>sejak dulu. <br>Selain dua sungai besar itu, ada banyak <br>sungai kecil yang mengalir juga. <br>Mereka menyebar seperti urat daun, <br>itulah yang disebut pola aliran <br>dendritik.”
    </div>


  <script>
  const text = `Prof. Beka menunjuk ke arah pertemuan dua sungai besar.`;
  const container = document.getElementById('typewriter-text');
  const balonBeka = document.getElementById('balonBeka');

  let i = 0;
  let typingDone = false;
  let clickedOnce = false;

  function typeWriter() {
    if (i < text.length) {
      container.innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, 35);
    } else {
      typingDone = true;
    }
  }

  window.onload = () => {
    typeWriter();

    document.body.addEventListener('click', () => {
      if (typingDone && !clickedOnce) {
        // Tampilkan balon Prof. Beka
        balonBeka.style.display = 'block';
        clickedOnce = true;
      } else if (clickedOnce) {
        // Pindah ke halaman 8
        window.location.href = 'membaca8'; // ganti sesuai nama file halaman selanjutnya
      }
    });
  };
</script>

</body>
</html>
