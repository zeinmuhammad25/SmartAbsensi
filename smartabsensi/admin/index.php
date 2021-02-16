<?php $thisPage="Dashboard"; ?>
<?php $title = "Dashboard Admin" ?>
<?php $description = "Dashboard Admin" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	
	<div class="container">
		<div class="content">
			<?php
			$username = $_SESSION['admin']; 
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE username='$username'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<div class="jumbotron">
				<center><h1>Sistem Informasi Absensi Mahasiswa</h1>
				<img src="logobsi.jpg" height="200" width="200" class="img-responsive"/><br />
				<p>Mahasiswa Teknik Elektro Universitas Malikussaleh</p>
				<p>Anda login sebagai Administrator </p>
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Mahasiswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Data Mahasiswa</a>
				<a href="" data-toggle="tooltip" title=" Data Mahasiswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Mahasiswa</a>
				<a href="mahasiswa.php" data-toggle="tooltip" title="Tambah Data Mahasiswa" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Data</a></center>
			</div> 
		</div> 
	</div>
	
<?php 
include("footer.php"); 
?>