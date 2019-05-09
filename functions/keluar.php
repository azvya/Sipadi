<?php 
session_start();

if (!isset($_SESSION['username'])) {
    session_destroy();
    header("Location: ../../all/login.php");
    exit;
} else {
    session_destroy();
    header("Location: ../../");
    exit;
}


?>