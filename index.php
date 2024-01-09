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
    <title>Latihan SQL</title>
    <style>
        body {font-family: tahoma, arial; padding: 20px;}        
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div style="display: flex; justify-content: space-between; align-items: center;">
    <div>
        <!-- <h2></h2> -->
    </div>
    <div>
    <button onClick="redirectTiket()" class="btn btn-outline-success my-2 my-sm-0">Tiket</button>
    </div>
    <div>
    <button onClick="menglogout()" class="btn btn-outline-success my-2 my-sm-0">Log out</button>
    </div>
</div>



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
