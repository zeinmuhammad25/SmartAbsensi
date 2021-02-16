<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<style type="text/css">
#results { float:right; margin:20px; padding:20px; }
</style>
<?php $thisPage="Tambah"; ?>
<?php $title = "Tambah Data Mahasiswa" ?>
<?php $description = "Tambah Data Mahasiswa" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Data mahasiswa &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ 
				$nama		     = $_POST['nama'];
				$nim		     = $_POST['nim'];
				$jenisKelamin    = $_POST['jenisKelamin'];
				$tempatLahir	 = $_POST['tempatLahir'];
				$tanggalLahir	 = $_POST['tanggalLahir'];
				$noTelephon		 = $_POST['noTelephon'];
				$email  		 = $_POST['email'];
				$agama 			 = $_POST['agama'];


				$cek = mysqli_query($koneksi, "SELECT * FROM tabelmahsiswa WHERE nim='$nim'"); 
				if(mysqli_num_rows($cek) == 0){ 
                    $insert = mysqli_query($koneksi, "INSERT INTO tabelmahsiswa(nama, nim, jenisKelamin, tempatLahir, tanggalLahir, noTelephon, email, agama) VALUES('$nama','$nim', '$jenisKelamin', '$tempatLahir', '$tanggalLahir', '$noTelephon', '$email', '$agama')") or die(mysqli_error()); 
                    if($insert){ 
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; 
                    }else{ 
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Mahasiswa Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; 
                    }

				}else{ 
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; 
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" class="form-control" placeholder="nim" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenisKelamin" class="form-control" required>
							<option value=""> - Pilih - </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempatLahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggalLahir" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="noTelephon" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Agama</label>
					<div class="col-sm-4">
						<input type="text" name="agama" class="form-control" placeholder="Agama" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> 
		</div> 
		<div class="container">
    <h1 class="text-center">Capture image for training</h1>
   
    <form method="POST" action="storeImage.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-9">
                <div id="results"></div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
	</div> 
<?php 
include("footer.php"); 
?>
<script language="JavaScript">
var timer = null;
Webcam.set({
			// live preview size
			width: 320,
			height: 240,
			
			// device capture size
			dest_width: 320,
			dest_height: 240,
			
			// final cropped size
			crop_width: 240,
			crop_height: 240,
			
			// format and quality
			image_format: 'jpeg',
			jpeg_quality: 90
		});
  
    
	Webcam.attach( '#my_camera' );
    function take_snapshot() {
        // Webcam.snap( function(data_uri) {
        //     $(".image-tag").val(data_uri);
        //     document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        // } );
		if (!timer) {
				var width = 0;
				timer = setInterval( take_snapshot, 300 );
				function take_snapshot() {
			// take snapshot and get image data
				Webcam.snap( function(data_uri) {
				// display results in page
				var img = new Image();
				img.src = data_uri;
				document.getElementById('results').appendChild( img );
				} );
				if (width == 11) {
					clearInterval(timer);
					timer = null;
    		} else {
      		width++;
    		}}
			}
    }
</script>