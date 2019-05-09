<?php 
session_start();

require 'functions.php';
jumlah_halaman_buku(hitung_cari_buku($_GET), $_GET['halaman']);
?>