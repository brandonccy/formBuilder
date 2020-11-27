<?php
$query="SELECT * FROM db_tables WHERE table_name='{$formTable}' AND stat<>'3'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result)==0){
	$queryCol="SELECT * FROM information_schema.columns WHERE table_name = '$formTable'";
	$resultLoad = mysqli_query($con, $queryCol);
	$sortID=0;
	$rowCount = mysqli_num_rows($resultLoad);
	while($tablerow = mysqli_fetch_array($resultLoad)){
		
		$column_name = $tablerow["COLUMN_NAME"];
		$column_type = $tablerow["DATA_TYPE"];
		if($column_name=="stat"||$column_name=="token"){

		}else{
			$key = md5(uniqid().$Token);
	        $salt = substr($key, 0, 12);
			$query="INSERT INTO db_tables (table_name, token) VALUES ('$formTable', ' $salt')";
			$result = mysqli_query($con, $query);
			$getID=mysqli_insert_id($con);
			$sortID++;
			$query="UPDATE db_tables SET column_name='$column_name', column_type='$column_type', sort='$sortID' WHERE id='$getID'";
			$result = mysqli_query($con, $query);
		}
		
	}
	echo '<script>window.location="";</script>';
}
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<?php
			$query2="SELECT * FROM db_tables WHERE stat<>'3' AND status='0' AND table_name='$formTable' ORDER BY sort ASC";
			$result2 = mysqli_query($con, $query2);
			while($row2 = mysqli_fetch_array($result2)){
			?>
			<th><?php if($row2["label"]<>""){ ?><?=$row2["label"]?><?php }else{ ?><?=$row2["column_name"]?><?php } ?></th>
			<?php } ?>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php
		$query="SELECT * FROM {$formTable} WHERE stat<>'3'";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)){
		?>
		<tr>
			<?php
			$query2="SELECT * FROM db_tables WHERE stat<>'3' AND status='0' AND table_name='$formTable' ORDER BY sort ASC";
			$result2 = mysqli_query($con, $query2);
			while($row2 = mysqli_fetch_array($result2)){
			?>
			<td><?=$row[$row2["column_name"]]?></td>
			<?php } ?>
			<td>
				<a href="?page=form&cate=edit&formTable=<?=$formTable?>&id=<?=$row["token"]?>">
					<div class="btn btn-warning btn-xs">Edit</div>
				</a>
				<div class="btn btn-danger btn-xs" onclick="deleteRecord('<?=$row["token"]?>')">Delete</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<form method="post" action="" id="deleteForm">
<input type="hidden" name="form" value="delete_record">
<input type="hidden" name="token" value="<?=$token?>">
<input type="hidden" id="recordID" name="recordID">
</form>
<script>
function deleteRecord(strToken){
	document.getElementById('recordID').value=strToken;
	swal({  
	  title: "Delete",   
	  text: "Confirm to delete this?",
	  showCancelButton: true,  
	  html: true , 
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes"
	}, 
	function(){
	  	document.getElementById('deleteForm').submit();
	});
}
</script>