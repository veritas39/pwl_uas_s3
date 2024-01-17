<?php
require('koneksi.php');
include('navbar.php');

// session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
}
?>


<html>
<head>
    <title></title>
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
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body class="p-0 mx-0">
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
            <h1>Halo, <?php echo $_SESSION['username']; ?></h1>
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

    <div class="container bg-dark my-5">
        <div class="mx-auto">
            <div class="col-md-6 m-lg-3 text-light">
                
            </div>
           
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
        <img class="d-block w-100" src="./gambar/image5.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./gambar/imagee1.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./gambar/imagee4.jpeg" alt="Third slide">
      </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./gambar/image2.jpeg" alt="Four slide">
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
    <tbody>;

    </tbody>
</table>;


<script>
    function menglogout() {
        window.location.href = 'logout.php';
    }

    function redirectToPage() {
        window.location.href = 'tiket.php';
    }
    // function redirectTiket() {
    //     window.location.href = 'tiket.php';
    // }
</script>
<!-- Footer -->
<footer class="bg-black text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                    </h6>
                    <p>
                        Politeknik Project | Empowering Innovation
                        <br><br>

                        Designed by: Politeknik Project Design Team
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Jakarta, JKT 10012, INA</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        politeknik.negeri.jakarta.tik22@mhsw.pnj.ac.id
                    </p>
                    <p><i class="fas fa-phone me-3"></i> +62 896-6367-7500 </p>
                    <p><i class="fas fa-print me-3"></i> +62 813-6059-4828</p>
                    <p><i class="fas fa-print me-3"></i> +62 852-1156-4827</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

</body>

</html>