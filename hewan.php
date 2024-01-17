<?php
require('koneksi.php');
include('navbar.php');

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($db_conn, $_POST['nama']);
    $jenis = mysqli_real_escape_string($db_conn, $_POST['jenis']);
    $spesies = mysqli_real_escape_string($db_conn, $_POST['spesies']);
    $warna = mysqli_real_escape_string($db_conn, $_POST['warna']);
    $umur = mysqli_real_escape_string($db_conn, $_POST['umur']);

    // Check for empty fields
    if (empty($nama) || empty($jenis) || empty($spesies) || empty($warna) || empty($umur)) {
        $error = 'Jangan Kosong cuy.';
    } else {
        $query = "INSERT INTO hewan (nama, jenis, spesies, warna, umur) VALUES ('$nama', '$jenis', '$spesies', '$warna', '$umur')";
        $result = mysqli_query($db_conn, $query);

        if ($result) {
            $success_message = 'Data hewan berhasil disimpan cuy!';
        } else {
            $error = 'Gagal menyimpan data hewan. Silakan coba lagi.';
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
    <link rel="stylesheet" href="style.css">
    <title>Data Hewan</title><br>
</head>
<body>

<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <h4 class="text-center font-weight-bold mb-4"> Data Hewan </h4>

            <?php if ($error != '') { ?>
                <div class="alert alert-danger" role="alert"><?= $error; ?></div>
            <?php } elseif ($success_message != '') { ?>
                <div class="alert alert-success" role="alert"><?= $success_message; ?></div>
            <?php } ?>

            <form class="form-container" action="hewan.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis">
                </div>
                <div class="form-group">
                    <label for="spesies">Spesies</label>
                    <input type="text" class="form-control" id="spesies" name="spesies" placeholder="Masukkan Spesies">
                </div>
                <div class="form-group">
                    <label for="warna">Warna</label>
                    <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan Warna">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan Data Hewan</button> <br>
                <a href="datahewan.php" class="btn btn-primary">Kembali</a>
            </form>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>
