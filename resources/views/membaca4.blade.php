<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman 4</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-family: sans-serif;
      position: relative;
    }

    .background {
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      object-position: center;
      position: absolute;
      z-index: 0;
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
      font-weight: normal;
      color: black;
      line-height: 1.6;
      padding-left: 50px; /* lebih halus, hanya isi teksnya yang geser */
      z-index: 2;
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

    .image1, .image2 {
      position: absolute;
      z-index: 3;
    }

    .image1 {
      width: auto;
      height: 110vh;
      left: 50%;
      top: 295px;
      transform: translate(-50%, -50%);
    }

    .wave {
      position: absolute;
      bottom: -630px;
      left: 0;
      width: 100vw;
      height: auto;
      z-index: 4;
    }

    .bubble-container {
      position: absolute;
      top: -50px;
      left: 160px;
      width: 1050px;
      height: auto;
      z-index: 3;
    }

    .bubble-container img.image3 {
      width: 100%;
      height: auto;
      display: block;
    }

    .bubble-text {
      position: absolute;
      color: black;
      font-size: 14px;
      font-weight: bold;
      text-align: center;
      z-index: 4;
    }

    .text-banyu {
      top: 330px;
      left: -115px;
      width: 660px;
    }

    .text-beka {
      top: 385px;
      left: 470px;
      width: 660px;
    }

    .bubble-text {
    display: none; /* Awalnya sembunyi */
    position: absolute;
    color: black;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    z-index: 4;
    }

  </style>
</head>
<body>

  <!-- Gambar latar -->
  <img src="gambar/page4/g1.png" alt="background" class="background">

  <!-- Narasi -->
  <div class="narration">
    <div id="typewriter-text" class="typewriter"></div>
  </div>

  <!-- Gambar karakter -->
  <img src="gambar/page4/g2.png" alt="karakter 1" class="image1">
  <img src="gambar/page4/g3.png" alt="Dekorasi G2" class="wave" />

  <!-- Bubble percakapan -->
  <div class="bubble-container">
    <img src="gambar/page4/g4.png" alt="peta" class="image3">
    <div class="bubble-text text-banyu">“Wah! Prof. Beka? <br>Boleh aku ikut <br>belajar sama mu?” </div>
    <div class="bubble-text text-beka">“Tentu saja, Banyu! <br>Ayo kita mulai <br>petualangan <br>ilmiahmu di Kota <br>Seribu Sungai!”</div>
  </div>


  <!-- Typewriter Script -->
  <!-- Tambahkan di bagian akhir script -->
<script>
  const text = `‘Woosh’ seketika kostum Banyu berubah, dengan pakaian lengkap, Banyu siap untuk menyusuri kota seribu sungai bersama Prof. Beka.\n\nMereka berjalan ke pinggir sungai, dan Prof. Beka membentangkan petanya.`;
  const container = document.getElementById('typewriter-text');
  const textBanyu = document.querySelector('.text-banyu');
  const textBeka = document.querySelector('.text-beka');
  let i = 0;
  let step = 0;
  let narrationDone = false;

  function typeWriter() {
    if (i < text.length) {
      container.innerHTML += text.charAt(i);
      i++;
      setTimeout(typeWriter, 35); // Kecepatan ketik
    } else {
      narrationDone = true;
    }
  }

  window.onload = typeWriter;

  document.body.addEventListener('click', () => {
    if (!narrationDone) return;

    if (step === 0) {
      textBanyu.style.display = 'block';
      step++;
    } else if (step === 1) {
      textBeka.style.display = 'block';
      step++;
    } else if (step === 2) {
      window.location.href = 'membaca5'; // Ganti halaman ke Page 5
    }
  });
</script>


  </script>

</body>
</html>
