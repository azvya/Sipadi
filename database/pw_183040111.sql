-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jun 2021 pada 08.46
-- Versi server: 5.7.34
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_183040111`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pengarang` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `isbn` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_buku` char(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_pengarang`, `tahun_terbit`, `isbn`, `foto_buku`, `deskripsi`) VALUES
('BK1', 'Garis Waktu', 'PA1', 2016, '9789797945251', 'ac85b26e.jpg', 'Pada sebuah garis waktu yang merangkak maju, akan ada saatnya kau bertemu dengan satu orang yang mengubah hidupmu untuk selamanya. Kemudian, satu orang tersebut akan menjadi bagian terbesar dalam agendamu. Dan hatimu takkan memberikan pilihan apa pun kecuali jatuh cinta, biarpun logika terus berkata bahwa risiko dari jatuh cinta adalah terjerembab di dasar nestapa.\r\n\r\nPada sebuah garis waktu yang merangkak maju, akan ada saatnya kau terluka dan kehilangan pegangan. Yang paling menggiurkan setelahnya adalah berbaring, menikmati kepedihan dan membiarkan garis waktu menyeretmu yang niat-tak niat menjalani hidup. Lantas, mau sampai kapan? Sampai segalanya terlambat untuk dibenahi? Sampai cahayamu benar-benar padam? Sadarkah bahwa Tuhan mengujimu karena Dia percaya dirimu lebih kuat dari yang kau duga? Bangkit. Hidup takkan menunggu.\r\n\r\nPada sebuah garis waktu yang merangkak maju, akan ada saatnya kau ingin melompat mundur pada titik-titik kenangan tertentu. Namun tiada guna, garis waktu takkan memperlambat gerakkannya barang sedetik pun. Ia hanya mampu maju, dan terus maju. Dan mau tidak mau, kita harus ikut terseret dalam alurnya. Maka, ikhlaskan saja kalau begitu. Karena sesungguhnya, yang lebih menyakitkan dari melepaskan sesuatu adalah berpegangan pada sesuatu yang menyakitimu secara perlahan.'),
('BK10', 'Sang Pemimpi', 'PA10', 2006, '9789793062921', '7debc68d.jpg', 'Sang Pemimpi adalah sebuah lantunan kisah kehidupan yang memesona dan akan membuat Anda percaya akan tenaga cinta, percaya pada kekuatan mimpi dan pengorbanan, lebih dari itu, akan membuat Anda percaya kepada Tuhan. Andrea akan membawa Anda berkelana menerobos sudut-sudut pemikiran di mana Anda akan menemukan pandangan yang berbeda tentang nasib, tantangan intelektualitas, dan kegembiraan yang meluap-luap, sekaligus kesedihan yang mengharu biru. \r\n\r\nTampak komikal pada awalnya, selayaknya kenakalan remaja biasa, tapi kemudian tanpa Anda sadari, kisah dan karakter-karakter dalam buku ini lambat laun menguasai Anda. Karena potret-potret kecil yang menawan akan menghentakkan Anda pada rasa humor yang halus namun memiliki efek filosofis yang meresonansi. Karena arti perjuangan hidup dalam kemiskinan yang membelit dan cita-cita yang gagah berani dalam kisah dua orang tokoh utama buku ini: Arai dan Ikal akan menuntun Anda dengan semacam keanggunan dan daya tarik agar Anda dapat melihat ke dalam diri sendiri dengan penuh pengharapan, agar Anda menolak semua keputusasaan dan ketakberdayaan Anda sendiri. \r\n\r\n“Kita tak kan pernah mendahului nasib!” teriak Arai.\r\n“Kita akan sekolah ke Prancis, menjelajahi Eropa sampai ke Afrika! Apa pun yang terjadi!”'),
('BK11', 'Api Sejarah Jilid I', 'PA6', 2009, '9786028458245', '0d5e7d3e.jpg', 'Sejarah memang sarat dengan kepentingan. Itu sebabnya, kesadaran sejarah dikalangan umat islam sangat rendah. Padahal, dahulu kita memiliki sejarawan-sejarawan unggul: Thabari, Mas\'udi, Ibnu Hisyam, Ibnu al-Atsir, Ibnu Khaldun, dan masih banyak lagi. Karena itu, buku yang ditulis Ahad Mansur Suryanegara ini sangat berharga untuk menjernihkan sejarah. Semoga banyak lagi sejarahwan islam yang memiliki kepedulian seperti beliau.\r\n\r\nKita perlu membaca sejarah dan belajar dari sejarah. Buku API SEJARAH karya Ahmad Mansyur Suryanegara sarat dengan informasi dan keteladanan dari para pejuang Muslim yang terdahulu. Buku ini baik sekali untuk dibaca dan sejarah para pejuang didalamnya sangat bermanfaat untuk diteladani oleh mereka yang masih memiliki &quot;API&quot; perjuangan.'),
('BK12', 'Harry Potter and the Sorcerer\'s Stone', 'PA8', 1997, '9780439554930', '8d82bfb3.jpg', 'Kehidupan Harry Potter sengsara. Orang tuanya meninggal dan dia terjebak dengan kerabatnya yang tidak berperasaan, yang memaksanya untuk hidup di sebuah lemari kecil di bawah tangga. Tetapi kekayaannya berubah ketika dia menerima surat yang mengatakan yang sebenarnya tentang dirinya: dia penyihir. Seorang pengunjung misterius menyelamatkannya dari kerabatnya dan membawanya ke rumah barunya, Sekolah Sihir dan Penyihir Hogwarts.\r\n\r\nSetelah menghabiskan seumur hidup kekuatan gaibnya, Harry akhirnya merasa seperti anak normal. Tetapi bahkan di dalam komunitas Penyihir, dia istimewa. Dia adalah bocah yang hidup: satu-satunya orang yang pernah selamat dari kutukan pembunuhan yang ditimbulkan oleh Lord Voldemort yang jahat, yang meluncurkan pengambilalihan brutal dari dunia Penyihir, hanya untuk menghilang setelah gagal membunuh Harry.\r\n\r\nMeskipun tahun pertama Harry di Hogwarts adalah yang terbaik dalam hidupnya, tidak semuanya sempurna. Ada benda rahasia berbahaya yang tersembunyi di dalam dinding kastil, dan Harry percaya itu adalah tanggung jawabnya untuk mencegahnya jatuh ke tangan jahat. Tetapi melakukan hal itu akan membawanya ke kontak dengan pasukan yang lebih menakutkan daripada yang pernah dia bayangkan.\r\n\r\nPenuh dengan karakter simpatik, situasi imajinatif liar, dan detail menarik yang tak terhitung jumlahnya, angsuran pertama dalam seri ini merakit dunia magis yang tak terlupakan dan mengatur panggung untuk banyak petualangan berisiko tinggi yang akan datang.'),
('BK13', 'The Cuckoo\'s Calling', 'PA11', 2013, '9786020300627', 'f0710088.jpg', 'The Cuckoo\'s Calling adalah novel fiksi kejahatan tahun 2013 oleh J. K. Rowling, yang diterbitkan dengan nama samaran Robert Galbraith.\r\n\r\nSebuah misteri cemerlang dalam nada klasik: Detective Cormoran Strike menyelidiki bunuh diri seorang supermodel.\r\n\r\nSetelah kehilangan kakinya karena ranjau darat di Afghanistan, Cormoran Strike nyaris tidak berhasil sebagai penyelidik swasta. Mogok hanya untuk satu klien, dan kreditor menelepon. Dia juga baru saja putus dengan pacarnya yang sudah lama dan tinggal di kantornya.\r\n\r\nKemudian John Bristow berjalan melewati pintunya dengan cerita yang luar biasa: Kakaknya, supermodel legendaris Lula Landry, yang dikenal teman-temannya sebagai Cuckoo, terkenal jatuh ke kematiannya beberapa bulan sebelumnya. Polisi memutuskan itu bunuh diri, tetapi John menolak untuk percaya itu. Case ini menjerumuskan Strike ke dunia kecantikan multimiliuner, pacar bintang rock, dan desainer putus asa, dan memperkenalkannya pada setiap ragam kesenangan, bujukan, rayuan, dan khayalan yang dikenal manusia.\r\n\r\nAnda mungkin berpikir Anda mengenal detektif, tetapi Anda belum pernah bertemu yang seperti Strike. Anda mungkin berpikir Anda tahu tentang orang kaya dan terkenal, tetapi Anda belum pernah melihat mereka dalam penyelidikan seperti ini.'),
('BK14', 'The Lord of The Rings I', 'PA12', 1954, '9780618346257', '11fa4dc6.jpg', 'Satu Cincin untuk menguasai mereka semua, Satu Cincin untuk menemukan mereka, Satu Cincin untuk membawa mereka semua dan dalam kegelapan mengikat mereka\r\n\r\nPada zaman kuno Cincin Kekuasaan dibuat oleh Elf-pandai besi, dan Sauron, Tuan Kegelapan, menempa Cincin Satu, mengisinya dengan kekuatannya sendiri sehingga ia bisa memerintah semua yang lain. Tetapi Satu Cincin diambil darinya, dan meskipun dia mencarinya di seluruh Dunia Tengah, cincin itu tetap hilang baginya. Setelah bertahun-tahun jatuh ke tangan Bilbo Baggins, seperti diceritakan dalam The Hobbit.\r\n\r\nDi sebuah desa yang sepi di Shire, Frodo Baggins muda mendapati dirinya dihadapkan pada tugas yang sangat berat, ketika sepupunya yang lebih tua, Bilbo, mempercayakan Cincin kepada perawatannya. Frodo harus meninggalkan rumahnya dan melakukan perjalanan berbahaya melintasi Middle-earth ke Crack of Doom, di sana untuk menghancurkan Cincin dan menggagalkan Pangeran Kegelapan untuk tujuan jahatnya.'),
('BK15', 'The Hunger Games', 'PA13', 2008, '9780439023481', 'd91b2960.jpg', 'Bisakah Anda bertahan hidup sendiri, di alam liar, dengan semua orang keluar untuk memastikan Anda tidak hidup untuk melihat pagi hari?\r\n\r\nDi reruntuhan tempat yang dulu dikenal sebagai Amerika Utara terletak bangsa Panem, sebuah Capitol yang bersinar dikelilingi oleh dua belas daerah terpencil. Capitol keras dan kejam dan menjaga distrik-distrik tetap sejalan dengan memaksa mereka semua mengirim satu anak laki-laki dan perempuan berusia antara dua belas dan delapan belas tahun untuk berpartisipasi dalam Hunger Games tahunan, pertarungan sampai mati di siaran langsung TV. Katniss Everdeen yang berusia enam belas tahun, yang tinggal sendirian dengan ibu dan adik perempuannya, menganggapnya sebagai hukuman mati ketika dia dipaksa untuk mewakili distriknya di Olimpiade. Tapi Katniss sudah hampir mati sebelumnya - dan bertahan hidup, baginya, adalah sifat kedua. Tanpa benar-benar berarti, dia menjadi pesaing. Tetapi jika dia ingin menang, dia harus mulai membuat pilihan yang mempertimbangkan kelangsungan hidup melawan kemanusiaan dan hidup melawan cinta.\r\n\r\nPenulis terlaris New York Times Suzanne Collins memberikan ketegangan dan filosofi bagian yang sama, petualangan dan romansa, dalam novel yang membakar set di masa depan dengan paralel paralel untuk saat ini.\r\n(flap depan)'),
('BK16', 'Catching Fire', 'PA13', 2009, '9780439023498', 'c3b03ba5.jpg', 'Bunga api menyala.\r\nApi menyebar.\r\nDan Capitol ingin membalas dendam.\r\n\r\nMelawan segala rintangan, Katniss telah memenangkan Hunger Games. Dia dan rekan-rekannya di Distrik 12, penghormatan Peeta Mellark secara ajaib masih hidup. Katniss harus lega, bahkan bahagia. Bagaimanapun, dia telah kembali ke keluarganya dan teman lamanya, Gale. Namun tidak ada yang diinginkan Katniss. Gale menggendongnya di kejauhan. Peeta telah memunggunginya sepenuhnya. Dan ada bisikan-bisikan tentang pemberontakan terhadap Capitol - pemberontakan yang mungkin dibuat oleh Katniss dan Peeta.\r\n\r\nSangat mengejutkannya, Katniss telah memicu keresahan yang dia khawatirkan tidak bisa berhenti. Dan yang lebih membuatnya takut adalah dia tidak sepenuhnya yakin dia harus mencoba. Ketika waktu semakin dekat bagi Katniss dan Peeta untuk mengunjungi distrik-distrik di Tur Kemenangan Capitol yang kejam, taruhannya lebih tinggi dari sebelumnya. Jika mereka tidak dapat membuktikan, tanpa bayangan keraguan, bahwa mereka kehilangan cinta mereka satu sama lain, konsekuensinya akan mengerikan.\r\n\r\nDalam Catching Fire, novel kedua dalam trilogi Hunger Games, Suzanne Collins melanjutkan kisah Katniss Everdeen, mengujinya lebih dari sebelumnya ... dan mengejutkan pembaca di setiap kesempatan.'),
('BK17', 'Mockingjay', 'PA13', 2010, '9780439023511', '5747ec4d.jpg', 'Nama saya Katniss Everdeen.\r\nKenapa aku tidak mati?\r\nSaya harus mati.\r\n\r\nKatniss Everdeen, gadis yang terbakar, telah selamat, meskipun rumahnya telah dihancurkan. Gale telah lolos. Keluarga Katniss aman. Peeta telah ditangkap oleh Capitol. Distrik 13 benar-benar ada. Ada pemberontak. Ada pemimpin baru. Sebuah revolusi sedang berlangsung.\r\n\r\nDengan desain itulah Katniss diselamatkan dari arena di Quarter Quell yang kejam dan menghantui, dan dengan desain itulah dia telah lama menjadi bagian dari revolusi tanpa menyadarinya. Distrik 13 telah keluar dari bayang-bayang dan berencana untuk menggulingkan Capitol. Semua orang, tampaknya, memiliki andil dalam rencana yang disusun dengan cermat - kecuali Katniss.\r\n\r\nKeberhasilan pemberontakan bergantung pada kesediaan Katniss untuk menjadi bidak, untuk menerima tanggung jawab atas kehidupan yang tak terhitung jumlahnya, dan untuk mengubah arah masa depan Panem. Untuk melakukan ini, dia harus mengesampingkan perasaan marah dan tidak percaya. Dia harus menjadi Mockingjay para pemberontak - tidak peduli berapapun biayanya.'),
('BK18', 'Sudah Benarkah Shalatku?', 'PA2', 2008, '9789793838113', '974da521.jpg', 'Perintah shalat berbeda dengan perintah puasa, zakat, haji, serta ibadah-ibadah lainnya. Perintah ibadah-ibadah tersebut disampaikan Allah kepada Rasul-Nya melalui perantara Malaikat Jibril, sedangkan perintah shalat disampaikan langsung oleh Allah Swt. kepada Rasulullah Saw. dalam peristiwa isra dan mi\'raj.\r\n\r\nPerintah shalat berbeda dengan perintah puasa, zakat, haji, serta ibadah-ibadah lainnya. Perintah ibadah-ibadah tersebut disampaikan Allah kepada Rasul-Nya melalui perantara Malaikat Jibril, sedangkan perintah shalat disampaikan langsung oleh Allah Swt. kepada Rasulullah Saw. dalam peristiwa isra dan miraj.\r\n\r\nMahasuci Allah yang telah memperjalankan hamba-Nya (Muhammad) pada malam hari dari Masjidil haram ke Masjidil Aqsa yang telah Kami berkahi sekelilingnya agar Kami perlihatkan sebagian tanda-tanda kebesaran Kami kepadanya. Sesungguhnya, Allah MahaMendengar, Maha Melihat (Q.S. Al-Isra [17]: 1)\r\n\r\nKeputusan Allah Swt. menyampaikan perintah shalat tanpa perantara menunjukkan keistimewaan dan keutamaan ibadah ini. Perhatikan keterangan berikut. dan laksanakanlah salat. Sesungguhnya, salat itu mencegah dari perbuatan keji dan mungkar. Ketahuilah, salat itu lebih besar keutamaannya daripada ibadah lain. Allah mengetahui apa yang kamu kerjakan. (Q.S. Al-Ankabut [29]: 45). Rasulullah Saw. bersabda, Pokok segala sesuatu adalah Islam, tiangnya adalah shalat, dan puncaknya adalah jihad di jalan Allah (H.R. Muslim). Jarak antara seseorang dan kekafirannya adalah meninggalkan shalat. (H.R. Muslim)\r\n\r\nPosisi shalat dalam peta keimanan seorang Muslim sangatlah strategis. Maka, alangkah disayangkan apabila shalat yang kita laksanakan belum sesuai dengan tata cara yang dicontohkan Rasulullah Saw. Padahal beliau berwasiat, Shalatlah kalian sebagaimana kalian melihatku shalat (H.R. Bukhari).\r\n\r\nPertanyaannya, Sudah Benarkah Shalatku? Sudah sesuaikah shalatku dengan yang dicontohkan Rasulullah Saw.? Untuk itulah, buku ini hadir sebagai jawaban sebagian besar masyarakat yang ingin mengetahui tata cara shalat Rasulullah Saw'),
('BK19', 'Radiance', 'PA5', 2010, '9789794336748', 'a5af371b.jpg', 'Riley telah menyeberangi jembatan menuju akhirat — sebuah tempat bernama Di sini, di mana waktu selalu Sekarang. Dia telah mengambil kehidupan di mana dia tinggalkan ketika dia masih hidup, tinggal bersama orang tua dan anjingnya di rumah yang bagus di lingkungan yang menyenangkan. Ketika dia dipanggil di hadapan Dewan, dia mengetahui bahwa akhirat bukan hanya waktu luang. Dia ditugaskan pekerjaan, Penangkap Jiwa, dan seorang guru, Bodhi, seorang bocah lelaki yang mungkin lucu, yang tampaknya menyembunyikan sesuatu. Mereka kembali ke bumi bersama untuk tugas pertama Riley, seorang Radiant Boy yang telah menghantui sebuah kastil di Inggris selama berabad-abad. Banyak Penangkap Jiwa telah mencoba membuatnya menyeberang jembatan dan gagal. Tapi semua itu sebelum dia bertemu Riley. . .\r\n\r\nRadiance adalah buku pertama dalam seri Riley Bloom dari penulis buku terlaris Alyson Noël.'),
('BK2', 'Konspirasi Alam Semesta', 'PA1', 2015, '9789797945350', '34838652.jpg', 'Seperti apakah warna cinta? Apakah merah muda mewakili rekahannya, ataukah kelabu mewakili pecahannya?'),
('BK20', 'Shimmer', 'PA5', 2011, '9789794336755', '5b4fa0d3.jpg', 'Setelah menyelesaikan masalah Radiant Boy, Riley, Buttercup, dan Bodhi menikmati liburan yang memang layak. Ketika Riley menemukan seekor anjing hitam ganas, bertentangan dengan nasihat Bodhi, dia memutuskan untuk menyeberanginya. Sambil mengikuti anjing itu, dia bertemu dengan hantu muda bernama Rebecca. Terlepas dari penampilan Rebecca yang manis, Riley segera mengetahui bahwa dia sama sekali tidak seperti yang terlihat. Sebagai putri dari mantan pemilik perkebunan, dia sangat marah tentang dibunuh selama pemberontakan budak pada tahun 1733. Terperangkap dalam kemarahannya sendiri, Rebecca menyerang dengan menjaga para hantu yang mati bersama dengan dia yang terperangkap dalam ingatan terburuk mereka. Bisakah Riley membantu Rebecca memaafkan dan melupakan tanpa kehilangan dirinya pada kenangan buruknya sendiri?'),
('BK21', 'Dreamland', 'PA5', 2011, '9789794337769', '8a9716fe.jpg', 'Aku menjerit-jerit … meronta habis-habisan. Aku terkubur hidup-hidup.\r\n\r\nMimpi buruk terus berkelanjutan. Proyektor terus berputar. Tiap adegan baru menjerumuskanku dalam situasi yang malah lebih buruk daripada sebelumnya.\r\n\r\nAku terjebak. Terperangkap dalam penjara kekal tak kasat mata.\r\n\r\nSatu kesalahan dan pelanggaran, membuat Riley harus rela dihukum oleh para Dewan. Dia diliburkan dari tugasnya mengejar para arwah. Dan tanpa pekerjaannya, Riley amat kesepian. Temannya satu-satunya, Bodhi, sibuk mengincar para gadis idamannya, sedangkan Buttercup anjing peliharaannya, tidak banyak mengobati kesepiannya.\r\n\r\n\r\nRiley pun memutuskan untuk mendatangi Dunia Mimpi dan mengirimi kakaknya, Ever, beberapa pesan. Sayangnya, dia justru harus berurusan dengan, Satchel, hantu anak lelaki yang selama ini mendiami sebuah studio mimpi yang sudah sangat tua. Selama puluhan tahun, Satchel telah mengirimi banyak mimpi buruk ke seluruh orang di dunia. Dan kini, dia mengancam akan mengirimi Ever mimpi buruk. Demi menyelamatkan kakaknya, Riley pun harus bertarung dengan si bocah penyebar mimpi dan menghadapi hal-hal yang paling ditakutinya.'),
('BK22', 'Whisper', 'PA5', 2012, '9789794337776', '244ec391.jpg', 'Kali ini, Riley mungkin benar-benar telah menggigit lebih dari yang dia siapkan. Setelah praktis meminta Dewan untuk Penangkapan Jiwa yang lebih menantang, ia ditugaskan sebagai gladiator Romawi yang sebenarnya — Theocoles, Pilar Doom. Bagaimana Riley, seorang bocah kurus berumur dua belas tahun, bisa menghubunginya? Kemudian dia bertemu dengan Messalina yang cantik, yang meyakinkannya bahwa satu-satunya kesempatan adalah menjadi bagian dari dunia ini. Untuk mencapai ini, Messalina membantu Riley melalui perubahan dramatis, mistis, mengubahnya menjadi remaja cantik dan dewasa seperti yang selalu diinginkannya. Akhirnya, Riley dapat mengalami pacar pertamanya dan ciuman pertamanya. Dengan mimpi yang mempesona ini, akankah dia ingin pergi?'),
('BK23', 'Api Sejarah Jilid II', 'PA6', 2010, '9786028458269', '75d7acd2.jpg', 'Api Sejarah 2 merupakan jilid ke-2 dari buku bestseller Api sejarah yang mengungkap semua fakta yang tersembunyi dan disembungikan tentang mahakrya Ulama dan Santri dalam menegakkan NKRI.\r\n\r\nBuku yang sungguh berani ini, pernah dinyatakan hilang dan terancam tidak jadi terbit ketika draft naskahnya &quot;dicuri&quot; oleh &quot;peminjam tanpa permisi&quot; saar seminar Api Sejarah di Gedung Juang\'45, Pemerintah Kotamadya Sukabumi.\r\n\r\nMelalui buku Api Sejarah ini, Ahmad Mansur Suryanegara membongkar upaya deislamisasi penulisan sejarah Indonesia yang sudah berlangsung lama, sekaligus menuntaskan rasa kepenasaran Anda akan kebenaran sejarah bangsa Indonesia.\r\n\r\n&quot;...berisi bukti keaslian riwayat sejarah dan tokoh-tokoh pahlawan nasional sejak zaman periode Jepang hingga zaman kemerdekaan, yang selama ini disinyalir banyak dipolitisir untuk kepentingan pihak tertentu.&quot; \r\nRepublika \r\n\r\n&quot;..buku ini mengajak kita untuk bersedia mengkoreksi dan meletakkan fakta-fakta yang belum terungkap secara proporsional.&quot; \r\nSeputar Indonesia \r\n\r\n&quot;..kehadiran buku ini dapat menjadi pencerahan bagi masyarakat bahwa Islam berperan penting dalam sejarah kemerdekaan dan pergerakan nasional Indonesia&quot; \r\nwww.eramuslim.com \r\n\r\n&quot;Sepak terjangnya dalam mengamati sejarah perjuangan umat Islam di Indonesia menemukan satu kesimpulan: bahwasanya ulama dan santri, salah satu golongan Muslim yang aktif memperjuangkan kemerdekaan Indonesia, memang benar-benar terlupakan dari sejarah.&quot; \r\nwww.annida-online.com'),
('BK24', 'Catatan Juang', 'PA1', 2017, '9789797945497', '7e2e6aa3.jpg', 'Seseorang yang akan menemani setiap langkahmu dengan satu kebaikan kecil setiap harinya.\r\n\r\nTertanda,\r\nJuang'),
('BK25', 'Komet', 'PA7', 2018, '9786020385938', 'df4c78e3.jpg', 'Setelah “musuh besar” kami lolos, dunia paralel dalam situasi genting. Hanya soal waktu, pertempuran besar akan terjadi. Bagaimana jika ribuan petarung yang bisa menghilang, mengeluarkan petir, termasuk teknologi maju lainnya muncul di permukaan Bumi? Tidak ada yang bisa membayangkan kekacauan yang akan terjadi. Situasi menjadi lebih rumit lagi saat Ali, pada detik terakhir, melompat ke portal menuju Klan Komet. Kami bertiga tersesat di klan asing untuk mencari pusaka paling hebat di dunia paralel. \r\n\r\nBuku ini berkisah tentang petualangan tiga sahabat. Raib bisa menghilang. Seli bisa mengeluarkan petir. Dan Ali bisa melakukan apa saja. Buku ini juga berkisah tentang persahabatan yang mengharukan, pengorbanan yang tulus, keberanian, dan selalu berbuat baik. Karena sejatinya, itulah kekuatan terbesar di dunia paralel.'),
('BK26', 'Matahari', 'PA7', 2016, '9786020332116', '63745995.jpg', 'Namanya Ali, 15 tahun, kelas X. Jika saja orangtuanya mengizinkan, seharusnya dia sudah duduk di tingkat akhir ilmu fisika program doktor di universitas ternama. Ali tidak menyukai sekolahnya, guru-gurunya, teman-teman sekelasnya. Semua membosankan baginya. Tapi sejak dia mengetahui ada yang aneh pada diriku dan Seli, teman sekelasnya, hidupnya yang membosankan berubah seru. Aku bisa menghilang, dan Seli bisa mengeluarkan petir. Ali sendiri punya rahasia kecil. Dia bisa berubah menjadi beruang raksasa. Kami bertiga kemudian bertualang ke tempat-tempat menakjubkan. Namanya Ali. Dia tahu sejak dulu dunia ini tidak sesederhana yang dilihat orang. Dan di atas segalanya, dia akhirnya tahu persahabatan adalah hal yang paling utama.'),
('BK27', 'Bulan', 'PA7', 2015, '9786020332949', '549c353d.jpg', 'Namanya Seli, usianya 15 tahun, kelas sepuluh, dan dia salah satu teman baikku. Dia sama seperti remaja yang lain. Menyukai hal yang sama, mendengarkan lagu-lagu yang sama, pergi ke gerai fast food, menonton serial drama, film, dan hal-hal yang disukai remaja.\r\n\r\nTetapi ada sebuah rahasia kecil Seli dan aku yang tidak pernah diketahui siapa pun. Sesuatu yang kami simpan sendiri sejak kecil. Aku bisa menghilang dan Seli bisa mengeluarkan petir.\r\n\r\nDengan kekuatan itu, kami bertualang menuju tempat-tempat yang menakjubkan.\r\n\r\nBuku kedua dari serial “BUMI”'),
('BK28', 'Bintang', 'PA7', 2017, '9786020351179', '3eb91b2b.jpg', 'Namaku Raib, aku bisa menghilang. Seli, teman semejaku, bisa mengeluarkan petir dari telapak tangannya. Dan Ali, si biang kerok sekaligus si genius, bisa berubah menjadi beruang raksasa. Kami bertiga kemudian bertualang ke dunia paralel yang tidak diketahui banyak orang, yang disebut Klan Bumi, Klan Bulan, Klan Matahari, dan Klan Bintang. Kami bertemu tokoh-tokoh hebat. Penduduk klan lain. \r\n\r\nIni petualangan keempat kami. Setelah tiga kali berhasil menyelamatkan dunia paralel dari kehancuran besar, kami harus menyaksikan bahwa kamilah yang melepaskan “musuh besar”-nya. \r\nIni ternyata bukan akhir petualangan, ini justru awal dari semuanya… \r\nBuku keempat dari serial “BUMI”'),
('BK3', 'Essential PHP Security', 'PA3', 2005, '9780596006563', 'bb0bccd6.jpg', 'Menjadi sangat fleksibel dalam membangun aplikasi web yang dinamis dan digerakkan oleh database menjadikan bahasa pemrograman PHP salah satu alat pengembangan web paling populer yang digunakan saat ini. Ini juga berfungsi dengan baik dengan alat sumber terbuka lainnya, seperti database MySQL dan server web Apache. Namun, karena semakin banyak situs web yang dikembangkan dalam PHP, mereka menjadi target bagi penyerang jahat, dan pengembang perlu mempersiapkan serangan.\r\n\r\nKeamanan adalah masalah yang menuntut perhatian, mengingat semakin seringnya serangan di situs web. Essential PHP Security menjelaskan jenis serangan yang paling umum dan cara menulis kode yang tidak rentan terhadapnya. Dengan memeriksa serangan spesifik dan teknik yang digunakan untuk melindunginya, Anda akan memiliki pemahaman dan apresiasi yang lebih dalam tentang perlindungan yang akan Anda pelajari dalam buku ini.\r\n\r\nDalam Keamanan PHP Esensial yang sangat dibutuhkan (dan sangat diminta), setiap bab mencakup aspek aplikasi web (seperti pemrosesan formulir, pemrograman basis data, manajemen sesi, dan otentikasi). Bab menggambarkan potensi serangan dengan contoh dan kemudian menjelaskan teknik untuk membantu Anda mencegah serangan itu.\r\n\r\nTopik yang dibahas meliputi:\r\nMencegah kerentanan lintas situs (XSS)\r\nMelindungi dari serangan injeksi SQL\r\nUpaya pembajakan sesi yang rumit\r\n\r\nAnda berada di tangan yang tepat dengan penulis Chris Shiflett, seorang pakar yang diakui secara internasional di bidang keamanan PHP. Shiflett juga pendiri dan Presiden Brain Bulb, sebuah konsultasi PHP yang menawarkan berbagai layanan kepada klien di seluruh dunia.'),
('BK4', '11:11', 'PA1', 2018, '9789797945695', '3478e8f2.jpg', 'Orang bilang, jodoh takkan ke mana. Aku rasa mereka keliru. Jodoh akan kemana-mana terlebih dahulu sebelum akhirnya menetap. Ketika waktunya telah tiba, ketika segala rasa sudah tidak bisa lagi dilawan, yang bisa kita lakukan hanyalah merangkul tanpa perlu banyak kompromi.'),
('BK5', 'Legal In Startup Business', 'PA4', 2018, '9786026328564', 'ec5f1d54.jpg', 'Buku ini membahas aturan hukum yang berlaku di Indonesia yang meliputi aspek hukum korporasi dan bisnis sebagai bahan pembelajaran bagi ekosistem hukum dan pelaku startup digital.\r\n\r\nBuku ini disusun bukan hanya ditujukan kepada para praktisi, akademisi, dan mahasiswa di bidang hukum semata, melainkan juga kepada para pelaku startup digital dan masyarakat umum yang berminat mengetahui lebih lanjut tentang startup digital dan aturan hukum yang melingkupinya.'),
('BK7', 'Bumi', 'PA7', 2014, '9786020332956', '8a2b89c7.jpg', 'Namaku Raib, usiaku 15 tahun, kelas sepuluh. Aku anak perempuan seperti kalian, adik-adik kalian, tetangga kalian. Aku punya dua kucing, namanya si Putih dan si Hitam. Mama dan papaku menyenangkan. Guru-guru di sekolahku seru. Teman-temanku baik dan kompak.\r\n\r\nAku sama seperti remaja kebanyakan, kecuali satu hal. Sesuatu yang kusimpan sendiri sejak kecil. Sesuatu yang menakjubkan.\r\n\r\nNamaku, Raib. Dan aku bisa menghilang.'),
('BK8', 'Laskar Pelangi', 'PA10', 2005, '9789793062792', 'e33b8dca.jpg', 'Begitu banyak hal menakjubkan yang terjadi dalam masa kecil para anggota Laskar Pelangi. Sebelas orang anak Melayu Belitong yang luar biasa ini tak menyerah walau keadaan tak bersimpati pada mereka. Tengoklah Lintang, seorang kuli kopra cilik yang genius dan dengan senang hati bersepeda 80 kilometer pulang pergi untuk memuaskan dahaganya akan ilmu—bahkan terkadang hanya untuk menyanyikan Padamu Negeri di akhir jam sekolah. Atau Mahar, seorang pesuruh tukang parut kelapa sekaligus seniman dadakan yang imajinatif, tak logis, kreatif, dan sering diremehkan sahabat-sahabatnya, namun berhasil mengangkat derajat sekolah kampung mereka dalam karnaval 17 Agustus. Dan juga sembilan orang Laskar Pelangi lain yang begitu bersemangat dalam menjalani hidup dan berjuang meraih cita-cita. Selami ironisnya kehidupan mereka, kejujuran pemikiran mereka, indahnya petualangan mereka, dan temukan diri Anda tertawa, menangis, dan tersentuh saat membaca setiap lembarnya. Buku ini dipersembahkan buat mereka yang meyakini the magic of childhood memories, dan khususnya juga buat siapa saja yang masih meyakini adanya pintu keajaiban lain untuk mengubah dunia: pendidikan.'),
('BK9', 'Edensor', 'PA10', 2007, '9789791227025', '100e02f1.jpg', 'Aku ingin mendaki puncak tantangan, menerjang batu granit kesulitan, menggoda mara bahaya, dan memecahkan misteri dengan sains. Aku ingin menghirup berupa-rupa pengalaman lalu terjun bebas menyelami labirin lika-liku hidup yang ujungnya tak dapat disangka. Aku mendamba kehidupan dengan kemungkinan-kemungkinan yang bereaksi satu sama lain seperti benturan molekul uranium: meletup tak terduga-duga, menyerap, mengikat, mengganda, berkembang, terurai, dan berpencar ke arah yang mengejutkan. Aku ingin ke tempat-tempat yang jauh, menjumpai beragam bahasa dan orang-orang asing. Aku ingin berkelana, menemukan arahku dengan membaca bintang gemintang. Aku ingin mengarungi padang dan gurun-gurun, ingin melepuh terbakar matahari, limbung dihantam angin, dan menciut dicengkeram dingin. Aku ingin kehidupan yang menggetarkan, penuh dengan penaklukan. Aku ingin hidup! Ingin merasakan sari pati hidup!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketersediaan`
--

CREATE TABLE `ketersediaan` (
  `id_buku` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ketersediaan`
--

INSERT INTO `ketersediaan` (`id_buku`, `stok`) VALUES
('BK1', 1),
('BK10', 0),
('BK11', 7),
('BK12', 4),
('BK13', 1),
('BK14', 8),
('BK15', 0),
('BK16', 6),
('BK17', 1),
('BK18', 2),
('BK19', 2),
('BK2', 1),
('BK20', 8),
('BK21', 8),
('BK22', 0),
('BK23', 5),
('BK24', 3),
('BK25', 2),
('BK26', 0),
('BK27', 1),
('BK28', 1),
('BK3', 0),
('BK4', 3),
('BK5', 2),
('BK7', 0),
('BK8', 9),
('BK9', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `waktu` timestamp NULL DEFAULT NULL,
  `id_penerima` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pengirim` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_notif` int(1) NOT NULL,
  `id_buku` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengarang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pengarang` enum('Nasional','Internasional') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `kategori_pengarang`) VALUES
('PA1', 'Fiersa Besari', 'Nasional'),
('PA10', 'Andrea Hirata', 'Nasional'),
('PA11', 'Robert Galbraith', 'Internasional'),
('PA12', 'J. R. R. Tolkien', 'Internasional'),
('PA13', 'Suzanne Collins', 'Internasional'),
('PA2', 'Aam Amirudin', 'Nasional'),
('PA3', 'Chris Shiflet', 'Internasional'),
('PA4', 'Doni Wijayanto', 'Nasional'),
('PA5', 'Alyson Noel', 'Internasional'),
('PA6', 'Ahmad Mansur Suryanegara', 'Nasional'),
('PA7', 'Tere Liye', 'Internasional'),
('PA8', 'J. K. Rowling', 'Internasional'),
('PA9', 'Pramoedya Ananta Toer', 'Nasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `alias` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(141) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_user` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` int(1) NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konfirmasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama_user`, `tipe`, `email`, `status_konfirmasi`) VALUES
('admin', 'f865b53623b121fd34ee5426c792e5c33af8c2270192023a7bbd73250516f069df18b500facdf2bd7a61075dc04def97e6d36f30ff4b8de017dd36230405dfdc9f00e92f', 'Administrator', 0, 'admin@sipadi.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `isbn_UNIQUE` (`isbn`),
  ADD KEY `buku_pengarang_idx` (`id_pengarang`);

--
-- Indeks untuk tabel `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD UNIQUE KEY `id_buku_UNIQUE` (`id_buku`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD KEY `id-penerima_idx` (`id_penerima`),
  ADD KEY `id_buku_idx` (`id_buku`),
  ADD KEY `id_pengirim_idx` (`id_pengirim`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`),
  ADD UNIQUE KEY `nama_pengarang_UNIQUE` (`nama_pengarang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_pengarang` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD CONSTRAINT `buku_stok` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `id-penerima` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
