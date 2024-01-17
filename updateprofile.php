<?php
session_start();

require('koneksi.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $newUsername = $_POST['username'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE users SET name='$name', username='$newUsername', email='$email' WHERE username='$username'";
    $updateResult = mysqli_query($db_conn, $updateQuery);

    if (!$updateResult) {
        die('ERROR: ' . mysqli_error($db_conn));
    }

    header('Location: profileedit.php');
    exit();
}