<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$kd_kriteria = $_GET['kd'];
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Data Kriteria</h6>
		</div>
		<div class="card-body">
			<?php 					
			$qq = mysqli_query($konek, "SELECT * FROM tbl_kriteria WHERE kd_kriteria = '$kd_kriteria'");
			$dd = mysqli_fetch_assoc($qq);
			?>
			<form action="" method="POST">
				<input type="text" class="form-control" name="kd_kriteria" value="<?php echo $dd['kd_kriteria']; ?>" readonly="">
				<div class="form-group">
					<label>Nama Kriteria</label>
					<input type="text" class="form-control" name="nm_kriteria" value="<?php echo $dd['nm_kriteria']; ?>">
				</div>
				<div class="form-group">
					<label>Atribut</label>
					<input type="text" class="form-control" name="atribut" value="<?php echo $dd['atribut']; ?>">
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
	$nm_kriteria	= $_POST['nm_kriteria'];
	$atribut     = $_POST['atribut'];

	$update = mysqli_query($konek, "UPDATE tbl_kriteria SET nm_kriteria = '$nm_kriteria', atribut = '$atribut' WHERE kd_kriteria = '$kd_kriteria'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='datakriteria.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='datakriteria.php';
          </script>";
      }

}
?>

<?php 
	include ("style/footer.php");
?>