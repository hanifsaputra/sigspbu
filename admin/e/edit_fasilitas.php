<?php
	include "inc/conn.php";
	$id_fasilitas = $_GET['id_fasilitas'];
	
	$query 	= "select * from fasilitas where id_fasilitas='$id_fasilitas'";
	$data 	= mysql_query($query);
	while ($data=mysql_fetch_array($data)) {
		
?>

<div class="row">
<div class="col-md-6">
	<form action="data.php?page=update&id_fasilitas=<?php echo $data['id_fasilitas'];?>" method="POST">
		<input type="hidden" name="id_fasilitas" value="<?php echo $data['id_fasilitas'];?>">
		<div class="form-group">
		<br>
			<label for="nama_fasilitas">Nama Fasilitas: </label>
			<input class="form-control" type="text" name="nama_fasilitas" value="<?php echo $data['nama_fasilitas'];?>">
			<label for="deskripsi">Deskripsi </label>
			<input class="form-control" type="text" name="deskripsi" value="<?php echo $data['deskripsi'];?>">
			
		</div>
		<input class="btn btn-primary" type="submit" name="fasilitas" value="UPDATE">
		<br>
		
	</form> 
	<br>
</div>
</div>

<?php } ?>