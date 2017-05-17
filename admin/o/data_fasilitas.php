<?php 
	include "../inc/conn.php";
	$xx	= "select * from fasilitas";
	$x 	= mysql_query($xx);
	$r 	= mysql_fetch_row($x);
	if ($r == 0) {
		echo "<br>";
		echo "<a class='btn btn-primary' href='data.php?page=input_fasilitas'>Tambah Fasilitas</a><br><br>";
		echo "<p style='color:red;'>Data Fasilitas </p>";
	}else{
?>
<h3 class="h3">Data Fasilitas</h3 class="h3">
<hr>
<a class="btn btn-primary" href="data.php?page=input_fasilitas">Tambah Fasilias</a>
<br><br>
	<table class="table table-bordered">
		<tr class="judul">
			<th>No</th>
			<th>Nama Fasilitas</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php $no=1;?>
		<?php
			$query = "select * from fasilitas";
			$data = mysql_query($query);
			while ($row = mysql_fetch_array($data)) {
		?>
		<tr>
			
			<td><?php echo $no++; ?></td>
			<td width="500"><?php echo $row['nama_fasilitas']; ?></td>
			<td width="500"><?php echo $row['deskripsi']; ?></td>
			<td><a href="data.php?page=edit_fasilitas&id_fasilitas=<?php echo $row['id_fasilitas'];?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a></td><td><a href="data.php?page=delete&id_fasilitas=<?php echo $row['id_fasilitas'];?>" onclick="return confirm('Benar Anda ingin Menghapus Data ini?')"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>

		</tr>
		<?php }; ?>
	</table>
<br><br>
<?php } ?>