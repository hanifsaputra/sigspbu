<?php
	include "inc/conn.php";
	$id_jenis_kamar = $_GET['id_jenis_kamar'];
	
	$query 	= "select * from jenis_kamar where id_jenis_kamar='$id_jenis_kamar'";
	$data 	= mysql_query($query);
	while ($data=mysql_fetch_array($data)) {
		
?>

<div class="row">
<div class="col-md-6">
	<form action="data.php?page=update&id_jenis_kamar=<?php echo $data['id_jenis_kamar'];?>" method="POST">
		<input type="hidden" name="id_jenis_kamar" value="<?php echo $data['id_jenis_kamar'];?>">
		<div class="form-group">
		<br>
			<label for="jurusan_nama">Nama Jenis Kamar: </label>
			<input class="form-control" type="text" name="nm_jenis_kamar" value="<?php echo $data['nm_jenis_kamar'];?>">
			
		</div>
		<input class="btn btn-primary" type="submit" name="jenis_kamar" value="UPDATE">
		<br>
		
	</form> 
	<br>
</div>
</div>

<?php } ?>