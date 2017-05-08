<?php 
	include "../inc/conn.php";

	include "header.php";
?>
		<div class="row" style="width:400px; margin:0px auto !important; padding-top:50px;">
			<div class="panel panel-default">
				<div class="panel-heading">Login Admin</div>
					<div class="panel-body">
						<form action="cek_login.php" method="post">
							<div class="form-group">
								<label for="username">Username:</label>
								<input class="form-control" type="text" name="username" id="username">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input class="form-control" type="password" name="password" id="password">
							</div>
							<input class="btn btn-primary" type="submit" value="LOGIN">
						</form>
					</div>
				</div>	
			</div>
		</div>