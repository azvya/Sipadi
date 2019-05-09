<?php 
session_start();
if ( 
    (!isset($_SESSION['username']))) {
    header("Location: ../../");
    exit;
}

require 'functions.php';
jumlah_halaman(hitung_pengguna($_GET), $_GET['halaman']);
?>