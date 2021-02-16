<?php $thisPage="Profile"; ?>
<?php $title = "Nilai Mahasiswa" ?>
<?php $description = "Halaman Nilai Mahasiswa" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Nilai Mahasiswa &raquo; Biodata</h2>
			<hr />
			
			<?php
			$nim = $_GET['nim']; 
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ 
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE nim='$nim'"); 
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
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
			</table>
			
			<a href="nilai.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit_nilai.php?nim=<?php echo $row['nim']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="nilai_mahasiswa.php?aksi=delete&nim=<?php echo $row['nim']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> 
	</div> 
<?php 
include("footer.php"); 
?>