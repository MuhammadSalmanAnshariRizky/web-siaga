<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ayo Berkolaborasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #a5ddff;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            padding-bottom: 40px;
        }

        .btn-custom {
            border-radius: 20px;
            font-weight: bold;
            font-size: 20px;
            padding: 10px 30px;
            margin: 10px;
            transition: 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            background-color: white;
        }

        .btn-bahan {
            background-color: #a14c2f;
            color: white;
        }



        .btn-ecobricks:hover::before {
            content: "\f1b3";
            /* cube icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .btn-ecoenzim:hover::before {
            content: "\f043";
            /* tint icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .btn-bokashi:hover::before {
            content: "\f06c";
            /* leaf icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .btn-kembali:hover::before {
            content: "\f060";
            /* leaf icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
        }

        .btn-ecobricks {
            background-color: #ff6e6e;
            color: white;

        }

        .btn-ecoenzim {
            background-color: #67c7ff;
            color: white;

        }

        .btn-bokashi {
            background-color: #8ef67e;
            color: white;

        }

        .btn-kembali {
            background-color: #F97A00;
            color: white;

        }

        .judul {
            font-size: 36px;
            font-weight: bold;
            color: #d14b00;
            margin-top: 30px;
        }

        .subjudul {
            font-size: 24px;
            color: #019cd3;
            font-weight: bold;
            margin-top: 20px;
        }

        img.karakter {
            width: 180px;
        }

        .modal-content {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-footer {
            justify-content: center;
            background-color: #f8f9fa;
        }

        @media (max-width: 576px) {
            .btn-custom {
                font-size: 16px;
                padding: 8px 20px;
            }

            .judul {
                font-size: 28px;
            }

            .subjudul {
                font-size: 18px;
            }

            img.karakter {
                width: 140px;
            }
        }
    </style>
</head>

<body>

    <!-- Modal Poster -->
    <div class="modal fade" id="posterModal" tabindex="-1" aria-labelledby="posterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img src="{{ asset('gambar/poster_proyek.png') }}" alt="Poster" class="img-fluid w-100">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-lg" data-bs-dismiss="modal">Mulai Diskusi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilan Konten -->
    <div class="container mt-4">
        <h1 class="judul">AYO BERKOLABORASI</h1>
        <img src="{{ asset('gambar/Banyu X Prof Beka 1.png') }}" alt="Karakter Banyu dan Prof Beka"
            class="karakter my-3">

        <div>
            <button class="btn btn-custom btn-bahan" data-bs-toggle="modal" data-bs-target="#posterModal">
                Bahan Bacaan
            </button>
        </div>


        <h2 class="subjudul">Ayo Diskusikan!</h2>
        <p class="text-primary">Pilih Topik Diskusimu</p>

        <div class="d-flex justify-content-center flex-wrap gap-3 mt-2">
            <a href="{{ route('diskusiEcobrick') }}" class="btn btn-custom btn-ecobricks">
                <span class="label">Membangun Kota</span>
            </a>
            <a href="{{ route('diskusiEcoenzim') }}" class="btn btn-custom btn-ecoenzim">
                <span class="label">Penjaga Air</span>
            </a>
            <a href="{{ route('diskusiPupukBokashi') }}" class="btn btn-custom btn-bokashi">
                <span class="label">Sahabat Tanaman</span>
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-custom btn-kembali">
                <span class="label">Kembali</span>
            </a>
        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Tampilkan modal poster saat halaman dimuat
        window.onload = function () {
            const posterModal = new bootstrap.Modal(document.getElementById('posterModal'));
            posterModal.show();
        };
    </script>
</body>

</html>