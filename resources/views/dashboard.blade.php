<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard SIAGA</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url('gambar/bg_siaga_awan.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center top -120px;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      overflow-x: hidden;
      min-height: 100vh;
    }

    .cloud {
      position: absolute;
      height: auto;
      opacity: 0.9;
      z-index: 0;
    }

    .cloud-left {
      left: 30px;
      top: -70px;
      width: 320px;
      animation: moveCloudLeft 10s ease-in-out infinite;
    }

    .cloud-right {
      right: 30px;
      top: -90px;
      width: 360px;
      animation: moveCloudRight 10s ease-in-out infinite;
    }

    @keyframes moveCloudLeft {
      0% {
        transform: translateX(0);
      }

      50% {
        transform: translateX(30px);
      }

      100% {
        transform: translateX(0);
      }
    }

    @keyframes moveCloudRight {
      0% {
        transform: translateX(0);
      }

      50% {
        transform: translateX(-30px);
      }

      100% {
        transform: translateX(0);
      }
    }



    .logout {
      position: absolute;
      top: 30px;
      right: 30px;
      background-color: #e74c3c;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      text-decoration: none;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
      z-index: 2;
    }

    .logout:hover {
      background-color: #c0392b;
    }

    .welcome-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      text-align: center;
      z-index: 1;
    }

    .welcome h1 {
      color: #ffffff;
      font-size: 48px;
      font-weight: 800;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      margin-bottom: 10px;
    }

    .welcome p {
      color: #f1f1f1;
      font-size: 22px;
      font-style: italic;
      text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.5);
      margin: 0 0 40px;
    }

    .menu-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      max-width: 800px;
      width: 100%;
      padding: 0 20px 40px;
    }

    .menu-item {
      display: block;
      background-color: #F97A00;
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .menu-item:hover {
      background-color: #0056b3;
    }

    .menu-container a {
      text-decoration: none;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

  <!-- Awan -->
  <img src="gambar/awan.png" alt="Awan Kiri" class="cloud cloud-left">
  <img src="gambar/awan.png" alt="Awan Kanan" class="cloud cloud-right">

  <!-- Tombol Logout -->
  <a href="{{ url('/logout') }}" class="logout">Logout</a>

  @if (session('nilai_tersimpan'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'nilai bermain tersimpan !',
      text: '{{ session('success') }}',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    });
    </script>
  @endif

    @if (session('nilai_latihan'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'nilai berlatih tersimpan !',
      text: '{{ session('success') }}',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    });
    </script>
  @endif


  <div class="welcome-container">
    <div class="welcome">
      <h1>Halo, {{ $nama }}!</h1>
      <p>Pilihlah Kontenmu!!!!</p>
    </div>

    <div class="menu-container">
      <a href="membaca" class="menu-item">AYO MEMBACA</a>
      <a href="menonton" class="menu-item">AYO MENONTON</a>
      <a href="kolaborasi" class="menu-item">AYO BERKOLABORASI</a>
      <a href="bermain" class="menu-item">AYO BERMAIN</a>
      <a href="bekerja" class="menu-item">AYO BEKERJA</a>
      <a href="ayo-berlatih" class="menu-item">AYO BERLATIH</a>
    </div>
  </div>


</body>

</html>