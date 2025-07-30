<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Game Edukasi Sampah</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 30px;
            font-size: 36px;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .slider-wrapper {
            position: relative;
            overflow: visible;
            padding: 0 30px;
        }

        #sampah-container {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px;
        }

        #sampah-container::-webkit-scrollbar {
            display: none;
        }

        .slider-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            z-index: 10;
            font-size: 20px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .slider-button:hover {
            background-color: #1b5e20;
            transform: translateY(-50%) scale(1.1);
        }

        .slider-button.left {
            left: 0;
        }

        .slider-button.right {
            right: 0;
        }

        .sampah-item {
            background-color: #ffffff;
            border-radius: 14px;
            padding: 12px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            cursor: grab;
            width: 140px;
            flex-shrink: 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .sampah-item:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .sampah-item img {
            width: 100%;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .sampah-item span {
            font-size: 14px;
            font-weight: bold;
            color: #4e4e4e;
        }

        .tempat-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 60px;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .tempat-sampah {
            background-color: #f9fbe7;
            border: 5px dashed #000000;
            border-radius: 16px;
            padding: 16px;
            min-height: 240px;
            min-width: 180px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .tempat-sampah.droppable {
            background-color: #e6ffe6;
            border-color: #7cb342;
            transform: scale(1.05);
        }

        .tempat-sampah img {
            width: 140px;
            height: 140px;
            object-fit: contain;
            pointer-events: none;
            margin-bottom: 12px;
        }

        /* Warna khusus tiap jenis */
        .tempat-sampah.organik {
            background-color: #93DA97;
            /* hijau */
        }

        .tempat-sampah.anorganik {
            background-color: #FFDE63;
            /* biru */
        }

        .tempat-sampah.b3 {
            background-color: #C5172E;
            /* merah */
        }

        .tempat-sampah h3 {
            font-size: 20px;
            font-weight: bold;
            color: #000000;
        }

        .tempat-sampah .sampah-item {
            width: 100px;
            margin: 5px auto;
            box-shadow: none;
            transform: none !important;
            background: none;
            border: none;
        }

        button {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 12px 28px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1b5e20;
        }

        @media (max-width: 768px) {
            .tempat-wrapper {
                flex-direction: column;
                gap: 20px;
            }

            .slider-button {
                display: none;
            }

            .sampah-item {
                width: 100px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- Tombol Mulai Permainan -->
    <div id="mulai-wrapper"
        style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 1000;">
        <button onclick="mulaiPermainan()"
            style="padding: 14px 28px; font-size: 18px; background-color: #388e3c; color: white; border: none; border-radius: 10px; cursor: pointer;">
            🎮 Mulai Permainan
        </button>
    </div>


    <!-- Modal Petunjuk -->
    <div id="modalPetunjuk"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.6); z-index:9999; justify-content:center; align-items:center;">
        <div
            style="background:white; padding:30px; border-radius:16px; max-width:500px; text-align:center; box-shadow:0 6px 20px rgba(0,0,0,0.3); position:relative;">
            <h2 style="color:#2e7d32; margin-bottom:20px;">Petunjuk Permainan</h2>
            <p style="font-size:16px; color:#444;">
                Pilih dan pilah sampah sesuai dengan kategorinya: <strong>Organik</strong>, <strong>Anorganik</strong>,
                dan <strong>B3</strong>.<br><br>
                Anda memiliki waktu selama <strong>10 menit</strong> untuk menyelesaikan permainan.<br><br>
                Seret sampah ke tempat yang sesuai untuk mendapatkan nilai.
            </p>
            <button onclick="mulaiTimer()"
                style="margin-top: 20px; background-color: #2e7d32; color: white; padding: 10px 20px; font-size: 16px; border-radius: 8px; border: none;">Mulai
                Sekarang</button>
        </div>
    </div>

    <!-- Timer -->
    <div id="timer"
        style="display:none; position:fixed; top:20px; right:20px; background:#2e7d32; color:white; padding:12px 20px; border-radius:10px; font-size:18px; font-weight:bold; z-index:9999;">
        ⏰ Waktu: <span id="waktu">10:00</span>
    </div>


    <h1 id="konten-game-judul" style="display: none;">Game Edukasi Pemilahan Sampah</h1>

    <div class="container" id="konten-game" style="display: none;">
        <!-- Slider Sampah -->
        <div class="slider-wrapper">
            <button class="slider-button left" onclick="scrollSlider(-1)">&#10094;</button>
            <div id="sampah-container">
                <!-- Organik -->
                <div class="sampah-item" draggable="true" data-jenis="organik">
                    <img src="/gambar/daunkering.png" alt="Daun Kering">
                    <span>Daun Kering</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="organik">
                    <img src="/gambar/kulitpisang.png" alt="Kulit Pisang">
                    <span>Kulit Pisang</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="organik">
                    <img src="/gambar/sisasemangka.png" alt="Sisa Semangka">
                    <span>Sisa Semangka</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="organik">
                    <img src="/gambar/sisaapel.png" alt="Sisa Apel">
                    <span>Sisa Apel</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="organik">
                    <img src="/gambar/sisasayur.png" alt="Sisa Sayur">
                    <span>Sisa Sayur</span>
                </div>

                <!-- Anorganik -->
                <div class="sampah-item" draggable="true" data-jenis="anorganik">
                    <img src="/gambar/sampahbotolplastik.png" alt="Botol Plastik">
                    <span>Botol Plastik</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="anorganik">
                    <img src="/gambar/sampahgelasplastik.png" alt="Gelas Plastik">
                    <span>Gelas Plastik</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="anorganik">
                    <img src="/gambar/sampahkaleng.png" alt="Kaleng">
                    <span>Kaleng</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="anorganik">
                    <img src="/gambar/sampahplastik.png" alt="Plastik">
                    <span>Plastik</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="anorganik">
                    <img src="/gambar/sampahkotakkemasan.png" alt="Kotak Kemasan">
                    <span>Kotak Kemasan</span>
                </div>

                <!-- B3 -->
                <div class="sampah-item" draggable="true" data-jenis="b3">
                    <img src="/gambar/sampahbateraibekas.png" alt="Baterai Bekas">
                    <span>Baterai Bekas</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="b3">
                    <img src="/gambar/sampahlampu.png" alt="Lampu Bekas">
                    <span>Lampu Bekas</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="b3">
                    <img src="/gambar/sampahcat.png" alt="Cat Bekas">
                    <span>Cat Bekas</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="b3">
                    <img src="/gambar/sampahobat.png" alt="Obat Kadaluarsa">
                    <span>Obat Kadaluarsa</span>
                </div>
                <div class="sampah-item" draggable="true" data-jenis="b3">
                    <img src="/gambar/sampahpestsida.png" alt="Pestisida">
                    <span>Pestisida</span>
                </div>
            </div>
            <button class="slider-button right" onclick="scrollSlider(1)">&#10095;</button>
        </div>

        <!-- Tempat Sampah -->
        <div class="tempat-wrapper d-flex justify-content-center gap-4 mt-4">

            <div class="tempat-sampah organik text-center" data-jenis="organik">
                <i class="fas fa-leaf fa-3x text-success mb-2" style="color :#000000"></i>
                <h3>Organik</h3>
            </div>

            <div class="tempat-sampah anorganik text-center" data-jenis="anorganik">
                <i class="fas fa-recycle fa-3x text-primary mb-2" style="color :#000000"></i>
                <h3>Anorganik</h3>
            </div>

            <div class="tempat-sampah b3 text-center" data-jenis="b3">
                <i class="fas fa-skull-crossbones fa-3x text-danger mb-2" style="color :#000000"></i>
                <h3>B3</h3>
            </div>

        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button onclick="tampilkanHasil()"
                style="padding: 12px 24px; font-size: 16px; background-color: #2e7d32; color: white; border: none; border-radius: 8px; cursor: pointer;">
                Selesai
            </button>
        </div>
    </div>
    <div id="hasilPermainan" style="display: none; margin-top: 20px; text-align: center;">
        <h2 style="margin-bottom: 20px;">🧾 Hasil Permainan</h2>

        <div id="hasilSkor" style="margin-bottom: 30px;"></div>

        <div id="benarContainer" style="margin-bottom: 20px;">
            <h3 style="color: green;">✅ Gambar Benar</h3>
            <div id="benarCards" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;"></div>
        </div>

        <div id="salahContainer">
            <h3 style="color: red;">❌ Gambar Salah</h3>
            <div id="salahCards" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;"></div>
        </div>
    </div>

    <audio id="drag-audio" src="/audio/drag.mp3" preload="auto"></audio>
    <audio id="drop-audio" src="/audio/drop.mp3" preload="auto"></audio>
    <div id="tombol-akhir" style="display: none; margin-top: 30px; text-align: center;">
        <a href="/dashboard" id="kembali"
            style="margin: 10px; padding: 12px 24px; background-color: #388e3c; color: white; text-decoration: none; border-radius: 8px; font-size: 16px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);">
            🏠 Kembali ke Halaman Awal
        </a>
        <button onclick="location.reload()" id="cobaLagi"
            style="margin: 10px; padding: 12px 24px; background-color: #0288d1; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);">
            🔄 Coba Lagi
        </button>
        <form id="formNilai" method="POST" action="{{ route('nilai.simpan') }}">
            @csrf
            <input type="hidden" name="hasil_akhir" id="inputNilai">
            <input type="hidden" name="durasi" id="inputDurasi">
            <input type="hidden" name="kategori" value="bermain">
            <button type="submit" style="margin-top: 20px;" class="btn btn-success">
                💾 Simpan Nilai
            </button>
        </form>

    </div>



    <script>
        let gambarSampah = []; // ✅ untuk menyimpan data gambar yang dijatuhkan

        function mulaiPermainan() {
            document.getElementById('modalPetunjuk').style.display = 'flex';
            document.getElementById('mulai-wrapper').style.display = 'none';
        }

        let timerInterval;
        let waktuTersisa = 600; // 10 menit dalam detik

        function mulaiTimer() {
            document.getElementById('modalPetunjuk').style.display = 'none';
            document.getElementById('timer').style.display = 'block';
            document.getElementById('konten-game').style.display = 'block';
            document.getElementById('konten-game-judul').style.display = 'block';

            timerInterval = setInterval(() => {
                waktuTersisa--;

                const menit = Math.floor(waktuTersisa / 60);
                const detik = waktuTersisa % 60;

                document.getElementById('waktu').textContent = `${String(menit).padStart(2, '0')}:${String(detik).padStart(2, '0')}`;

                if (waktuTersisa <= 0) {
                    clearInterval(timerInterval);
                    tampilkanHasil();
                    alert('⏰ Waktu habis! Permainan selesai.');
                }
            }, 1000);
        }



        function scrollSlider(direction) {
            const container = document.getElementById('sampah-container');
            const scrollAmount = 300;
            container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        }

        const items = document.querySelectorAll('.sampah-item');
        const tempatSampah = document.querySelectorAll('.tempat-sampah');

        let benarCount = {
            organik: 0,
            anorganik: 0,
            b3: 0
        };

        function updateSliderButtons() {
            const container = document.getElementById('sampah-container');
            const leftBtn = document.querySelector('.slider-button.left');
            const rightBtn = document.querySelector('.slider-button.right');
            const items = container.querySelectorAll('.sampah-item');

            if (items.length === 0) {
                leftBtn.style.display = 'none';
                rightBtn.style.display = 'none';
            }
        }

        items.forEach(item => {
            item.addEventListener('dragstart', e => {
                const dragSound = document.getElementById('drag-audio');
                if (dragSound) dragSound.play();

                e.dataTransfer.setData('jenis', item.dataset.jenis);
                e.dataTransfer.setData('html', item.outerHTML);
                setTimeout(() => item.style.display = 'none', 0);
            });

            item.addEventListener('dragend', () => {
                item.style.display = 'block';
            });
        });

        tempatSampah.forEach(tempat => {
            tempat.addEventListener('dragover', e => {
                e.preventDefault();
                tempat.classList.add('droppable');
            });

            tempat.addEventListener('dragleave', () => {
                tempat.classList.remove('droppable');
            });

            tempat.addEventListener('drop', e => {

                e.preventDefault();
                tempat.classList.remove('droppable');
                const dropSound = document.getElementById('drop-audio');
                if (dropSound) dropSound.play();

                const jenis = e.dataTransfer.getData('jenis');
                const html = e.dataTransfer.getData('html');
                const parser = new DOMParser();
                const droppedElement = parser.parseFromString(html, 'text/html').body.firstChild;
                const actualDropZone = e.target.closest('.tempat-sampah');
                if (!actualDropZone) return;

                const dropJenis = actualDropZone.dataset.jenis;

                // Tambahkan jika benar
                if (dropJenis === jenis) {
                    benarCount[jenis]++;
                }
                // ✅ Simpan info untuk ditampilkan nanti
                gambarSampah.push({
                    src: droppedElement.querySelector('img').getAttribute('src'),
                    jenis: jenis,
                    dimasukkan: dropJenis
                });
                droppedElement.draggable = false;
                droppedElement.style.cursor = 'default';
                droppedElement.querySelector('span').style.fontSize = '12px';

                const src = droppedElement.querySelector('img').getAttribute('src');
                const original = document.querySelector(`.sampah-item img[src="${src}"]`);
                if (original) {
                    original.parentElement.remove();
                    updateSliderButtons();
                }

            });
        });

        function tampilkanHasil() {
            clearInterval(timerInterval); // HENTIKAN TIMER SAAT SELESAI

            document.getElementById('konten-game').style.display = 'none';
            document.getElementById('tombol-akhir').style.display = 'block';

            const totalBenar = benarCount.organik + benarCount.anorganik + benarCount.b3;
            const skor = (totalBenar * 6.67).toFixed(0);

            const durasiBermain = 600 - waktuTersisa; // dalam detik
            const menitMain = Math.floor(durasiBermain / 60);
            const detikMain = durasiBermain % 60;
            const durasiFormatted = `${String(menitMain).padStart(2, '0')}:${String(detikMain).padStart(2, '0')}`;

            document.getElementById('hasilPermainan').style.display = 'block';
            document.getElementById('inputNilai').value = skor;
            document.getElementById('inputDurasi').value = durasiBermain;


            // Tambahkan informasi skor dan durasi
            document.getElementById('hasilSkor').innerHTML = `
        <h3 style="color:#2e7d32;">🎯 Skor Akhir: ${skor}</h3>
        <h4 style="color:#444;">⏱️ Durasi Bermain: ${durasiFormatted}</h4>
    `;

            const benarCards = document.getElementById('benarCards');
            const salahCards = document.getElementById('salahCards');
            benarCards.innerHTML = '';
            salahCards.innerHTML = '';

            gambarSampah.forEach(gambar => {
                const card = document.createElement('div');
                card.style.border = '2px solid #ccc';
                card.style.borderRadius = '10px';
                card.style.padding = '10px';
                card.style.width = '140px';
                card.style.textAlign = 'center';
                card.style.backgroundColor = '#ffffff';
                card.style.boxShadow = '0 4px 10px rgba(0,0,0,0.1)';

                const img = document.createElement('img');
                img.src = gambar.src;
                img.alt = gambar.jenis;
                img.style.width = '100%';
                img.style.borderRadius = '6px';

                const label = document.createElement('p');
                label.innerText = `Jenis: ${gambar.jenis}\nDimasukkan: ${gambar.dimasukkan}`;
                label.style.fontSize = '14px';
                label.style.marginTop = '8px';

                card.appendChild(img);
                card.appendChild(label);

                if (gambar.dimasukkan === gambar.jenis) {
                    benarCards.appendChild(card);
                } else {
                    salahCards.appendChild(card);
                }
            });
        }

    </script>


</body>

</html>