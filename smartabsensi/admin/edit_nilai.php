<?php $thisPage="Edit Mahasiswa"; ?>
<?php $title = "Edit Nilai Mahasiswa" ?>
<?php $description = "Edit Nilai Mahasiswa" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Nilai Mahasiswa &raquo; Edit Nilai</h2>
			<hr />
			
			<?php
			$nim = $_GET['nim']; 
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ 
				$username		 = $_POST['username'];
				$level		     = $_POST['level'];
				$nim		     = $_POST['nim'];
				$nama		     = $_POST['nama'];
				$absen   		 = $_POST['absen'];
				$tugas			 = $_POST['tugas'];
				$uts			 = $_POST['uts'];
				$uas   			 = $_POST['uas'];
				$study			 = $_POST['study'];
				$sks		     = $_POST['sks'];
				$grade  		 = $_POST['grade'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET username='$username', level='$level', nama='$nama', absen='$absen', tugas='$tugas', uts='$uts', uas='$uas', study='$study', sks='$sks', grade='$grade' WHERE nim='$nim'") or die(mysqli_error()); 
				if($update){ 
					header("Location: edit_nilai.php?nim=".$nim."&pesan=sukses"); 
				}else{ 
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; 
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ 
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <a href="nilai.php"><- Kembali</a></div>'; 
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php echo $row ['username']; ?>" class="form-control" placeholder="username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Level</label>
					<div class="col-sm-2">
						<select name="level" class="form-control" required>
							<option value="<?php echo $row ['level']; ?>"><?php echo $row ['level']; ?></option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" value="<?php echo $row ['nim']; ?>" class="form-control" placeholder="NIM" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Absen</label>
					<div class="col-sm-4">
						<input type="text" name="absen" value="<?php echo $row ['absen']; ?>" class="form-control" placeholder="Absen" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tugas</label>
					<div class="col-sm-3">
						<input type="text" name="tugas" value="<?php echo $row ['tugas']; ?>" class="form-control" placeholder="Tugas" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Uts</label>
					<div class="col-sm-3">
						<input type="text" name="uts" value="<?php echo $row ['uts']; ?>" class="form-control" placeholder="Uts" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Uas</label>
					<div class="col-sm-3">
						<input type="text" name="uas" value="<?php echo $row ['uas']; ?>" class="form-control" placeholder="uas" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Study</label>
					<div class="col-sm-3">
						<input type="text" name="study" value="<?php echo $row ['study']; ?>" class="form-control" placeholder="Study" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sks</label>
					<div class="col-sm-4">
						<input type="text" name="sks" value="<?php echo $row ['sks']; ?>" class="form-control" placeholder="Sks" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Grade</label>
					<div class="col-sm-2">
						<select name="grade" class="form-control" required>
							<option value="<?php echo $row['grade']; ?>"> - Grade - </option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Grade Sekarang :</b> <span class="label label-success"><?php echo $row['grade']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Mahasiswa">
						<a href="" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> 
	</div> 
<?php 
include("footer.php"); 
?>