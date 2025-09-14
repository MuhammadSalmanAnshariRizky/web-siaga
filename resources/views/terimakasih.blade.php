<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - LPPM ULM</title>
    <style>
        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* BODY */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        nav {
            background-color: #00a859; /* hijau khas LPPM */
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 30px;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        nav .logo {
            font-weight: bold;
            font-size: 22px;
            display: flex;
            align-items: center;
            letter-spacing: 1px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        nav .logo::before {
            content: "🌀";
            margin-right: 8px;
        }

        nav .logo:hover {
            transform: scale(1.05);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            font-size: 15px;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffea00;
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 20px;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
                margin-top: 10px;
            }

            nav ul li {
                width: 100%;
            }

            nav ul li a {
                display: block;
                width: 100%;
            }
        }

        /* MAIN CONTENT */
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .content {
            max-width: 800px;
            animation: fadeIn 1.5s ease;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ffd369;
        }

        p {
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        .contract {
            margin-top: 10px;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .project-title {
            margin-top: 20px;
            font-size: 1.15rem;
            font-style: italic;
            line-height: 1.6;
        }

        /* FOOTER */
        footer {
            background-color: #00a859;
            text-align: center;
            padding: 12px;
            font-size: 14px;
        }

        /* ANIMATIONS */
        .falling {
            position: absolute;
            top: -50px;
            font-size: 22px;
            opacity: 0.8;
            pointer-events: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav>
        <div class="logo">Siaga</div>
        <ul>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="/pengembang">Tim Pengembang</a></li>
            <li><a href="/daftarpustaka">Daftar Pustaka</a></li>
            <li><a href="{{ url('login') }}">Masuk</a></li>
        </ul>
    </nav>

    <!-- CONTENT -->
    <div class="container">
        <div class="content">
            <h1>Terima Kasih</h1>
            <p>Kepada <span class="highlight">LPPM Universitas Lambung Mangkurat</span></p>

            <div class="contract">
                Nomor Kontrak: <strong>1863/UN8.2/PG/2025</strong>
            </div>

            <div class="project-title">
                Judul Proyek: <br>
                <strong>“Proyek Penguatan Profil Pelajar Pancasila (P5) Berbasis Aplikasi Web untuk Sekolah Dasar Rawan
                    Banjir di Kota Banjarmasin”</strong>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        &copy; 2025 Siaga Banjir
    </footer>

    <!-- FALLING ANIMATION -->
    <script>
        const symbols = ["✨", "⭐", "🌸", "🍃", "💡", "🔆"];

        function createFallingElement() {
            const element = document.createElement("div");
            element.classList.add("falling");
            element.textContent = symbols[Math.floor(Math.random() * symbols.length)];
            element.style.left = Math.random() * window.innerWidth + "px";
            element.style.fontSize = (18 + Math.random() * 20) + "px";
            document.body.appendChild(element);

            let duration = 5 + Math.random() * 5;
            element.animate([
                { transform: `translateY(0px) rotate(0deg)`, opacity: 1 },
                { transform: `translateY(${window.innerHeight + 50}px) rotate(360deg)`, opacity: 0 }
            ], {
                duration: duration * 1000,
                iterations: 1,
                easing: "linear"
            });

            setTimeout(() => element.remove(), duration * 1000);
        }

        setInterval(createFallingElement, 500);
    </script>
</body>

</html>
