<?php $thisPage="nilai"; ?>
<?php $title = "Nilai Mahasiswa" ?>
<?php $description = "Nilai Mahasiswa" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Absen Mahasiswa</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ 
				$nim = $_GET['nim']; 
				$cek = mysqli_query($koneksi, "SELECT * FROM absensi WHERE nim='$nim'"); 
				if(mysqli_num_rows($cek) == 0){ 
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; 
				}else{ 
					$delete = mysqli_query($koneksi, "DELETE FROM absensi WHERE nim='$nim'"); 
					if($delete){ 
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; 
					}else{ 
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; 
					}
				}
			}
			?>
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Nilai Mahasiswa</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="A" <?php if($filter == 'A'){ echo 'selected'; } ?>>A</option>
						<option value="B" <?php if($filter == 'B'){ echo 'selected'; } ?>>B</option>
                        <option value="C" <?php if($filter == 'C'){ echo 'selected'; } ?>>C</option>
						<option value="D" <?php if($filter == 'D'){ echo 'selected'; } ?>>D</option>
					</select>
				</div>
			</form> 
			<br />
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIM</th>
						<th>Kelas</th>
						<th>Waktu Absen</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT absensi.nim, tabelmahsiswa.nama, absensi.waktu,absensi.kodeKelas FROM absensi JOIN tabelmahsiswa ON tabelmahsiswa.nim=absensi.nim WHERE grade='$filter' ORDER BY  absensi.waktu DESC"); 
					}else{
						$sql = mysqli_query($koneksi, "SELECT absensi.nim, tabelmahsiswa.nama, absensi.waktu,absensi.kodeKelas FROM absensi JOIN tabelmahsiswa ON tabelmahsiswa.nim=absensi.nim ORDER BY absensi.waktu DESC"); 
					}
					echo ($filter);
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; 
					}else{
						$no = 1; 
						while($row = mysqli_fetch_assoc($sql)){ 
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nama'].'</td>
								<td>'.$row['nim'].'</td>
								<td>'.$row['kodeKelas'].'</td>
								<td>'.$row['waktu'].'</td>
							</tr>
							';
							$no++; 
						}
					}
					?>
				</table>
			</div> 
		</div> 
	</div> 
<?php 
include("footer.php"); 
?>