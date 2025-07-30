<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Siaga Banjir</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Comic Sans MS', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      background: linear-gradient(to bottom, #d0f0ff, #ffffff);
      overflow-x: hidden;
      min-height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 60px;
    }

    /* AWAN */
    .cloud {
      position: absolute;
      height: auto;
      opacity: 0.9;
      z-index: 0;
    }

    .cloud-left {
      left: 20px;
      top: -60px;
      width: 240px;
      animation: moveCloudLeft 10s ease-in-out infinite;
    }

    .cloud-right {
      right: 20px;
      top: -90px;
      width: 300px;
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

    /* LOGIN BOX */
    .login-container {
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      width: 100%;
      max-width: 420px;
      z-index: 1;
      position: relative;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #0077b6;
    }

    .form-group {
      margin-bottom: 16px;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      color: #333;
      font-size: 14px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px 40px 10px 10px;
      border: 2px solid #d0dfe8;
      border-radius: 10px;
      font-size: 14px;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #4fc3f7;
      outline: none;
    }

    .toggle-password {
      position: absolute;
      top: 35px;
      right: 12px;
      cursor: pointer;
      font-size: 18px;
      color: #999;
    }

    .login-btn {
      width: 100%;
      background-color: #ffc107;
      color: black;
      padding: 12px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-btn:hover {
      background-color: #ffca28;
    }

    .note {
      margin-top: 15px;
      text-align: center;
      font-size: 13px;
      color: #666;
    }
  </style>
</head>

<body>

  <!-- AWAN -->
  <img src="gambar/awan.png" alt="Awan Kiri" class="cloud cloud-left">
  <img src="gambar/awan.png" alt="Awan Kanan" class="cloud cloud-right">

  <!-- FORM LOGIN -->
  <div class="login-container">
    <h2>Masuk</h2>
    {{-- Tampilkan pesan error --}}
    @if(session('error'))
    <p style="color: red; text-align: center; margin-bottom: 15px;">
      {{ session('error') }}
    </p>
  @endif
    <form action="{{ route('login') }}" method="POST">
      @csrf

      <!-- Tambahkan di dalam <form> sebelum nama pengguna -->
      <div class="form-group">
        <label for="role">Masuk sebagai</label>
        <select id="role" name="role" onchange="toggleRoleFields()">
          <option value="siswa" selected>Siswa</option>
          <option value="guru">Guru</option>
        </select>
      </div>

      <!-- Nama untuk siswa -->
      <div class="form-group siswa-field">
        <label for="nama">Nama Pengguna</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama">
      </div>

      <!-- Nama lengkap untuk guru -->
      <div class="form-group guru-field" style="display: none;">
        <label for="nama_guru">Nama Lengkap</label>
        <input type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama lengkap guru">
      </div>

      <!-- Kelas hanya untuk siswa -->
      <div class="form-group siswa-field">
        <label for="kelas">Kelas</label>
        <select id="kelas" name="kelas">
          <option value="">-- Pilih Kelas --</option>
          <option value="IV-A">IV-A</option>
          <option value="IV-B">IV-B</option>
          <option value="V-A">V-A</option>
          <option value="V-B">V-B</option>
          <option value="VI-A">VI-A</option>
          <option value="VI-B">VI-B</option>
        </select>
      </div>

      <!-- Kata Sandi untuk semua -->
      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi">
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
      </div>


      <button type="submit" class="login-btn">Masuk</button>
    </form>
    <!-- Tambahkan ini di bawah form login -->
    <div class="note">
      Belum punya akun? <a href="{{ url('/register') }}" style="color: #0077b6; font-weight: bold;">Daftar di sini</a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.querySelector(".toggle-password");
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      toggleIcon.textContent = type === "password" ? "👁️" : "🙈";
    }

    function toggleRoleFields() {
      const role = document.getElementById('role').value;
      const siswaFields = document.querySelectorAll('.siswa-field');
      const guruFields = document.querySelectorAll('.guru-field');

      if (role === 'guru') {
        siswaFields.forEach(field => field.style.display = 'none');
        guruFields.forEach(field => field.style.display = 'block');
      } else {
        siswaFields.forEach(field => field.style.display = 'block');
        guruFields.forEach(field => field.style.display = 'none');
      }
    }
  </script>


</body>

</html>