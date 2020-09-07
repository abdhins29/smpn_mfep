<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$kd_crips = $_GET['kd'];
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Data Nilai Kriteria</h6>
		</div>
		<div class="card-body">
			<?php 					
			$qq = mysqli_query($konek, "SELECT * FROM tbl_crips WHERE kd_crips = '$kd_crips'");
			$dd = mysqli_fetch_assoc($qq);
			?>
			<form action="" method="POST">
				<input type="text" class="form-control" name="kd_crips" value="<?php echo $dd['kd_crips']; ?>" readonly="">
				<div class="form-group">
					<label>Nama Kriteria</label>
					<select name="kd_kriteria" class="form-control">
						<option value="<?php echo $dd['kd_kriteria'] ?>"><?php echo $dd['kd_kriteria']; ?></option>
						<?php 
							$qqq = mysqli_query($konek,"SELECT * FROM tbl_kriteria");
							while($ddd = mysqli_fetch_array($qqq)){
						?>
						<option value="<?php echo $ddd['kd_kriteria']; ?>"><?php echo $ddd['nm_kriteria']; ?></option>
						<?php 
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Nama Crips</label>
					<input type="text" class="form-control" name="nm_crips" value="<?php echo $dd['nm_crips']; ?>">
				</div>
				<div class="form-group">
					<label>Nilai</label>
					<input type="text" class="form-control" name="nilai" value="<?php echo $dd['nilai']; ?>">
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

	$kd_kriteria	= $_POST['kd_kriteria'];
	$nm_crips     = $_POST['nm_crips'];
	$nilai     = $_POST['nilai'];

	$update = mysqli_query($konek, "UPDATE tbl_crips SET kd_kriteria = '$kd_kriteria', nm_crips = '$nm_crips', nilai = '$nilai' WHERE kd_crips = '$kd_crips'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='datanilaikriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='datanilaikriteria.php';
          </script>";
      }

}
?>

<?php 
	include ("style/footer.php");
?>