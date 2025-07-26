<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class latihanController extends Controller
{
    public function index()
    {
        $soal = [
            [
                "pertanyaan" => "Mengapa Banjarmasin lebih mudah terkena banjir dibanding kota lain?",
                "opsi" => [
                    "Karena berada di daerah pegunungan",
                    "Karena punya banyak pusat perbelanjaan",
                    "Karena letaknya di dataran rendah dan dikelilingi sungai",
                    "Karena punya banyak gedung tinggi"
                ],
                "jawaban" => 2
            ],
            [
                "pertanyaan" => "Jika semua warga Banjarmasin membangun rumah di atas tanah tanpa memperhatikan aliran air, apa akibatnya bagi kota ini?",
                "opsi" => [
                    "Kota jadi lebih maju",
                    "Jalur air tersumbat dan banjir lebih parah",
                    "Sungai jadi lebih dalam",
                    "Air sungai lebih bersih"
                ],
                "jawaban" => 1
            ],
            [
                "pertanyaan" => "Banyak sungai di Banjarmasin berpola seperti urat daun atau denritik. Jika kamu menjadi arsitek, apa desain saluran air terbaik?",
                "opsi" => [
                    "Lurus tanpa cabang",
                    "Terpusat ke satu sungai besar",
                    "Melengkung dan ditutup rapat",
                    "Meniru bentuk cabang-cabang sungai kecil"
                ],
                "jawaban" => 3
            ],
            [
                "pertanyaan" => "Perhatikan gambar diatas ini! 
                Rumah panggung atau “Bubungan Tinggi” adalah cara masyarakat dahulu menyiasati banjir. Apa fungsi  penting dari bangunan ini?",
                "gambar" => "gambar/bubungan_tinggi.jpg",
                "opsi" => [
                    "Agar rumah tetap aman saat banjir",
                    "Supaya air bisa masuk ke rumah",
                    "Agar rumah bisa mengapung",
                    "Supaya lebih tinggi dari rumah lain"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Kota dengan banyak sungai seperti Banjarmasin harus menjaga kebersihan sungai. Mengapa hal ini penting?",
                "opsi" => [
                    "Agar sungai bisa dijadikan tempat buang limbah",
                    "Supaya air mengalir dengan lancar dan tidak meluap",
                    "Agar warga bisa berenang setiap hari",
                    "Supaya sungai tertutup sampah"
                ],
                "jawaban" => 1
            ],
            [
                "pertanyaan" => "Salah satu cara mengurangi banjir adalah membuat lubang biopori. Mengapa ini efektif?",
                "opsi" => [
                    "Air hujan bisa terserap ke dalam tanah",
                    "Air jadi lebih kotor",
                    "Air hujan bisa tersimpan di jalan",
                    "Menambah estetika jalanan"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Jika halaman rumahmu selalu tergenang saat hujan, langkah terbaik untuk mencegahnya adalah...",
                "opsi" => [
                    "Menutup semua saluran air",
                    "Membiarkan air mengalir ke rumah tetangga",
                    "Meninggikan lantai rumah dengan semen",
                    "Membuat resapan air dan menanam pohon"
                ],
                "jawaban" => 3
            ],
            [
                "pertanyaan" => "Apa akibatnya jika pepohonan di kota ditebang dan tanah dilapisi beton?",
                "opsi" => [
                    "Kota jadi lebih modern",
                    "Udara menjadi lebih sejuk",
                    "Air hujan langsung masuk sungai",
                    "Tanah tidak mampu menyerap air dan banjir mudah terjadi"
                ],
                "jawaban" => 3
            ],
            [
                "pertanyaan" => "Apa kebiasaan kecil yang bisa dilakukan anak-anak untuk ikut mencegah banjir?",
                "opsi" => ["", "", "", ""],
                "opsi_gambar" => [
                    "gambar/opsi_a.jpg",
                    "gambar/opsi_b.jpg",
                    "gambar/opsi_c.jpg",
                    "gambar/opsi_d.jpg"
                ],
                "jawaban" => 1
            ],
            [
                "pertanyaan" => "Mengapa ruang terbuka hijau (RTH) penting untuk mencegah banjir?",
                "opsi" => [
                    "Membantu air meresap dan menjaga keseimbangan alam",
                    "Tempat selfie yang bagus",
                    "Untuk tempat bermain anak saja",
                    "Untuk membangun gedung baru"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Jika air mulai masuk ke rumah saat hujan deras, tindakan pertama yang dilakukan adalah...",
                "opsi" => [
                    "Mematikan listrik dan segera mencari tempat tinggi",
                    "Memanfaatkan air untuk mencuci pakaian",
                    "Bermain air bersama teman",
                    "Makan dan tidur seperti biasa"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Ketika banjir terjadi, mengapa kita harus segera mematikan dan menghindari menyentuh kabel listrik?",
                "opsi" => [
                    "Bisa membuat air makin naik",
                    "Sengatan listrik akibat air banjir yang mengalirkan listrik",
                    "Kabel bisa membuat air berubah warna",
                    "Supaya kabelnya tidak rusak"
                ],
                "jawaban" => 1
            ],
            [
                "pertanyaan" => "Jika kamu berada di luar rumah dan terjadi banjir, tempat mana yang paling aman untuk berlindung?",
                "opsi" => [
                    "Tempat tertutup dan sulit ditemukan",
                    "Tempat tinggi yang tidak tergenang",
                    "Tengah jalan raya",
                    "Bawah pohon besar"
                ],
                "jawaban" => 1
            ],
            [
                "pertanyaan" => "Banjir dapat menghanyutkan berbagai benda dan menyebabkan kerugian material . Apa yang harus dilakukan saat banjir sedang terjadi?",
                "opsi" => [
                    "Menyalakan televisi untuk menonton berita",
                    "Berteriak panik meminta tolong",
                    "Mengangkat barang berharga ke tempat aman",
                    "Membuka semua pintu untuk mengalirkan air"
                ],
                "jawaban" => 2
            ],
            [
                "pertanyaan" => "Saat banjir datang dan air terus naik, apa yang paling penting dibawa saat mengungsi?",
                "opsi" => [
                    "Semua mainan",
                    "Bantal dan karpet",
                    "Dokumen penting dan obat-obatan",
                    "Ember dan gayungr"
                ],
                "jawaban" => 2
            ],
            [
                "pertanyaan" => "Setelah banjir surut, hal pertama yang harus dilakukan di rumah adalah...",
                "opsi" => [
                    "Makan bersama keluarga",
                    "Membersihkan rumah dari lumpur dan kotoran",
                    "Langsung tidur dan beristirahat",
                    "Membuka semua kran air"
                ],
                "jawaban" => 1
            ],
            [
                "pertanyaan" => "Mengapa penting membersihkan rumah dan barang setelah banjir?",
                "opsi" => [
                    "Agar terhindar dari penyakit yang terbawa banjir",
                    "Supaya rumah kelihatan baru",
                    "Agar tidak kotor",
                    "Supaya air bisa cepat masuk lagi"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Apa yang bisa dilakukan warga agar banjir yang sudah terjadi tidak terulang lagi?",
                "opsi" => [
                    "Menanam pohon, membuat biopori, dan tidak buang sampah sembarangan",
                    "Menyimpan air banjir untuk keperluan sehari-hari",
                    "Membeton seluruh aliran sungai",
                    "Membiarkan air tetap menggenang"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Saat rumah terkena banjir, banyak barang terendam. Apa yang harus dilakukan sebelum menggunakan alat elektronik lagi?",
                "opsi" => [
                    "Diperiksa dan dikeringkan dulu agar tidak terjadi konslet",
                    "Langsung digunakan setelah dicuci",
                    "Dijemur tanpa dicek",
                    "Membersihkannya dengan sabun"
                ],
                "jawaban" => 0
            ],
            [
                "pertanyaan" => "Salah satu dampak pasca banjir adalah banyaknya nyamuk dan penyakit. Apa yang bisa dilakukan untuk meminimalisir dampak tersebut?",
                "opsi" => [
                    "Membuat kolam air hujan",
                    "Membiarkan genangan tetap ada",
                    "Menabur bubuk abate dan membersihkan genangan",
                    "Menyimpan air dalam ember terbuka"
                ],
                "jawaban" => 2
            ],
        ];

        return view('latihan.index', compact('soal'));
    }
}
