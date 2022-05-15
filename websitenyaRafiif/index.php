<!DOCTYPE html>
<html>
<head>
<?php 
    session_start();
    $koneksi=mysqli_connect("localhost","root","","db_rafiif's_website");
	if(!isset($_SESSION['email'])){
        echo"<script>
                alert('Untuk melihat Halaman Beranda, mohon untuk melakukan login dahulu');
            </script>";
            echo "<script>location='login.php'</script>";
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
    <?php
        $query = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE id = '$_SESSION[id]'");
		$row = mysqli_fetch_assoc($query);
    ?>

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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $row['email']; ?>
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                </li>
            </ul>
            
        </div>
  </div>
</nav>

    <section class="bg-light">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-center">
                        <div class="center-text">
                        <h1 class="h1 text-default">Selamat Datang</h1>
                        <p class="text-default">
                            Selamat datang di Rafiif's Website yang saya tujukan untuk seluruh pengunjung yang dapat 
                            mengakses seluruh informasi tentang profil dari Nurafiif Almas Azhari. Web ini saya buat guna memenuhitugas dari mata kuliah Praktik Pemrogramman Web, selain itu sebagai
                            sarana belajar atau latihan mahasiswa dalam membuat suatu website.
                        </p>
                            <div class="mx-auto col-md-8 col-lg-10">
                                <img src="assets/img/profil/<?php echo $row['foto']; ?>" alt="" width="250px" class="border-img py-3">
                            </div>

                        <h1 class="h1 text-dark py-4"><?php echo $row['nama']; ?></h1>
                        </div>
                    </div>
                </div>
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
