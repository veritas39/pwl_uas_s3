<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>

<body>
<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();

$error = '';
$validate = '';
if( isset($_SESSION['user']) ) header('Location: index.php');
//mengecek apakah data username yang diinpukan user kosong atau tidak
if( isset($_POST['submit']) ){
    // menghilangkan backshlases
    $username = stripslashes($_POST['username']);
    //cara sederhana mengamankan dari sql injection
    $username = mysqli_real_escape_string($db_conn, $username);

    $name     = stripslashes($_POST['name']);
    $name     = mysqli_real_escape_string($db_conn, $name);

    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($db_conn, $email);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($db_conn, $password);
    
    $repass   = stripslashes($_POST['repassword']);
    $repass   = mysqli_real_escape_string($db_conn, $repass);

    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
        //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
        if($password == $repass){
            //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
            if( cek_nama($name,$db_conn) == 0 ){
                //hashing password sebelum disimpan di database
                $pass = password_hash($password, PASSWORD_DEFAULT);
$user_data = array(
                    'username' => $username,
                    'name' => $name,
                    'email' => $email,
                    'password' => $pass);
                //insert data ke database
                $query = "INSERT INTO users (username, name, email, password ) VALUES ('$username', '$name', '$email', '$pass')";
                $result = mysqli_query($db_conn, $query);
                $registered_data = file_get_contents('registered.json');
                $registered_array = json_decode($registered_data, true);

                // Menambahkan data baru
                $registered_array[] = $user_data;

                // Menyimpan kembali data ke registered.json
                file_put_contents('registered.json', json_encode($registered_array, JSON_PRETTY_PRINT));
                //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                if ($result) {
                    $_SESSION['username'] = $username;
                    header('Location: index.php');
                }else{ //jika gagal maka akan menampilkan pesan error
                    $error = 'Register User Gagal.';
                }
            }else{
                $error = 'Username sudah terdaftar.';
            }
        }else{
            $error = 'Data tidak boleh kosong.';
        }
    }
}

    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username, $db_conn){
        $nama = mysqli_real_escape_string($db_conn, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($db_conn, $query) ) return mysqli_num_rows($result);
    }
?>
         <section class="mx-auto" style="background-color: #1e83a1;">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="mx-auto">
        <div class="card" style="border-radius: 1rem;" >
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./gambar/jerapah2.jpeg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form class="form-container" action="register.php" method="POST">
                <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                <?php if($error != ''){ ?>
                <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                <?php } ?>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                </div>

                <div class="form-group">
                    <label for="InputEmail">Alamat Email</label>
                    <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan email">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                </div>

                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                    <?php if($validate != '') {?>
                        <p class="text-danger"> <?= $validate; ?></p>
                    <?php }?>
                </div>

                <div class="form-group">
                    <label for="InputPassword">Re-Password</label>
                    <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                    <?php if($validate != '') {?>
                        <p class="text-danger"><?= $validate; ?></p>
                    <?php }?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya akun? <a href="login.php">Login</a></p>
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
    
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/18WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>