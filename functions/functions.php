<?php 
// Koneksi MY SQL
    $host = '103.129.223.253';
    $username = 'erstevnc_dba_sipadi';
    $pass = '~Df{JoT24.ek';
    $nama_db = 'erstevnc_pw_183040111';
    $version = "pre-alpha 0.3.0";

    $conn = @mysqli_connect($host, $username, $pass) or header("Location: ../../functions/error/error-server.html");
    @mysqli_select_db($conn, $nama_db) or die("Database Tidak Ditemukan!");

// fungsi query
function query($sql) {
    global $conn;
    $hasil_hasil = @mysqli_query($conn, "$sql");

    $baris_baris = [];
    while ($baris = @mysqli_fetch_assoc($hasil_hasil)) {
        $baris_baris[] = $baris;
    }

    return $baris_baris;
}

// enkripsi password
function enkripsi_password($string) {
    $data = hash('sha1', $string) . hash('md5', $string);
    $data .= hash('sha256', $data);
    //$data = $string;
    return $data;
}

// Enkripsi manual
function perpus_enkripsi($string) {
    $enkripsi = strtr($string, "aVLixS5jHkUu3vcM4ZTmOnWJAf12wXPKDIpQ6ltshog7qRrCGNF9bdEeYy8", "AtGMhnOoYyKFfbCDNcP5HRraBXx61m2Z89dEgQqWwlSusTIiJj34Uv07eLpVzk") .
    strtr($string, "l4sZTtUuVvwXxBbdEeCGHhMoNFDfmOnW12g3PKAacLkYyzpQ67qRr90SIiJj58", "AtGgQqWwlMhnOoYyKNcP5HRraBXx67eFfbCDLpV1m2Z89dESusTIiJj34Uv0zk") . "@!" 
    . strtr($string, "dEeCGHhMoAacLk4sZT358UuVvwxBtJjOnNFDfm2g67qRr9PKXYyzpQWlb10SIi", "usWwRrNcPaAtGgYyK5eQqlOoFHM67fbiJj34UhnZ89dCDLpV1m2TIESBXxv0zk");

    return $enkripsi;
}

// fungsi in_array tapi case insensitive
function in_arrayi($array1, $array2) {
    return in_array(strtolower($array1), array_map('strtolower', $array2));
}

// menggabungkan dua array
function union($array1, $array2) {
    $union = array_merge($array1, array_diff($array2, $array1));
    return $union;
} 

// jadikan string yang diinput menjadi huruf kecil dan tanpa garis di atas tulisan
function lowercase_hapus_curek($str,$encoding="UTF-8") {
    $str = preg_replace('/&([^;])[^;]*;/',"$1",htmlentities(mb_strtolower($str,$encoding),null,$encoding));
    return $str;
}

// membandingkan string untuk array_uintersect
function bandingkan_string($a,$b) {
    return lowercase_hapus_curek($a)===lowercase_hapus_curek($b)?0:1;
}

// Dekripsi manual
function perpus_deskripsi($string) {
    $pisahkan = explode("@!", $string);
    $end = end($pisahkan);
    $dekripsi = strtr($end, "usWwRrNcPaAtGgYyK5eQqlOoFHM67fbiJj34UhnZ89dCDLpV1m2TIESBXxv0zk", "dEeCGHhMoAacLk4sZT358UuVvwxBtJjOnNFDfm2g67qRr9PKXYyzpQWlb10SIi");

    return $dekripsi;
}

// fungsi login
function login() {
    global $conn;
    if ( isset($_POST['masuk']) ) {
        $username = $_POST['username'];
        $password = enkripsi_password($_POST['password']);
        
        $login = @mysqli_query($conn, "SELECT * FROM user WHERE username = \"$username\" AND password = \"$password\";");
        $baris_baris = [];
        while ($baris = @mysqli_fetch_assoc($login)) {
            $baris_baris[] = $baris;
        }
        
        if (@mysqli_num_rows($login) !== null) {
            if (@mysqli_num_rows($login) == 1) {
                if ($baris_baris[0]['status_konfirmasi'] == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['nama_user'] = $baris_baris[0]['nama_user'];
                    $_SESSION['tipe_user'] = $baris_baris[0]['tipe'];
                    header("Location: ../../");
                    exit;
                } else if ($baris_baris[0]['status_konfirmasi'] == 0) {
                    echo "<p class='mt-3 text-dark p-1 anim rounded bg-warning'>Anda telah terdaftar, mohon menunggu konfirmasi Administrator</p>";
                } 
            } else {
                $gagal = "Maaf, Username atau Password Salah";
            }
        } else {
            echo "<p class='mt-3 text-light p-1 anim rounded bg-danger'>Maaf, input tidak valid</p>";
        }

        if(isset($gagal)) {
            echo "<p class='mt-3 text-light p-1 anim rounded bg-danger'>$gagal</p>";
        }
    }
}

// menampilkan username pada input login setelah gagal login
function login_error() {
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        echo "value='$username'";
    }
}

// fungsi daftar
function daftar() {
    global $conn;
        if ($_POST['password-baru'] == $_POST['password-ulangi']) {
            $nama = htmlspecialchars($_POST['nama']);
            $input_id = htmlspecialchars($_POST['username']);
            $input_email = htmlspecialchars($_POST['email']);
            $password = enkripsi_password($_POST['password-baru']);
            $user_id = preg_replace('/\s+/', '', $input_id);
            $email = preg_replace('/\s+/', '', $input_email);
            $tipe = 0;
            $hasil = query("SELECT * FROM user WHERE username = '$user_id'");
            if (strlen($user_id) >= 5) {
                if (@mysqli_affected_rows($conn) > 0) {
                    "<span class='text-light badge badge-danger'> Username Sudah Digunakan!</span>";
                } else {
                    $superadmin = query("SELECT username FROM user WHERE tipe = 2");
                    $query = "INSERT INTO user VALUES ('$user_id', '$password', '$nama', $tipe, '$email', 0)";
                    @mysqli_query($conn, $query);
                    foreach ($superadmin as $urutan => $admin) {
                        $penerima = $admin['username'];
                        $timestamp = date("Y-m-d h:i:s");
                        @mysqli_query($conn, "SET time_zone='+07:00';");
                        $query = "INSERT INTO notifikasi VALUES ('$timestamp', '$penerima', '$user_id', 0, null)";
                        @mysqli_query($conn, $query);
                    }
                }
            } else {
                echo "<span class='text-light badge anim badge-danger'>Username minimal 5 karakter!</span>";
            }
        } else {
            echo "<span class='text-light badge anim badge-danger'>Password Tidak Sama</span>";
        }
    
    return @mysqli_affected_rows($conn);
        
}

// fungsi cek username melalui jquery/ajax
function cek_username($data) {
    global $conn;
    $blocked_word = 'admin';
    $username = htmlspecialchars($data['username']);
    $hasil = @mysqli_query($conn, "SELECT * FROM user WHERE username = '$username';");
        if (strpos( $username, $blocked_word ) !== false) {
            $cari = -1;
        } else {
            $cari = @mysqli_num_rows($hasil);
        }

    if ($username == "") {
        echo "<span class='text-light badge badge-danger'>Username Tidak Boleh Kosong!</span>";
    } else if (strlen($username) < 5) {
        echo "<span class='text-light badge badge-danger'>Minimal 5 karakter!</span>";
    } else if ($cari > 0) {
        echo "<span class='text-light badge badge-danger'>Username Sudah Digunakan!</span>";
    } else if ($cari < 0) {
        echo "<span class='text-light badge badge-danger'>Username Mengandung Teks Yang Diblokir</span>";
    } else {
        echo "<span class='text-light badge badge-success'>Username Tersedia</span>";
    }
}

