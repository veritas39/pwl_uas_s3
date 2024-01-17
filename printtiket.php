<?php
require('koneksi.php');


session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
}


echo '

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .ticket-bg {
        
    }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-secondary p-2 text-dark bg-opacity-25 align-middle">
    <div class="p-5 my-5 mx-3 ">
    <br>
    <div class="row py-4 bg-light fs-5 ">
        
        <div class="col-sm-6 px-3 py-2 ticket-bg" >
        <p>Nama :</p>

        </div>
        
        <div class="col-sm-6 py-5 px-5 ">
        
        </div>
    </div>
    </div>
</body>
</html>

';


?>

<script>
    function menglogout() {
        window.location.href = 'logout.php';
    }

    function redirectToPage() {
        window.location.href = 'tiket.php';
    }
    // function redirectTiket() {
    //     window.location.href = 'tiket.php';
    // }
</script>
</body>

</html>