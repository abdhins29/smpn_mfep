<?php
include ("../config/koneksi.php");
$nisn= $_GET['kd'];

$delete = mysqli_query($konek,"DELETE FROM tbl_siswa WHERE nisn = '$nisn'");
$delete2 = mysqli_query($konek,"DELETE FROM tbl_daftar WHERE nisn = '$nisn'");
$delete3 = mysqli_query($konek,"DELETE FROM tbl_alternatif WHERE nisn = '$nisn'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='datapendaftaran.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='datapendaftaran.php';
	</script>";
}

?>