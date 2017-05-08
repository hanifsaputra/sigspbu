<?php 

error_reporting(0);
	$page	= $_GET['page'];

	$page	=isset($page)?$page:"home";

		switch ($page) {
			
			case 'login':
				include "login.php";
				break;

			case 'home':
				include "home.php";
				break;
			case 'proses':
				include "p/proses.php";
				break;
			case 'update':
				include "p/update.php";
				break;
			case 'delete':
				include "p/delete.php";
				break;
				
			////Sampel
			//jenis kamar
			case 'ijenis_kamar':
					include "i/input_jenis_kamar.php";
					break;
			case 'ojenis_kamar':
					include "o/data_jenis_kamar.php";
					break;
			case 'edit_kamar':
					include "e/edit_jenis_kamar.php";
					break;
			
			default:
				# code...
				break;
		}
 ?>