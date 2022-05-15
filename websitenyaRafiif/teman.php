<!DOCTYPE html>
<html>
<head>
<?php 
    session_start();
    $koneksi=mysqli_connect("localhost","root","","db_rafiif's_website");
	if(!isset($_SESSION['email'])){
        echo"<script>
                alert('Untuk melihat Halaman Daftar Teman, mohon untuk melakukan login dahulu');
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

 <script>alert("Ini Halaman Daftar Teman")</script>
 <section>
        <div class="container py-5">  
            <div class="row py-2">
            <div>
                <h1 class="text-default">Tabel Daftar Teman Anda</h1>
            </div>

                <div class="table-responsive py-4">
                    <table  class="table table-success table-striped" width="100%" cellspacing="0">
                    <tr>
							<th>No</th> 
							<th>Nama Teman</th>
							<th>Prodi</th>
							<th>Hobi</th>
							<th>Jenis Kelamin</th>
                        	<th>Tanggal Lahir</th>
							<th>Nomor Telepon</th>
							<th>Foto</th>
                	        <th>Opsi</th>
						</tr>
							<?php 
								$no=1;
								$query = mysqli_query($koneksi,"SELECT * FROM tb_list_teman ORDER BY id ASC");
								while ($row = mysqli_fetch_assoc($query)) {
							?> 
						<tr>
							<td class"center"><?php echo $no++; ?></td>
							<td><?php echo $row['nama_teman']; ?></td>
							<td><?php echo $row['prodi']; ?></td>
							<td><?php echo $row['hobi']; ?></td>
							<td><?php echo $row['jenis_kelamin']; ?></td>
							<td><?php echo $row['tanggal_lahir']; ?></td>
							<td><?php echo $row['no_tlp']; ?></td>
							<td class"center"><?php 
								if($row['foto']=="kosong"){ ?>
									<img src="assets/img/foto_teman/kosong.jpg" width="50">
						<?php	}else{ 
						?>
									<img width="150" src="assets/img/foto_teman/<?php echo $row['foto']; ?>"> 
						<?php 	}
				 		?>
							</td>
							<td class"center">						
								<a class="btn btn-primary" href="index.php?p=update_list&id=<?php echo $row['id'] ?>">Edit</a>
 			                	<a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_list&id=<?php echo $row['id'] ?>">Delete</a>	
				    		</td>
						</tr>
							<?php  
								}
              				?>
                    </table>
                        <div class="py-3">
                            <a class="btn btn-success" href="index.php?p=tambah_list">Tambah Data</a>
                        </div>
 			    </div>
            </div>
        </div>
    </section>

<section>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="">rafiif's_website.com</a>
        </div>
    </footer>
</section>

</body>
</html>