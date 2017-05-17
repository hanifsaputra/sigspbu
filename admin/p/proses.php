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

 	}else if (isset($_POST['fasilitas'])) {
	 		$id_fasilitas 			= $_POST['id_fasilitas'];
		 	$nama_fasilitas			= $_POST['nama_fasilitas'];
		 	$deskripsi				= $_POST['deskripsi'];

				$q		= "INSERT into fasilitas VALUES('$id_fasilitas','$nama_fasilitas','$deskripsi')";
				$dq 	= mysql_query($q);

				echo "<script LANGUAGE='JavaScript'>
					    window.alert('Data Fasilitas Berhasil Ditambahkan')
					    window.location.href='data.php?page=ofasilitas';
					 </script>";

 	}elseif (isset($_POST['spbu'])) {
	 		$id_spbu		= $_POST['id_spbu'];
			$nama_spbu 		= $_POST['nama_spbu'];
			$alamat   		= $_POST['alamat'];
		 	$latitude 		= $_POST['latitude'];
			$longitude 		= $_POST['longitude'];
			$keterangan		= $_POST['keterangan'];
			$gambar_fasilitas	= $_POST['gambar_fasilitas'];
			$gambar_spbu	= $_POST['gambar_spbu'];
			
			$lokasi			= $_FILES['gambar_spbu']['tmp_name'];
			$tipe   		= $_FILES['gambar_spbu']['type'];
			$nama   		= $_FILES['gambar_spbu']['name'];
			$folder		   	= "image/$nama_file";
			
			
				$q		= "INSERT into spbu VALUES('$id_spbu','$nama_spbu','$alamat','$longitude','$latitude','$gambar_spbu')";
				$dq 	= mysql_query($q);
			    move_uploaded_file($_FILES['gambar_spbu']['tmp_name'], "../assets/images/".$_FILES['gambar_spbu']['name']);


			
			
			
			

	if(!empty($_POST['check_list'])){	
		 foreach($_POST['check_list'] as $selected){
				$sf		= "INSERT into spbu_fasilitas VALUES('$id_spbu_fasilita','$id_spbu','$check_list','$keterangan','$gambar_fasilitas')";  
			$hasil 	= mysql_query($sf);
		move_uploaded_file($_FILES['gambar_fasilitas']['tmp_name'], "../assets/images/".$_FILES['gambar_fasilitas']['name']);
							
		}
		}

				


				echo "<script LANGUAGE='JavaScript'>
					    window.alert('Data SPBU Berhasil Ditambahkan')
					    window.location.href='data.php?page=ospbu';
					 </script>";
		}else{
 		header('location:admin');
 	}
 	/* START END */
?>