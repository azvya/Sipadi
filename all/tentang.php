<?php 
session_start();

require '../functions/functions.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Si Padi | Tentang</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="../../assets/css/jquery-confirm.min.css">
  <link rel="stylesheet" href="../../assets/css/perpustakaan.css">
  <link rel="icon" href="../../assets/icon/favicon.png">
  <script src="../../assets/js/jquery-3.4.0.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery-confirm.min.js"></script>
  <script src="../../assets/js/perpustakaan.js"></script>
</head>
<body>
  <!-- navbar -->
  <header>
    <?php
      navbar();
    ?>
  </header>
  <!-- utama -->
  <main role="main" class="container mt-2 text-left anim"">
    <img src="../../assets/icon/sipadi.svg" nopin="nopin" width="150px" alt="Si Padi">
    <h1 class="text-kecil anim">Aplikasi Web Perpustakaan Digital</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="list-group mt-3">
                <a href="https://azvya.github.io" target="_blank" class=" py-2 list-group-item list-group-item-action list-group-item-dark">
                    Check My Github Profile!
                </a>
                <a href="https://www.instagram.com/azvya.e" target="_blank" class="py-2 list-group-item list-group-item-action list-group-item-warning">Instagram</a>
                <a href="https://www.facebook.com/azvya.id" target="_blank" class="py-2 list-group-item list-group-item-action list-group-item-primary">Facebook</a>
                <a href="https://www.twitter.com/azvya_id" target="_blank" class="py-2 list-group-item list-group-item-action list-group-item-danger">Twitter</a>
                <form action="" class="mt-2" method="POST">
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" name="alias" autocomplete="off" required maxlength="16" placeholder="Masukkan nama/alias">
                    </div>
                    <div class="form-group mt-2">
                        <textarea class="form-control" name="pesan" required id="exampleFormControlTextarea1" rows="4" placeholder="Berikan kesan dan pesan kamu tentang Aplikasi Web Ini!" onkeyup="countChar(this)" style="resize:none;" maxlength="140"></textarea>
                        <div >
                        <span id="jumlahKarakter">140</span>
                        <span> karakter tersisa</span>
                        </div>

                        <button type="submit" name="kirim" class="btn mt-2 btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-sm-6">
            <div class='rounded text-light bg-success p-2 mt-3 border-bottom'>Changelog</div>
                <div class='changelog'>
                <!-- <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.6 :</span>
                        <li class="list-group-item"></li>
                        <li class="list-group-item"></li>
                        <li class="list-group-item"></li>
                    </ul> -->
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-primary'>Pre-alpha 0.3.0 :</span>
                        <li class="list-group-item">Perbaikan bug (8), jumlah halaman tidak sesuai jumlah entitas yang ditampilkan</li>
                        <li class="list-group-item">Perbaikan bug (9), nomor baris tidak sesuai jumlah entitas yang ditampilkan</li>
                        <li class="list-group-item">Perbaikan bug (10), textarea pada tambah dan ubah buku variatif</li>
                        <li class="list-group-item">Penambahan fitur sorting di di halaman Lihat Semua Buku</li>
                        <li class="list-group-item">Penambahan fitur pembagian halaman di halaman pencarian</li>
                        <li class="list-group-item">Penambahan halaman tampilkan buku</li>
                        <li class="list-group-item">Ada autocomplete dengan ajax di halaman index</li>
                        <li class="list-group-item">Penambahan fitur kirim saran/kesan/pesan</li>
                        <li class="list-group-item">Penyederhanaan perintah untuk menampilkan buku, pengarang, dan para pengguna</li>
                        <li class="list-group-item">Penambahan Fitur Cek Stok, dan ubah Stok</li>
                        <li class="list-group-item">UI disederhanakan dengan material-white theme</li>
                        <li class="list-group-item">PDF Reporting</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.5 :</span>
                        <li class="list-group-item">Menyusun dan membersihkan source code (1)</li>
                        <li class="list-group-item">Menambahkan fitur konfirmasi, hapus, dan pengaturan akses user</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.4 :</span>
                        <li class="list-group-item">Perbaikan bug (6), fitur registrasi username tidak menampilkan hasil dari ajax</li>
                        <li class="list-group-item">Perbaikan bug (7), keamanan dalam input form ditingkatkan</li>
                        <li class="list-group-item">Enkripsi password</li>
                        <li class="list-group-item">Penambahan kembali footer</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.3 :</span>
                        <li class="list-group-item">Menggunakan Ajax untuk filter dan sorting beberapa tabel</li>
                        <li class="list-group-item">Registrasi username dan password menggunakan ajax</li>
                        <li class="list-group-item">Registrasi memperlukan verifikasi ke admin</li>
                        <li class="list-group-item">Notifikasi ke admin aktif</li>
                        <li class="list-group-item"></li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.2 :</span>
                        <li class="list-group-item">Perbaikan bug (5), enkripsi foto infinite loop, sehingga nama foto menjadi angka 0 seluruhnya</li>
                        <li class="list-group-item">Fungsi filter pada tabel pengarang ditambahkan</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.2.1 :</span>
                        <li class="list-group-item">Perbaikan bug (3), notifikasi tidak muncul</li>
                        <li class="list-group-item">Perbaikan bug (4), upload foto tidak terenkripsi, sehingga foto dengan nama yang sama akan saling timpa di folder gambar</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-primary'>Pre-alpha 0.2.0 :</span>
                        <li class="list-group-item">Tabel genre_buku dihapus</li>
                        <li class="list-group-item">Fungsi footer dihapus</li>
                        <li class="list-group-item">Penambahan tabel baru, notifikasi, user, dan ketersediaan (stok buku)</li>
                        <li class="list-group-item">Tampilan index menjadi lebih rapi dengan fitur pencarian</li>
                        <li class="list-group-item">Navbar memiliki tombol notifikasi</li>
                        <li class="list-group-item">Penambahan fitur registrasi</li>
                        <li class="list-group-item">Penambahan fitur login dan logout</li>
                        <li class="list-group-item">Dapat upload foto dengan verifikasi jpg, png, dan jpeg</li>
                        <li class="list-group-item">Menampilkan buku - buku kini lebih elegan dengan class 'card' bootstrap</li>
                        <li class="list-group-item">Dapat melakukan pencarian berdasarkan judul buku dan nama pengarang</li>
                        <li class="list-group-item">Ada fungsi enkripsi untuk url</li>
                        <li class="list-group-item">Simplified UI</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.1.2 :</span>
                        <li class="list-group-item">Penghapusan fitur auto generated id berdasarkan kategori pengarang</li>
                        <li class="list-group-item">Perbaikan bug (2), tidak dapat mengubah buku dengan mengganti pengarang</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-warning'>Pre-alpha 0.1.1 :</span>
                        <li class="list-group-item">Perbaikan bug (1), tidak dapat menambah pengarang lebih dari 10 orang</li>
                    </ul>
                    <ul class="list-group list-group-flush mt-2 text-left">
                    <span class='bg-primary'>Pre-alpha 0.1.0 :</span>
                        <li class="list-group-item">Si Padi, Aplikasi Perpustakaan Digital dibuat</li>
                        <li class="list-group-item">Tabel pengarang, buku, genre_buku dibuat</li>
                        <li class="list-group-item">Dapat menampilkan buku-buku beserta pengarangnya dengan tabel</li>
                        <li class="list-group-item">Dapat input buku ke database melalui aplikasi web</li>
                        <li class="list-group-item">Dapat menghapus buku di database melalui aplikasi web</li>
                        <li class="list-group-item">Auto generated ID untuk pengarang berdasarkan kategori pengarang (Internasional/Nasional)</li>
                        <li class="list-group-item">Navbar bootstrap yang dipanggil melalui fungsi php</li>
                        <li class="list-group-item">Footer yang dipanggil melalui fungsi php</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
  <?php 
    footer();
  ?>
</footer>
<?php 
    if (isset($_POST['kirim'])) {
        cek_kirim_pesan($_POST);
    }
?>
<script>
        blockCharInput();
</script>
</body>
</html>