<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Pengembang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* RESET & BODY */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        /* NAVBAR */
        nav {
            background-color: #00a859;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 30px;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav .logo {
            font-weight: bold;
            font-size: 22px;
            display: flex;
            align-items: center;
        }
        nav .logo::before {
            content: "🌀";
            margin-right: 8px;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
        }
        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffea00;
        }

        /* HEADING */
        h1 {
            text-align: center;
            margin: 40px 0 20px;
            color: #0077b6;
            font-weight: 700;
        }

        /* CARD */
        .card {
            height: 100%;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card-img-top {
            width: 200px;
            height: 200px;
            object-fit: cover;
            transition: transform 0.4s ease;
            margin-bottom: 15px;
        }
        .card-img-top:hover {
            transform: scale(1.08);
            cursor: pointer;
        }
        .card-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .card p {
            font-size: 0.9rem;
            margin-bottom: 10px;
            color: #555;
        }
        .primary-gsholar {
            background-color: #007bff;
            color: white;
            font-size: 0.85rem;
            padding: 6px 14px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .primary-gsholar:hover {
            background-color: #005bbc;
            color: white;
        }
        .row-cols-xxl-5 > * {
            margin-bottom: 30px;
        }

        /* FOOTER */
        footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #00a859;
            color: white;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <div class="logo">Siaga</div>
        <ul>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="/terimakasih">Ucapan Terima Kasih</a></li>
            <li><a href="/daftarpustaka">Daftar Pustaka</a></li>
            <li><a href="{{ url('login') }}">Masuk</a></li>
        </ul>
    </nav>

    <!-- HEADING -->
    <h1>Tim Pengembang</h1>

    <!-- CARDS -->
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 justify-content-center g-4">

            <!-- Card 1 -->
            <div class="col d-flex justify-content-center">
                <div class="card text-center p-3">
                    <img src="{{ asset('gambar/peneliti/1.png') }}" alt="Foto" class="card-img-top rounded-circle mx-auto">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h6 class="card-title">Dr. Noorhapizah, S.T., M.Pd.</h6>
                        <p>Ketua Peneliti</p>
                        <a href="https://scholar.google.com/citations?user=HUO-oYUAAAAJ&hl=en" class="primary-gsholar mt-auto" target="_blank">G.Scholar</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col d-flex justify-content-center">
                <div class="card text-center p-3">
                    <img src="{{ asset('gambar/peneliti/2.png') }}" alt="Foto" class="card-img-top rounded-circle mx-auto">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h6 class="card-title">Dr. Ali Rachman, M.Pd.</h6>
                        <p>Anggota Peneliti</p>
                        <a href="https://scholar.google.com/citations?user=QDyBdQQAAAAJ&hl=id" class="primary-gsholar mt-auto" target="_blank">G.Scholar</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col d-flex justify-content-center">
                <div class="card text-center p-3">
                    <img src="{{ asset('gambar/peneliti/3.png') }}" alt="Foto" class="card-img-top rounded-circle mx-auto">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h6 class="card-title">Dr. Yogi Prihandoko, M.Pd.</h6>
                        <p>Anggota Peneliti</p>
                        <a href="https://scholar.google.com/citations?hl=en&user=fq2wvhQAAAAJ&view_op=list_works" class="primary-gsholar mt-auto" target="_blank">G.Scholar</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col d-flex justify-content-center">
                <div class="card text-center p-3">
                    <img src="{{ asset('gambar/peneliti/4.png') }}" alt="Foto" class="card-img-top rounded-circle mx-auto">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h6 class="card-title">Annisa Aulia Rahmah</h6>
                        <p>Anggota Peneliti</p>
                        <a href="#" class="primary-gsholar mt-auto" target="_blank">G.Scholar</a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col d-flex justify-content-center">
                <div class="card text-center p-3">
                    <img src="{{ asset('gambar/peneliti/5.png') }}" alt="Foto" class="card-img-top rounded-circle mx-auto">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h6 class="card-title">Ratri Nur Kusuma Dewi</h6>
                        <p>Anggota Peneliti</p>
                        <a href="#" class="primary-gsholar mt-auto" target="_blank">G.Scholar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        &copy; 2025 Siaga Banjir
    </footer>

</body>
</html>
