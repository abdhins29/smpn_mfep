<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$nisn = $_GET['kd'];
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Data Pendaftaran</h6>
		</div>
		<div class="card-body">
			<?php 					
			$qq = mysqli_query($konek, "SELECT * FROM tbl_siswa WHERE nisn = '$nisn'");
			$dd = mysqli_fetch_assoc($qq);
			?>
			<form action="" method="POST">
				<label>NISN</label>
				<input type="text" class="form-control" name="nisn" value="<?php echo $dd['nisn']; ?>" readonly="">
				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="text" class="form-control" name="nm_siswa" value="<?php echo $dd['nm_siswa']; ?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $dd['jenis_kelamin']; ?>">
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $dd['tempat_lahir']; ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" class="form-control" name="tanggal_lahir" value="<?php echo $dd['tanggal_lahir']; ?>">
				</div>
				<div class="form-group">
					<label>Nama Orang Tua</label>
					<input type="text" class="form-control" name="nm_orangtua" value="<?php echo $dd['nm_orangtua']; ?>">
				</div>
				<div class="form-group">
					<label>Sekolah Asal</label>
					<input type="text" class="form-control" name="sekolah_asal" value="<?php echo $dd['sekolah_asal']; ?>">
				</div>
				<div class="form-group">
					<label>No. Telp</label>
					<input type="text" class="form-control" name="no_telp" value="<?php echo $dd['no_telp']; ?>">
				</div>
				<div class="form-group">
					<label>Rata-Rata UN</label>
					<input type="text" class="form-control" name="rata_un" value="<?php echo $dd['rata_un']; ?>">
				</div>
				<div class="form-group">
					<label>Prestasi</label>
					<select name="prestasi" class="form-control">
						<option value="<?php echo $dd['prestasi'] ?>"><?php echo $dd['prestasi']; ?></option>
						<?php 
							$qqqq = mysqli_query($konek,"SELECT * FROM tbl_crips");
							while($dddd = mysqli_fetch_array($qqqq)){
						?>
						<option value="<?php echo $dddd['nm_crips'] ?>"><?php echo $dddd['nm_crips']; ?></option>
						<?php 
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<button type="submit" name="edit" class="btn btn-md btn-success">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['edit'])) {

	$nisn	= $_POST['nisn'];
	$nm_siswa	= $_POST['nm_siswa'];
	$jenis_kelamin     = $_POST['jenis_kelamin'];
	$nm_orangtua		= $_POST['nm_orangtua'];
	$sekolah_asal	= $_POST['sekolah_asal'];
	$rata_un     = $_POST['rata_un'];
	$tempat_lahir		= $_POST['tempat_lahir'];
	$tanggal_lahir		= $_POST['tanggal_lahir'];
	$no_telp		= $_POST['no_telp'];
	$prestasi		= $_POST['prestasi'];

	$update = mysqli_query($konek, "UPDATE tbl_siswa SET nm_siswa = '$nm_siswa', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', nm_orangtua = '$nm_orangtua', sekolah_asal = '$sekolah_asal', no_telp = '$no_telp', rata_un = '$rata_un', prestasi = '$prestasi' WHERE nisn = '$nisn'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='datapendaftaran.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='datapendaftaran.php';
          </script>";
      }

}
?>

<?php 
	include ("style/footer.php");
?>