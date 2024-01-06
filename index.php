<?php
require('koneksi.php');

session_start();

if( !isset($_SESSION['username']) ){
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
    <button onClick="menglogout()" class="btn btn-success my-2 my-sm-0">Log out</button>
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
</script>
</body>
</html>
