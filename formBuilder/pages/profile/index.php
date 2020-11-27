<div class="container">
	<div class="row" style="padding-right:15px;padding-left:15px;">

		<?php if($status==3){ ?>
			<div class="col-md-12">
				<div class="alert alert-warning" role="alert">
				  	Confirmed new password is not valid. Please try again.
				</div>
			</div>
		<?php }?>

		<?php if($status==2){ ?>
			<div class="col-md-12">
				<div class="alert alert-warning" role="alert">
				  	The current password is invalid.
				</div>
			</div>
		<?php }?>

		<?php if($status==1){ ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
				 Password Updated
				</div>
			</div>
		<?php }?>

		<form method="post" action>
			<input type="hidden" name="form" value="update_password">
			<input type="hidden" name="token" value="<?=$Token?>">
			<?php
			$query="SELECT * FROM db_forms WHERE table_name = 'update_password' AND column_name<>'' AND column_type<>'' AND status='0' AND stat<>'3' ORDER BY sort ASC";
			$result = mysqli_query($con, $query);
			while($row = mysqli_fetch_array($result)){ 
				$COLUMN_NAME = $row["column_name"];
				?>
				<?php include("includes/form_inputs/".$row["column_type"].".php"); ?>
			<?php } ?>
			<center>
				<input type="submit" value="Update Password" class="btn btn-success">
			</center>
		</form>
	</div>
</div>
