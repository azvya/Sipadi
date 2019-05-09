<?php 
session_start();
require 'functions.php';

if ( 
    (!isset($_SESSION['username'])) ||
    ($_GET['delete'] != 1) ||
    (!isset($_GET['id'])) || 
    (!isset($_GET['code'])) ||
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
    <title>Si Padi | Hapus Buku</title>
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
        $buku_buku = hapus_buku($_GET);

        // Untuk url javascript
        $judul_buku = mysqli_real_escape_string($conn, $buku_buku[0]['judul_buku']);
        $id = $_GET['id'];
        $code = $_GET['code'];
        $hapus = perpus_enkripsi($_GET['code']);
    ?>
    <script language="javascript" >
        var url = (window.location);
        var cekUrl = (window.location.protocol + "//" + window.location.hostname + "/functions/hapusbuku.php?delete=1&id=<?= $id ?>&code=<?= $code ?>&konfirmasi=<?= $hapus ?>");
        if (url != cekUrl) {
            $.confirm({
            theme: 'supervan',
            title: 'Konfirmasi Hapus Buku',
            content: 'Apakah anda yakin ingin menghapus buku berjudul <?= "<span class=\'badge-danger rounded p-1 badge\'>".$judul_buku."</span>" ?>?',
                buttons: {
                    Hapus: {
                        btnClass: 'btn-red',
                        action : function () {
                            $.confirm({
                            theme: 'supervan',
                            title: 'Konfirmasi Hapus Buku',
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

