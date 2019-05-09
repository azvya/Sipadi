<?php 
session_start();

if ( isset($_SESSION['username']) ) {
    header("Location: ../../");
    exit;
}

require '../functions/functions.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Padi | Halaman Login</title>
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
        document.getElementById("username").focus();
    });
    </script>
    <style>
    body {
        background-image: url('../../assets/icon/bg.png');
        background-repeat: repeat-x repeat-y;
        background-size: contain;
    }
    </style>
</head>
<body>
    <header>
    <!-- navbar -->
    <?php
        navbar();
    ?>
    </header>
    <main>
    <div> 
        
        <div class="container login-form bg-light anim shadow-lg rounded py-4 mt-5">
            <div class="container top-login-form">
                <a href="../../">
                    <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="img-fluid mx-auto d-block" alt="Si Padi" width="200px">
                </a>
            </div>
            <h1 class="judul mt-3 text-center">Si Padi | Masuk</h1>
            <hr>
            <form action="" method="POST">
                <div class="form-group text-center">
                    <label class="px-2 bg-secondary rounded text-light w-75" for="username">Username:</label>
                    <input autocomplete="off" type="text" id="username" class="form-control" <?php login_error(); ?> maxlength="16" name="username">
                </div>
                <div class="form-group text-center">
                    <label class="px-2 bg-secondary rounded text-light w-75" for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="text-center">
                    <button type="submit" name="masuk" class="btn btn-outline-secondary">Masuk</button>
                    <a href="../../all/registrasi.php">
                        <button type="button" class="btn btn-outline-secondary">Belum Punya Akun?</button>
                    </a>
                </div>
            </form>
        <?php login(); ?>
        </div>
    </div>
</main>
<footer class="footer shadow-lg">
  <?php 
    footer();
  ?>
</footer>
</body>
</html>