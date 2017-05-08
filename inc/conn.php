<?php
	$link	="http://localhost/sig-pariwisata/";
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$db		= "sigspbu";
	
	$kon 	= mysql_connect($host, $user, $pass) or die ("EROOR");
	
	$dbsel	= mysql_select_db($db, $kon) or die ("TIDAK TERPILIH".mysql_error());
?>