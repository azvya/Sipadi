<?php 
session_start();

if (
    (!isset($_SESSION['username'])) ||
    ($_SESSION['tipe_user'] < 1)) {
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
    <title>Si Padi | Tambah Pengarang</title>
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
    <?php 
        if (isset($_POST['tambah_pengarang'])) {
            cek_tambah_pengarang($_POST);
        }
    ?>
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
        <h1 class="judul mt-3 ml-3 text-center">Si Padi | Tambah Pengarang</h1>
        <hr>
        <div class="container">
            
            <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="judul-buku">Nama Pengarang</label>
                        <input type="text" autocomplete="off" class="form-control" required maxlength="45" name="nama-pengarang">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="kategori-pengarang">Kategori Pengarang</label>
                        <select class="form-control form-control-m" name="kategori-pengarang" required>
                            <option value="">Nasional/Internasional</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" name="tambah_pengarang" class="btn btn-secondary w-75">Tambah</button>
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
</body>
</html>