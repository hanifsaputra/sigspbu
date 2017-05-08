<?php
	include "inc/conn.php";
	$id  = $_GET['id_wisata'];

	$query = 	"SELECT a.id_wisata,a.latitude,a.longitude,a.status,a.gambar,a.nm_wisata,a.lokasi
						
				       
				FROM wisata a
				WHERE 	a.id_wisata=$id
				             AND
				      	a.status='1'
				";

	$queryall = mysql_query($query);
	while ($detail=mysql_fetch_array($queryall)) {
		// echo "<pre>";
		 //	print_r($detail);
		 // echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Wisata <?php echo $detail['nm_wisata'];?></title>
<link rel="icon" href="http://www.palembang.go.id/images/favicon.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.css">
<link rel="stylesheet" type="text/css" href="assets/css/custum.css">
<style type="text/css">
  body {
    padding-top: 5px;
  }
 table,tr{
  	padding:10px;
  }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3naoO_66yu6vUnkMa8LPrt-RueSqy7SY  
"></script>
</head>
<body style="padding-top: 0px !important; background-color:#fff; color:#000;">
	
	<div class="container" style="max-width: 850px; background-color:#fff; padding: 10px;">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" style="color:#000;" href="<?php echo $link;?>"><i class="fa fa-plus-square" style="color:red;"></i> SISTEM INFORMASI GEOGRAFIS PARIWISATA KOTA PALEMBANG</a>
  	              </div>
  	</div>
  	<hr>
	<div class="container" style="max-width: 850px; background-color:#fff; padding: 10px;">
		
      	<div class="row" style="margin: 10px;">
      			<div class="row">
				  <div class="col-md-6">
				  		<img style="width:100%;" src="assets/images/<?php echo $detail['gambar'];?>"></img>
				  </div>
				  <div class="col-md-6">
				  		<div class="media-body">
						    <h4 class="media-heading"><?php echo $detail['nm_wisata'];?></h4>
						    <p>Alamat : <?php echo $detail['lokasi'];?> <br><?php echo $detail['latitude'];?>, <?php echo $detail['longitude'];?></p>
						    <hr>
						    <b>Jenis Wisata</b>
						    <p>- Wisata</p>
						    <hr>
						</div>
				  </div>
				  
				</div>
      	</div>

     <div class="row">
      <div class="col-lg-12">
        <hr>
        <footer>
         <p>&copy; 2017 by <a href="">SISTEM INFORMASI GEOGRAFIS PARIWISATA KOTA PALEMBANG </a></p>
        </footer>
      </div>
    </div>
    </div>
</body>
</html>
<?php } ?>