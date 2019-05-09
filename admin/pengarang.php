<?php 
session_start();

require '../functions/functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    (empty($_GET['kategori_pengarang'])) ||
    (empty($_GET['halaman'])) ||
    (!isset($_GET['filter'])) ||
    ($_SESSION['tipe_user'] < 1)) {
    header("Location: ../../");
    exit;
}

$jumlah_pengarang = hitung_pengarang($_GET);
$halaman = $_GET['halaman'];
$kategori = $_GET['kategori_pengarang'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Daftar Pengarang</title>
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
    <script>
        $( document ).ready(function() {
            var halaman = <?= $halaman ?>;
            var kategori = '<?= $kategori ?>';
            hitungPengarang(halaman, kategori);
            $( "#kategoriPengarang" ).change(function() {
                window.location.href = '../../admin/pengarang.php?kategori_pengarang=' + $("#kategoriPengarang").val() + '&halaman=1' + "&filter";
            });
            $( "#option" ).change(function() {
                window.location.href = '../../admin/pengarang.php?kategori_pengarang=' + $("#kategoriPengarang").val() + '&halaman=' + $("#sort").val() + "&filter";
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
                    <div class="col-sm-2 py-1"><p class='my-1'>Tunjukkan Pengarang: </p></div>
                    <div class="col-sm-4">
                        <select class="form-control my-1" id="kategoriPengarang" name="kategori_pengarang">
                            
                            <option value="%" <?= select_fungsi($kategori, '%') ?>>Nasional/Internasional</option>
                            <option value="Nasional" <?= select_fungsi($kategori, 'Nasional') ?>>Nasional</option>
                            <option value="Internasional" <?= select_fungsi($kategori, 'Internasional') ?>>Internasional</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-2" id="option">
                    </div>
                    <div class="col-sm-4">
                        <a href="pengarang.php?kategori_pengarang=%&halaman=1&filter">
                        <button type="button" class="btn btn-danger shadow-sm">Reset</button>
                        </a>
                        <a href="tambahpengarang.php" class="my-1 text-light">
                            <button type='button' class="btn btn-warning">Tambah Pengarang</button>
                        </a>
                    </div>
                    
                </div>
            </form>
        </div>
        
        <div class="container">
            <div id="paraPengarang">
                <table class="anim table table-border table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengarang</th>
                        <th>Kategori</th>
                        <th>Pengaturan</th>
                    </tr>
                    <?php tampil_pengarang($_GET); ?>
                </table>
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