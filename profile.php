<?php
session_start();

require('koneksi.php');
include('navbar.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($db_conn, $query);

if (!$result) {
    die('ERROR: ' . mysqli_error($db_conn));
}

$userData = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: white;

        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>

<body>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $userData['name']; ?></span><span class="text-black-50"><?php echo $userData['email']; ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><br><?php echo $userData['name']; ?><br></div>
                        <div class="col-md-6"><label class="labels">Username</label><br><?php echo $userData['username']; ?><br></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email ID</label><br><?php echo $userData['email']; ?><br></div>
                    </div>
                    <div class="row  px-4">
                        <div class="col-sm-6">
                            <div class=" mt-5 text-center"><button class="btn btn-success profile-button" type="button" onclick="editing()">Edit Profile</button></div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="p-1">
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="lihattiket()">Riwayat Pemesanan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </tbody>
    </table>
    <script>
        function menglogout() {
            window.location.href = 'logout.php';
        }

        function lihattiket() {
            window.location.href = 'tiketsaya.php';
        }
        function editing(){
            window.location.href = 'profileedit.php';
        }
    </script>
    <script>
        function redirectToPage() {
            window.location.href = 'ticket.php';
        }
    </script>

</body>

</html>