<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman 20</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      font-family: 'Comic Sans MS', sans-serif;
      cursor: pointer; /* Tampilkan kursor tangan sebagai petunjuk bisa diklik */
    }

    .container {
      position: relative;
      width: 100%;
      height: 100%;
      background-image: url('gambar/page20/g1.png');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .tamat-text {
      font-size: 64px;
      color: black;
      font-weight: bold;
      padding: 20px 40px;
      border-radius: 20px;
    }
  </style>
  <script>
    // Arahkan ke halaman dashboard saat diklik di mana saja
    document.addEventListener('DOMContentLoaded', function () {
      document.body.addEventListener('click', function () {
        window.location.href = 'dashboard'; // Ganti dengan path yang sesuai
      });
    });
  </script>
</head>
<body>
  <div class="container">
    <div class="tamat-text">TAMAT</div>
  </div>
</body>
</html>
