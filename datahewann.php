<?php
require('koneksi.php');
include('navbar.php');

// session_start();

$error = '';
$success_message = '';
$table_name ='hewan';

$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(255) NOT NULL,
    `jenis` VARCHAR(255) NOT NULL,
    `spesies` VARCHAR(255) NOT NULL,
    `warna` VARCHAR(255) NOT NULL,
    `umur` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$query = mysqli_query($db_conn, $sql);

// Ambil data tiket dari database
$sql = 'SELECT * FROM hewan';
$result = mysqli_query($db_conn, $sql);

// Inisialisasi variabel untuk menampilkan pesan jika tidak ada data
$no_data_message = '';

// Cek apakah ada data tiket
if (mysqli_num_rows($result) > 0) {
    // Data tiket ditemukan
    $hewan_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Tidak ada data tiket
    $no_data_message = 'Belum ada data tiket yang dimasukkan.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-fluid {
            margin-top: 50px;
        }

        .table {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
        }

        .alert {
            margin-top: 20px;
        }

        .a {
            text-align: center;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #007bff;
            margin: 0 4px;
            border-radius: 5px;
            width: 40px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .pagination a:hover:not(.active) {
            background-color: #007bff;
            color: white;
        }
    </style>
    <title>Data Hewan</title>
</head>
<body>
<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="">
            <h4 class="text-center font-weight-bold mb-4 py-4"> Data Hewan </h4>

            <form action="datahewan.php" method="get">
        <input type="text" name="cari" placeholder="Cari Nama & Id">
        <input type="submit" value="Cari" class="btn-primary rounded">
    </form><br>

            <?php if ($no_data_message != '') { ?>
                <div class="alert alert-info" role="alert"><?= $no_data_message; ?></div>
            <?php } else { ?>
            
    <table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <!-- <th>Email</th> -->
            <th>Jenis</th>
            <th>Spesies</th>
            <th>Warna</th>
            <th>Umur</th>
            <!-- ADMIN VIEW -->
            <?php if ($_SESSION['privilege'] == 'admin') { ?>
            <th>Opsi</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        
        if (!$result) {
            die("Query failed: " . mysqli_error($db_conn));
        }
        $per_halaman = 7;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $mulai = ($halaman - 1) * $per_halaman;
        $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

        $query = "SELECT id, nama, jenis, spesies, warna, umur
        FROM hewan
        WHERE Nama LIKE '%$cari%' OR id = '$cari'
        LIMIT $mulai, $per_halaman";


        $result = mysqli_query($db_conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($koneksi));
        }
        
        foreach ($result as $hewan) { ?>
            <tr>
                <td><?= $hewan['id']; ?></td>
                <td><?= $hewan['nama']; ?></td>
                <td><?= $hewan['jenis']; ?></td>
                <td><?= $hewan['spesies']; ?></td>
                <td><?= $hewan['warna']; ?></td>
                <td><?= $hewan['umur']; ?></td>
                <!-- ADMIN VIEW -->
                <?php if ($_SESSION['privilege'] == 'admin') { ?>
                <td>
                    <!-- Tombol/Tautan Detail -->
                    <a href="detailhewan.php?id=<?= $hewan['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                    
                    <!-- Tombol/Tautan Edit -->
                    <a href="edithewan.php?id=<?= $hewan['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    
                    <!-- Tombol/Tautan Hapus -->
                    <a href="hapushewan.php?id=<?= $hewan['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                <?php } ?>
            </tr>
            
        <?php 
    } ?>
    </tbody>
    
    </table>

<a href="index.php" class="btn btn-primary">Kembali</a>
<!-- ADMIN VIEW -->
<?php if ($_SESSION['privilege'] == 'admin') { ?>
<a href="hewan.php" class="btn btn-primary">Tambah hewan</a><br><br>
<?php } ?>
<br>
<?php 
$query_jumlah = "SELECT COUNT(*) AS total_hewan FROM hewan WHERE Nama LIKE '%$cari%' OR id = '$cari'";
$result_jumlah = mysqli_query($db_conn, $query_jumlah);

if (!$result_jumlah) {
    die("Query failed: " . mysqli_error($db_conn));
}

$row_jumlah = mysqli_fetch_assoc($result_jumlah);
$total_hewan = $row_jumlah['total_hewan'];
$total_halaman = ceil($total_hewan / $per_halaman);

echo "Total: " . $total_hewan;

echo "<ul class='pagination'>";
for ($i = 1; $i <= $total_halaman; $i++) {
    echo "<li><a href='datahewan.php?halaman=$i'>$i</a></li>";
}
echo "</ul>";} ?>
        </section>
        
    </section>
</section>
<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

</body>
</html>
