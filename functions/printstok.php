<?php 
session_start();

require '../functions/functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    (empty($_GET['print'])) ||
    ($_SESSION['tipe_user'] < 1)) {
    header("Location: ../../");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabel Stok Buku Si Padi</title>
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
    window.print();
    window.onafterprint = function(event) { 
        window.history.back();
    };
    </script>
    <style>
    @media print {
        footer {
            display: none;
        }
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
        <div class="container text-center">
            <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="mt-3" alt="Si Padi" width="200px">
            <h1 class="mt-2">Daftar Buku Tersedia di Si Padi</h1>
            <hr>
        </div>
        
        <div class="container">
            
            <form action="" method="POST">
                <div id="stokBuku">
                    <table class="anim table table-border table-striped table-hover">
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Stok</th>
                        </tr>
                        <?php print_buku(); ?>
                    </table>
                </div>
            </form>
        </div>
    </main>
    <footer class="footer">
  <?php 
    footer();
  ?>
</footer>
</body>
</html>