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
    <title>Si Padi | Halaman Registrasi</title>
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
        blockCharInput();
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
    // Menentukan apakah pengguna terdaftar atau tidak
    navbar();
    ?>
    </header>
    <main>
    <div> 
        <div class="container login-form bg-light anim shadow-lg rounded py-4 mt-3 mb-5">
            <div class="container top-login-form">
                <a href="../../">
                    <img src="../../assets/icon/sipadi.svg" nopin="nopin" class="img-fluid mx-auto d-block" alt="Si Padi" width="200px">
                </a>
            </div>
            <h1 class="judul mt-3 text-center">Si Padi | Registrasi</h1>
            <hr>
            <form action="" method="POST">
                <div class="form-group text-center">
                    <label class="rounded bg-secondary px-2 text-light w-75 shadow-sm" for="nama">Nama</label>
                    <input required type="text" class="form-control" autocomplete="off" maxlength="32" name="nama">
                </div>
                <div class="form-group text-center">
                    <label class="rounded bg-secondary px-2 text-light w-75 shadow-sm" for="email">Email</label>
                    <input required type="email" class="form-control" autocomplete="off" maxlength="64" id='email' name="email">
                </div>
                <div class="form-group text-center">
                    <label class="rounded bg-secondary px-2 text-light w-75 shadow-sm" for="username">Username</label>
                    <input minlength="5" required type="text" autocomplete='off' onBlur="cekUsername();" class="form-control" maxlength="16" id="username" name="username">
                    <span id="message"></span>
                </div>
                <div class="form-group text-center">
                    <label class="rounded bg-secondary px-2 text-light w-75 shadow-sm" for="password">Password Baru</label>
                    <input type="password" minlength="6" class="form-control" name="password-baru" id="password-baru">
                </div>
                <div class="form-group text-center">
                    <label class="rounded bg-secondary px-2 text-light w-75 shadow-sm" for="password">Ulangi Password</label>
                    <input type="password" minlength="6" class="form-control" name="password-ulangi" onChange="cekPassword();" id="password-ulangi">
                    <span id="passwordCek"></span>
                </div>
                <div class="text-center">
                    <button type="submit" name="daftar" class="w-100 btn btn-outline-secondary">Daftar</button>
                </div>
            </form>
            <?php 
            if (isset($_POST['daftar'])) {
              if (daftar() > 0) {
                echo "
                <script>
                    $.confirm({
                    type: 'green',
                    theme: 'modern',
                    title: 'Registrasi Berhasil',
                    content: \"butuh beberapa saat untuk dapat masuk setelah Admin mengkonfirmasi, mohon menunggu :)\",
                    buttons: {
                        oke: {
                            btnClass: 'btn-green',
                            action: function() {
                                document.location.href = 'login.php';
                                }
                            }
                        }
                    });
                </script>
                ";
                } else {
                  echo "
                  <script>
                    $.alert({
                        type: 'red',
                        theme: 'modern',
                        title: 'Registrasi Gagal',
                        content: \"Maaf, registrasi anda gagal\",
                        buttons: {
                            oke: {
                            btnClass: 'btn-red',
                            }
                        }
                    });
                </script>
                  ";
                }
              }
            ?>
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