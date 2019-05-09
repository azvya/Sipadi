<?php 
session_start();
require 'functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    ($_GET['delete'] != 1) ||
    (!isset($_GET['id'])) ||
    ($_SESSION['tipe_user'] < 1)) {
    header("Location: ../../");
    exit;
}



?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Hapus Pengarang</title>
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
    <?php 
        $pengarang_pengarang = hapus_pengarang($_GET);

        // Untuk url javascript
        $nama_pengarang = $pengarang_pengarang[0]['nama_pengarang'];
        $id = $_GET['id'];
        $hapus = perpus_enkripsi($_GET['id']);
    ?>
    <script language="javascript" >
        var url = (window.location);
        var cekUrl = (window.location.protocol + "//" + window.location.hostname + "/functions/hapuspengarang.php?delete=1&id=<?= $id ?>&konfirmasi=<?= $hapus ?>");
        if (url != cekUrl) {
            $.confirm({
            theme: 'supervan',
            title: 'Konfirmasi Hapus Pengarang',
            content: 'Apakah anda yakin ingin menghapus pengarang bernama <?= "<span class=\'badge-danger rounded p-1 badge\'>".$nama_pengarang."</span>" ?>?',
                buttons: {
                    Hapus: {
                        btnClass: 'btn-red',
                        action : function () {
                            $.confirm({
                            theme: 'supervan',
                            title: 'Konfirmasi Hapus Pengarang',
                            content: 'Apakah anda yakin?',
                                buttons: {
                                    Ya: {
                                        btnClass: 'btn-red',
                                        action : function () {
                                            window.location.href = (url + "&konfirmasi=<?= $hapus ?>");
                                        }
                                    },
                                    Tidak: function () {
                                        window.history.back();
                                    },
                                }
                            });
                        }
                    },
                    Batalkan: function () {
                        window.history.back();
                    },
                }
            });
        }
    </script>
</head>
    <body>
    </body>
</html>

