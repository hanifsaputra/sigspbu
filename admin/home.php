	<?php 
		session_start();
			if(!isset($_SESSION['username'])) {
				echo "<script LANGUAGE='JavaScript'>
			    window.alert('Anda Harus Login Terlebih Dahulu...!')
			    window.location.href='index.php';
			    </script>";
			}elseif(empty($_SESSION['username']) AND ($_SESSION['password'])){
				echo "<script LANGUAGE='JavaScript'>
			    window.alert('error')
			    window.location.href='index.php';
			    </script>";
				
			}else{
	?>

	<center>Hallo !! selamat datang !! Ini adalah halaman admin <br/>
	ADMIN SIG PARIWISATA PALEMBANG </a>


	<?php
		}
	 ?>