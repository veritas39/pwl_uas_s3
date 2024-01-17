<?php
require('koneksi.php');
require('captcha.php');

$table_name = 'users';

$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `name` VARCHAR(70) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `privilege` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';

$query = mysqli_query($db_conn, $sql);

if (!$query) {
    die('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($db_conn));
}

// session_start();

$error = '';
$validate = '';

if (isset($_SESSION['username'])) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($db_conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($db_conn, $password);

    if (!empty(trim($username)) && !empty(trim($password))) {
        $query  = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db_conn, $query);
        $rows   = mysqli_num_rows($result);

        if ($rows != 0) {
            // $hash = mysqli_fetch_assoc($result)['password'];
            $user = mysqli_fetch_assoc($result); //a
            $hash = $user['password']; //a
            if (password_verify($password, $hash)) {
                $entered_captcha = $_POST['captcha'];
                $captcha_from_session = $_SESSION['captcha_string'];

                if ($entered_captcha == $captcha_from_session) {
                    $_SESSION['username'] = $username;
                    $_SESSION['privilege'] = $user['privilege']; //b
                    header('Location: index.php');
                } else {
                    $error = 'Captcha salah cuy';
                }
            } else {
                $error = 'Login gagal!';
            }
        } else {
            $error = 'Username salah!';
        }
    } else {
        $error = 'Username dan password harus diisi!';
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
</head>

<body>
<section class="vh-100" style="background-color: #757c88;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;" >
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./gambar/jerapah.jpeg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form class="form-container"  action="login.php" method="POST">
                <h4 class="text-center font-weight-bold"> Sign-In </h4>
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"> <?= $error; ?></div>
                <?php } ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                </div>
                <div class="form-group captcha-container">
                    <label for="captcha">Captcha</label>
                    <div class="captcha-image mb">
                        <img src="captcha.php?image" alt="Captcha Image">
                    </div>
                    <input type="text" class="form-control mt-2" id="captcha" name="captcha" placeholder="Masukkan Captcha">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                <div class="form-footer mt-2">
                    <p> Belum punya akun? <a href="register.php">Register</a></p>
                </div>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
