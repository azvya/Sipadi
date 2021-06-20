<?php 
session_start();

require 'functions/functions.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Si Padi | Perpustakaan Digital</title>
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
  <script>
    $( document ).ready(function() {
      $( "#q" ).focus(function() {
        document.getElementById("q").className = "form-control";
      });
      $( "#q" ).blur(function() {
        document.getElementById("q").className = "form-control border-radius";
      });
      $( "#q" ).keyup(function() {
        var str = $("#q").val();
        var replaced = str.split(' ').join('+');
        ajaxCari(replaced);
      });
    });    
  </script>
  <!-- Percobaan -->
</head>
<body>
  <!-- navbar -->
  <header>
    <?php
      navbar();
    ?>
  </header>
  <!-- utama -->
  <main role="main" class="container mt-5 text-center">
    <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="img-fluid anim main-logo" alt="Si Padi">
    <h1 class="judul anim">Aplikasi Web Perpustakaan Digital</h1>
    <br>
    <!-- pencarian -->
    <form action="all/cari.php" method="GET">
        <div class="form-group cari mx-auto">
          <input type="text" class="form-control border-radius" name="q" id="q" autocomplete='off' placeholder="Cari buku. . .">
          <div id="liveSearch">
          </div>
          <input type="hidden" name="halaman" value=1>
          <button type="submit" name="search" class="border-radius shadow-sm btn mt-2 tombol-cari btn-info">Cari</button>
        </div>
      </form>
</main>
<footer class="footer">
  <?php 
    footer();
  ?>
</footer>
</body>
</html>