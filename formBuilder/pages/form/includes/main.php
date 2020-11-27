<?php
$query="SELECT * FROM db_forms WHERE stat<>'3' AND table_name='$formTable' AND column_name<>'' AND status='0'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result)==0){ ?>
	<?php
	$query="SELECT * FROM information_schema.columns WHERE table_name = '$formTable'";
	$resultLoad = mysqli_query($con, $query);
	while($rowLoad = mysqli_fetch_array($resultLoad)){
		$table_name = $formTable;
		$COLUMN_NAME = $rowLoad["COLUMN_NAME"];
		$DATA_TYPE = $rowLoad["DATA_TYPE"];
		if($DATA_TYPE=="int"){ $DATA_TYPE="number"; }
		if($DATA_TYPE=="varchar"){ $DATA_TYPE="text"; }
		$key = md5(uniqid().$Token);
        $salt = substr($key, 0, 12);
        if($COLUMN_NAME=="u_date"||$COLUMN_NAME=="u_time"||$COLUMN_NAME=="status"||$COLUMN_NAME=="admin_id"){
        	$query="INSERT INTO db_forms (table_name, column_name, column_type, token) VALUES ('$table_name', '$COLUMN_NAME', 'hidden', '$salt')";
			$result = mysqli_query($con, $query);
        }elseif($COLUMN_NAME=="date"||$COLUMN_NAME=="time"||$COLUMN_NAME=="token"||$COLUMN_NAME=="id"||$COLUMN_NAME=="stat"){
        	
        }else{
        	$query="INSERT INTO db_forms (table_name, column_name, column_type, token) VALUES ('$table_name', '$COLUMN_NAME', '$DATA_TYPE', '$salt')";
			$result = mysqli_query($con, $query);
        }
		?>
	<?php } ?>
	<script>window.location="";</script>
<?php }else{ ?>
	<div class="row">
		<div class="container">

			<?php if($status==""){ ?>
				<form method="post" action enctype="multipart/form-data">
					<input type="hidden" name="form" value="save_data">
					<input type="hidden" name="table_name" value="<?=$formTable?>">
					<input type="hidden" name="token" value="<?=$Token?>">
					<?php
					$query="SELECT * FROM db_forms WHERE table_name = '$formTable' AND column_name<>'' AND column_type<>'' AND status='0' AND stat<>'3' ORDER BY sort ASC";
					$result = mysqli_query($con, $query);
					while($row = mysqli_fetch_array($result)){ 
						$COLUMN_NAME = $row["column_name"];
						?>
						<?php include("includes/form_inputs/".$row["column_type"].".php"); ?>
					<?php } ?>
					<center>
						<a href="?page=home">
							<div class="btn btn-primary">Back Home</div>
						</a>
						<input type="submit" value="Create Data" class="btn btn-success">
					</center>
				</form>
			<?php }elseif($status==2){ ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
					  	The push is not send, due to your account have no credit left.
					</div>
				</div>
			<?php }elseif($status==1){ ?>
				<div class="col-md-12">
					<div class="alert alert-success">Data Saved</div>
					<center>
						<a href="?page=home">
							<div class="btn btn-primary">Back Home</div>
						</a>
						<a href="?page=form&formTable=<?=$formTable?>">
							<div class="btn btn-success">Create New Data</div>
						</a>
					</center>
				</div>
			<?php } ?>


		</div>
	</div>
<?php } ?>