// Navbar yang berubah sesuai sesi
function navbar() {
    global $conn;
    echo "
        <nav class='navbar sticky-top navbar-expand-sm bg-light shadow-sm'>
            <a class='navbar-brand' href='../../../'>
                <img src='../../../assets/icon/logo.svg' width='30' height='30' class='d-inline-block align-top' alt='Logo si padi'>
                <span class='text-success border-bottom'>Si Padi</span>
                
            </a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
                <img src='../../assets/icon/seemore.png' width='40px' nopin='nopin' alt='Navigasi'>
            </button>
            <div class='collapse navbar-collapse justify-content-end' id='collapsibleNavbar'>
                <ul class='navbar-nav'>
    ";
    if ( isset($_SESSION['username']) ) {
        $nama_user = $_SESSION['nama_user'];
        $username = $_SESSION['username'];
        $notifikasi = query("SELECT * FROM notifikasi WHERE id_penerima = '$username' ORDER by waktu DESC;");
        $jumlah_notif = count($notifikasi);
        $GLOBALS['notifikasi'] = $notifikasi;
        if (count($notifikasi) > 0) {
            $notif = 1;
        } else {
            $notif = 0;
        }

        // Sebagai Admin atau User
        echo "
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Selamat Datang $nama_user</a>
            </li>
        ";
            // Notifikasi
        echo "
            <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
        ";
        if ($notif == 1) {
            // Ada Notifikasi
            echo "
                <img src='../../assets/icon/notif-ada.png' width='20px'>
                <span class='badge badge-danger'>$jumlah_notif</span>
                </a>
                <div class='dropdown-menu  dropdown-menu-right p-0'>
                ";
            // fungsi notifikasi
            pilah_notif();
            echo "
                <hr class='m-0'>
                    <a href='#' class='dropdown-item py-2'>Lihat Semua</a>
                </div>
            ";
        } else {
            // Tidak ada notifikasi
            echo "
                    <img src='../../assets/icon/notif-none.png' width='20px'>
                </a>
                <div class='dropdown-menu dropdown-menu-right'>
                    <a class='dropdown-item'>Tidak Ada Notifikasi</a>
                </div>
            ";
        }
    echo "</li>";

        // Pengaturan
    if ($_SESSION['tipe_user'] == 0) {
        $folder_login = 'user';
    } else {
        $folder_login = 'admin';
    }
    echo "
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                    <img src='../../assets/icon/gearicon.png' width='20px'>
                </a>
  
                <div class='dropdown-menu dropdown-menu-right'>
                <a class='dropdown-item' href='../../$folder_login'>Profil</a>
        ";

        if ($_SESSION['tipe_user'] == 2) {
            echo "<a class='dropdown-item' href='../../../admin/aturpengguna.php?id=%&halaman=1'>Atur Pengguna</a>";
        }
        if ($_SESSION['tipe_user'] > 0) {
            echo 
                "<a class='dropdown-item' href='../../admin/tambahbuku.php'>Tambah Buku</a>
                <a class='dropdown-item' href='../../admin/pengarang.php?kategori_pengarang=%&halaman=1&filter'>Lihat Pengarang</a>
                <a class='dropdown-item' href='../../admin/pesan.php'>Lihat Pesan</a>
                <a class='dropdown-item' href='../../admin/stok.php?kategori=judul_buku&urut=asc&halaman=1'>Lihat Ketersediaan</a>";
        }    
        echo "
            <a class='dropdown-item' href='../../functions/keluar.php'>Keluar</a>
            </div>
            </li>
        ";
        if ($_SESSION['tipe_user'] > 0) {
            echo "
                <li class='nav-item'>
                    <a class='nav-link' href='../admin/bukubuku.php?kategori=judul_buku&urut=asc&halaman=1'>Lihat Semua Buku</a>
                </li>
            ";
        } else {
            echo "
                <li class='nav-item'>
                    <a class='nav-link' href='../user/riwayatpinjam.php'>Riwayat Pinjam Buku</a>
                </li>
            ";
        }
    } else {
        
    // Sebagai guest
        echo "
            <li class='nav-item'>
                <a class='nav-link' href='../../all/login.php'>Masuk</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='../../all/registrasi.php'>Registrasi</a>
            </li>
        ";
    }
    echo "
                    
                </ul>
            </div>
        </nav>
    ";

}

function changeWhiteSpace($string)
{
	$string = str_replace(PHP_EOL, ' ', $string);
	
	return $string;
}

// fungsi notifikasi
function pilah_notif() {
    $notifikasi = $GLOBALS['notifikasi'];
    $GLOBALS['notifikasi'] = null;
    foreach ($notifikasi as $urutan => $isi) {
        $tipe_notif = $isi['tipe_notif'];
        $id_pengirim = $isi['id_pengirim'];
        $waktu = $isi['waktu'];
        $link_id = perpus_enkripsi($id_pengirim);
        switch ($tipe_notif) {
            case '0':
            echo "
            <a href='../../../admin/aturpengguna.php?id=$link_id&halaman=1' class='dropdown-item py-0 px-3'>
                <div class='py-2 m-0 h-100' style='width:300px;'>
                    <div class='w-25 d-inline-block float-left'>
                        <img class='img-thumbnail' style='width:64px' src='../../../assets/icon/daftaricon.png'>
                    </div>
                    <div class='w-75 text-wrap d-inline-block'>
                        <span class='font-weight-lighter font-italic badge badge-primary'>$waktu</span>
                        Pendaftar baru baru dengan username 
                        <span class='badge badge-success'>$id_pengirim</span>
                        meminta untuk dikonfirmasi!
                    </div>
                    <div style='clear:both;'></div>
                </div>
            </a>
            ";
            break;
        }
    }
}

// fungsi footer
function footer() {
    global $version;
    $date = date('Y');
    echo "
        <span class='ml-3 badge badge-primary'>$version &copy $date, Azvya Erstevan</span>
        <span class='ml-3'> | </span>
        <a class='ml-3 text-light badge badge-info' href='../../../all/tentang.php'>Tentang</a>
        
    ";
}

