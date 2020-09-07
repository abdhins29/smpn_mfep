<?php
include ("../config/koneksi.php");
$nisn= $_GET['kd'];

$delete = mysqli_query($konek,"DELETE FROM tbl_alternatif WHERE nisn = '$nisn'");
$update = mysqli_query($konek,"UPDATE tbl_daftar SET status = '0' WHERE nisn = '$nisn'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='dataalternatif.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='dataalternatif.php';
	</script>";
}

?>