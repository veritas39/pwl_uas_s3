<?php
require('koneksi.php');
include('navbar.php');

$error = '';
$success_message = '';
$table_name ='tiket';

$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `jumlah_tiket` INT(11) NOT NULL,
    `tgl_pemesanan` DATE NOT NULL,
    `tgl_kedatangan` DATE NOT NULL,
    `total_harga` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';

$query = mysqli_query($db_conn, $sql);

$harga_per_tiket = 25000;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($db_conn, $_POST['nama']);
    $email = mysqli_real_escape_string($db_conn, $_POST['email']);
    $jumlahTiket = mysqli_real_escape_string($db_conn, $_POST['jumlah_tiket']);
    $tglPemesanan = mysqli_real_escape_string($db_conn, $_POST['tgl_pemesanan']);
    $tglkedatangan = mysqli_real_escape_string($db_conn, $_POST['tgl_kedatangan']);

    // Periksa apakah ada kolom yang kosong
    if (empty($nama) || empty($email) || empty($jumlahTiket) || empty($tglPemesanan) || empty($tglkedatangan)) {
        $error = 'Jangan Kosong cuy.';
    } else {
        $totalHarga = $jumlahTiket * $harga_per_tiket;

        $query = "INSERT INTO tiket (nama, email, jumlah_tiket, tgl_pemesanan, tgl_kedatangan, total_harga) VALUES ('$nama','$email', '$jumlahTiket', '$tglPemesanan', '$tglkedatangan', '$totalHarga')";
        $result = mysqli_query($db_conn, $query);

        if ($result) {
            $success_message = 'berhasil disimpan cuy!';
        } else {
            $error = 'Gagal menyimpan tiket. Silakan coba lagi.';
        }
    }
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
    <link rel="stylesheet" href="style.css"><br><br><br>
    <title>Form Tiket</title>
</head>
<body style="background-color: gray; color: black; font-family: 'Helvetica Neue', sans-serif; margin: 0; padding: 0; height: 100vh; overflow: hidden;">

<section class="container-fluid mb-4 py-4">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container" action="tiket.php" method="POST">
                <h4 class="text-center font-weight-bold"> Form Tiket </h4>
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                <?php } ?>

                <?php if ($success_message != '') { ?>
                    <div class="alert alert-success" role="alert"><?= $success_message; ?></div>
                <?php } ?>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                </div>

                <div class="form-group">
                    <label for="jumlah_tiket">Jumlah Tiket</label>
                    <select class="form-control" id="jumlah_tiket" name="jumlah_tiket">
                        <option value="1">1 Tiket</option>
                        <option value="2">2 Tiket</option>
                        <option value="3">3 Tiket</option>
                        <option value="4">4 Tiket</option>
                        <option value="5">5 Tiket</option>
                        <option value="6">6 Tiket</option>
                    </select>
                </div>

                <div class="form-group d-none">
                    <label for="tgl_pemesanan">Tanggal Pemesanan</label>
                    <input type="date" class="form-control" id="tgl_pemesanan" name="tgl_pemesanan">
                </div>

                <div class="form-group">
                    <label for="tgl_kedatangan">Reservasi Kedatangan</label>
                    <input type="date" class="form-control" id="tgl_kedatangan" name="tgl_kedatangan">
                </div>

                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button> <br>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </form>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    function calculateTotal() {
        var jumlahTiket = document.getElementById('jumlah_tiket').value;
        var totalHarga = jumlahTiket * <?= $harga_per_tiket; ?>;
        document.getElementById('total_harga').value = totalHarga;
    }

    document.getElementById('jumlah_tiket').addEventListener('input', calculateTotal);
    calculateTotal();

    document.getElementById('tgl_pemesanan').valueAsDate = new Date();

</script>
</body>
</html>
