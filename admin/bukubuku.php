<?php 
session_start();
require '../functions/functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    (empty($_GET['kategori'])) ||
    (($_GET['urut'] != 'asc') &&
    ($_GET['urut'] != 'desc')) ||
    (empty($_GET['urut'])) ||
    (empty($_GET['halaman'])) ||
    ($_SESSION['tipe_user'] < 1)) {
    header("Location: ../../");
    exit;
}

$halaman = $_GET['halaman'];
$urut = $_GET['urut'];
$kategori = $_GET['kategori'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Buku Buku</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../assets/css/perpustakaan.css">
    <link rel="icon" href="../../assets/icon/favicon.png">
    <script src="../../assets/js/jquery-3.4.0.min.js"></script>
    <script src="../../assets/js/jquery-confirm.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script src="../../assets/js/perpustakaan.js"></script>
    <script>
        $( document ).ready(function() {
            var halaman = <?= $halaman ?>;
            var kategori = '<?= $kategori ?>';
            var urut = '<?= $urut ?>';
            hitungSemuaBuku(halaman, kategori, urut);
            $( "#kategoriBuku" ).change(function() {
                window.location.href = '../../admin/bukubuku.php?kategori=' + $("#kategoriBuku").val() + '&urut=' + $("#urut").val() + '&halaman=1';
            });
            $( "#option" ).change(function() {
                window.location.href = '../../admin/bukubuku.php?kategori=' + $("#kategoriBuku").val() + '&urut=' + $("#urut").val() + '&halaman=' + $("#sort").val();
            });
            $( "#urut" ).change(function() {
                window.location.href = '../../admin/bukubuku.php?kategori=' + $("#kategoriBuku").val() + '&urut=' + $("#urut").val() + '&halaman=1';
            });
        });      
    </script>
</head>
<body>
    <header>
        <!-- navbar -->
        <?php
        navbar();
        ?>
    </header>
    <main>
        <div class="container">
            <a href="../../">
                <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="mt-3" alt="Si Padi" width="200px">
            </a>
            <hr>
        </div>
        <div class="container my-3">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-sm-2 my-2">
                    <label for="">Urut berdasarkan:</label>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control my-1" id="kategoriBuku" name="kategori">
                            <option value="judul_buku" <?php select_fungsi('judul_buku', $kategori) ?>>Judul Buku</option>
                            <option value="nama_pengarang" <?php select_fungsi('nama_pengarang', $kategori) ?>>Nama Pengarang</option>
                            <option value="tahun_terbit" <?php select_fungsi('tahun_terbit', $kategori) ?>>Tahun Terbit</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control my-1" id="urut" name="urut">
                            <option value="asc" <?php select_fungsi('asc', $urut) ?>>Menaik</option>
                            <option value="desc" <?php select_fungsi('desc', $urut) ?>>Menurun</option>
                        </select>
                    </div>
                    <div class="col-sm-2" id="option">
                    </div>
                    <div class="col-sm-3">
                        <a href="bukubuku.php?kategori=judul_buku&urut=asc&halaman=1">
                        <button type="button" class="btn btn-danger shadow-sm">Reset</button>
                        </a>
                        <a href="tambahbuku.php" class="my-2 text-light">
                            <button type='button' class="btn btn-warning">Tambah Buku</button>
                        </a>
                    </div>
                    
                </div>
            </form>
        </div>

        <div class="container my-3">
            <div class='card-columns'>
                <div id="bukuBuku">
                    <?php tampil_semua_buku($_GET); ?>  
                </div>
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