<?php 
	include "../inc/conn.php";
	$xx	= "select * from spbu";
	$x 	= mysql_query($xx);
	$r 	= mysql_fetch_row($x);
	if ($r == 0) {
		echo "<br>";
		echo "<a class='btn btn-primary' href='data.php?page=ispbu'>Tambah Fasilitas SPBU</a><br><br>";
		echo "<p style='color:red;'>Data Fasilitas SPBU </p>";
	}else{
?>
<h3 class="h3">Data Jenis Kamar</h3 class="h3">
<hr>
<a class="btn btn-primary" href="data.php?page=ispbu">Tambah Fasilitas SPBU</a>
<br><br>
	<table class="table table-bordered">
		<tr class="judul">
			<th>No</th>
			<th>Nama SPBU</th>
			<th>Alamat</th>
			<th>Longitude</th>
			<th>Latitude</th>
			<th>Gambar SPBU</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php $no=1;?>
		<?php
			$query = "select * from spbu";
			$data = mysql_query($query);
			while ($row = mysql_fetch_array($data)) {
		?>
		<tr>
			
			<td><?php echo $no++; ?></td>
			<td width="500"><?php echo $row['nama_spbu']; ?></td>
			<td width="500"><?php echo $row['alamat']; ?></td>
			<td width="500"><?php echo $row['longitude']; ?></td>
			<td width="500"><?php echo $row['latitude']; ?></td>
			<td width="500"><?php echo $row['gambar_spbu']; ?></td>
			<td><a href="data.php?page=edit_fasilitas_spbu&id_spbu=<?php echo $row['id_spbu'];?>">
			<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a></td><td>
			<a href="data.php?page=delete_fasilitas_spbu&id_spbu=<?php echo $row['id_spbu'];?>" onclick="return confirm('Benar Anda ingin Menghapus Data ini?')">
			<span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>

		</tr>
		<?php }; ?>
	</table>
<br><br>
<?php } ?>