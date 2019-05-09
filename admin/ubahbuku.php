<?php 
session_start();
require '../functions/functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    ($_GET['edit'] != 1) ||
    (!isset($_GET['id'])) || 
    (!isset($_GET['code'])) ||
    ($_SESSION['tipe_user'] < 1)) {
    header("Location: ../../");
    exit;
}

$buku_buku = cek_ubah_buku($_GET);

$id_buku = $buku_buku[0]['id_buku'];
$foto_buku = $buku_buku[0]['foto_buku'];
$judul_buku = $buku_buku[0]['judul_buku'];
$tahun_terbit = $buku_buku[0]['tahun_terbit'];
$isbn = $buku_buku[0]['isbn'];
$nama_pengarang_ini = $buku_buku[0]['nama_pengarang'];
$deskripsi = $buku_buku[0]['deskripsi'];
$stok = $buku_buku[0]['stok'];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Ubah Buku <?= $judul_buku ?></title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../assets/css/perpustakaan.css">
    <link rel="icon" href="../../assets/icon/favicon.png">
    <script src="../../assets/js/jquery-3.4.0.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/jquery-confirm.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script src="../../assets/js/perpustakaan.js"></script>
    <style>
    body {
        background-image: url('../../assets/icon/bg.png');
        background-repeat: repeat-x repeat-y;
        background-size: contain;
    }
    </style>
</head>
<body>
    <header>
    <!-- navbar -->
    <?php
    navbar();
    ?>
    </header>

    <main>
    <div class="mx-auto anim tambah-buku bg-light shadow-lg rounded py-4 mt-3 mb-5">
        <div class="container top-login-form">
            <a href="../../">
                <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="img-fluid mx-auto d-block" alt="Si Padi" width="200px">
            </a>
        </div>
        <h1 class="judul mt-3 ml-3 text-center">Si Padi | Ubah Buku</h1>
        <hr>
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="../../assets/img/buku/<?= $foto_buku; ?>" class="img-thumbnail w-100" alt="Foto buku <?= $judul_buku ?>">
                  </div>
                  <div class="col-sm-6">
                      <div class="col-sm-12 form-group">
                          <label for="judul-buku">Judul Buku</label>
                          <input type="text" class="form-control" autocomplete="off" required maxlength="45" name="judul-buku" value="<?= $judul_buku ?>">
                      </div>
                      <div class="col-sm-12 form-group">
                          <label for="nama-pengarang">Nama Pengarang</label>
                          <select class="form-control form-control-m selectpicker" data-style="btn-white" data-live-search="true" data-size="5" name="pengarang" required>
                            <option value="">Pilih nama pengarang...</option>
                            <?php select_nama_pengarang_ubah_buku($nama_pengarang_ini); ?>
                          </select>
                          <a href="tambahpengarang.php" class="text-dark"><i>Tidak menemukan nama pengarang?</i></a>
                      </div>
                      <div class="col-sm-12 form-group">
                          <label for="tahun-terbit">Tahun Terbit</label>
                          <input value="<?= $tahun_terbit ?>" type="number" class="form-control" maxlength="4" name="tahun-terbit" required min="1500" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Dari tahun 1500 sampai <?= date('Y'); ?>" max="<?= date('Y'); ?>">
                      </div>
                      <div class="col-sm-12 form-group">
                          <label for="isbn">ISBN</label>
                          <input autocomplete="off" placeholder="13 digit angka tanpa simbol" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?= $isbn ?>" type="number" class="form-control" required minlength="13" maxlength="13" name="isbn">
                      </div>
                      <div class="col-sm-12 form-group">
                          <label for="stok">Stok</label>
                          <input value="<?= $stok ?>" type="number" class="form-control" maxlength="3" name="stok" required min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Dari 0 sampai 100" max="100">
                      </div>
                      
                  </div>
                  <div class="col-sm-12 form-group mt-2">
                    <label for="foto">Upload Foto</label>
                    <div class="custom-file overflow-hidden">
                        <input type="file" name="foto" class="custom-file-input" id="foto">
                        <label class="custom-file-label text-truncate" for="foto">Pilih file</label>
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" required id="deskripsi" style="resize:none;" name="deskripsi" rows="8"><?= $deskripsi ?></textarea>
                    </div>
                  <div class="col-sm-12">
                      <button type="submit" name="ubah-buku" class="btn btn-secondary w-100">Ubah</button>
                      <?php 
                        if (isset($_POST['ubah-buku'])) {
                            kirim_ubah_buku($_POST, $_FILES, $id_buku, $foto_buku);
                        }
                    ?>
                  </div>
                  
                </div>
            </form>
        </div>
        
    </div>
</main>
<footer class="footer">
  <?php 
    footer();
  ?>
</footer>
    <script>
        bootstrapFileInput();
    </script>
</body>
</html>