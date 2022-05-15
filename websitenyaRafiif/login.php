<!DOCTYPE html>
<html>
<head>
<?php 
    session_start();
    $koneksi=mysqli_connect("localhost","root","","db_rafiif's_website");

    if (isset($_COOKIE['id']) && isset($_COOKIE['pass'])){
        $id = $_COOKIE['id'];
        $pass = $_COOKIE['pass'];

        $sql = mysqli_query($koneksi, "SELECT email FROM tb_akun WHERE id = $id");
        $row = mysqli_fetch_assoc($sql);

            if ($key = $row['password']) { 
                $_SESSION['login'] = true;
            }
    }

    if (isset($_SESSION["login"])) {
        header("Location: index.php");
    }
?>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-tema">
        <div class="container-fluid">
            <a class="navbar-brand me-5" href="index.php">Rafiif's Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                 <li class="nav-item me-2">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="teman.php">Daftar Teman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="layanan.php">Layanan</a>
                </li>
            </ul>

            <ul class="navbar-nav me-3">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
                <a class="btn btn-success" href="registrasi.php">Registrasi</a>
        </div>
  </div>
</nav>

    <section class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 align-items">
                    <img src="assets/img/foto_default.JPG" alt="" width="500px">
                </div>

                <div class="col-lg-5 align-items">
                        <h1 class="h2 text-dark py-4 center-text">
                            Form Login
                        </h1>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-outline mb-3">
                                <label class="form-label" >Email</label>
                                <input name="email" type="email" class="form-control" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" />
                            </div>
                            <div class="form-outline mb-5">
                                <input name="remember" class="form-check-input" type="checkbox" value=""/>
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>

                            <input class="btn btn-primary btn-block mb-4" type="submit" name="login" value="Login">

                            <div class="text-center py-4">
                                <p>Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
                            </div>
                        </form>
<?php
if (isset($_POST["login"])) {

$email = $_POST["email"];
$pass = mysqli_real_escape_string($koneksi,md5($_POST['password']));

$sql = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE email='$email'");
$cek_akun = mysqli_num_rows($sql);
$data_akun = mysqli_fetch_assoc($sql);
$password = $data_akun['password'];

    if ($cek_akun>0) {
        if ($pass == $password) {
            $_SESSION['email']=$email;
            $_SESSION['id']=$data_akun['id'];
            
            if (isset($_POST["remember"])) {
                setcookie('id', $data_akun['id'], time() + 60);
                setcookie('nama', $data_akun['nama'], time() + 60);
                setcookie('pass', $data_akun['password'], time() + 60);
            }
            header('location:index.php');
        }else{
        echo"<script>
                alert('password Anda salah');
            </script>";
        }
    }
    $error= true;
}
?>                   </div>
            </div>
    </section>

<section>
    <footer class="bg-dark text-center text-lg-start">
        <div class="text-center p-3 text-white">
            © 2020 Copyright:
            <a class="text-white" href="">rafiif's_website.com</a>
        </div>
    </footer>
</section>

</body>
</html>