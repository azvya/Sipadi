<?php 
session_start();

if (
    (!isset($_SESSION['username'])) ||
    ($_SESSION['tipe_user'] < 1) ) {
    header("Location: ../../");
    exit;
}

require '../functions/functions.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Tambah Buku</title>
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
    <div class="mx-auto tambah-buku bg-light anim shadow-lg rounded py-4 mt-3 mb-5">
        <div class="container top-login-form">
            <a href="../../">
                <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="img-fluid mx-auto d-block" alt="Si Padi" width="200px">
            </a>
        </div>
        <h1 class="judul mt-3 ml-3 text-center">Si Padi | Tambah Buku</h1>
        <hr>
        <div class="container">
            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="judul-buku">Judul Buku</label>
                        <input type="text" autocomplete="off" class="form-control" required maxlength="45" name="judul-buku">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="nama-pengarang">Nama Pengarang</label>
                        <select class="form-control form-control-m selectpicker" data-style="btn-white" data-live-search="true" data-size="5" name="pengarang" required>
                            <option value="">Pilih nama pengarang...</option>
                            <?php select_nama_pengarang(); ?>
                        </select>
                        <a href="tambahpengarang.php" class="text-dark"><i>Tidak menemukan nama pengarang?</i></a>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="tahun-terbit">Tahun Terbit</label>
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="4" name="tahun-terbit" required min="1500" placeholder="Dari tahun 1500 sampai <?= date('Y'); ?>" max="<?= date('Y'); ?>">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="isbn">ISBN</label>
                        <input autocomplete="off" placeholder="13 digit angka tanpa simbol" type="number" 
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required minlength="13" maxlength="13" name="isbn">
                    </div>
                    <div class="col-sm-6 form-group">
                       <label for="foto">Upload Foto</label>
                        <div class="custom-file overflow-hidden">
                            <input type="file" name="foto" required class="custom-file-input" id="foto">
                            <label class="custom-file-label text-truncate" for="foto">Pilih file</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" style="resize:none;" required id="deskripsi" name="deskripsi" rows="8"></textarea>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" name="tambah_buku" class="btn btn-secondary w-75">Tambah</button>
                        <?php 
                        if (isset($_POST['tambah_buku'])) {
                            cek_tambah_buku($_POST, $_FILES);
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