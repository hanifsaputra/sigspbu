<div class="row">
<div class="col-md-6">
	<form action="data.php?page=proses" method="POST">
		<input type="hidden" name="id_spbu">
		<div class="form-group">
		<br>
			<label for="nama_spbu">Nama SPBU: </label>
			<input class="form-control" type="text" name="nama_spbu" required>
		<br>
			<label for="alamat">Alamat </label>
			<input class="form-control" type="text" name="alamat" required>
		<br>
			<label for="longitude">Longitude </label>
			<input class="form-control" type="text" name="longitude" required>
		<br>
			<label for="latitude">Alamat </label>
			<input class="form-control" type="text" name="latitude" required>
		<br>
		<label for="gambar_spbu">Gambar : </label>
			<input class="form-control" type="file" name="gambar_spbu" required>
		<br>
		</div>
	

<H3>Lengkapi Fasilitas SPBU</H3> 
<?php
include "../../inc/conn.php";
echo "<table border='0' align='center' >";
echo "<tr>";
 echo "<th>PILIH</th><th>FASILITAS</th><th>DESKRIPSI</th><th>GAMBAR</th></tr>";
	  $sql = "select * from fasilitas";
  	  $hasil = mysql_query($sql);
   		while ($data = mysql_fetch_array($hasil)){
	    ?>

			<tr><td align='center'><input type="checkbox" name="check_list[]" value="<?php echo $data['id_fasilitas'];?>"></td>
			<?php
			echo "<td align='left'>{$data['nama_fasilitas']}</td>";
			?>
			<td align='center'><input class="form-control" type="text" name="deskripsi[]">
			</td>
		    <td align='center'><input class="form-control" type="file" name="wisata_gambar[]"></td>
		<?php
		}
		?>
</tr>
<tr>
	<td colspan="3">
	<input class="btn btn-primary" type="submit" name="spbu" value="SIMPAN">
</td>
</tr>
</table>		

	</form> 
	<br>
</div>
</div>