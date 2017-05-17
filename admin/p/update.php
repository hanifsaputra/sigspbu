<?php
	include "../inc/conn.php";
	if (isset($_POST['jenis_kamar'])) {
		$id_jenis_kamar	= $_POST['id_jenis_kamar'];
		$nm_jenis_kamar	= $_POST['nm_jenis_kamar'];
		
		
		$queryjenis_kamar =mysql_query("UPDATE jenis_kamar 
								SET nm_jenis_kamar	='$nm_jenis_kamar'
								WHERE 
									id_jenis_kamar		='$id_jenis_kamar'
							   ");
		if ($queryjenis_kamar) {

				echo "<script LANGUAGE='JavaScript'>
					    window.alert('Update Jenis Kamar Berhasil')
					    window.location.href='data.php?page=ojenis_kamar';
				 </script>";
		}else{
			echo "ERROR".mysql_error();
		}
	}else if (isset($_POST['fasilitas'])) {
		$id_fasilitas	= $_POST['id_fasilitas'];
		$nama_fasilitas	= $_POST['nama_fasilitas'];
		$deskripsi				= $_POST['deskripsi'];
		
		
		$queryfasilitas =mysql_query("UPDATE fasilitas 
								SET nama_fasilitas	='$nama_fasilitas',
									deskripsi		= '$deskripsi'
								WHERE 
									id_fasilitas		='$id_fasilitas'
							   ");
		if ($queryfasilitas) {

				echo "<script LANGUAGE='JavaScript'>
					    window.alert('Update fasilitas Berhasil')
					    window.location.href='data.php?page=ofasilitas';
				 </script>";
		}else{
			echo "ERROR".mysql_error();
		}
	}
	//end
	
?>