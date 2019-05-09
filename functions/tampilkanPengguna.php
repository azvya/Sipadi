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
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Hak Admin</th>
        </tr>
";
tampil_pengguna($_GET);
echo "
</table>
";
?>