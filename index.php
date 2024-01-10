<?php
require('koneksi.php');

session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
}


// $table_name = 'bryan';


// $sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
//     `id_pembeli` INT(10) NOT NULL, 
//     `nama` VARCHAR(30) NOT NULL,
//     `alamat` VARCHAR(50) NOT NULL,
//     `hp` VARCHAR(20) NOT NULL,
//     `tgl_transaksi` DATE NOT NULL,
//     `jenis_barang` VARCHAR(25) NOT NULL,
//     `nama_barang` VARCHAR(50) NOT NULL,
//     `jumlah` INT(20) NOT NULL,
//     `harga` INT(25) NOT NULL,
//     PRIMARY KEY (`id_pembeli`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';

// $query = mysqli_query($db_conn, $sql);

// if (!$query) {
//     die('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($db_conn));
// }



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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>
<body class="p-0 mx-0">
    <nav>
        <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Home</button></a>
        <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Satwa</button></a>
        <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Flora</button></a>
        <a href="#" class="mx-3"><button type="button" class="btn btn-light mr-5">Event</button></a>
        <a href="#" class="mx-3"><button type="button" class="btn btn-l mr-5">Profile</button></a>
        <button onClick="menglogout()" class="btn btn-danger my-2 my-sm-0 logout-btn">Log out</button>    
    </nav>
 <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Isi kolom pertama di sini -->
                
            </div>
            <div class="col-md-6 display-5 py-3 my-5">
                <!-- Isi kolom kedua di sini -->
                <h1>Welcome, <?php echo $_SESSION["$username"]; ?></h1>
                <h1>Selamat Datang di Sistem Informasi Kebun Binatang Indonesia</h1>
                <p>Temukan berbagai kabar terbaru kami disini</p>
                <button type="button" onclick="redirectToPage()" class="btn btn-l mr-5 btn-outline-primary btn-lg btn-block">Rencanakan Kunjungan Anda</button></a>
            </div>
        </div>
    </div>
    <div class="container bg-dark my-5">
        <div class="row my-3">
            <div class="col-md-6 m-lg-3 text-light">
                <h1 class="display-4">Ragam Satwa</h1>
                <p class="display-5">Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet 
                Lorem ipsum sit dolor amet Lorem ipsum sit dolor amet</p>
            </div>
            <div class="col-md-6">
            <img src="images/1.jpg"class="img-fluid float-start mx-auto">
            </div>
        </div>
    </div>
    <tbody>';
echo '
    </tbody>
</table>';


?>

<script>
    function menglogout() {
        window.location.href = 'logout.php';
    }
</script>
<script>
    function redirectToPage() {
        window.location.href = 'ticket.php';
    }
</script>
</body>

</html>