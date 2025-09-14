<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman 2</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body,
    html {
      width: 100vw;
      height: 100vh;
      overflow: hidden;
      position: relative;
      font-family: sans-serif;
      cursor: pointer;
    }

    .background {
      position: absolute;
      width: 100vw;
      height: 100vh;
      object-fit: cover;
      z-index: 0;
    }

    .text-box {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      width: 100%;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.85);
      font-size: 16px;
      line-height: 1.6;
      padding-left: 50px;
      /* lebih halus, hanya isi teksnya yang geser */
      z-index: 1;
      color: black;
    }

    .character,
    .ayah {
      position: absolute;
      bottom: 10px;
      width: 800px;
      z-index: 2;
    }

    .character {
      left: 300px;
    }

    .ayah {
      left: 55%;
      transform: translateX(-50%);
      bottom: 20px;
    }

    .wave {
      position: absolute;
      bottom: -20px;
      left: 0;
      width: 100vw;
      height: auto;
      z-index: 4;
    }

    .speech-bubble {
      position: absolute;
      z-index: 3;
      display: none;
    }

    .speech-bubble img {
      width: 800px;
      display: block;
    }

    .bubble-text-banyu {
      position: absolute;
      top: 210px;
      left: -67px;
      width: 660px;
      font-size: 12px;
      font-weight: bold;
      color: black;
      text-align: center;
    }

    .bubble-text-ayah {
      position: absolute;
      top: 205px;
      left: 325px;
      width: 660px;
      font-size: 12px;
      font-weight: bold;
      color: white;
      text-align: center;
    }

    @media screen and (width: 1920px) and (height: 1080px) {
      .bubble-text-banyu {
        top: 160px;
        /* geser naik */
        left: -40px;
        /* geser kanan */
        width: 550px;
        /* lebih kecil biar pas */
        font-size: 16px;
        /* teks lebih besar dan mudah dibaca */
        line-height: 1.4;
        /* spasi antar baris lebih enak */
      }

      .bubble-text-ayah {
        top: 150px;
        left: 280px;
        width: 550px;
        font-size: 16px;
        line-height: 1.4;
      }

      .speech-bubble img {
        width: 700px;
        /* balonnya jangan terlalu gede */
      }
    }
  </style>
</head>

<body>
  <!-- Background -->
  <img src="gambar/page2/g1.png" alt="Background" class="background" />

  <!-- Kotak narasi -->
  <div class="text-box" id="narration"></div>

  <!-- Karakter -->
  <img src="gambar/page2/g2.png" alt="Banyu" class="character" />
  <img src="gambar/page2/g3.png" alt="Ayah" class="ayah" />

  <!-- Balon kata Banyu -->
  <div class="speech-bubble" id="banyuBubble" style="top: 45px; left: 350px;">
    <img src="gambar/page2/g4.png" alt="Balon kata Banyu" />
    <div class="bubble-text-banyu">“Yah, kenapa dulu <br>orang-orang di <br>Banjarmasin suka <br>naik perahu?<br>
      Sekarang kayaknya <br>lebih banyak naik <br>motor ya.”</div>
  </div>

  <!-- Balon kata Ayah -->
  <div class="speech-bubble" id="ayahBubble" style="top: 50px; left: 360px;">
    <img src="gambar/page2/g5.png" alt="Balon kata Ayah" />
    <div class="bubble-text-ayah">“Iya, dulu sungai itu <br>seperti jalan raya. <br>Tapi sekarang nggak <br>semua orang
      naik <br>perahu lagi. Sudah <br>banyak yang pakai <br>motor atau mobil.”</div>
  </div>

  <!-- Ombak bawah -->
  <img src="gambar/page2/g6.png" alt="Gelombang" class="wave" />

  <!-- Script Typewriter + Pagination -->
  <script>
    const narration = document.getElementById('narration');
    const banyuBubble = document.getElementById('banyuBubble');
    const ayahBubble = document.getElementById('ayahBubble');

    const fullText = `Pagi itu, langit Kota Banjarmasin cerah sekali. Angin semilir menyapu sungai yang tenang, dan matahari bersinar hangat. Banyu, seorang anak kelas 5 SD, sedang ikut ayahnya berjalan-jalan pagi di Siring Sungai Martapura.\n\nBanyu suka memperhatikan sungai. Ia melihat beberapa perahu berjejer di dekat Pasar Terapung Siring, tempat wisata yang cukup ramai dikunjungi orang.`;
    let i = 0;
    let stage = 0;

    function typeWriter() {
      if (i < fullText.length) {
        narration.innerHTML += fullText.charAt(i) === '\n' ? '<br>' : fullText.charAt(i);
        i++;
        setTimeout(typeWriter, 30);
      }
    }

    window.onload = typeWriter;

    document.body.addEventListener('click', () => {
      if (i < fullText.length) return; // Jangan klik jika narasi belum selesai

      stage++;

      if (stage === 1) {
        banyuBubble.style.display = 'block';
      } else if (stage === 2) {
        ayahBubble.style.display = 'block';
      } else if (stage === 3) {
        window.location.href = 'membaca3'; // Ganti ke halaman selanjutnya
      }
    });
  </script>
</body>

</html>