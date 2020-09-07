<?php
include ("../config/koneksi.php");
$kd_crips= $_GET['kd'];

$delete = mysqli_query($konek,"DELETE FROM tbl_crips WHERE kd_crips = '$kd_crips'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='datanilaikriteria.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='datanilaikriteria.php';
	</script>";
}

?>