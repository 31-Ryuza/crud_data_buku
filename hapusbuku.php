<?php

include "koneksi.php";
 
 $id = $_GET['id_buku'];
 mysqli_query($koneksi, "delete from tbl_buku where id_buku = $id");

 if( mysqli_affected_rows($koneksi) > 0){
	echo "<script>alert('Data berhasil dihapus');
	document.location.href = 'index.php';</script>";
} else{
	echo "<script>alert('Data gagal di hapus')</script>";
}
 
 ?>
 