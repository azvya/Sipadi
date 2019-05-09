<?php 
session_start();

if (
    (!isset($_SESSION['username'])) ||
    ($_GET['edit'] != 1) ||
    ($_SESSION['tipe_user'] < 1)) {
    header("Location: ../../");
    exit;
}

require '../functions/functions.php';

$id_pengarang = perpus_deskripsi($_GET['id']);
$hasil_hasil = query("SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang';");

$id_pengarang = $hasil_hasil[0]['id_pengarang'];
$nama_pengarang = $hasil_hasil[0]['nama_pengarang'];
$kategori_pengarang_lama = $hasil_hasil[0]['kategori_pengarang'];


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Ubah Pengarang <?= $nama_pengarang ?></title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../assets/css/perpustakaan.css">
    <link rel="icon" href="../../assets/icon/favicon.png">
    <script src="../../assets/js/jquery-3.4.0.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script src="../../assets/js/perpustakaan.js"></script>
    <script src="../../assets/js/jquery-confirm.min.js"></script>
    <?php 
        if (isset($_POST['ubah_pengarang'])) {
            if (ubah_pengarang($_POST, $id_pengarang) > 0) {
                echo "
                    <script>
                        $.confirm({
                            type: 'green',
                            theme: 'modern',
                            title: 'Pengarang Berhasil Diubah!',
                            content: 'Pengarang bernama $nama_pengarang berhasil diubah!',
                            buttons: {
                                oke: {
                                btnClass: 'btn-green',
                                action: function() {
                                document.location.href = 'pengarang.php?kategori_pengarang=%&halaman=1&filter'; 
                                    }
                                }
                                
                            }
                        });             
                    </script>
                    ";
            } else {
                    echo "
                    <script>
                        $.alert({
                            type: 'red',
                            theme: 'modern',
                            title: 'Pengarang Tidak Diubah!',
                            content: 'Pengarang bernama $nama_pengarang tidak diubah!',
                            buttons: {
                                oke: {
                                btnClass: 'btn-red',
                                
                                }
                                
                            }
                        });             
                    </script>
                    ";
            }
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
    
    <hr>
    <div class="mx-auto tambah-buku bg-light anim shadow-lg rounded py-4 mt-3 mb-5">
        <div class="container top-login-form">
            <a href="../../">
                <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="img-fluid mx-auto d-block" alt="Si Padi" width="200px">
            </a>
        </div>
        <h1 class="judul mt-3 ml-3 text-center">Si Padi | Ubah Pengarang</h1>
        <hr>
        <div class="container">
            
            <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="judul-buku">Nama Pengarang</label>
                        <input type="text" autocomplete="off" class="form-control" required maxlength="45" value='<?= $nama_pengarang ?>' name="nama-pengarang">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="kategori-pengarang">Kategori Pengarang</label>
                        <select class="form-control form-control-m" name="kategori-pengarang" required>
                            <option value="">Nasional/Internasional</option>
                            <option value="Nasional" <?php select_fungsi($kategori_pengarang_lama, 'Nasional'); ?>>Nasional</option>
                            <option value="Internasional" <?php select_fungsi($kategori_pengarang_lama, 'Internasional'); ?>>Internasional</option>
                        </select>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" name="ubah_pengarang" class="btn btn-secondary w-75 ">Ubah</button>
                    </div>
                </div>
            </form>
            <?php
                
            ?>
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