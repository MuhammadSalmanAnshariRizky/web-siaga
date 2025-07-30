<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Menonton</title>
  <style>
    body {
      margin: 0;
      background-color: black;
      background-image: url("{{ asset('gambar/menonton3.png') }}");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      flex-direction: column;
      align-items: center;
      height: 100vh;
      padding-top: 40px;
      position: relative;
      overflow: hidden;
    }

    .screen {
      width: 90%;
      max-width: 886px;
      aspect-ratio: 16 / 9;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
      border-radius: 8px;
      overflow: hidden;
      background-color: black;
      margin-top: -40px;
      z-index: 3;
      position: relative;
    }

    .gorden-kiri,
    .gorden-kanan {
      position: absolute;
      top: 0;
      height: 100%;
      z-index: 2;
    }

    .gorden-kiri {
      left: 0;
    }

    .gorden-kanan {
      right: 0;
    }

    .gorden-kiri img,
    .gorden-kanan img {
      height: 100vh;
    }

    video {
      width: 100%;
      height: 100%;
      background-color: black;
      z-index: 3;
      position: relative;
    }

    .dashboard-button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #799EFF;
      color: #000;
      font-weight: bold;
      text-decoration: none;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
      z-index: 4;
    }

    .dashboard-button:hover {
      background-color: #fff;
    }
  </style>
</head>

<body>
  <div class="gorden-kiri">
    <img src="{{ asset('gambar/gorden.png') }}" alt="Gorden Kiri">
  </div>

  <div class="gorden-kanan">
    <img src="{{ asset('gambar/gorden.png') }}" alt="Gorden Kanan">
  </div>

  <div class="screen">
    <video id="video1" controls muted>
      <source src="{{ asset('video/video_pertama.mp4') }}" type="video/mp4">
      Browser Anda tidak mendukung video HTML5.
    </video>
    <video id="video2" controls muted style="display: none;">
      <source src="{{ asset('video/video_kedua.mp4') }}" type="video/mp4">
      Browser Anda tidak mendukung video HTML5.
    </video>
  </div>

  <a href="{{ url('/dashboard') }}" class="dashboard-button ">← Kembali ke Dashboard</a>

  <script>
    const video1 = document.getElementById('video1');
    const video2 = document.getElementById('video2');

    video1.addEventListener('ended', function () {
      video1.style.display = 'none';
      video2.style.display = 'block';
      video2.play();
    });
  </script>
</body>

</html>
