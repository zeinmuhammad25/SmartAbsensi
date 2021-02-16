<?php $thisPage="Cari"; ?>
<?php $title = "Cari Data Mahasiswa" ?>
<?php $description = "Cari Data Mahasiswa" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<?php $nim = $_POST['carinim'];  ?> 
			<h2>Pencarian Data Mahasiswa &raquo; NIM: <?php echo $nim;  ?></h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahsiswa WHERE nim='$nim'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: no_result.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ 
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_mhasiswa WHERE nim='$nim'"); 
				if($delete){ 
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; 
				}else{ 
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; 
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">NIM</th>
					<td><?php echo $row['nim']; ?></td>
				</tr>
				<tr>
					<th>Nama mahasiswa</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $row['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>Tempat & Tanggal Lahir</th>
					<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir']; ?></td>
				</tr>
				<tr>
					<th>Alamat Asal</th>
					<td><?php echo $row['alamat_asal']; ?></td>
				</tr>
				<tr>
					<th>Alamat Sekarang</th>
					<td><?php echo $row['alamat_sekarang']; ?></td>
				</tr>
				<tr>
					<th>No Telepon</th>
					<td><?php echo $row['no_telepon']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Agama</th>
					<td><?php echo $row['agama']; ?></td>
				</tr>
				<tr>
					<th>Fakultas</th>
					<td><?php echo $row['fakultas']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
								<tr>
					<th>Absen</th>
					<td><?php echo $row['absen']; ?></td>
				</tr>
				<tr>
					<th>Tugas</th>
					<td><?php echo $row['tugas']; ?></td>
				</tr>
				<tr>
					<th>Uts</th>
					<td><?php echo $row['uts']; ?></td>
				</tr>
				<tr>
					<th>Uas</th>
					<td><?php echo $row['uas']; ?></td>
				</tr>
				<tr>
					<th>Study</th>
					<td><?php echo $row['study']; ?></td>
				</tr>
				<tr>
					<th>Sks</th>
					<td><?php echo $row['sks']; ?></td>
				</tr>
				<tr>
					<th>Grade</th>
					<td><?php echo $row['grade']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
		</div> 
	</div> 
<?php 
include("footer.php");
?>