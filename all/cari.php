<?php 
session_start();
require '../functions/functions.php';

$string = verifikasi_pencarian();
if (($_GET['q'] == '') || 
    (strpos($_GET['q'], '%') !== false) || 
    (empty($_GET['halaman'])) || 
    (empty($string))) {
    header("Location: ../../");
    exit;
}
 
$input_cari = q_pencarian();
$q = mysqli_real_escape_string($conn, $_GET['q']);
$halaman = $_GET['halaman'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Perpustakaan Digital</title>
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
            var str = '<?= $q ?>';
            var q = str.split(' ').join('+');
            hitungCariBuku(halaman, q);
            $( "#option" ).change(function() {
              window.location.href = '../../all/cari.php?q=' + $("#q").val() + '&halaman=' + $("#sort").val() + '&search=';
            });
        });
        $(function() {
          $('#formcari').submit(function() {
              $('#sort', this).prop('disabled', true);
              return true;
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
      <form action="" method="GET" id='formcari'>
        <div class="row">
          <div class="col-sm-4 mt-2">
              <div class="form-group cari mx-auto">
                <input type="text" autocomplete='off' id="q" class="form-control border-radius" value="<?= $input_cari ?>" name="q" placeholder="Cari buku. . .">
              </div>
          </div>
          <div class="col-sm-2 mt-1" id="option">
          </div>
          <div class="col-sm-2 mt-2">
            <div class="form-group cari mx-auto">
              <input type="hidden" name="halaman" value=1>
              <button type="submit" name="search" class="border-radius btn shadow-sm tombol-cari btn-info">Cari</button>
            </div>
          </div>
        </div>
      </form>
      <div id="bukuBuku">
      <?php tampil_hasil_pencarian(); ?>
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