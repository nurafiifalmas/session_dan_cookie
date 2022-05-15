<!DOCTYPE html>
<html>
<head>
<?php 
    $koneksi=mysqli_connect("localhost","root","","db_rafiif's_website");
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
                <div class="col-lg-4 align-items">
                </div>

                <div class="col-lg-4 align-items">
                    <div class="center-text">
                        <h1 class="h2 text-dark py-4">
                            Form Registrasi
                        </h1>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-outline mb-3">
                                <label class="form-label" >Nama</label>
                                <input name="nama" type="nama" class="form-control" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label" >Email</label>
                                <input name="email" type="email" class="form-control" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input name="confirmpassword" type="password" class="form-control" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label">foto profil</label>
                                <input name="foto" type="file" class="form-control" />
                            </div>
                            
                            <input class="btn btn-success btn-block mb-4" type="submit" name="submit" value="Submit">

                            <div class="text-center py-4">
                                <p>Sudah punya akun? <a href="login.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
<?php 
	if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $foto = $_FILES["foto"]["name"];
	 	$tmp = $_FILES["foto"]["tmp_name"];
        $path = "assets/img/profil/";

        $query = mysqli_query($koneksi,"SELECT email FROM tb_akun WHERE email = '$email'");
		if (mysqli_fetch_assoc($query)) {
            echo"<script>
                    alert('Akun sudah terdaftar');
                </script>";
            echo "<script>location='login.php'</script>";
        }else{
            if ($password == $confirmpassword) {
                move_uploaded_file($tmp, $path.$foto);
                $password = md5($password);
		        $query=mysqli_query($koneksi,"INSERT INTO tb_akun VALUES (NULL,'".$nama."','".$email."','".$password."','".$foto."')");
			    if($query){
                    echo"<script>
                        alert('Registrasi berhasil');
                    </script>";
				    echo "<script>location='login.php'</script>";
				}else{
                    echo"<script>
                            alert('Registrasi gagal');
                        </script>";
                }
            }else{
                echo"<script>
                        alert('Konfirmasi password tidak sesuai');
                    </script>";
            }
        }
	}
?>


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