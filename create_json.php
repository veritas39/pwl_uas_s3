<?php
require('koneksi.php');

// Ambil data tiket dari database
$sql = "SELECT id, nama, jenis, spesies, warna, umur FROM hewan";
$result = mysqli_query($db_conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($db_conn));
}

$hewan_data = array();

foreach ($result as $hewan) {
    $hewan_data[] = array(
        'id' => $hewan['id'],
        'nama' => $hewan['nama'],
        'jenis' => $hewan['jenis'],
        'spesies' => $hewan['spesies'],
        'warna' => $hewan['warna'],
        'umur' => $hewan['umur'],
    );
}

// Konversi data ke format JSON
$json_data = json_encode($hewan_data, JSON_PRETTY_PRINT);

// Simpan data JSON ke file
$file_path = 'hewan.json';
file_put_contents($file_path, $json_data);

// Mengonversi pesan menjadi skrip JavaScript
$js_alert = "alert('Data hewan berhasil disimpan dalam file $file_path');";

// Menyisipkan skrip JavaScript ke dalam halaman PHP
echo "<script>$js_alert</script>";
?>

<!-- Di dalam bagian body HTML Anda -->

