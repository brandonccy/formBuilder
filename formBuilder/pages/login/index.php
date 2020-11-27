<?php
$status = $_GET["status"];
?>
<div class="container">
	<div class="row" style="padding-right:15px;padding-left:15px;">

		<?php if($status==3){ ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
				  	This account is already suspended.
				</div>
			</div>
		<?php } ?>

		<?php if($status==2){ ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
				  	Login details not valid. Please try again.
				</div>
			</div>
		<?php } ?>

		<?php if($status==1){ ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					Account not valid. Please try again.
				</div>
			</div>
		<?php } ?>

		<form method="post" action="/formBuilder/index.php?page=login">
			<input type="hidden" name="form" value="login">
			Login to Start:
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" required="required">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required="required">
			</div>
			<center>
				<button type="submit">Login</button>
			</center>
		</form>

	</div>
</div>