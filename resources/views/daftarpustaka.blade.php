<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pustaka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        /* NAVBAR */
        nav {
            background-color: #00a859;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 30px;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav .logo {
            font-weight: bold;
            font-size: 24px;
            display: flex;
            align-items: center;
        }

        nav .logo::before {
            content: "📚";
            margin-right: 10px;
        }

        nav ul.nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        nav ul.nav-links li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
        }

        nav ul.nav-links li a:hover {
            background-color: #ffffff33;
            color: #ffea00;
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            nav ul.nav-links {
                flex-direction: column;
                width: 100%;
            }

            nav ul.nav-links li a {
                display: block;
                width: 100%;
            }
        }

        /* HEADING */
        h1 {
            text-align: center;
            margin: 40px 0 25px;
            font-weight: 700;
            color: #0077b6;
        }

        /* LIST STYLE */
        .ref-list {
            counter-reset: ref-counter;
            padding-left: 40px;
        }

        .ref-item {
            background: #fff;
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
        }

        .ref-item::before {
            counter-increment: ref-counter;
            content: counter(ref-counter) ".";
            position: absolute;
            left: -35px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            color: #00a859;
        }

        .ref-item:hover {
            transform: translateX(4px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .ref-link {
            color: #007bff;
            text-decoration: none;
        }

        .ref-link:hover {
            text-decoration: underline;
        }

        /* FOOTER */
        footer {
            margin-top: 50px;
            padding: 18px 0;
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
        <div class="logo">Daftar Pustaka</div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="/pengembang">Tim Pengembang</a></li>
            <li><a href="/terimakasih">Ucapan Terima Kasih</a></li>
            <li><a href="{{ url('login') }}">Masuk</a></li>
        </ul>
    </nav>

    <!-- CONTENT -->
    <div class="container">
        <h1>Daftar Pustaka</h1>
        <div class="ref-list">

            <div class="ref-item"> Andri. (25 Oktober 2021). Bagaimana cara membuat eco enzyme? Simak penjelasan berikut
                ini!. FKM Unair. Diakses pada 27 Juli 2025, dari <a
                    href="https://fkm.unair.ac.id/2021/10/25/bagaimana-cara-membuat-eco-enzyme-simak-penjelasan-berikut-ini/"
                    target="_blank" class="ref-link">fkm.unair.ac.id</a> </div>
            <div class="ref-item"> BPK RI Perwakilan Provinsi Kalimantan Selatan. (n.d.). Profil Kota Banjarmasin.
                Diakses 27 Juli 2025, dari <a href="https://kalsel.bpk.go.id/kota-banjarmasin/" target="_blank"
                    class="ref-link">kalsel.bpk.go.id</a> </div>
            <div class="ref-item"> Eco-Enzyme Nusantara. (11 Desember 2021). Tutorial Pembuatan Eco Enzyme [Video].
                YouTube. <a href="https://youtu.be/M0Mgr2AXvSU?si=DSIhggIU4bGoMv0b" target="_blank"
                    class="ref-link">youtube</a> </div>
            <div class="ref-item"> EM INDONESIA. (Tanpa tanggal). Cara membuat eco enzyme. SPADA UNS. Diakses 27 Juli
                2025, dari <a href="https://spada.uns.ac.id/mod/resource/view.php?id=159161" target="_blank"
                    class="ref-link">spada.uns.ac.id</a> </div>
            <div class="ref-item"> KKN-PPM UGM BAWEAN. (19 Agustus 2021). Tutorial Pembuatan Pupuk Bokashi [Video].
                YouTube. <a href="https://youtu.be/OaPIzM4dIsc?si=wyZWsLh_6d9oSuon" target="_blank"
                    class="ref-link">youtube</a> </div>
            <div class="ref-item"> Kusliansjah, Y. K. (2022). Urban architecture identity of Banjarmasin: Structural
                pattern and building typology of the tidal river city. <i>ARTEKS: Jurnal Teknik Arsitektur</i>, 7(3),
                269–278. <a href="https://journal.unwira.ac.id/index.php/ARTEKS/article/view/1201" target="_blank"
                    class="ref-link">journal.unwira.ac.id</a> </div>
            <div class="ref-item"> Kusuma, F. D., & Hapsari, M. T. (2024). Peningkatan Kapasitas Masyarakat Urban dalam
                Pembuatan Pupuk Bokashi. <i>ABDIKU: Jurnal Pengabdian Masyarakat Universitas Mulawarman</i>, 3(1),
                29-32. </div>
            <div class="ref-item"> Ma’ruf, M. A., Rusliansyah, R., & Rachman, A. A. (2021). Pemetaan digital jenis
                lapisan tanah permukaan Kota Banjarmasin. <i>Agregat: Jurnal Teknik Sipil</i>, 6(1), 8–13. <a
                    href="https://journal.um-surabaya.ac.id/Agregat/article/view/8320" target="_blank"
                    class="ref-link">journal.um-surabaya.ac.id</a> </div>
            <div class="ref-item"> Nurohmah, S. S., & Haq, F. N. (2023, Desember 24). Memanfaatkan botol plastik dalam
                metode ecobrick sebagai upaya mengurangi sampah plastik. <i>Jurnal Dimasmu</i>, 1(2). <a
                    href="https://ejournal.umbandung.ac.id/index.php/dimasmu/article/view/343" target="_blank"
                    class="ref-link">ejournal.umbandung.ac.id</a> </div>
            <div class="ref-item"> Pemerintah Kota Banjarmasin. (n.d.). Profil Kota Banjarmasin. Diakses 27 Juli 2025,
                dari <a href="https://www.banjarmasinkota.go.id/p/profil-kota-banjarmasin.html" target="_blank"
                    class="ref-link">banjarmasinkota.go.id</a> </div>
            <div class="ref-item"> Rinso. (n.d.). 8 langkah membuat ecobrick dari plastik bekas. Diakses 27 Juli 2025,
                dari <a
                    href="https://www.rinso.com/id/sustainability/8-langkah-membuat-ecobrick-dari-plastik-bekas.html"
                    target="_blank" class="ref-link">rinso.com</a> </div>
            <div class="ref-item"> Suliartini, N. W. S., Isnaini, Popi Ulandari, Zaki Alhannani, I. G. E. A. Nando, Baiq
                M. Safitri, Halimatussakdiah, & Akhsanul Amru. (2022). Pengolahan sampah anorganik melalui ecobrick
                sebagai upaya mengurangi limbah plastik. <i>Jurnal Pengabdian Magister Pendidikan IPA</i>, 5(2),
                209–213. <a href="https://doi.org/10.29303/jpmpi.v5i2.1741" target="_blank" class="ref-link">doi.org</a>
            </div>
            <div class="ref-item"> Tunas Hijau ID. (2021, Oktober 16). Jangan Asal Buat Ecobrick! Ini Kiatnya [Video].
                YouTube. <a href="https://youtu.be/LPdZZpluj9c?si=BtZgwhO6rhHZ-z5b" target="_blank"
                    class="ref-link">youtube</a> </div>
            <div class="ref-item"> Wikaningrum, T., & El Dabo, M. (2022). Eco-Enzyme Sebagai Rekayasa Teknologi
                Berkelanjutan Dalam Pengolahan Air Limbah. <i>Jurnal Penelitian Dan Karya Ilmiah Lembaga Penelitian
                    Universitas Trisakti</i>, 53-64. </div>
        </div>
    </div>


    <!-- FOOTER -->
    <footer>
        &copy; 2025 Daftar Pustaka – Siaga Banjir
    </footer>

</body>

</html>