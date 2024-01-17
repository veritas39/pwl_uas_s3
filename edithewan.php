<?php
require('koneksi.php');

// Periksa apakah parameter ID tiket telah diberikan
if (isset($_GET['id'])) {
    $hewan_id = $_GET['id'];

    // Ambil data tiket dari database berdasarkan ID
    $sql = "SELECT * FROM hewan WHERE id = $hewan_id";
    $result = mysqli_query($db_conn, $sql);

    // Periksa apakah data tiket ditemukan
    if (mysqli_num_rows($result) > 0) {
        $hewan_data = mysqli_fetch_assoc($result);
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

$message = '';

// Proses formulir edit jika data dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $spesies = $_POST['spesies'];
    $warna = $_POST['warna'];
    $umur = $_POST['umur'];

    // Validasi input kosong
    if (empty($nama) || empty($jenis) || empty($spesies) || empty($warna) || empty($umur)) {
        $message = 'Semua kolom harus diisi.';
    } else {
        // Update data tiket di database
        $update_sql = "UPDATE tiket SET 
                        nama = '$nama', 
                        jenis = '$jenis', 
                        spesies = '$spesies', 
                        warna = '$warna', 
                        umur = '$umur', 
                        WHERE id = $hewan_id";

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
        <section class="col-12 col-sm-8 col-md-6 mx-auto">
            <h4 class="text-center font-weight-bold mb-4"> Edit Hewan </h4>

            <?php if (!empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="edithewan.php?id=<?= $tiket_id; ?>">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $hewan_data['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis:</label>
                    <input type="jenis" class="form-control" id="jenis" name="jenis" value="<?= $hewan_data['jenis']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="spesies">Spesies:</label>
                    <input type="spesies" class="form-control" id="spesies" name="spesies" value="<?= $hewan_data['spesies']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="warna">Warna:</label>
                    <input type="warna" class="form-control" id="warna" name="warna" value="<?= $hewan_data['warna']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="umur">Umur:</label>
                    <input type="umur" class="form-control" id="umur" name="umur" value="<?= $hewan_data['umur']; ?>" required>
                </div>
                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error; ?>
                    </div>
                <?php } ?>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>

            <a href="datahewan.php" class="btn btn-secondary mt-3">Batal</a>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>