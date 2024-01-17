<?php
require('koneksi.php');

// Periksa apakah parameter ID tiket telah diberikan
if (isset($_GET['id'])) {
    $tiket_id = $_GET['id'];

    // Hapus data tiket dari database berdasarkan ID
    $delete_sql = "DELETE FROM tiket WHERE id = $tiket_id";

    if (mysqli_query($db_conn, $delete_sql)) {
        $message = "Data tiket berhasil dihapus!";
        echo "<script>alert('$message');</script>";
        header("Location: datatiket.php"); // Redirect ke halaman utama setelah berhasil menghapus
        exit();
    } else {
        echo "Error: " . $delete_sql . "<br>" . mysqli_error($db_conn);
    }
} else {
    // Redirect atau menampilkan pesan bahwa ID tiket tidak diberikan
    $error = "ID tiket tidak valid!";
    echo "<script>alert('$error');</script>";
    header("Location: index.php"); // Ganti dengan halaman utama atau halaman lain jika diperlukan
    exit();
}
?>
