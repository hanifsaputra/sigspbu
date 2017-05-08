	<head>
		<title>SIG PARIWISATA</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $link; ?>assets/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $link; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $link; ?>assets/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $link; ?>assets/css/font-awesome.min.css" />

		<script src="<?php echo $link;?>assets/js/bootstrap.js"></script>
		<script src="<?php echo $link;?>assets/js/bootstrap.min.js"></script>
		
		<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
		  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
		  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
		  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
		  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
		  <script>
		   $(document).ready(function(){
			$("#tgl_event").datepicker({
			})
		   })
		  </script>
		<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>

		<script>

		$(document).ready(function(){
		   
		  $('#add').click(function(){
		   
		  var inp = $('#box');
		   
		  var i = $('input').size() + 1;
		   
		  $('<div id="box' + i +'"><label for="nm_event">Nama Event: </label><input type="text" id="name" class="form-control" name="nm_event[]"/><label for="tgl_event">Tanggal Event: </label> <input type="text" id="name" class="form-control" name="tgl_event[]" /> <label for="ket">Keterangan Event: </label><input type="text" id="name" class="form-control" name="ket[]"/><img src="http://findicons.com/files/icons/753/gnome_desktop/64/gnome_edit_delete.png" title="Hapus"  width="32" height="32" border="0" align="top" class="add" id="remove" /> </div>').appendTo(inp);
		   
		  i++;
		   
		  });
		   
		   
		  $('body').on('click','#remove',function(){
		   
		  $(this).parent('div').remove();
		   
		  });
		   
		});

		</script>
	</head>