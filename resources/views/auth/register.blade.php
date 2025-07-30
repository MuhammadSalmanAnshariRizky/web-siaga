<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Siaga Banjir</title>
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

        .login-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            width: 100%;
            max-width: 460px;
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
            background-color: #00b894;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #00a17a;
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

    <!-- FORM REGISTER -->
    <div class="login-container">
        <h2>Daftar Akun</h2>
        @if ($errors->any())
            <div style="background: #ffe0e0; color: #d8000c; padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select id="kelas" name="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="IV-A">IV-A</option>
                    <option value="IV-B">IV-B</option>
                    <option value="V-A">V-A</option>
                    <option value="V-B">V-B</option>
                    <option value="VI-A">VI-A</option>
                    <option value="VI-B">VI-B</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Buat kata sandi" required>
                <span class="toggle-password" onclick="togglePassword('password', this)">👁️</span>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Ulangi kata sandi" required>
                <span class="toggle-password" onclick="togglePassword('password_confirmation', this)">👁️</span>
            </div>

            <button type="submit" class="login-btn">Daftar</button>
        </form>

        <div class="note">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const type = input.getAttribute("type") === "password" ? "text" : "password";
            input.setAttribute("type", type);
            el.textContent = type === "password" ? "👁️" : "🙈";
        }
    </script>

</body>

</html>