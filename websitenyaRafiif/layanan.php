<!DOCTYPE html>
<html>
<head>
<?php 
    session_start();
    $koneksi=mysqli_connect("localhost","root","","db_rafiif's_website");
	if(!isset($_SESSION['email'])){
        echo"<script>
                alert('Untuk melihat Halaman Layanan, mohon untuk melakukan login dahulu');
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

<section>             
    <div class="form">
        <h1>FORM HITUNG BMI</h1>
            <div class="content">
                <div class="form-input">
                    <form action="index.php?p=layanan" method="POST"> 
                        <div class="form-group">
                            <input name="nama" type="text" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <input name="tinggi" type="number" placeholder="Masukkan tinggi badan" required>
                        </div>
                        <div class="form-group">
                            <input name="berat" type="number" placeholder="Masukkan berat badan" required>
                        </div>
                        <div class="submit">
                            <input type="submit" name="submit" value="Hitung Total">
                        </div>
                    </form>
                </div>
                    <div class="refrensi">
                        <a>Referensi : </a><a class="link" href="https://hellosehat.com/nutrisi/cara-menghitung-indeks-massa-tubuh/">
                        https://hellosehat.com/nutrisi/cara-menghitung-indeks-massa-tubuh/
                        </a>
                    </div>
            </div>
    </div>
    <div class="hasil">
        <h1>HASIL HITUNG BMI</h1>
            <div class="content">
                    <?php
                    if (isset($_POST['submit'])) {
                        $nama = $_POST['nama'];
                        $tinggi = $_POST['tinggi'];
                        $berat = $_POST['berat']; 
                        
                        //perhitngan BMI
                        $a = $tinggi / 100;
                        $bmi = $berat / ($a * $a);

                        if ($bmi >= 30) {
                            $keterangan = "Obesitas";
                        } elseif ($bmi >= 23 && $bmi <= 29.9) {
                            $keterangan = "Berat badan berlebih";
                        } elseif ($bmi >= 18.5 && $bmi <= 22.9) {
                            $keterangan = "Berat badan normal";
                        } else {
                            $keterangan = "Berat badan kurang";
                        }
                        
                        echo"   <p> Nama  : "."$nama"." </p>
                                <p> Tinggi  : "."$tinggi"."cm </p>
                                <p> Berat  : "."$berat"."Kg </p>
                                <p> BMI  : "."$bmi"." </p>
                                <h4>Keterangan : <strong>"." $keterangan"."</strong></h4>
                                <script>alert('Data tersimpan, tampilkan hasil')</script>
                        ";
                    }
                    ?>
                                    
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