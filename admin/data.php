<?php 
	session_start();
	include "../inc/conn.php";
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
<!DOCTYPE html>
<html>
	<?php include "header.php";?>
<body>
	<nav class="navbar navbar-default navbar-fixed-top menu-atas" role="navigation" style="padding:20px; background:#fff; color:#1fa67a;">
	  <div class="container menu-atas">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand navbarbrand-main" style="color:#1fa67a;" href="data.php?page=home">ADMIN SIG SPBU</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	   
	      <ul class="nav navbar-nav navbar-left">
	      	<li><a class="alink" href="data.php?page=ojenis_kamar">Jenis Kamar</a></li>
	      	<li><a class="alink" href="data.php?page=ofasilitas">Fasilitas</a></li>
	      	<li><a class="alink" href="data.php?page=ospbu">SPBU</a></li>
		  </ul>

	      <ul class="nav navbar-nav navbar-right">
	      	 	<li><a class="alink" href=""><i class=""></i> </a></li>
	      	 	<li><a class="alink" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container" style="background:#f1f1f1; margin-top:100px;">
		<?php
			include "content.php";
		?>
	</div>
</body>
</html>
<?php
			}
 ?>