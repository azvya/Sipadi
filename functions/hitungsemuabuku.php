<?php 
session_start();
if ( 
    (!isset($_SESSION['username']))) {
    header("Location: ../../");
    exit;
}

require 'functions.php';
jumlah_halaman_buku(hitung_semua_buku($_GET), $_GET['halaman']);
?>