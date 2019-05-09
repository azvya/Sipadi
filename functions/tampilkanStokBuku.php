<?php 
session_start();
if ( 
    (!isset($_SESSION['username']))) {
    header("Location: ../../");
    exit;
}
require 'functions.php';
echo "
    <table class='anim table table-border table-striped table-hover'>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Stok</th>
            <th>Atur Stok<th>
        </tr>
";
tampil_pengguna($_GET);
echo "
</table>
";
?>