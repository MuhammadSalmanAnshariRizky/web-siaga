<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ayo Berlatih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-choice {
            min-width: 250px;
            text-align: left;
        }

        .btn-choice.active {
            background-color: #0d6efd !important;
            color: white !important;
        }

        .btn-nomor {
            width: 40px;
            height: 40px;
        }

        .nomor-soal-box {
            max-height: 400px;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .btn-choice {
                min-width: 100%;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">
    <!-- Halaman Pembuka -->
    <div id="intro-section" class="container py-5 text-center">
        <div class="bg-white p-5 rounded shadow-sm">
            <h3 class="mb-4">📢 Apakah kamu siap untuk menjawab?</h3>
            <p class="mb-4">Kerjakan soal dengan semangat dan fokus, ya!</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/dashboard" class="btn btn-secondary">⬅️ Kembali ke Dashboard</a>
                <button class="btn btn-primary" onclick="mulaiUjian()">✅ Iya, Saya Siap!</button>
            </div>
        </div>
    </div>
    <!-- Halaman Soal -->
    <div id="soal-section" class="container py-4" style="display: none;">
        <div class="container py-4">
            <div class="row">
                <!-- Kolom soal -->
                <div class="col-md-8">
                    <div class="bg-white p-4 rounded shadow-sm border border-primary-subtle">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="text-primary">📘 Ayo Berlatih</h4>
                            <div class="text-end">
                                <div class="text-muted small">Waktu Tersisa</div>
                                <div id="timer" class="fw-bold text-danger fs-5">15:00</div>
                            </div>
                        </div>

                        <div id="gambar-container" class="mb-3 text-center"></div>
                        <div id="soal" class="mb-3 fw-bold fs-5 text-start"></div>
                        <div id="opsi-container" class="mb-4 d-flex flex-column gap-2"></div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-secondary" id="prevBtn">⬅️ Sebelumnya</button>
                            <button class="btn btn-outline-primary" id="nextBtn">Selanjutnya ➡️</button>
                        </div>
                    </div>
                </div>

                <!-- Kolom navigasi soal -->
                <div class="col-md-4">
                    <div class="bg-white p-3 rounded shadow-sm border mb-3">
                        <h6 class="fw-bold mb-2">Nomor Soal</h6>
                        <div class="d-flex flex-wrap gap-2 nomor-soal-box" id="nomorSoalCard"></div>
                        <div class="mt-3">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-success">&nbsp;&nbsp;&nbsp;</span> Sudah dijawab
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-warning text-dark">&nbsp;&nbsp;&nbsp;</span> Soal aktif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hasil Ujian -->
    <div id="hasil-section" class="container py-5 text-center" style="display: none;">
        <div class="bg-white p-5 rounded shadow-sm">
            <h3 class="text-success mb-3">🎉 Selamat, kamu sudah menyelesaikan latihan!</h3>
            <p><strong>Skor:</strong> <span id="skorHasil"></span></p>
            <p><strong>Jawaban Benar:</strong> <span id="jumlahBenar"></span> dari <span id="jumlahSoal"></span> soal
            </p>
            <p><strong>Waktu yang dibutuhkan:</strong> <span id="waktuSelesai"></span></p>
            <hr class="my-4">
            <h5 class="mb-3">Rincian Jawaban:</h5>
            <div id="rincianHasil" class="text-start"></div>
            <a href="/dashboard" class="btn btn-primary mt-3">⬅️ Kembali ke Dashboard</a>
        </div>
    </div>



    <script>
        const soalList = @json($soal);
        let currentSoal = 0;
        let jawabanDipilih = new Array(soalList.length).fill(null);
        let waktu = 15 * 60;

        function tampilkanSoal(index) {
            const soal = soalList[index];
            const opsi = soal.opsi || ["", "", "", ""]; // fallback kosong
            const opsiGambar = soal.opsi_gambar || [];

            document.getElementById('soal').innerHTML = `${index + 1}. ${soal.pertanyaan}`;

            // gambar untuk soal
            const gambarContainer = document.getElementById('gambar-container');
            gambarContainer.innerHTML = soal.gambar
                ? `<img src="/${soal.gambar}" class="img-fluid rounded border" style="max-height: 250px;">`
                : '';

            // opsi
            const opsiHTML = opsi.map((text, i) => {
                const gambar = opsiGambar[i];
                return `
            <button onclick="pilihJawaban(${index}, ${i})"
                class="btn btn-outline-primary btn-choice text-start"
                id="opsi-${i}">
                ${text ? `<div><strong>${String.fromCharCode(65 + i)}.</strong> ${text}</div>` : `<strong>${String.fromCharCode(65 + i)}.</strong>`}
                ${gambar ? `<div><img src="/${gambar}" class="img-thumbnail mt-2" style="max-height: 120px;"></div>` : ""}
            </button>
        `;
            }).join('');

            document.getElementById('opsi-container').innerHTML = opsiHTML;

            updateNavigasi();
            tandaiTerpilih(index);
            updateNomorSoalCard();
        }


        function pilihJawaban(soalIndex, opsiIndex) {
            jawabanDipilih[soalIndex] = opsiIndex;
            tandaiTerpilih(soalIndex);
            updateNomorSoalCard();
        }

        function tandaiTerpilih(soalIndex) {
            soalList[soalIndex].opsi.forEach((_, i) => {
                const btn = document.getElementById(`opsi-${i}`);
                if (btn) {
                    btn.classList.remove('active');
                    if (jawabanDipilih[soalIndex] === i) {
                        btn.classList.add('active');
                    }
                }
            });
        }

        function updateNavigasi() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            prevBtn.style.visibility = currentSoal === 0 ? 'hidden' : 'visible';

            if (currentSoal === soalList.length - 1) {
                nextBtn.textContent = "✅ Selesai";
                nextBtn.classList.remove('btn-outline-primary');
                nextBtn.classList.add('btn-success');
            } else {
                nextBtn.textContent = "Selanjutnya ➡️";
                nextBtn.classList.remove('btn-success');
                nextBtn.classList.add('btn-outline-primary');
            }
        }

        function updateNomorSoalCard() {
            const container = document.getElementById('nomorSoalCard');
            container.innerHTML = soalList.map((_, i) => {
                const isAnswered = jawabanDipilih[i] !== null;
                const isActive = i === currentSoal;
                let colorClass = 'btn-outline-secondary';
                if (isAnswered) colorClass = 'btn-success';
                if (isActive) colorClass = 'btn-warning text-dark';

                return `
                    <button class="btn ${colorClass} btn-sm btn-nomor" onclick="gotoSoal(${i})">${i + 1}</button>
                `;
            }).join('');
        }

        function gotoSoal(index) {
            currentSoal = index;
            tampilkanSoal(index);
        }

        document.getElementById('nextBtn').onclick = () => {
            if (currentSoal < soalList.length - 1) {
                currentSoal++;
                tampilkanSoal(currentSoal);
            } else {
                // Cek apakah semua soal sudah dijawab
                const belumJawab = jawabanDipilih.some(j => j === null);
                if (belumJawab) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Belum Selesai!',
                        text: 'Kamu belum menjawab seluruh soal.',
                        confirmButtonText: 'Oke',
                    });
                    return;
                }

                // Konfirmasi sebelum menyelesaikan
                Swal.fire({
                    title: 'Selesaikan Latihan?',
                    text: 'Apakah kamu yakin ingin menyelesaikan latihan ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, selesai!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        selesaiUjian();
                    }
                });
            }
        };


        document.getElementById('prevBtn').onclick = () => {
            if (currentSoal > 0) {
                currentSoal--;
                tampilkanSoal(currentSoal);
            }
        };

        let waktuMulai = null;

        function mulaiUjian() {
            waktuMulai = new Date();

            document.getElementById("intro-section").style.display = "none";
            document.getElementById("soal-section").style.display = "block";
            tampilkanSoal(currentSoal);
            mulaiTimer();
        }

        function selesaiUjian() {
            clearInterval(timerInterval);
            const waktuAkhir = new Date();
            const durasi = Math.floor((waktuAkhir - waktuMulai) / 1000); // detik
            const menit = Math.floor(durasi / 60);
            const detik = durasi % 60;

            const total = soalList.length;
            let benar = 0;

            let rincianHTML = '';

            soalList.forEach((soal, i) => {
                const jawabanBenarIndex = soal.jawaban;
                const jawabanUserIndex = jawabanDipilih[i];

                const opsi = soal.opsi || [];
                const opsiGambar = soal.opsi_gambar || [];

                const benarText = opsi[jawabanBenarIndex] || '';
                const userText = opsi[jawabanUserIndex] || '';

                const benarGambar = opsiGambar[jawabanBenarIndex];
                const userGambar = opsiGambar[jawabanUserIndex];

                const benarLabel = `<strong>Jawaban Benar: ${String.fromCharCode(65 + jawabanBenarIndex)}. ${benarText}</strong>`;
                const salahLabel = jawabanUserIndex !== jawabanBenarIndex
                    ? `<div class="text-danger">Jawaban Kamu: ${String.fromCharCode(65 + jawabanUserIndex)}. ${userText}</div>`
                    : `<div class="text-success">✔️ Jawaban kamu benar</div>`;

                if (jawabanUserIndex === jawabanBenarIndex) benar++;

                rincianHTML += `
            <div class="mb-4 p-3 border rounded bg-light">
                <div class="fw-bold mb-2">${i + 1}. ${soal.pertanyaan}</div>
                ${soal.gambar ? `<img src="/${soal.gambar}" class="img-thumbnail mb-2" style="max-height: 150px;">` : ""}
                <div>${benarLabel}</div>
                ${salahLabel}
                ${benarGambar ? `<div><img src="/${benarGambar}" class="img-thumbnail mt-2" style="max-height: 100px;"></div>` : ""}
            </div>
        `;
            });

            document.getElementById("soal-section").style.display = "none";
            document.getElementById("hasil-section").style.display = "block";
            document.getElementById("skorHasil").innerText = `${Math.round((benar / total) * 100)}%`;
            document.getElementById("jumlahBenar").innerText = benar;
            document.getElementById("jumlahSoal").innerText = total;
            document.getElementById("waktuSelesai").innerText = `${menit} menit ${detik} detik`;

            document.getElementById("rincianHasil").innerHTML = rincianHTML;
        }

        let timerInterval;

        function mulaiTimer() {
            const timer = document.getElementById('timer');
            timerInterval = setInterval(() => {
                if (waktu <= 0) {
                    clearInterval(timerInterval);
                    alert("⏰ Waktu habis! Jawaban akan diselesaikan otomatis.");
                    selesaiUjian();
                } else {
                    waktu--;
                    const menit = Math.floor(waktu / 60);
                    const detik = waktu % 60;
                    timer.innerText = `${String(menit).padStart(2, '0')}:${String(detik).padStart(2, '0')}`;
                }
            }, 1000);
        }


        // Inisialisasi
        tampilkanSoal(currentSoal);
        mulaiTimer();
    </script>
</body>

</html>