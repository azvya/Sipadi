<?php 
session_start();

require '../functions/functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    ($_SESSION['tipe_user'] < 2) ||
    (!isset($_GET['id'])) || 
    (empty($_GET['halaman']))) {
    header("Location: ../../");
    exit;
}

$jumlah_pengguna = hitung_pengguna($_GET);
if (isset($_GET)) {
    $halaman = $_GET['halaman'];
    $username = $_GET['id'];
} else {
    $halaman = 1;
    $username ='%';
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Daftar Pengguna</title>
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
            var id = '<?= $username ?>';
            hitungPengguna(halaman, id);
            $( "#cariUser" ).keyup(function() {
                hitungPengguna($("#sort").val(), $("#cariUser").val());
                tampilkanPengguna($("#sort").val(), $("#cariUser").val());
            });
            $( "#option" ).change(function() {
                hitungPengguna($("#sort").val(), $("#cariUser").val());
                tampilkanPengguna($("#sort").val(), $("#cariUser").val());
            });
        });
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                event.preventDefault();
                return false;
                }
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
                    <div class="col-sm-4 py-1">
                        <input type="text" class="form-control border-radius my-0" autocomplete='off' name="id" id='cariUser' placeholder="Cari user">
                    </div>
                    <div class="col-sm-2" id="option">
                    </div>                 
                </div>
            </form>
        </div>
        
        <div class="container">
            <div id="paraPengguna">
            <table class="anim table table-border table-striped table-hover">
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Hak Admin</th>
                </tr>
                <?php tampil_pengguna($_GET); ?>
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