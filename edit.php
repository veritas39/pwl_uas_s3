<?php
require('koneksi.php');

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

// Pesan default
$message = '';

// Proses formulir edit jika data dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];
    $tgl_kedatangan = $_POST['tgl_kedatangan'];
    $total_harga = $_POST['total_harga'];

    // Validasi input kosong
    if (empty($nama) || empty($email) || empty($jumlah_tiket) || empty($tgl_pemesanan) || empty($tgl_kedatangan)) {
        $message = 'Semua kolom harus diisi.';
    } else {
        // Update data tiket di database
        $update_sql = "UPDATE tiket SET 
                        nama = '$nama', 
                        email = '$email', 
                        jumlah_tiket = '$jumlah_tiket', 
                        tgl_pemesanan = '$tgl_pemesanan', 
                        tgl_kedatangan = '$tgl_kedatangan', 
                        total_harga = '$total_harga' 
                        WHERE id = $tiket_id";

        if (mysqli_query($db_conn, $update_sql)) {
            $message = 'Data berhasil diedit.';
        } else {
            $message = "Error: " . $update_sql . "<br>" . mysqli_error($db_conn);
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
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-fluid {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
    <title>Edit Tiket</title>
</head>
<body>

<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-8 col-md-6 mx-auto shadow-lg rounded p-3">
            <h4 class="text-center font-weight-bold mb-3"> Edit Tiket </h4>

            <?php if (!empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <form class="form-container" method="post" action="edit.php?id=<?= $tiket_id; ?>">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $tiket_data['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $tiket_data['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_tiket">Jumlah Tiket:</label>
                    <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?= $tiket_data['jumlah_tiket']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tgl_pemesanan">Tanggal Pemesanan:</label>
                    <input type="date" class="form-control" id="tgl_pemesanan" name="tgl_pemesanan" value="<?= $tiket_data['tgl_pemesanan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tgl_kedatangan">Tanggal Kedatangan:</label>
                    <input type="date" class="form-control" id="tgl_kedatangan" name="tgl_kedatangan" value="<?= $tiket_data['tgl_kedatangan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="total_harga">Total Harga:</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" value="<?= $tiket_data['total_harga']; ?>" readonly>
                </div>
                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error; ?>
                    </div>
                <?php } ?>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>

            <a href="datatiket.php" class="btn btn-secondary mt-3 mb-1">Kembali</a>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
