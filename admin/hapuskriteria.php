<?php
include ("../config/koneksi.php");
$kd_kriteria= $_GET['kd'];

$delete = mysqli_query($konek,"DELETE FROM tbl_kriteria WHERE kd_kriteria = '$kd_kriteria'");

if($delete) {
	echo "<script language=javascript>
	window.alert('Berhasil Menghapus!');
	window.location='datakriteria.php';
	</script>";
}else{
	echo "<script language=javascript>
	window.alert('Gagal Menghapus!');
	window.location='datakriteria.php';
	</script>";
}

?>