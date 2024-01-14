<?php
require('koneksi.php');
include('navbar.php');

session_start();

if( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
} else {
    $username = $_SESSION['username'];
}
?>

<html>
<head>
    <title></title>
    <style>
        body {font-family: tahoma, arial; padding: 20px;}        
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-0 mx-0">
 <div class="container">
    <br><br><br><br>
        <div class="row">
            <div class="col-md-6">
                <!-- Isi kolom pertama di sini -->
                <img src="./gambar/image2.jpeg" class="img-fluid float-start mx-auto rounded-lg">
            </div>
            <div class="col-md-6 display-5">
                <!-- Isi kolom kedua di sini -->
                <h1>Halo, <?php echo $username; ?></h1>
                <h1>Selamat Datang di Sistem Informasi Kebun Binatang Indonesia</h1>
                <p>Temukan berbagai kabar terbaru kami disini</p>
                <button type="button" onclick="redirectToPage()" class="btn btn-l mr-5 btn-outline-primary btn-lg btn-block">Rencanakan Kunjungan Anda</button></a>
            </div>
        </div>
    </div>
    <div class="container bg-dark my-5 rounded-lg">
        <div class="row my-3">
            <div class="col-md-6 m-lg-3 text-light">
                <h1 class="display-4">Ragam Satwa</h1>
                <p class="display-5">Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet 
                Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet</p>
            </div>
            <div class="col-md-12">
            <img src="./gambar/image1.jpeg" class="img-fluid float-start mx-auto mb-3 rounded-lg">
            </div>
        </div>
    </div>
    <tbody>
    </tbody>
</table>

<script>
    function menglogout() {
        window.location.href='logout.php';
    }

    function redirectToPage() {
        window.location.href = 'tiket.php';
    }
</script>
</body>
</html>
