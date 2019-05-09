<?php 
session_start();
require '../functions/functions.php';

if ( 
    (!isset($_GET['show'])) ||
    (!isset($_GET['id'])) || 
    (!isset($_GET['code']))) {
    header("Location: ../../");
    exit;
}

$id = perpus_deskripsi($_GET['id']);
$isbn = perpus_deskripsi($_GET['code']);
$buku_buku = query("SELECT * FROM buku, pengarang, ketersediaan WHERE buku.id_buku = ketersediaan.id_buku AND buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = '$id' AND buku.isbn = '$isbn'");
if (mysqli_affected_rows($conn) == 0) {
    header("Location: ../../");
    exit;
}
$judul_buku = $buku_buku[0]['judul_buku'];
$deskripsi = nl2br($buku_buku[0]['deskripsi']);
$nama_pengarang = $buku_buku[0]['nama_pengarang'];
$foto_buku = $buku_buku[0]['foto_buku'];
$tampil_isbn = $buku_buku[0]['isbn'];
$isbn = perpus_enkripsi($tampil_isbn);
$id = perpus_enkripsi($buku_buku[0]['id_buku']);
$stok = $buku_buku[0]['stok'];
$tahun_terbit = $buku_buku[0]['tahun_terbit'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Si Padi | <?= $judul_buku ?> oleh <?= $nama_pengarang ?></title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="../../assets/css/jquery-confirm.min.css">
  <link rel="stylesheet" href="../../assets/css/perpustakaan.css">
  <link rel="icon" href="../../assets/icon/favicon.png">
  <script src="../../assets/js/jquery-3.4.0.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery-confirm.min.js"></script>
  <script src="../../assets/js/perpustakaan.js"></script>
</head>
<body class="m-0">
  <!-- navbar -->
  <header>
    <?php
      navbar();
    ?>
  </header>
  <!-- utama -->
  <main role="main">
    <br>
    <div class="jumbotron anim">
        <div class="container">
            <div class="row">
            <div class="col-sm-3 text-center">
                <img src="../../assets/img/buku/<?= $foto_buku ?>" nopin="nopin" class="img-fluid shadow-lg" style="max-width: 202px;" alt="<?= $judul_buku ?>">
            </div>
            <div class="col-sm-9">
            <h1 class="display-4"><?= $judul_buku  ?></h1>
                <p class="lead">Oleh <?= $nama_pengarang ?>, <?= $tahun_terbit ?></p>
                <hr class="my-2 shadow-sm">
                <p><?= $deskripsi ?>
                </p>
                <p class='lead'>ISBN <?= $tampil_isbn ?> | Stok Buku : <?= $stok ?></p>
                <p class="lead">
                    <?php ubah_hapus_buku($id, $isbn, $stok); ?>
                </p>
            </div>
                
                    
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