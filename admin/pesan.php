<?php 
session_start();

require '../functions/functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
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
    <title>Si Padi | Daftar Pesan</title>
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
        
        <div class="container">
            
            <table class="anim table table-border table-striped table-hover">
                <tr>
                    <th>No.</th>
                    <th>Alias</th>
                    <th>Pesan</th>
                    <th>Hapus</th>
                </tr>
                <?php tampil_pesan(); ?>
            </table>
            
        </div>
    </main>
    <footer class="footer">
  <?php 
    footer();
  ?>
</footer>
</body>
</html>