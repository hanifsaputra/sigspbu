<?php 
	include "../inc/conn.php";
	$xx	= "select * from jenis_kamar";
	$x 	= mysql_query($xx);
	$r 	= mysql_fetch_row($x);
	if ($r == 0) {
		echo "<br>";
		echo "<a class='btn btn-primary' href='data.php?page=ijenis_kamar'>Tambah Jenis Kamar</a><br><br>";
		echo "<p style='color:red;'>Data Jenis Kamar </p>";
	}else{
?>
<h3 class="h3">Data Jenis Kamar</h3 class="h3">
<hr>
<a class="btn btn-primary" href="data.php?page=ijenis_kamar">Tambah Jenis Kamar</a>
<br><br>
	<table class="table table-bordered">
		<tr class="judul">
			<th>No</th>
			<th>Nama Jenis Kamar</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php $no=1;?>
		<?php
			$query = "select * from jenis_kamar";
			$data = mysql_query($query);
			while ($row = mysql_fetch_array($data)) {
		?>
		<tr>
			
			<td><?php echo $no++; ?></td>
			<td width="500"><?php echo $row['nm_jenis_kamar']; ?></td>
			<td><a href="data.php?page=edit_kamar&id_jenis_kamar=<?php echo $row['id_jenis_kamar'];?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a></td><td><a href="data.php?page=delete&id_jenis_kamar=<?php echo $row['id_jenis_kamar'];?>" onclick="return confirm('Benar Anda ingin Menghapus Data ini?')"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>

		</tr>
		<?php }; ?>
	</table>
<br><br>
<?php } ?>