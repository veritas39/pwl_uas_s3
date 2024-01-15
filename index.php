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
<body class="bg-secondary">
 <div class="container">
    <br><br><br><br>
        <div class="row">
            <div class="col-md-6">
                <!-- Isi kolom pertama di sini -->
                <img src="./gambar/imagee3.jpeg" class="img-fluid float-start mx-auto rounded-lg">
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
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./gambar/image2.jpeg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./gambar/imagee1.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./gambar/imagee4.jpeg" alt="Third slide">
      </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./gambar/image5.jpg" alt="Four slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./gambar/image6.jpg" alt="Five slide">
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
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
