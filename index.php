<?php
require('koneksi.php');
include('navbar.php');

session_start();

if( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
}


echo '
<html>
<head>
    <title></title>
    <style>
        body {font-family: tahoma, arial; padding: 20px;}        
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<br><br>
<h2>Halaman Utama</h2>

    <tbody>';
echo '
    </tbody>
</table>';
?>

<script>
    function menglogout() {
        window.location.href='logout.php';
    }

    // function redirectTiket() {
    //     window.location.href = 'tiket.php';
    // }
</script>
</body>
</html>
