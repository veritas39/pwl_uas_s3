<?php
session_start();

if(isset($_GET['image'])) {
    // Generate random string untuk captcha
    $captcha_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6);

    // Simpan captcha string pada session
    $_SESSION['captcha_string'] = $captcha_string;

    // Mengatur gambar dengan format png
    header('Content-type: image/png');

    // Menentukan ukuran gambar untuk captcha
    $image = imagecreatetruecolor(120, 40);
    
    // Mengubah warna untuk nanti gambar/background dibawah text
    $bg_color = imagecolorallocate($image, 0, 145, 255);

    // Mengisi warna untuk backgroundnya
    imagefilledrectangle($image, 0, 0, 120, 40, $bg_color);

    // Warna text hitam
    $text_color = imagecolorallocate($image, 0, 0, 0);

    // Menambahkan captcha string ke gambar
    imagestring($image, 5, 20, 10, $captcha_string, $text_color);

    // Output gambar dengan format png
    imagepng($image);

    imagedestroy($image);

    exit();
}
?>
