<?php
require('koneksi.php');
include('navbar.php');

// Periksa apakah parameter ID tiket telah diberikan
if (isset($_GET['id'])) {
    $tiket_id = $_GET['id'];

    // Ambil data tiket dari database berdasarkan ID
    $sql = "SELECT * FROM tiket WHERE id = $tiket_id";
    $result = mysqli_query($db_conn, $sql);

    // Periksa apakah data tiket ditemukan
    if (mysqli_num_rows($result) > 0) {
        $tiket_data = mysqli_fetch_assoc($result);
    } else {
        // Redirect atau menampilkan pesan bahwa ID tiket tidak valid
        header("Location: index.php"); // Ganti dengan halaman utama atau halaman lain jika diperlukan
        exit();
    }
} else {
    // Redirect atau menampilkan pesan bahwa ID tiket tidak diberikan
    header("Location: index.php"); // Ganti dengan halaman utama atau halaman lain jika diperlukan
    exit();
}

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

        th, td {
            text-align: center;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
    <title>Detail Tiket</title>
</head>
<body>
<br>
<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="">
            <h4 class="text-center font-weight-bold mb-4"> Detail Tiket </h4>

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
                    <tr>
                        <td><?= $tiket_data['id']; ?></td>
                        <td><?= $tiket_data['nama']; ?></td>
                        <td><?= $tiket_data['email']; ?></td>
                        <td><?= $tiket_data['jumlah_tiket']; ?></td>
                        <td><?= $tiket_data['tgl_pemesanan']; ?></td>
                        <td><?= $tiket_data['tgl_kedatangan']; ?></td>
                        <td><?= $tiket_data['total_harga']; ?></td>
                    </tr>
                </tbody>
            </table>

            <a href="datatiket.php" class="btn btn-primary">Kembali</a>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
