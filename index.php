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

echo '
<html>
<head>
    <title>Latihan SQL</title>
    <style>
        body {
            font-family: tahoma, arial;
            padding: 0px;
            margin: 0px;
        }
        .col-md-6 {
            margin: 0;
        }
         .row {
            margin: 0;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .logout-btn {
            margin-left: auto; /* Ini akan membuat tombol logout berada di sebelah kanan */
        }
        
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>
<body class="p-0 mx-0 ">
    <!--<nav class="p-4 d-flex  flex-row-reverse">
    <button onClick="menglogout()" class="btn btn-danger my-2 my-sm-0 logout-btn">Log out</button>    
    <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5" onClick="profilebutton()">Profile</button></a>
    <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Event</button></a>
    <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Flora</button></a>
    <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Satwa</button></a>
        <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Home</button></a>
    </nav>-->
    <div class="row p-5">
        <div class="col-sm-6 py-4">
        <img src="images/2.jpg" class="img-fluid float-start mx-auto rounded-lg">
        </div>
        <div class="col-sm-6 py-5 px-5 ">
            <h1>Welcome, <?php echo $_SESSION["$username"]; ?></h1>
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
                <h1>Halo, <?php echo ["$username"]; ?></h1>
                <h1>Selamat Datang di Sistem Informasi Kebun Binatang Indonesia</h1>
                <p>Temukan berbagai kabar terbaru kami disini</p>
                <button type="button" onclick="redirectToPage()" class="btn btn-l mr-5 btn-outline-primary btn-lg btn-block">Rencanakan Kunjungan Anda</button></a>

        </div>
    </div>
    <div class="px-4">
    <div class="row  px-4">
        <div class="col-sm-6 bg-primary bg-opacity-50 text-dark p-5 text-center">
            <h1 class="display-4 py-5">Ragam Satwa</h1>
                <p>Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet 
                Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet</p>

                <button type="button" class="btn btn-outline-primary m-2">Animalia</button>
                <button type="button" class="btn btn-outline-primary m-2">Chordata</button>
                <button type="button" class="btn btn-outline-primary m-2">Vertebrata</button>
                <button type="button" class="btn btn-outline-primary m-2">Aves</button>
                <button type="button" class="btn btn-outline-primary m-2">Psittaciformes</button>
                <button type="button" class="btn btn-outline-primary m-2">Cacatuidae</button>
                <button type="button" class="btn btn-outline-primary m-2">Cacatua</button>
                <button type="button" class="btn btn-outline-primary m-2">Cacatua Sulphurea</button>

                </div>
        <div class="col-sm-6 bg-dark text-white">
            <img src="images/1.jpg" class="img-fluid p-5">

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
    <div class="row px-4">
        <div class="col-sm-6 bg-dark text-white">
            <img src="images/flower.jpg" class="img-fluid p-5">
        </div>
    <div class="col-sm-6 bg-success bg-opacity-50 text-dark p-5 text-center">
        <h1 class="display-4 py-5">Ragam Satwa</h1>
            <p>Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet 
            Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet</p>

            <button type="button" class="btn btn-outline-success m-2">Plantae</button>
            <button type="button" class="btn btn-outline-success m-2">Magnoliophyta</button>
            <button type="button" class="btn btn-outline-success m-2">Magnoliopsida</button>
            <button type="button" class="btn btn-outline-success m-2">Lamiales</button>
            <button type="button" class="btn btn-outline-success m-2">Scrophulariaceae</button>
            <button type="button" class="btn btn-outline-success m-2">Buddleja</button>
            <button type="button" class="btn btn-outline-success m-2">Budleja Davidi</button>

    </div>
    </div>
    </div>
    <tbody>';
echo '    </tbody>
</table>';
?>
<script>
    function menglogout() {
        window.location.href='logout.php';
    }
    function redirectToPage() {
        window.location.href ='tiket.php';
    }
    // function redirectTiket() {
    //     window.location.href = 'tiket.php';
    // }

    function redirectToPage() {
        window.location.href = 'tiket.php';
    }

</script>
</body>
</html>
