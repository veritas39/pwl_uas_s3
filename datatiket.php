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


// Ambil data tiket dari database
$sql = 'SELECT * FROM tiket';
$result = mysqli_query($db_conn, $sql);

// Inisialisasi variabel untuk menampilkan pesan jika tidak ada data
$no_data_message = '';

// Cek apakah ada data tiket
if (mysqli_num_rows($result) > 0) {
    // Data tiket ditemukan
    $tiket_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Tidak ada data tiket
    $no_data_message = 'Belum ada data tiket yang dimasukkan.';
}
?>

<?php if ($_SESSION['privilege'] == 'admin') { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
    <title>Data Tiket</title>
</head>
<body>
<br>
<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="">
            <h4 class="text-center font-weight-bold mb-4"> Data Tiket </h4>

            <form action="datatiket.php" method="get">
        <input type="text" name="cari" placeholder="Cari Nama & Id">
        <input type="submit" value="Cari">
    </form><br>

            <?php if ($no_data_message != '') { ?>
                <div class="alert alert-info" role="alert"><?= $no_data_message; ?></div>
            <?php } else { ?>
                <table class="table rounded">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <!-- <th>Email</th> -->
                            <th>Jumlah Tiket</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th> <!-- Kolom untuk menampilkan opsi aksi -->
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
                
                        $query = "SELECT id, nama, email, jumlah_tiket, tgl_pemesanan, tgl_kedatangan, total_harga
                        FROM tiket
                        WHERE nama LIKE '%$cari%' OR id = '$cari'
                        LIMIT $mulai, $per_halaman";
                
                
                        $result = mysqli_query($db_conn, $query);
                
                        if (!$result) {
                            die("Query failed: " . mysqli_error($koneksi));
                        }
                        
                        foreach ($tiket_data as $tiket) { ?>
                            <tr>
                                <td><?= $tiket['id']; ?></td>
                                <td><?= $tiket['nama']; ?></td>
                                <!-- <td><?= $tiket['email']; ?></td> -->
                                <td><?= $tiket['jumlah_tiket']; ?></td>
                                <td><?= $tiket['tgl_pemesanan']; ?></td>
                                <td><?= $tiket['tgl_kedatangan']; ?></td>
                                <td><?= $tiket['total_harga']; ?></td>
                                <td>
                                    <!-- Tombol/Tautan Detail -->
                                    <a href="detail.php?id=<?= $tiket['id']; ?>" class="btn btn-info btn-sm">Detail</a>

                                    <!-- Tombol/Tautan Edit -->
                                    <a href="edit.php?id=<?= $tiket['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Tombol/Tautan Hapus -->
                                    <a href="hapus.php?id=<?= $tiket['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            <?php 
         $query_jumlah = "SELECT COUNT(*) AS total_tiket FROM tiket WHERE nama LIKE '%$cari%' OR id = '$cari'";
         $result_jumlah = mysqli_query($db_conn, $query_jumlah);
         
         if (!$result_jumlah) {
             die("Query failed: " . mysqli_error($db_conn));
         }
         
         $row_jumlah = mysqli_fetch_assoc($result_jumlah);
         $total_tiket = $row_jumlah['total_tiket'];
         $total_halaman = ceil($total_tiket / $per_halaman);
         
         echo "Total: " . $total_tiket;
         
         echo "<ul class='pagination'>";
         for ($i = 1; $i <= $total_halaman; $i++) {
             echo "<li><a href='datatiket.php?halaman=$i'>$i</a></li>";
         }
         echo "</ul>";} ?>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<?php } else { ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
    <title>Data Tiket</title>
</head>
<body>
<br>
<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="">
            <h4 class="text-center font-weight-bold mb-4"> Data Tiket </h4>

            <?php if ($no_data_message != '') { ?>
                <div class="alert alert-info" role="alert"><?= $no_data_message; ?></div>
            <?php } else { ?>
                <table class="table rounded">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <!-- <th>Email</th> -->
                            <th>Jumlah Tiket</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tiket_data as $tiket) { ?>
                            <tr>
                                <td><?= $tiket['id']; ?></td>
                                <td><?= $tiket['nama']; ?></td>
                                <!-- <td><?= $tiket['email']; ?></td> -->
                                <td><?= $tiket['jumlah_tiket']; ?></td>
                                <td><?= $tiket['tgl_pemesanan']; ?></td>
                                <td><?= $tiket['tgl_kedatangan']; ?></td>
                                <td><?= $tiket['total_harga']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            <?php } ?>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
<?php } ?>
