<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'secret';
$db_name = 'pwl_uas';

$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

if (!$db_conn) {
    die('Gagal terhubung ke MySQL: ' . mysqli_connect_error());
} else {
    // echo "Terkoneksi ke MySQL! <br/><br/>";
}
?>