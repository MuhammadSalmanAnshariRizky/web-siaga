<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman 3</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-family: sans-serif;
    }

    .background {
      width: 100vw;
      height: 115vh;
      object-fit: cover;
      object-position: center bottom;
      transform: scale(1.1);
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
      color: black;
      line-height: 1.6;
      padding-left: 50px;
      z-index: 5;
    }

    .character {
      position: absolute;
      width: 950px;
      z-index: 2;
    }

    .character-banyu {
      bottom: 10px;
      left: 100px;
    }

    .character-beka {
      bottom: 0px;
      right: 300px;
    }

    .wave {
      position: absolute;
      bottom: -20px;
      left: 0;
      width: 100vw;
      height: auto;
      z-index: 1;
    }

    .decor-right {
      position: absolute;
      top: -50px;
      left: 100px;
      width: 1000px;
      z-index: 3;
    }

    .decor-image {
      width: 100%;
      display: block;
    }

    .decor-text {
      position: absolute;
      font-size: 14px;
      font-weight: bold;
      color: black;
      text-align: center;
      z-index: 6;
      display: none;
    }

    .decor-text.atas {
      top: 270px;
      left: 450px;
      width: 660px;
    }

    .decor-text.bawah {
      top: 400px;
      left: 550px;
      width: 660px;
    }
  </style>
</head>
<body>

  <img src="gambar/page3/g1.png" alt="Background Page 3" class="background" />

  <div class="narration" id="narration"></div>

  <img src="gambar/page3/g4.png" alt="Banyu" class="character character-banyu" />
  <img src="gambar/page3/g3.png" alt="Prof. Beka" class="character character-beka" />
  <img src="gambar/page3/g2.png" alt="Dekorasi G2" class="wave" />

  <div class="decor decor-right">
    <img src="gambar/page3/g5.png" alt="Dekorasi G5" class="decor-image" />
    <div class="decor-text atas" id="bekaText1">“Hmm… kamu <br>tampaknya sedang <br>penasaran tentang <br>kota ini, ya?”</div>
    <div class="decor-text bawah" id="bekaText2">“Namaku Prof. Beka, <br>peneliti alam dan sungai <br>dari hutan Kalimantan. <br>Aku tahu banyak <br>tentang kota ini,”</div>
  </div>

  <script>
    const narrationEl = document.getElementById("narration");
    const bekaText1 = document.getElementById("bekaText1");
    const bekaText2 = document.getElementById("bekaText2");

    const narrationText = `Banyu masih bertanya-tanya "Kenapa ya kota kita punya banyak sungai? Dan kenapa rumah-rumah dulu banyak di atas air?".\n\nSaat ayahnya pergi membeli jajanan, Banyu duduk di bangku taman. Tiba-tiba, terdengar suara lembut dari arah pohon rindang.\n\nBanyu menoleh kaget. Di hadapannya berdiri seekor bekantan berkacamata, memakai jas putih seperti ilmuwan, membawa peta dan tongkat kayu.`;

    let i = 0;
    let step = 0;
    let typingDone = false;

    function typeWriter() {
      if (i < narrationText.length) {
        const char = narrationText.charAt(i);
        narrationEl.innerHTML += char === "\n" ? "<br>" : char;
        i++;
        setTimeout(typeWriter, 20);
      } else {
        typingDone = true;
      }
    }

    document.body.addEventListener("click", () => {
      if (!typingDone) return;

      if (step === 0) {
        bekaText1.style.display = "block";
        step++;
      } else if (step === 1) {
        bekaText2.style.display = "block";
        step++;
      } else if (step === 2) {
        window.location.href = "membaca4";
      }
    });

    window.onload = () => {
      bekaText1.style.display = "none";
      bekaText2.style.display = "none";
      typeWriter();
    };
  </script>

</body>
</html>
