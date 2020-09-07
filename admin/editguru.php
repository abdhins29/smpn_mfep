<?php 
	include ("style/header.php");
	include ("style/sidebar.php");
	include ("../config/koneksi.php");
	$id_guru = $_GET['kd'];
?>
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Data Guru</h6>
		</div>
		<div class="card-body">
			<?php 					
			$qq = mysqli_query($konek, "SELECT * FROM tbl_guru a LEFT JOIN tbl_login b ON a.id_guru=b.id_guru WHERE a.id_guru = '$id_guru'");
			$dd = mysqli_fetch_assoc($qq);
			?>
			<form action="" method="POST">
				<div class="form-group">
					<label>NIP Guru</label>
					<input type="text" class="form-control" name="nip" value="<?php echo $dd['nip']; ?>">
				</div>
				<div class="form-group">
					<label>Nama Guru</label>
					<input type="text" class="form-control" name="nm_guru" value="<?php echo $dd['nm_guru']; ?>">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" class="form-control" name="jabatan" value="<?php echo $dd['jabatan']; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" value="<?php echo $dd['password']; ?>">
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
	$nip = $_POST['nip'];
	$nm_guru = $_POST['nm_guru'];
	$jabatan = $_POST['jabatan'];

	$password = $_POST['password'];

	$update = mysqli_query($konek, "UPDATE tbl_guru SET nip = '$nip', nm_guru = '$nm_guru', jabatan = '$jabatan' WHERE id_guru ='$id_guru' ");
	$update2 = mysqli_query($konek, "UPDATE tbl_login SET username = '$nip', password = '$password' WHERE id_guru = '$id_guru'");
	if($update) {
      echo "<script language=javascript>
          window.alert('Berhasil Mengedit!');
          window.location='dataguru.php';
          </script>";
      }else{
        echo "<script language=javascript>
          window.alert('Gagal Mengedit!');
          window.location='dataguru.php';
          </script>";
      }

}
?>

<?php 
	include ("style/footer.php");
?>