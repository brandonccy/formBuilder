<div class="row">
	<div class="container">

		<?php if($status==""){ ?>
			<form method="post" action enctype="multipart/form-data">
				<input type="hidden" name="form" value="update_data">
				<input type="hidden" name="table_name" value="<?=$formTable?>">
				<input type="hidden" name="token" value="<?=$Token?>">
				<input type="hidden" name="idToken" value="<?=$row["token"]?>">
				<?php
				$query="SELECT * FROM db_forms WHERE table_name = '$formTable' AND column_name<>'' AND column_type<>'' AND status='0' AND stat<>'3' ORDER BY sort ASC";
				$result = mysqli_query($con, $query);

				$query2="SELECT * FROM {$formTable} WHERE token='$id'";
				$result2 = mysqli_query($con, $query2);
				$row2 = mysqli_fetch_array($result2);

				while($row = mysqli_fetch_array($result)){ 
					$COLUMN_NAME = $row["column_name"];
					?>
					<?php include("includes/form_inputs/".$row["column_type"].".php"); ?>
				<?php } ?>
				<center>
					<a href="?page=table&formTable=<?=$formTable?>">
						<div class="btn btn-warning">Back To List</div>
					</a>
					<input type="submit" value="Save Data" class="btn btn-success">
				</center>
			</form>
		<?php }elseif($status==1){ ?>
			<div class="col-md-12">
				<div class="alert alert-success">Data Updated</div>
				<center>
					<a href="?page=home">
						<div class="btn btn-primary">Back Home</div>
					</a>
					<a href="?page=table&formTable=<?=$formTable?>">
						<div class="btn btn-warning">Back To List</div>
					</a>
					<a href="?page=form&formTable=<?=$formTable?>">
						<div class="btn btn-success">Create New Data</div>
					</a>
				</center>
			</div>
		<?php }elseif($status==2){ ?>
			<div class="col-md-12">
				<div class="alert alert-success">Data Updaated</div>
				<center>
					<a href="?page=home">
						<div class="btn btn-primary">Back Home</div>
					</a>
					<a href="?page=table&formTable=<?=$formTable?>">
						<div class="btn btn-warning">Back To List</div>
					</a>
					<a href="?page=form&formTable=<?=$formTable?>">
						<div class="btn btn-success">Create New Data</div>
					</a>
				</center>
			</div>
		<?php } ?>


	</div>
</div>