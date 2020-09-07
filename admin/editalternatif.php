<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$kd_alternatif = $_GET['kd'];
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Data Kriteria</h6>
		</div>
		<div class="card-body">
			<?php 					
			$qq = mysqli_query($konek, "SELECT * FROM tbl_alternatif a LEFT JOIN tbl_siswa b ON a.nisn=b.nisn WHERE kd_alternatif = '$kd_alternatif'");
			$dd = mysqli_fetch_assoc($qq);
			?>
			<form action="" method="POST">
				<div class="form-group">
					<label>NISN</label>
					<input type="text" class="form-control" name="nisn" value="<?php echo $dd['nisn']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="text" class="form-control" name="nm_siswa" value="<?php echo $dd['nm_siswa']; ?>" readonly="">
				</div>
				<div class="form-group">
					<label>Rata-Rata UN</label>
					<input type="text" class="form-control" name="rata_un" value="<?php echo $dd['rata_un']; ?>" readonly="">
				</div>
				<div class="form-group">
					<label>Prestasi Akademik/Non Akademik</label>
					<input type="text" class="form-control" name="prestasi" value="<?php echo $dd['prestasi']; ?>" readonly="">
				</div>
				<div class="form-group">
					<label>Wawancara</label>
					<input type="text" class="form-control" name="wawancara" value="<?php echo $dd['wawancara']; ?>">
				</div>
				<div class="form-group">
					<label>Test Diniyah</label>
					<input type="text" class="form-control" name="test_diniyah" value="<?php echo $dd['test_diniyah']; ?>">
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
	$rata_un     = $_POST['rata_un'];
	$prestasi		= $_POST['prestasi'];
	$wawancara	= $_POST['wawancara'];
	$test_diniyah     = $_POST['test_diniyah'];

	$update = mysqli_query($konek, "UPDATE tbl_alternatif SET nisn = '$nisn', rata_un = '$rata_un', prestasi = '$prestasi',wawancara = '$wawancara', test_diniyah = '$test_diniyah' WHERE kd_alternatif = '$kd_alternatif'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='dataalternatif.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='dataalternatif.php';
          </script>";
      }

}
?>
<?php 
	include ("style/footer.php");
?>