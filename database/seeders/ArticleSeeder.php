<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => '7 Tips Menjaga Keamanan Rumah agar Tetap Nyaman dan Aman',
                'category' => 'Tips Keamanan',
                'author' => 'Tim Solusi Koneksi Anda',
                'image' => 'images/articles/keamanan-rumah.svg',
                'excerpt' => 'Keamanan rumah bukan soal perangkat mahal, melainkan kebiasaan kecil yang konsisten. Simak tujuh tips praktis berikut ini.',
                'content' => '<p>Rumah adalah tempat paling berharga bagi setiap keluarga. Sayangnya, banyak pemilik rumah baru menyadari pentingnya keamanan setelah terjadi kejadian yang tidak diinginkan. Padahal, sebagian besar upaya menjaga keamanan rumah bisa dimulai dari kebiasaan sederhana dan biaya yang terjangkau.</p><h2>1. Perkuat pintu dan jendela utama</h2><p>Pintu utama dan jendela lantai satu adalah jalur paling sering digunakan penyusup. Pastikan engsel pintu tidak mudah dicungkil, pasang kunci ganda, dan gunakan terali besi pada jendela yang menghadap area sepi.</p><h2>2. Pasang penerangan di area gelap</h2><p>Penyusup cenderung menghindari tempat yang terang. Pasang lampu sensor gerak di carport, halaman belakang, dan pintu samping agar area gelap otomatis menyala saat ada orang lewat.</p><h2>3. Gunakan kamera CCTV pada titik strategis</h2><p>Cukup dua sampai empat kamera yang dipasang pada titik penting seperti pintu utama, area parkir, dan pintu belakang. Yang terpenting bukan jumlahnya, melainkan sudut pandang yang tidak memiliki blind spot.</p><h2>4. Simpan barang berharga di tempat tersembunyi</h2><p>Uang tunai, perhiasan, dan dokumen penting sebaiknya tidak disimpan di kamar tidur atau lemari biasa. Gunakan brankas kecil yang dipasang di lokasi yang tidak mudah ditebak.</p><h2>5. Kenali tetangga dan jaga lingkungan</h2><p>Keamanan lingkungan yang saling mengenal jauh lebih efektif daripada pagar setinggi apa pun. Aktifkan sistem ronda atau grup koordinasi warga bila tersedia.</p><h2>6. Atur jadwal lampu saat bepergian</h2><p>Saat berlibur, rumah yang gelap dan sepi sepanjang hari menjadi sasaran empuk. Gunakan lampu otomatis atau timer agar ada aktivitas cahaya di malam hari.</p><h2>7. Akses rekaman CCTV dari HP</h2><p>Terakhir, pastikan sistem CCTV Anda terhubung ke internet sehingga rekaman bisa dipantau dari mana saja. Dengan begitu, Anda tetap bisa memantau rumah saat sedang bepergian atau berada di kantor.</p><p>Keamanan rumah adalah investasi jangka panjang. Mulai dari langkah kecil hari ini, dan konsisten melakukannya setiap saat.</p>',
                'published_at' => now()->subDays(4)->toDateString(),
                'is_published' => true,
                'views' => 152,
            ],
            [
                'title' => 'Manfaat Pemasangan CCTV untuk Rumah dan Bisnis Anda',
                'category' => 'Edukasi',
                'author' => 'Tim Solusi Koneksi Anda',
                'image' => 'images/articles/manfaat-cctv.svg',
                'excerpt' => 'CCTV bukan sekadar kamera perekam. Ada banyak manfaat langsung yang dirasakan pemilik rumah dan pemilik usaha setelah memasangnya.',
                'content' => '<p>Banyak orang menganggap CCTV hanya berguna ketika sudah terjadi kehilangan. Padahal, manfaat pemasangan kamera pengawas jauh lebih luas dari itu dan bisa dirasakan setiap hari.</p><h2>Pencegahan tindakan kriminal</h2><p>Keberadaan kamera yang terlihat jelas sudah cukup membuat pelaku berpikir ulang. Rumah atau toko yang terpasang kamera tampak lebih waspada sehingga risiko pencurian menurun drastis.</p><h2>Bukti yang sah saat terjadi kejadian</h2><p>Rekaman berkualitas tinggi dapat digunakan sebagai barang bukti untuk laporan kepolisian. Wajah, kendaraan, dan waktu kejadian yang terekam mempercepat proses penyelidikan.</p><h2>Memantau aktivitas dari jarak jauh</h2><p>Dengan konfigurasi online, Anda bisa melihat kondisi rumah, toko, atau kantor langsung dari HP. Orang tua dapat memantau anak, pemilik usaha dapat memastikan operasional berjalan normal.</p><h2>Meningkatkan produktivitas karyawan</h2><p>Di lingkungan kantor dan pabrik, CCTV membantu pengawasan alur kerja, area produksi, dan kepatuhan prosedur tanpa perlu berada di lokasi setiap saat.</p><h2>Menurunkan biaya pengawasan</h2><p>Membiayai penjaga keamanan 24 jam selama bertahun-tahun jauh lebih mahal dibanding sekali investasi sistem CCTV yang bisa bertahan 3-5 tahun dengan maintenance berkala.</p><p>Dengan kata lain, CCTV adalah investasi yang menghasilkan rasa tenang, bukan sekadar pengeluaran tambahan.</p>',
                'published_at' => now()->subDays(9)->toDateString(),
                'is_published' => true,
                'views' => 118,
            ],
            [
                'title' => 'Cara Memilih CCTV yang Tepat Sesuai Kebutuhan Lokasi',
                'category' => 'Panduan',
                'author' => 'Tim Solusi Koneksi Anda',
                'image' => 'images/articles/pilih-cctv.svg',
                'excerpt' => 'Bingung memilih di antara puluhan tipe kamera? Tentukan dulu lokasi, tujuan, dan anggaran Anda dengan panduan singkat berikut.',
                'content' => '<p>Memilih CCTV tidak boleh asal murah. Kamera yang tidak sesuai lokasi akan menghasilkan gambar tidak jelas dan akhirnya dibeli ulang. Berikut cara menentukan pilihan yang tepat.</p><h2>Tentukan lokasi pemasangan</h2><ul><li><strong>Indoor</strong> - gunakan tipe dome yang compact dan tidak mencolok.</li><li><strong>Outdoor</strong> - gunakan tipe bullet dengan housing IP67 tahan hujan.</li><li><strong>Area luas</strong> - pilih lensa dengan jarak pandang dan infrared panjang.</li><li><strong>Tanpa kabel</strong> - gunakan kamera wireless yang terhubung ke Wi-Fi.</li></ul><h2>Tentukan resolusi yang dibutuhkan</h2><p>Untuk pemantauan umum, 2MP sudah cukup. Namun bila Anda membutuhkan detail wajah atau plat nomor kendaraan, gunakan minimal 4MP hingga 5MP.</p><h2>Perhatikan kapasitas penyimpanan</h2><p>Semakin tinggi resolusi dan jumlah kamera, semakin besar kebutuhan hard disk. Konsultasikan kebutuhan rekaman 30 hari ke teknisi kami agar kapasitasnya tepat.</p><h2>Pilih merek yang bergaransi resmi</h2><p>Merek seperti Hikvision, Dahua, EZVIZ, dan TP-Link memiliki jaringan servis yang jelas. Hindari produk tanpa garansi karena sulit dicari suku cadangnya.</p><h2>Konsultasikan sebelum membeli</h2><p>Tim kami menyediakan survei lokasi gratis untuk menentukan jumlah kamera, tipe, dan perkiraan biaya. Dengan begitu Anda tidak membeli perangkat berlebihan maupun kurang.</p>',
                'published_at' => now()->subDays(15)->toDateString(),
                'is_published' => true,
                'views' => 96,
            ],
            [
                'title' => 'Tips Merawat Kamera CCTV agar Awet dan Tidak Cepat Rusak',
                'category' => 'Tips Keamanan',
                'author' => 'Tim Solusi Koneksi Anda',
                'image' => 'images/articles/merawat-cctv.svg',
                'excerpt' => 'Perawatan rutin yang sederhana mampu memperpanjang usia kamera CCTV Anda hingga bertahun-tahun. Simak langkah-langkahnya.',
                'content' => '<p>Kamera CCTV bekerja terus menerus 24 jam sehari, 7 hari seminggu. Tanpa perawatan, kualitas gambar perlahan menurun dan perangkat bisa rusak lebih cepat. Berikut langkah perawatan rutin yang bisa dilakukan sendiri.</p><h2>1. Bersihkan lensa secara berkala</h2><p>Debu dan kotoran menempel pada lensa sehingga gambar terlihat buram. Lap lensa menggunakan kain microfiber lembut setiap dua minggu sekali. Hindari kertas tisu yang dapat meninggalkan goresan.</p><h2>2. Periksa kabel dan konektor</h2><p>Kabel yang lembap, tergores, atau longgar menjadi penyebab gangguan gambar paling umum. Pastikan seluruh konektor terpasang rapat dan jalur kabel tidak tertekan benda berat.</p><h2>3. Cek rekaman setiap minggu</h2><p>Jangan tunggu ada kejadian baru mengecek rekaman. Pastikan kamera masih merekam, waktu sistem sudah benar, dan tidak ada kamera yang mendadak offline.</p><h2>4. Perhatikan daya dan power supply</h2><p>Gunakan stabilizer atau UPS untuk menjaga daya tetap stabil. Listrik yang naik turun memperpendek usia DVR dan kamera.</p><h2>5. Ganti hard disk sebelum benar-benar mati</h2><p>Hard disk CCTV memiliki siklus hidup sekitar 3-5 tahun. Ganti secara berkala agar rekaman penting tidak hilang di saat-saat krusial.</p><h2>Jadwalkan maintenance profesional</h2><p>Selain perawatan mandiri, agendakan pemeriksaan oleh teknisi setiap 6 bulan. Kami menyediakan paket maintenance dengan biaya terjangkau untuk rumah maupun bisnis.</p>',
                'published_at' => now()->subDays(21)->toDateString(),
                'is_published' => true,
                'views' => 87,
            ],
            [
                'title' => 'Teknologi CCTV Terbaru yang Perlu Anda Ketahui',
                'category' => 'Teknologi',
                'author' => 'Tim Solusi Koneksi Anda',
                'image' => 'images/articles/teknologi-cctv.svg',
                'excerpt' => 'Dari kamera berwarna penuh di malam hari hingga analitik berbasis AI, inilah perkembangan teknologi pengawasan terbaru.',
                'content' => '<p>Dunia kamera pengawas berkembang sangat cepat. Fitur yang dulu hanya dimiliki sistem mahal kini sudah tersedia untuk rumah dan usaha kecil. Berikut beberapa teknologi terbaru yang perlu Anda ketahui.</p><h2>ColorVu dan Full Color Night Vision</h2><p>Kamera generasi terbaru mampu merekam warna asli bahkan dalam kondisi gelap total berkat lampu supplement internal. Detail wajah dan warna kendaraan jauh lebih mudah dikenali dibanding rekaman hitam putih.</p><h2>AI Motion Detection</h2><p>Deteksi gerakan kini bisa membedakan manusia, kendaraan, dan hewan. Notifikasi yang masuk ke HP jadi jauh lebih relevan dan mengurangi gangguan palsu.</p><h2>Kamera solar tanpa listrik</h2><p>Untuk area yang sulit dijangkau kabel, kamera bertenaga surya dengan koneksi 4G menjadi solusi praktis, misalnya di kebun, tambak, atau kawasan industri terluar.</p><h2>Integrasi rumah pintar</h2><p>Kamera kini bisa dihubungkan dengan pintu otomatis, lampu, dan alarm. Ketika gerbang terbuka, sistem merekam dan memberi notifikasi sekaligus.</p><h2>Penyimpanan cloud</h2><p>Rekaman dapat disimpan di cloud sehingga tetap aman meskipun recorder atau kamera dicuri. Cocok sebagai lapisan pengamanan tambahan.</p><p>Tertarik meng-upgrade sistem lama Anda? Hubungi kami untuk konsultasi kebutuhan dan perkiraan biaya tanpa biaya survei.</p>',
                'published_at' => now()->subDays(27)->toDateString(),
                'is_published' => true,
                'views' => 74,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['slug' => \Illuminate\Support\Str::slug($article['title'])], $article);
        }
    }
}
