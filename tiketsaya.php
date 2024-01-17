<?php
session_start();

require('koneksi.php');
include('navbar.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

$query = "SELECT * FROM tiket WHERE email = '$email'";
$result = mysqli_query($db_conn, $query);

if (!$result) {
    die('ERROR: ' . mysqli_error($db_conn));
}

$tiket_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

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

        th,
        td {
            text-align: center;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
    <title>Data Tiket Saya</title>
</head>

<body>

    <section class="container-fluid mb-4">
        <section class="row justify-content-center">
            <section class="">
                <h4 class="text-center font-weight-bold mb-4"> Data Tiket Saya </h4>

                <?php if (empty($tiket_data)) { ?>
                    <div class="alert alert-info" role="alert">Belum ada data tiket yang dimasukkan.</div>
                <?php } else { ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
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
                                    <td><?= $tiket['email']; ?></td>
                                    <td><?= $tiket['jumlah_tiket']; ?></td>
                                    <td><?= $tiket['tgl_pemesanan']; ?></td>
                                    <td><?= $tiket['tgl_kedatangan']; ?></td>
                                    <td><?= $tiket['total_harga']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-primary">Kembali</a><br>
                <?php } ?>
            </section>
        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>