// fungsi tampil semua buku
function tampil_semua_buku($data) {
    $offset = (($data['halaman'])-1)*12;
    $kategori = $data['kategori'];
    $urut = $data['urut'];
    $semua_buku = query("SELECT buku.*, pengarang.nama_pengarang, ketersediaan.stok, pengarang.kategori_pengarang FROM buku, pengarang, ketersediaan WHERE
    buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = ketersediaan.id_buku ORDER BY $kategori $urut LIMIT 12 OFFSET $offset");
    if (count($semua_buku) > 0) {
        foreach ($semua_buku as $urutan => $buku) {
            $id = perpus_enkripsi($buku['id_buku']);
            $judul = $buku['judul_buku'];
            $isbn = perpus_enkripsi($buku['isbn']);
            $foto = $buku['foto_buku'];
            $tahun = $buku['tahun_terbit'];
            $nama_pengarang = $buku['nama_pengarang'];
            $stok = $buku['stok'];
            $kategori_pengarang = $buku['kategori_pengarang'];

            echo "
                <div class='card shadow'>
                    <a href='../../all/tampil.php?show=1&id=$id&code=$isbn'>
                        <img class='card-img-top' src='../../assets/img/buku/$foto' alt='$judul'>
                    </a>
                    <div class='card-body'>
                        <h4 class='card-title'>$judul</h4>
                        <p class='card-text'>Oleh $nama_pengarang, $tahun <br> Stok tersedia : $stok <br>Penulis $kategori_pengarang</p>
            ";
            ubah_hapus_buku($id, $isbn, $stok);
            echo "
                    </div>
                </div>    
            ";
        }
    } else {
        echo "
        <div class='container'>
                <h3 class='anim'>
                Maaf, tidak ada buku untuk ditampilkan
                </h3>
        </div>
        ";
    }
}

function stok_buku($data) {
    $offset = (($data['halaman'])-1)*12;
    $kategori = $data['kategori'];
    $urut = $data['urut'];
    $semua_buku = query("SELECT buku.*, pengarang.nama_pengarang, ketersediaan.stok FROM buku, pengarang, ketersediaan WHERE
    buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = ketersediaan.id_buku ORDER BY $kategori $urut LIMIT 12 OFFSET $offset");
    if (count($semua_buku) > 0) {
        foreach ($semua_buku as $urutan => $buku) {
            $no = (($urutan+1)+(($data['halaman']-1)*12));
            $id = perpus_enkripsi($buku['id_buku']);
            $judul = $buku['judul_buku'];
            $isbn = $buku['isbn'];
            $foto = $buku['foto_buku'];
            $tahun = $buku['tahun_terbit'];
            $nama_pengarang = $buku['nama_pengarang'];
            $stok = $buku['stok'];

            echo "
                <tr>
                    <td class='align-middle'>$no</td>
                    <td class='align-middle'><img src='../../assets/img/buku/$foto' style='max-width: 64px;'></td>
                    <td class='align-middle'>$judul</td>
                    <td class='align-middle'>$nama_pengarang</td>
                    <td class='align-middle'>$tahun</td>
                    <td class='align-middle'>$isbn</td>
                    <td class='align-middle'>$stok</td>
                </tr>
            ";
        }
    } else {
        echo "
        <div class='container'>
                <h3 class='anim'>
                Maaf, tidak ada buku untuk ditampilkan
                </h3>
        </div>
        ";
    }
}

function print_buku() {
    $semua_buku = query("SELECT buku.*, pengarang.nama_pengarang, ketersediaan.stok FROM buku, pengarang, ketersediaan WHERE
    buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = ketersediaan.id_buku");
    if (count($semua_buku) > 0) {
        foreach ($semua_buku as $urutan => $buku) {
            $no = ($urutan+1);
            $id = perpus_enkripsi($buku['id_buku']);
            $judul = $buku['judul_buku'];
            $isbn = $buku['isbn'];
            $foto = $buku['foto_buku'];
            $tahun = $buku['tahun_terbit'];
            $nama_pengarang = $buku['nama_pengarang'];
            $stok = $buku['stok'];

            echo "
                <tr>
                    <td class='align-middle'>$no</td>
                    <td class='align-middle'><img src='../../assets/img/buku/$foto' style='max-width: 64px;'></td>
                    <td class='align-middle'>$judul</td>
                    <td class='align-middle'>$nama_pengarang</td>
                    <td class='align-middle'>$tahun</td>
                    <td class='align-middle'>$isbn</td>
                    <td class='align-middle'>$stok</td>
                </tr>
            ";
        }
    } else {
        echo "
        <div class='container'>
                <h3 class='anim'>
                Maaf, tidak ada buku untuk ditampilkan
                </h3>
        </div>
        ";
    }
}


function verifikasi_pencarian() {
    $q = htmlspecialchars($_GET['q']);
    $doublespace = trim($q, " ");
    $string_pencarian = preg_replace('/\s+/', ' ',$doublespace);
    return $string_pencarian;
}

// fungsi pencarian
function pencarian() {
    global $conn;
    $q = mysqli_real_escape_string($conn, htmlspecialchars($_GET['q']));
    $offset = (($_GET['halaman'])-1)*12;
    $doublespace = trim($q, " ");
    $string_pencarian = preg_replace('/\s+/', ' ',$doublespace);
    $array_pencarian = explode(" ", $string_pencarian);
    $parameter = "";
    for ($i = 0; $i < (count($array_pencarian)-1) ; $i++) {
        $str = htmlspecialchars($array_pencarian[$i]);
        $parameter .= "(judul_buku LIKE '%$str%' OR nama_pengarang LIKE '%$str%') AND ";
    }
    $str = $array_pencarian[$i];
    $parameter .= "(judul_buku LIKE '%$str%' OR nama_pengarang LIKE '%$str%')";
    
    $hasil_pencarian = query("SELECT buku.*, pengarang.nama_pengarang, ketersediaan.stok, pengarang.kategori_pengarang
    FROM buku, pengarang, ketersediaan WHERE
    buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = ketersediaan.id_buku
    AND ($parameter) ORDER BY IF(buku.judul_buku RLIKE '^[a-z]', 1, 2), buku.judul_buku, pengarang.nama_pengarang LIMIT 12 OFFSET $offset;");

    if (@mysqli_affected_rows($conn) == 0) {
        $hasil_pencarian = 0;
    }
    
    return $hasil_pencarian;
}

function hitung_cari_buku($data) {
    global $conn;
    $q = htmlspecialchars($_GET['q']);
    $doublespace = trim($q, " ");
    $string_pencarian = preg_replace('/\s+/', ' ',$doublespace);
    $array_pencarian = explode(" ", $string_pencarian);
    $parameter = "";
    for ($i = 0; $i < (count($array_pencarian)-1) ; $i++) {
        $str = htmlspecialchars($array_pencarian[$i]);
        $parameter .= "(judul_buku LIKE '%$str%' OR nama_pengarang LIKE '%$str%') AND ";
    }
    $str = $array_pencarian[$i];
    $parameter .= "(judul_buku LIKE '%$str%' OR nama_pengarang LIKE '%$str%')";

    $hasil_pencarian = query("SELECT buku.*, pengarang.nama_pengarang, ketersediaan.stok, pengarang.kategori_pengarang
    FROM buku, pengarang, ketersediaan WHERE
    buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = ketersediaan.id_buku
    AND ($parameter);");

    return count($hasil_pencarian);
}

function ajaxPencarian($data) {
    global $conn;
    $q = mysqli_real_escape_string($conn, htmlspecialchars($data['q']));
    $doublespace = trim($q, " ");
    $string_pencarian = preg_replace('/\s+/', ' ',$doublespace);
    $array_pencarian = explode(" ", $string_pencarian);
    $parameter = "";
    for ($i = 0; $i < (count($array_pencarian)-1) ; $i++) {
        $str = htmlspecialchars($array_pencarian[$i]);
        $parameter .= "(judul_buku LIKE '%$str%') AND ";
    }
    $str = $array_pencarian[$i];
    $parameter .= "(judul_buku LIKE '%$str%')";

    $hasil_pencarian = query("SELECT buku.judul_buku
    FROM buku WHERE ($parameter) ORDER BY IF(buku.judul_buku RLIKE '^[a-z]', 1, 2), buku.judul_buku LIMIT 5;");

    if (!empty($data['q'])) {
        echo "
        <div class='list-group text-left'>
        ";
        foreach ($hasil_pencarian as $urutan => $hasil) {
            $judul = $hasil['judul_buku'];
            echo "<a href=\"../../all/cari.php?" . "&halaman=1&q=" . $judul . "&search=\"" . " class=\"list-group-item py-1 pl-3 list-group-item-action\">$judul</a>
            ";
        }
        echo "</div>";
    }
}

function q_pencarian() {
    $q = htmlspecialchars($_GET['q']);
    $doublespace = trim($q, " ");
    $string_pencarian = preg_replace('/\s+/', ' ',$doublespace);
    return htmlspecialchars($doublespace);
}

// menampilkan hasil pencarian
function tampil_hasil_pencarian() {
    global $conn;
    $hasil_pencarian = pencarian();
    if ($hasil_pencarian != 0) {
        echo "
            <div class='card-columns'>
        ";
        foreach ($hasil_pencarian as $urutan => $hasil) {
            $string_cek = mysqli_real_escape_string($conn, htmlspecialchars($_GET['q']));
            $id = perpus_enkripsi($hasil['id_buku']);
            $isbn = perpus_enkripsi($hasil['isbn']);
            $foto = $hasil['foto_buku'];
            $judul = $hasil['judul_buku'];
            $pengarang = $hasil['nama_pengarang'];
            $tahun = $hasil['tahun_terbit'];
            $stok = $hasil['stok'];
            $kategori_pengarang = $hasil['kategori_pengarang'];

            //membuat hasil pencarian menjadi bold
            $string_cek_arr = str_split($string_cek);
            $judul_arr = str_split($judul);
            $pengarang_arr = str_split($pengarang);
            
            // handling error karena intersect tidak bisa dilakukan untuk beberapa karakter
            $intersek_judul1 = array_uintersect($string_cek_arr, $judul_arr,"bandingkan_string");
            $intersek_judul2 = array_intersect($string_cek_arr, $judul_arr);
            $intersek_pengarang1 = array_uintersect($string_cek_arr, $pengarang_arr,"bandingkan_string");
            $intersek_pengarang2 = array_intersect($string_cek_arr, $pengarang_arr);
            
            $gabungan_judul = union($intersek_judul1, $intersek_judul2);
            $gabungan_pengarang = union($intersek_pengarang1, $intersek_pengarang2);
            echo " 
                <div class='card shadow'>
                    <a href='../../all/tampil.php?show=1&id=$id&code=$isbn'>
                        <img class='card-img-top' src='../../assets/img/buku/$foto' alt='$judul'>
                    </a>
                    <div class='card-body'>
                        <h4 class='card-title'>
            ";
            foreach ($judul_arr as $urutan => $huruf) {
                if (in_arrayi($huruf, $gabungan_judul)) {
                    echo '<strong>' . $huruf . '</strong>';
                } else {
                    echo $huruf;
                }
            }
            echo "</h4>
                        <p class='card-text'>Oleh 
            ";
            foreach ($pengarang_arr as $urutan => $huruf) {
                if (in_arrayi($huruf, $gabungan_pengarang)) {
                    echo '<strong>' . $huruf . '</strong>';
                } else {
                    echo $huruf;
                }
            }
            echo ", $tahun
                        <br>Stok tersedia : $stok
                        <br>Buku $kategori_pengarang</p>
            ";
            ubah_hapus_buku($id, $isbn, $stok);
            echo "
                    </div>
                </div>
            ";
        }
        echo "
            </div>
        ";
    } else {
        echo "
            <div class='container'>
                <h3 class='anim'>
                Maaf, kata kunci yang anda cari tidak ditemukan, coba cari kata kunci lain
                </h3>
            </div>
        ";
    }
}

// Fungsi untuk membuat input select terdapat atribut 'selected'
function select_fungsi($nilai, $pembading) {
    if (isset($nilai)) {
        if ($nilai == $pembading) {echo 'selected';}
    }
}

// Tombol Ubah hapus buku
function ubah_hapus_buku($id, $isbn, $stok) {
    if ( isset($_SESSION['username']) ) {
        if (($_SESSION['tipe_user'] == 1) || ($_SESSION['tipe_user'] == 2)) {
            echo 
                "<a href='../../admin/ubahbuku.php?edit=1&id=$id&code=$isbn' class='btn btn-info mb-1'>Ubah</a>
                <a href='../../functions/hapusbuku.php?delete=1&id=$id&code=$isbn' class='btn btn-danger mb-1'>Hapus</a>";
        } else {
            echo "<a href='../../user/pinjam.php?pinjam=1&id=$id&code=$isbn' class='btn btn-success mb-1";
            if ($stok == 0) {
                echo " disabled";
            }
            echo "'>Pinjam</a>";
        }
    }
     else {
        echo "<a href='../../all/login.php' class='btn btn-success mb-1'>Anda Harus Masuk Untuk Pinjam</a>";
    }
}

// Tombol Ubah hapus buku
function ubah_hapus_pengarang($id) {
    if ( isset($_SESSION['username']) ) {
        if (($_SESSION['tipe_user'] == 1) || ($_SESSION['tipe_user'] == 2)) {
            echo 
                "<a href='../../admin/ubahpengarang.php?edit=1&id=$id' class='btn btn-info mb-1 mx-1'>Ubah</a>
                <a href='../../functions/hapuspengarang.php?delete=1&id=$id' class='btn btn-danger mx-1 mb-1'>Hapus</a>";
        }
    }
}

function tombol_hapus_pesan($id) {
    if ( isset($_SESSION['username']) ) {
        if (($_SESSION['tipe_user'] == 1) || ($_SESSION['tipe_user'] == 2)) {
            echo 
                "<a href='../../functions/hapuspesan.php?id=$id' class='btn btn-danger mx-1 mb-1'>Hapus</a>";
        }
    }
}

function ubah_atur_pengguna($id, $hak, $konfirmasi) {
    if ( isset($_SESSION['username']) ) {
        if (($_SESSION['tipe_user'] == 2)) {
            echo "<a href='../../functions/kontrol.php?&id=$id' class='btn btn-info mx-1 mb-1'>";
            if ($konfirmasi == '1') {
                if ($hak == '1') {
                    echo "Cabut Hak";
                } else {
                    echo "Jadikan Admin";
                }
            } else {
                echo "Terima User";
            }
            echo "</a>";
            echo "<a href='../../functions/hapuspengguna.php?delete=1&id=$id' class='btn btn-danger mx-1 mb-1'>Hapus</a>";
        }
    }
}

function cek_tambah_buku($data, $file) {
    global $conn;
    $judul = mysqli_real_escape_string($conn, $data['judul-buku']);
    if (tambah_buku($data, $file) > 0) {
        echo "
        <script>
            $.confirm({
            type: 'green',
            theme: 'modern',
            title: 'Buku Berhasil Ditambahkan!',
            content: \"Buku berjudul $judul berhasil ditambahkan!\",
            buttons: {
                oke: {
                    btnClass: 'btn-green',
                    action: function() {
                        window.history.go(-2);
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
                title: 'Buku Gagal Ditmbahkan',
                content: \"Buku berjudul $judul gagal ditambahkan!\",
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

function cek_kirim_pesan($data) {
    global $conn;
    $namamu = mysqli_real_escape_string($conn, $data['alias']);
    if (kirim_pesan($data) > 0) {
        echo "
        <script>
            $.confirm({
            type: 'green',
            theme: 'modern',
            title: 'Pesan Berhasil Terkirim',
            content: \"Terima kasih $namamu, pesanmu telah kami terima!\",
            buttons: {
                oke: {
                    btnClass: 'btn-green',
                    action: function() {
                    document.location.href = '../../../'; 
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
                title: 'Pesan Gagal Terkirim',
                content: \"Maff $namamu, pesanmu gagal dikirim!\",
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

function kirim_pesan($data) {
    global $conn;
    $alias = mysqli_real_escape_string($conn, $data['alias']);
    $pesan = mysqli_real_escape_string($conn, $data['pesan']);
    $query = "INSERT INTO pesan VALUES (\"$alias\", \"$pesan\");";
    @mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// tambah buku
function tambah_buku($data, $foto) {
    // Upload foto
    global $conn;
    $ekstensi_diperbolehkan	= ['png','jpg', 'jpeg'];

    $file_belum_enkripsi = htmlspecialchars($foto['foto']['name']);
    $array_nama_file = explode('.', $file_belum_enkripsi);
    $ekstensi_foto = strtolower(end($array_nama_file));
    $enkripsi_file = hash('crc32', ($file_belum_enkripsi));
    $nama_file_gabungan = $enkripsi_file . '.' . $ekstensi_foto;
    $nama_file = mysqli_real_escape_string($conn, $nama_file_gabungan);
    do {
        $cek_foto_buku = query("SELECT buku.foto_buku FROM buku WHERE foto_buku = '$nama_file'");
        if (count($cek_foto_buku) > 0) {
            $enkripsi_file = hash('crc32', $nama_file);
            $nama_file = $enkripsi_file . '.' . $ekstensi_foto;
        }
    } while (count($cek_foto_buku) > 0);

    $ukuran_file	= $foto['foto']['size'];
    $file_tmp = $foto['foto']['tmp_name'];
    $kirim = 0;
    if(in_array($ekstensi_foto, $ekstensi_diperbolehkan) === true){
        if($ukuran_file < 1044070) {            
                copy($file_tmp, '../assets/img/buku/'. $nama_file);

                // Data teks input
                $judul_buku = mysqli_real_escape_string($conn, htmlspecialchars($data['judul-buku']));
                $id_pengarang = htmlspecialchars(perpus_deskripsi($data['pengarang']));
                $tahun_terbit = htmlspecialchars($data['tahun-terbit']);
                $isbn = htmlspecialchars($data['isbn']);
                $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));

                $id_id_buku = 
                query("SELECT * FROM pw_183040111.buku ORDER BY LENGTH (id_buku), id_buku;");
                $urutan_terakhir = end($id_id_buku);
                $id_terakhir = $urutan_terakhir['id_buku'];
                $str = explode("BK", $id_terakhir);
                if (@mysqli_affected_rows($conn) > 0) {
                    $urutan = end($str);
                } else {
                    $urutan = 0;
                }

                // Deklarasi id
                $id_buku = "BK" . ($urutan+1);

                $query = "INSERT INTO buku VALUES ('$id_buku', \"$judul_buku\", \"$id_pengarang\", '$tahun_terbit', '$isbn', '$nama_file', \"$deskripsi\");";
                @mysqli_query($conn, $query);
                $query = "INSERT INTO ketersediaan VALUES ('$id_buku', 0);";
                @mysqli_query($conn, $query);
                
                $kirim = @mysqli_affected_rows($conn);
            
        } else  {
            echo "<p class='text-light rounded bg-danger p-2 my-2'>Maksimal ukuran file adalah 1 MB</p>";
        }
    } else {
        echo "<p class='text-light rounded bg-danger p-2 my-2'>Ekstensi yang diperbolehkan hanya png, jpg, dan jpeg</p>";
    }

    return $kirim;

}

// untuk memanggil list pengarang
function select_nama_pengarang() {
    $pengarang_pengarang = query("SELECT * FROM pengarang ORDER BY nama_pengarang;");
    foreach ($pengarang_pengarang as $urutan => $pengarang) {
        $id_pengarang = perpus_enkripsi($pengarang['id_pengarang']);
        $nama_pengarang = $pengarang['nama_pengarang'];
        echo "
            <option value='$id_pengarang'>
                $nama_pengarang
            </option>
        ";
    }

}

// untuk memanggil list pengarang
function select_nama_pengarang_ubah_buku($data) {
    $pengarang_pengarang = query("SELECT * FROM pengarang ORDER BY nama_pengarang;");
    foreach ($pengarang_pengarang as $urutan => $pengarang) {
        $id_pengarang = perpus_enkripsi($pengarang['id_pengarang']);
        $nama_pengarang = $pengarang['nama_pengarang'];
        echo "
            <option value='$id_pengarang' ";
        select_fungsi($data, $nama_pengarang);
        echo "
            >$nama_pengarang
            </option>
        ";
    }

}

function cek_tambah_pengarang($data) {
    if (tambah_pengarang($data) > 0) {
        echo "
            <script>
                $.confirm({
                    type: 'green',
                    theme: 'modern',
                    title: 'Pengarang Berhasil Ditambahkan!',
                    content: 'Pengarang berhasil ditambahkan ke tabel!',
                    buttons: {
                        oke: {
                            btnClass: 'btn-green',
                            action: function() {
                                window.history.go(-2);
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
                    title: 'Pengarang Tidak Ditambahkan',
                    content: 'Pengarang tidak ditambahkan ke tabel!',
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

// tambah pengarang
function tambah_pengarang($data) {
    global $conn;

    // Mengambil data dari form
    $nama_pengarang = htmlspecialchars($data['nama-pengarang']);
    $kategori_pengarang = htmlspecialchars($data['kategori-pengarang']);

    // Auto increment id, namun dengan huruf
    $id_id_pengarang = 
    query("SELECT pengarang.id_pengarang FROM pengarang ORDER BY LENGTH(id_pengarang), pengarang.id_pengarang");
    $urutan_terakhir = end($id_id_pengarang);
    $id_terakhir = $urutan_terakhir['id_pengarang'];
    $str = explode("PA", $id_terakhir);
    if (@mysqli_affected_rows($conn) > 0) {
        $urutan = end($str);
    } else {
        $urutan = 0;
    }
    // Deklarasi id
    $id_pengarang = "PA" . ($urutan+1);
    $query = "INSERT INTO pengarang VALUES ('$id_pengarang', \"$nama_pengarang\", '$kategori_pengarang');";
    @mysqli_query($conn, $query);

    return @mysqli_affected_rows($conn);
}

// ubah pengarang
function ubah_pengarang($data, $id_pengarang) {
    global $conn;

    // Mengambil data dari form
    $nama_pengarang = htmlspecialchars($data['nama-pengarang']);
    $kategori_pengarang = htmlspecialchars($data['kategori-pengarang']);
    $query = "UPDATE pengarang SET
            nama_pengarang = \"$nama_pengarang\",
            kategori_pengarang = '$kategori_pengarang'
            WHERE id_pengarang = '$id_pengarang';";

    @mysqli_query($conn, $query);

    return @mysqli_affected_rows($conn);
}

function cek_ubah_buku($data) {
    global $conn;
    $id = perpus_deskripsi($data['id']);
    $isbn = perpus_deskripsi($data['code']);
    $buku_buku = query("SELECT * FROM buku, pengarang, ketersediaan WHERE buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = ketersediaan.id_buku AND buku.id_buku = '$id' AND buku.isbn = '$isbn'");
    if (mysqli_affected_rows($conn) == 0) {
        // header("Location: ../../");
        // exit;
    }
    return $buku_buku;
}

function kirim_ubah_buku($data, $file, $id_buku, $foto_buku) {
    global $conn;
    $judul = mysqli_real_escape_string($conn, $data['judul-buku']);
    if (isset($file)) {
        if (ubah_buku($data, $file, $id_buku, $foto_buku) > 0) {
            echo "
            <script>
                $.confirm({
                    type: 'green',
                    theme: 'modern',
                    title: \"Buku $judul Berhasil Diubah\",
                    content: \"Buku berjudul $judul berhasil diubah\",
                    buttons: {
                        oke: {
                            btnClass: 'btn-green',
                            action: function() {
                                window.history.go(-2);
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
                    title: 'Buku Tidak Diubah',
                    content: \"Buku berjudul $judul gagal/tidak diubah!\",
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
}

// ubah buku
function ubah_buku($data, $foto, $id_buku, $nama_foto_buku) {
    global $conn;
    // Data teks input
    $judul_buku = mysqli_real_escape_string($conn, htmlspecialchars($data['judul-buku']));
    $id_pengarang = htmlspecialchars(perpus_deskripsi($data['pengarang']));
    $tahun_terbit = htmlspecialchars($data['tahun-terbit']);
    $isbn = htmlspecialchars($data['isbn']);
    $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
    $nama_foto = htmlspecialchars($nama_foto_buku);
    $stok = htmlspecialchars($data['stok']);

    if (!empty($foto['foto']['name'])) {
        // Upload foto
        $file_lama = "../assets/img/buku/$nama_foto";
        unlink($file_lama);
        $ekstensi_diperbolehkan	= ['png','jpg', 'jpeg'];
        
        // enkripsi nama file sebelum diupload
        $file_belum_enkripsi = htmlspecialchars($foto['foto']['name']);
        $array_nama_file = explode('.', $file_belum_enkripsi);
        $ekstensi_foto = strtolower(end($array_nama_file));
        $enkripsi_file = hash('crc32', ($file_belum_enkripsi));
        $nama_file = $enkripsi_file . '.' . $ekstensi_foto;
        do {
            $cek_foto_buku = query("SELECT buku.foto_buku FROM buku WHERE foto_buku = '$nama_file'");
            if (count($cek_foto_buku) > 0) {
                $enkripsi_file = hash('crc32', $nama_file);
                $nama_file = $enkripsi_file . '.' . $ekstensi_foto;
            }
        } while (count($cek_foto_buku) > 0);
        
        $ukuran_file	= $foto['foto']['size'];
        $file_tmp = $foto['foto']['tmp_name'];
        $kirim = 0;
        if(in_array($ekstensi_foto, $ekstensi_diperbolehkan) === true){
            if($ukuran_file < 1044070) {            
                    copy($file_tmp, '../assets/img/buku/'. $nama_file);
                    $query = "UPDATE ketersediaan SET 
                    stok = \"$stok\"
                    WHERE id_buku = '$id_buku';";
                    @mysqli_query($conn, $query);

                    $kirim += @mysqli_affected_rows($conn);

                    $query = "UPDATE buku SET 
                    judul_buku = \"$judul_buku\", 
                    id_pengarang = '$id_pengarang', 
                    tahun_terbit = '$tahun_terbit', 
                    isbn = '$isbn', 
                    foto_buku = '$nama_file',
                    deskripsi = \"$deskripsi\"
                    WHERE id_buku = '$id_buku';";
                    @mysqli_query($conn, $query);
                    
                    $kirim += @mysqli_affected_rows($conn);
                
            } else  {
                echo "<p class='text-light rounded bg-danger my-2 p-2'>Maksimal ukuran file adalah 1 MB</p>";
            }
        } else {
            echo "<p class='text-light rounded bg-danger my-2 p-2'>Ekstensi yang diperbolehkan hanya png, jpg, dan jpeg</p>";
        }
    } else {
        $query = "UPDATE ketersediaan SET 
                stok = \"$stok\"
                WHERE id_buku = '$id_buku';";
        @mysqli_query($conn, $query);
        
        $kirim += @mysqli_affected_rows($conn);

        $query = "UPDATE buku SET
        judul_buku = \"$judul_buku\", 
        id_pengarang = '$id_pengarang', 
        tahun_terbit = '$tahun_terbit', 
        isbn = '$isbn',
        deskripsi = \"$deskripsi\"
        WHERE id_buku = '$id_buku';";

        @mysqli_query($conn, $query);
        $kirim += @mysqli_affected_rows($conn);
    }

    return $kirim;
    
}

// hapus buku
function hapus_buku($data) {
    global $conn;
    // Untuk query
    $hapus = perpus_enkripsi($_GET['code']);
    $id_buku = perpus_deskripsi($data['id']);
    $isbn = perpus_deskripsi($data['code']);
    $buku_buku = query("SELECT * FROM buku, pengarang WHERE buku.id_pengarang = pengarang.id_pengarang AND buku.id_buku = '$id_buku' AND buku.isbn = '$isbn'");
    if (@mysqli_affected_rows($conn) == 0) {
        header("Location: ../../");
        exit;
    }

    if (isset($data['konfirmasi'])) {
        global $conn;
        if ($data['konfirmasi'] == $hapus) {
            $judul_buku = mysqli_real_escape_string($conn, $buku_buku[0]['judul_buku']);
            // Perintah untuk menghapus foto
            $foto = $buku_buku[0]['foto_buku'];
            $file = "../assets/img/buku/$foto";
            if (unlink($file)) {
                $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
                @mysqli_query($conn, $query);
                if (@mysqli_affected_rows($conn) > 0) {
                    echo "
                    <script>
                        $.confirm({
                            type: 'green',
                            theme: 'supervan',
                            title: 'Buku Berhasil Dihapus',
                            content: 'Buku telah dihapus',
                            buttons: {
                                Oke: {
                                    btnClass: 'btn-green',
                                    action: function() {
                                        window.history.back();
                                        }
                                    }
                            }
                        });
                    </script>";
                    
                } else {
                    "<script>
                        $.confirm({
                            type: 'red',
                            theme: 'supervan',
                            title: 'Buku Gagal Dihapus',
                            content: \"Buku berjudul $judul gagal dihapus\",
                            buttons: {
                                Oke: {
                                    btnClass: 'btn-red',
                                    action: function() {
                                        window.history.back();
                                        }
                                    }
                            }
                        });
                    </script>";
                }
            } else {
                echo "Tidak dapat menghapus foto buku";
            }
            
        }
    }
    return $buku_buku;
}

// hapus pengarang
function hapus_pengarang($data) {
    global $conn;
    $hapus = perpus_enkripsi($data['id']);
    $id_pengarang = perpus_deskripsi($data['id']);
    $pengarang_pengarang = query("SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang';");
    if (@mysqli_affected_rows($conn) == 0) {
        header("Location: ../../");
        exit;
    }
    if (isset($_GET['konfirmasi'])) {
        $nama_pengarang = $pengarang_pengarang[0]['nama_pengarang'];
        if ($_GET['konfirmasi'] == $hapus) {
            
            $query = "DELETE FROM pengarang WHERE id_pengarang = '$id_pengarang';";
            @mysqli_query($conn, $query);
            if (@mysqli_affected_rows($conn) > 0) {
                echo "
                <script>
                    $.confirm({
                        type: 'green',
                        theme: 'supervan',
                        title: 'Pengarang Berhasil Dihapus',
                        content: 'Pengarang telah dihapus',
                        buttons: {
                            Oke: {
                                btnClass: 'btn-green',
                                action: function() {
                                    window.history.back();
                                    }
                                }
                        }
                    });
                </script>";
                
            } else {
                "<script>
                    $.confirm({
                        type: 'red',
                        theme: 'supervan',
                        title: 'Pengarang Gagal Dihapus',
                        content: \"Pengarang bernama $nama_pengarang gagal dihapus\",
                        buttons: {
                            Oke: {
                                btnClass: 'btn-red',
                                action: function() {
                                    window.history.back();
                                    }
                                }
                        }
                    });
                </script>";
            }
        
        }
    }
    return $pengarang_pengarang;
}

function hapus_pesan($data) {
    global $conn;
    $hapus = perpus_enkripsi($data['id']);
    $alias = perpus_deskripsi($data['id']);
    $para_alias = query("SELECT * FROM pesan WHERE alias = '$alias';");
    if (@mysqli_affected_rows($conn) == 0) {
        header("Location: ../../");
        exit;
    }
    if (isset($_GET['konfirmasi'])) {
        $alias = $para_alias[0]['alias'];
        if ($_GET['konfirmasi'] == $hapus) {
            
            $query = "DELETE FROM pesan WHERE alias = '$alias';";
            @mysqli_query($conn, $query);
            if (@mysqli_affected_rows($conn) > 0) {
                echo "
                <script>
                    $.confirm({
                        type: 'green',
                        theme: 'supervan',
                        title: 'Pesan Berhasil Dihapus',
                        content: 'Pesan telah dihapus',
                        buttons: {
                            Oke: {
                                btnClass: 'btn-green',
                                action: function() {
                                    window.history.back();
                                    }
                                }
                        }
                    });
                </script>";
                
            } else {
                "<script>
                    $.confirm({
                        type: 'red',
                        theme: 'supervan',
                        title: 'Pesan Gagal Dihapus',
                        content: \"Pesan gagal dihapus\",
                        buttons: {
                            Oke: {
                                btnClass: 'btn-red',
                                action: function() {
                                    window.history.back();
                                    }
                                }
                        }
                    });
                </script>";
            }
        
        }
    }
    return $para_alias;
}

function hapus_user($data) {
    global $conn;
    $hapus = perpus_enkripsi($data['id']);
    $username = perpus_deskripsi($data['id']);
    $user_user = query("SELECT * FROM user WHERE username = '$username';");
    if (@mysqli_affected_rows($conn) == 0) {
        header("Location: ../../");
        exit;
    }
    if (isset($_GET['konfirmasi'])) {
        $nama_user = $user_user[0]['nama_user'];
        $status_konfirmasi = $user_user[0]['status_konfirmasi'];
        if ($_GET['konfirmasi'] == $hapus) {
            $query = "DELETE FROM notifikasi WHERE id_pengirim = \"$username\" AND tipe_notif = 0;";
            @mysqli_query($conn, $query);
            $query = "DELETE FROM user WHERE username = '$username';";
            @mysqli_query($conn, $query);
            if (@mysqli_affected_rows($conn) > 0) {
                echo "
                <script>
                    $.confirm({
                        type: 'green',
                        theme: 'supervan',
                        title: 'User Berhasil Dihapus',
                        content: 'User telah dihapus',
                        buttons: {
                            Oke: {
                                btnClass: 'btn-green',
                                action: function() {
                                    window.history.back();
                                    }
                                }
                        }
                    });
                </script>";
                
            } else {
                "<script>
                    $.confirm({
                        type: 'red',
                        theme: 'supervan',
                        title: 'User Gagal Dihapus',
                        content: 'User bernama $nama_user gagal dihapus',
                        buttons: {
                            Oke: {
                                btnClass: 'btn-red',
                                action: function() {
                                    window.history.back();
                                    }
                                }
                        }
                    });
                </script>";
            }
        
        }
    }
    return $user_user;
}

function atur_user($data) {
    global $conn;
    $atur = perpus_enkripsi($data['id']);
    $username = perpus_deskripsi($data['id']);
    $user_user = query("SELECT * FROM user WHERE username = '$username';");
    if (@mysqli_affected_rows($conn) == 0) {
        header("Location: ../../");
        exit;
    }
    if (isset($_GET['konfirmasi'])) {
        $nama_user = $user_user[0]['nama_user'];
        $status_konfirmasi = $user_user[0]['status_konfirmasi'];
        $tipe_user = $user_user[0]['tipe'];
        if ($_GET['konfirmasi'] == $atur) {
            if ($status_konfirmasi == 0) {
                $query = "DELETE FROM notifikasi WHERE id_pengirim = '$username' AND tipe_notif = 0;";
                @mysqli_query($conn, $query);
                $query = "UPDATE user SET status_konfirmasi = 1 WHERE username = '$username';";
                @mysqli_query($conn, $query);
                if (@mysqli_affected_rows($conn) > 0) {
                    echo "
                    <script>
                        $.confirm({
                            type: 'green',
                            theme: 'supervan',
                            title: 'User Berhasil Diterima',
                            content: 'User bernama $nama_user berhasil dikonfirmasi',
                            buttons: {
                                Oke: {
                                    btnClass: 'btn-green',
                                    action: function() {
                                        window.location.href = '../../../';
                                        }
                                    }
                            }
                        });
                    </script>";
                    
                } else {
                    "<script>
                        $.confirm({
                            type: 'red',
                            theme: 'supervan',
                            title: 'User Gagal Diterima',
                            content: 'User bernama $nama_user gagal diterima',
                            buttons: {
                                Oke: {
                                    btnClass: 'btn-red',
                                    action: function() {
                                        window.location.href = '../../../';
                                        }
                                    }
                            }
                        });
                    </script>";
                }
            } else {
                if ($tipe_user == 0) {
                    $query = "UPDATE user SET tipe = 1 WHERE username = '$username';";
                    @mysqli_query($conn, $query);
                    if (@mysqli_affected_rows($conn) > 0) {
                        echo "
                        <script>
                            $.confirm({
                                type: 'green',
                                theme: 'supervan',
                                title: 'User Berhasil Dijadikan Admin',
                                content: 'User bernama $nama_user berhasil dijadikan admin',
                                buttons: {
                                    Oke: {
                                        btnClass: 'btn-green',
                                        action: function() {
                                            window.location.href = '../../../';
                                            }
                                        }
                                }
                            });
                        </script>";
                        
                    } else {
                        "<script>
                            $.confirm({
                                type: 'red',
                                theme: 'supervan',
                                title: 'User Gagal Dijadikan Admin',
                                content: 'User bernama $nama_user gagal dijadikan admin',
                                buttons: {
                                    Oke: {
                                        btnClass: 'btn-red',
                                        action: function() {
                                            window.location.href = '../../../';
                                            }
                                        }
                                }
                            });
                        </script>";
                    }
                } else {
                    $query = "UPDATE user SET tipe = 0 WHERE username = '$username';";
                    @mysqli_query($conn, $query);
                    if (@mysqli_affected_rows($conn) > 0) {
                        echo "
                        <script>
                            $.confirm({
                                type: 'green',
                                theme: 'supervan',
                                title: 'User Berhasil Dicabut Haknya',
                                content: 'User bernama $nama_user berhasil dicabuthaknya sebagai admin',
                                buttons: {
                                    Oke: {
                                        btnClass: 'btn-green',
                                        action: function() {
                                            window.location.href = '../../../';
                                            }
                                        }
                                }
                            });
                        </script>";
                        
                    } else {
                        "<script>
                            $.confirm({
                                type: 'red',
                                theme: 'supervan',
                                title: 'User Gagal Dicabut Haknya',
                                content: 'User bernama $nama_user gagal dicabut haknya sebagai admin',
                                buttons: {
                                    Oke: {
                                        btnClass: 'btn-red',
                                        action: function() {
                                            window.location.href = '../../../';
                                            }
                                        }
                                }
                            });
                        </script>";
                    }
                }
            }
                
        
        }
    }
    return $user_user;
}

// menghitung jumlah pengarang
function hitung_pengarang($data) {
    $kategori = $data['kategori_pengarang'];
    $pengarang_pengarang = query("SELECT pengarang.id_pengarang FROM pengarang WHERE kategori_pengarang LIKE '$kategori';");
    return count($pengarang_pengarang);
}

function hitung_semua_buku($data) {
    $buku_buku = query("SELECT buku.id_buku FROM buku");
    return count($buku_buku);
}

function hitung_pengguna($data) {
    if (isset($data['cari'])) {
        $str = $data['id'];
    } else {
        $str = perpus_deskripsi($data['id']);
    }
    $pengguna_pengguna = query("SELECT user.username FROM user WHERE username LIKE '%$str%' OR nama_user LIKE '%$str%';");
    return count($pengguna_pengguna);
}

// menentukan jumlah halaman
function jumlah_halaman($kategori, $halaman) {
    echo "
        <select class='form-control my-1' required name='halaman' id='sort'>
    ";
    if ( $kategori <= 10) {
        echo "
        <option value='1'>Halaman 1</option>
        ";
    } else {
        $jumlah_halaman = (ceil($kategori / 10));
        for ($i = 1; $i <= $jumlah_halaman; $i++) {
            echo "
                <option value='$i' 
            ";
            select_fungsi($i, $halaman);
            echo "
                >Halaman $i</option>
            ";
        }
    }
    echo "
        </select>
    ";
}

function jumlah_halaman_buku($kategori, $halaman) {
    echo "
        <select class='form-control my-1' required name='halaman' id='sort'>
    ";
    if ( $kategori <= 12) {
        echo "
        <option value='1'>Halaman 1</option>
        ";
    } else {
        $jumlah_halaman = (ceil($kategori / 12));
        for ($i = 1; $i <= $jumlah_halaman; $i++) {
            echo "
                <option value='$i' 
            ";
            select_fungsi($i, $halaman);
            echo "
                >Halaman $i</option>
            ";
        }
    }
    echo "
        </select>
    ";
}

// menampilkan para pengarang
function tampil_pengarang($data) {
    $offset = (($data['halaman'])-1)*10;
    $kategori = $data['kategori_pengarang'];
    $tampil_pengarang = query("SELECT * FROM pengarang WHERE kategori_pengarang LIKE '$kategori' ORDER BY pengarang.nama_pengarang LIMIT 10 OFFSET $offset");
        
    foreach ($tampil_pengarang as $urutan => $pengarang) {
        $id = perpus_enkripsi($pengarang['id_pengarang']);
        $no = (($urutan+1)+(($data['halaman']-1)*12));
        $nama = $pengarang['nama_pengarang'];
        $kategori = $pengarang['kategori_pengarang'];
        echo "
            <tr>
                <td>$no</td>
                <td>$nama</td>
                <td>$kategori</td>
                <td>
        ";
        ubah_hapus_pengarang($id);
        echo "
                </td>
            </tr>
        ";
    }
}

function tampil_pengguna($data) {
    $offset = (($data['halaman'])-1)*10;
    if (isset($data['cari'])) {
        $id = $data['id'];
    } else {
        $id = perpus_deskripsi($data['id']);
    }
    $tampil_pengguna = query("SELECT user.username, user.nama_user, user.email, user.tipe, user.status_konfirmasi FROM user WHERE tipe < 2 AND (user.username LIKE '%$id%' OR user.nama_user LIKE '%$id%') ORDER BY LENGTH (user.username), user.username LIMIT 10 OFFSET $offset");
    if (count($tampil_pengguna) > 0) {
        foreach ($tampil_pengguna as $urutan => $pengguna) {
            $id = perpus_enkripsi($pengguna['username']);
            $no = (($urutan+1)+(($data['halaman']-1)*10));
            $username = $pengguna['username'];
            $nama = $pengguna['nama_user'];
            $email = $pengguna['email'];
            $hak = $pengguna['tipe'];
            $konfirmasi = $pengguna['status_konfirmasi'];
            echo "
                <tr>
                    <td>$no</td>
                    <td>$username</td>
                    <td>$nama</td>
                    <td>$email</td>
                    <td class='text-right'>
            ";
            ubah_atur_pengguna($id, $hak, $konfirmasi);
            echo "
                    </td>
                </tr>
            ";
        }
    } else {
        echo "
        <div class='container'>
                <h3 class='anim'>
                Maaf, kata kunci yang anda cari tidak ditemukan, coba cari kata kunci lain
                </h3>
        </div>
        ";
    }
}

function tampil_pesan() {
    $pesan_pesan = query("SELECT * FROM pesan");
    if (count($pesan_pesan) > 0) {
        foreach ($pesan_pesan as $urutan => $pesan) {
            $alias = $pesan['alias'];
            $no = $urutan+1;
            $pesan = $pesan['pesan'];
            echo "
                <tr>
                    <td>$no</td>
                    <td>$alias</td>
                    <td>$pesan</td>
                    <td>
            ";
            tombol_hapus_pesan(perpus_enkripsi($alias));
            echo "
                    </td>
                </tr>
            ";
        }
    } else {
        echo "
        <div class='container'>
                <h3 class='anim'>
                Maaf, tidak ada pesan
                </h3>
        </div>
        ";
    }
}

?>