<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 8</title>
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

    .banyu {
      position: absolute;
      bottom: 0;
      left: 2px;
      width: 850px;
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
      display: none; /* awalnya disembunyikan */
    }

    .speech.banyu {
      top: 220px;
      left: 140px;
    }

    .speech.beka {
      top: 310px;
      right: 293px;
    }
  </style>
</head>
<body>
  <div class="container" id="story-container">
    <img src="gambar/page8/g1.png" alt="Prof Beka" class="prof-beka">
    <img src="gambar/page8/g3.png" alt="Gelombang Air" class="wave" />
    <img src="gambar/page8/g2.png" alt="Banyu" class="banyu" />

    <div class="speech banyu">
      “Pantas disebut <br><span style='color:blue;'>Kota Seribu <br>Sungai</span>, ya Prof!” 
    </div>

    <div class="speech beka">
      “Iya. Julukan itu berasal dari <br>kenyataan bahwa kota ini <br>memang <span style='color:red;'>dikelilingi dan dialiri <br>oleh banyak sungai, besar <br>maupun kecil.</span>”
    </div>
  </div>

  <script>
    let step = 0;

    document.getElementById("story-container").addEventListener("click", function() {
      step++;
      if (step === 1) {
        document.querySelector(".speech.banyu").style.display = "block";
      } else if (step === 2) {
        document.querySelector(".speech.beka").style.display = "block";
      } else if (step === 3) {
        window.location.href = "membaca9";
      }
    });
  </script>
</body>
</html>
