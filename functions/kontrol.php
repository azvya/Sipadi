<?php 
session_start();
require 'functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    (!isset($_GET['id'])) ||
    ($_SESSION['tipe_user'] < 2)) {
    header("Location: ../../");
    exit;
}



?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Pengaturan Pengguna</title>
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
        $user_user = atur_user($_GET);

        // Untuk url javascript
        $nama_user = $user_user[0]['nama_user'];
        $id = $_GET['id'];
        $atur = perpus_enkripsi($_GET['id']);

        
    ?>
    <script language="javascript" >
        var url = (window.location);
        var cekUrl = (window.location.protocol + "//" + window.location.hostname + "/functions/kontrol.php?&id=<?= $id ?>&konfirmasi=<?= $atur ?>");
        if (url != cekUrl) {
            $.confirm({
            theme: 'supervan',
            title: 'Konfirmasi Pengaturan User',
            content: 'Apakah anda yakin ingin mengubah pengaturan user bernama <?= "<span class=\'badge-danger rounded p-1 badge\'>".$nama_user."</span>" ?>?',
                buttons: {
                    Konfirmasi: {
                        btnClass: 'btn-green',
                        action : function () {
                            $.confirm({
                            theme: 'supervan',
                            title: 'Konfirmasi Pengaturan User',
                            content: 'Apakah anda yakin?',
                                buttons: {
                                    Ya: {
                                        btnClass: 'btn-green',
                                        action : function () {
                                            window.location.href = (url + "&konfirmasi=<?= $atur ?>");
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

