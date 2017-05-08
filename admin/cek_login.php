<?php 
	include "../inc/conn.php";

	$login 	= mysql_query("select * from admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
	$result = mysql_num_rows($login);
	$r 		= mysql_fetch_array($login);

	if ($result > 0) {
		session_start();

		$_SESSION['username'] 	= $r['username'];
		$_SESSION['password'] 	= $r['password'];

		header('location:data.php?page=home');
	}else{
		echo "<script LANGUAGE='JavaScript'>
		    window.alert('Username OR password invalid Please Try Again')
		    window.location.href='index.php';
		    </script>";
	}
 ?>