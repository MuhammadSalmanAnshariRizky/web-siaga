<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inovasi Lingkungan - Baca PDF Interaktif</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #f0fff4);
            font-family: 'Segoe UI', sans-serif;
        }

        .hero-section {
            text-align: center;
            padding: 60px 20px 40px;
        }

        .hero-section img {
            max-width: 400px;
            transition: transform 0.4s ease, box-shadow 0.3s ease;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .hero-section img:hover {
            transform: scale(1.05);
            box-shadow: 0 14px 35px rgba(0, 128, 128, 0.3);
        }

        .hero-section h2 {
            font-weight: bold;
            font-size: 2.3rem;
            color: #00695c;
        }

        .hero-section p {
            color: #444;
            font-size: 1.15rem;
            margin-bottom: 35px;
        }

        .btn-pilihan {
            min-width: 180px;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 12px 16px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-pilihan:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(0,0,0,0.2);
        }

        #pdf-render {
            border: 1px solid #ccc;
            width: 100%;
            max-height: 600px;
            object-fit: contain;
        }

        .modal-dialog {
            max-width: 800px;
        }

        .controls {
            text-align: center;
            margin: 10px 0;
        }

        .modal-title {
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container hero-section">
    <img src="{{ asset('gambar/ayo_bekerja.png') }}" alt="Ayo Bekerja" class="img-fluid">
    <h2 class="mt-4">Ayo Jelajahi Inovasi Ramah Lingkungan!</h2>
    <p>Pilih salah satu topik berikut untuk membaca penjelasan secara interaktif:</p>

    <div class="d-flex justify-content-center gap-3 flex-wrap mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark btn-pilihan">
            <i class="bi bi-house-door-fill"></i> kembali
        </a>
        <button class="btn btn-success btn-pilihan" data-bs-toggle="modal" data-bs-target="#pdfModal" data-file="ecobrick.pdf">
            <i class="bi bi-recycle"></i> Ecobricks
        </button>
        <button class="btn btn-primary btn-pilihan" data-bs-toggle="modal" data-bs-target="#pdfModal" data-file="ecoenzim.pdf">
            <i class="bi bi-droplet-fill"></i> Ecoenzim
        </button>
        <button class="btn btn-warning btn-pilihan" data-bs-toggle="modal" data-bs-target="#pdfModal" data-file="pupukbokashi.pdf">
            <i class="bi bi-flower3"></i> Pupuk Bokashi
        </button>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="controls mb-3">
                    <button onclick="prevPage()" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i></button>
                    <span class="mx-2">Halaman: <span id="page-num">1</span> / <span id="page-count">0</span></span>
                    <button onclick="nextPage()" class="btn btn-outline-secondary"><i class="bi bi-arrow-right"></i></button>
                    <button onclick="downloadPDF()" class="btn btn-success ms-3"><i class="bi bi-download"></i></button>
                </div>
                <div class="d-flex justify-content-center">
                    <canvas id="pdf-render" class="shadow rounded"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.10.111/pdf.min.js"></script>
<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let pdfDoc = null,
        pageNum = 1,
        pageIsRendering = false,
        pageNumIsPending = null,
        currentPdfUrl = '';

    const scale = 1.2,
        canvas = document.getElementById('pdf-render'),
        ctx = canvas.getContext('2d');

    const renderPage = num => {
        pageIsRendering = true;
        pdfDoc.getPage(num).then(page => {
            const viewport = page.getViewport({ scale });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderCtx = {
                canvasContext: ctx,
                viewport
            };

            page.render(renderCtx).promise.then(() => {
                pageIsRendering = false;
                if (pageNumIsPending !== null) {
                    renderPage(pageNumIsPending);
                    pageNumIsPending = null;
                }
            });

            document.getElementById('page-num').textContent = num;
        });
    };

    const queueRenderPage = num => {
        if (pageIsRendering) {
            pageNumIsPending = num;
        } else {
            renderPage(num);
        }
    };

    const prevPage = () => {
        if (pageNum <= 1) return;
        pageNum--;
        queueRenderPage(pageNum);
    };

    const nextPage = () => {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
    };

    const downloadPDF = () => {
        const link = document.createElement('a');
        link.href = currentPdfUrl;
        link.download = currentPdfUrl.split('/').pop();
        link.click();
    };

    const modal = document.getElementById('pdfModal');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const fileName = button.getAttribute('data-file');
        const fileUrl = `/pdf/${fileName}`;
        currentPdfUrl = fileUrl;

        pdfjsLib.getDocument(fileUrl).promise.then(pdf => {
            pdfDoc = pdf;
            pageNum = 1;
            document.getElementById('page-count').textContent = pdf.numPages;
            renderPage(pageNum);
        });
    });
</script>

</body>
</html>
