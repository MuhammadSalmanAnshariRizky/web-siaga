<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ayo Membaca!</title>
  <style>
    body {
      margin: 0;
      font-family: 'Comic Sans MS', sans-serif;
      background: url('gambar/banjarmasin.jpg') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-end;
    }

    .story-box {
      width: 90%;
      max-width: 800px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 20px;
      padding: 20px;
      margin: 40px;
      display: flex;
      align-items: center;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .character {
      width: 120px;
      height: auto;
    }

    .text {
      flex: 1;
      padding: 0 20px;
      font-size: 18px;
      color: #333;
    }

    .left .character {
      order: 0;
    }

    .left .text {
      text-align: left;
    }

    .right {
      flex-direction: row-reverse;
    }

    .right .text {
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="story-box left" onclick="nextDialogue()">
    <img src="gambar/banyu.png" alt="Banyu" class="character" id="char-img">
    <div class="text" id="dialogue-text">Halo, aku Banyu! Yuk, kita jalan-jalan mengenal kotaku, Banjarmasin!</div>
  </div>

  <script>
    const dialogues = [
      { name: "Banyu", align: "left", img: "gambar/banyu.png", text: "Halo, aku Banyu! Yuk, kita jalan-jalan mengenal kotaku, Banjarmasin!" },
      { name: "Ayah", align: "right", img: "gambar/ayah.png", text: "Kota kita ini punya banyak sungai lho, makanya disebut Kota Seribu Sungai." },
      { name: "Prof. Beka", align: "left", img: "gambar/beka.png", text: "Betul! Secara topografi, Banjarmasin itu dataran rendah dan banyak perairan." },
      { name: "Banyu", align: "left", img: "gambar/banyu.png", text: "Makanya di sini rumahnya banyak yang panggung ya, Prof?" },
      { name: "Prof. Beka", align: "left", img: "gambar/beka.png", text: "Benar sekali, supaya tidak kebanjiran saat pasang air sungai." },
      { name: "Ayah", align: "right", img: "gambar/ayah.png", text: "Kamu hebat, Banyu! Sekarang ayo kita lanjut menjelajah lagi!" },
      { name: "Banyu", align: "left", img: "gambar/banyu.png", text: "Siap, Ayah! Yuk teman-teman, ikuti terus ya!" }
    ];

    let index = 0;

    function nextDialogue() {
      index++;
      if (index >= dialogues.length) {
        index = 0; // ulang dari awal atau ubah jadi "Tamat"
      }

      const dialog = dialogues[index];
      const box = document.querySelector('.story-box');
      const img = document.getElementById('char-img');
      const text = document.getElementById('dialogue-text');

      // Update tampilan
      box.className = 'story-box ' + dialog.align;
      img.src = dialog.img;
      img.alt = dialog.name;
      text.textContent = dialog.text;
    }
  </script>
</body>
</html>
