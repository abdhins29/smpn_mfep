<?php 
	session_start();
	session_destroy();
	echo "<script language=javascript>
          window.alert('Anda Berhasil Logout!');
          window.location='index.php';
          </script>";
?>