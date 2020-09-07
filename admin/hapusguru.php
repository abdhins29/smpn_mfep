<?php
include ("../config/koneksi.php");
$id_guru= $_GET['kd'];

$delete = mysqli_query($konek,"DELETE FROM tbl_guru WHERE id_guru = '$id_guru'");
$delete2 = mysqli_query($konek,"DELETE FROM tbl_login WHERE id_guru = '$id_guru'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='dataguru.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='dataguru.php';
	</script>";
}

?>