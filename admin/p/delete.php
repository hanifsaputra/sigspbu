<?php
 	include "../inc/conn.php";
 	
 	if (isset($_GET['id_jenis_kamar'])) {
 		
 		$id_jenis_kamar = $_GET['id_jenis_kamar'];

	 	$data= mysql_query("Delete a from jenis_kamar a where a.id_jenis_kamar='$id_jenis_kamar'");
	 	if(!$data){
	 		mysql_error();
	 	}else{
	 		echo "<script LANGUAGE='JavaScript'>
				    window.alert('Jenis Kamar Berhasil DiHapus')
				    window.location.href='data.php?page=ojenis_kamar';
				  </script>";
	 	}
	 }else if (isset($_GET['id_fasilitas'])) {
 		
 		$id_fasilitas = $_GET['id_fasilitas'];

	 	$data= mysql_query("Delete a from fasilitas a where a.id_fasilitas='$id_fasilitas'");
	 	if(!$data){
	 		mysql_error();
	 	}else{
	 		echo "<script LANGUAGE='JavaScript'>
				    window.alert('Jenis Fasilitas Berhasil DiHapus')
				    window.location.href='data.php?page=ofasilitas';
				  </script>";
	 	}
	 }  
	//end*/
?>