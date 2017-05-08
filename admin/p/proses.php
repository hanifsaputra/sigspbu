<?php
 	include "../inc/conn.php";
 	
 	if (isset($_POST['jenis_kamar'])) {
	 		$id_jenis_kamar 			= $_POST['id_jenis_kamar'];
		 	$nm_jenis_kamar 			= $_POST['nm_jenis_kamar'];

				$q		= "INSERT into jenis_kamar VALUES('$id_jenis_kamar','$nm_jenis_kamar')";
				$dq 	= mysql_query($q);

				echo "<script LANGUAGE='JavaScript'>
					    window.alert('Data Jenis Kamar Berhasil Ditambahkan')
					    window.location.href='data.php?page=ojenis_kamar';
					 </script>";

 	}else{
 		header('location:admin');
 	}
 	/* START END */
?>