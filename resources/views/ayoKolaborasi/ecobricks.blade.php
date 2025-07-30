<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Diskusi Ecobricks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffb6b6;
            /* Warna pink latar */
            font-family: 'Segoe UI', sans-serif;
        }

        .judul-section {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #00bcd4;
            text-shadow: 1px 1px 2px white;
            margin-top: 30px;
        }

        .box-cerita {
            background-color: #003f88;
            color: white;
            border-radius: 20px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            font-size: 18px;
            text-align: justify;
        }

        .box-pertanyaan {
            background-color: #fff;
            border-radius: 20px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            font-size: 18px;
        }

        .box-pertanyaan h5 {
            color: #ff5e00;
            font-weight: bold;
        }

        .karakter-ecobrick {
            position: absolute;
            bottom: -72px;
            right: -150px;
            width: 300px;
        }


        @media (max-width: 768px) {
            .karakter-ecobrick {
                position: static;
                display: block;
                margin: 20px auto 0;
            }

            .ilustrasi-sampah {
                display: none;
            }

            .box-pertanyaan {
                padding-bottom: 60px;
            }
        }
    </style>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body>

    <div class="container">
        <div class="judul-section">
            Berdiskusilah dan pecahkan permasalahan berikut!
        </div>

        <div class="box-cerita">
            Di daerah tempat tinggal Banyu, sungainya sering tersumbat oleh sampah plastik yang menumpuk.
            Terlebih lagi saat hujan deras, air jadi meluap dan menyebabkan banjir di mana-mana.
            Hal ini disebabkan karena warga sering membuang plastik sembarangan karena tidak tahu harus diapakan.
            <br><br>
            Akhirnya Banyu dan kawan-kawan memiliki ide untuk mengolah sampah plastik dan mempercantik sungai dengan
            menghiasnya.
        </div>

        <div class="box-pertanyaan position-relative">
            <form action="{{ route('simpanJawabanKelompok') }}" method="POST">
                @csrf
                <h5>Pertanyaan:</h5>
                <p>
                    Menurutmu inovasi apa yang dapat dilakukan Banyu dan kawan-kawan untuk mengurangi sampah plastik
                    yang
                    menumpuk,
                    serta apa manfaat inovasi tersebut bagi lingkungan ke depannya? Jelaskan pendapatmu!
                </p>
                <!-- Input kategori hidden -->
                <input type="hidden" name="kategori" value="ecobrick">
                <!-- Textarea untuk jawaban -->
                <div class="mb-3">
                    <label for="jawaban" class="form-label fw-bold text-primary">Jawabanmu:</label>
                    <textarea class="form-control" name="jawaban" id="jawaban" rows="5" required
                        placeholder="Tulis pendapatmu di sini...">{{ $jawabanLama->jawaban ?? '' }}</textarea>
                </div>

                <div class="d-flex flex-column flex-md-row gap-3 mt-3">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-send-fill me-2"></i> Kirim Jawaban
                    </button>

                    <a href="/kolaborasi" class="btn btn-outline-primary px-4">
                        <i class="bi bi-arrow-left-circle me-2"></i> Topik Lain
                    </a>
                </div>

                <!-- Gambar karakter -->
                <img src="{{ asset('gambar/karakter_ecobrick.png') }}" alt="Karakter Ecobrick"
                    class="karakter-ecobrick">
            </form>
            @if(session('success'))
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session("success") }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif

        </div>
    </div>

</body>

</html>