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

$filterSQL=" WHERE stat = ''";
if($filterBy=="archive"){
	$filterSQL=" WHERE stat = '3'";
}

/* Paginations */
$query="SELECT * FROM {$formTable}".$filterSQL;
$pageLimit = 25;
if($pageLimit==0){ $pageLimit=25; }
if($p<>""&&$p<>0&&$p<>1){
    $pageStart = $pageLimit * ($p-1);
}else{
    $p=1;
    $pageStart = 0;
}
$result=mysqli_query($con, $query);
$TotalProducts = mysqli_num_rows($result);
$TotalPage = ceil($TotalProducts/$pageLimit);
/* Paginations */

$query=$query." LIMIT $pageStart, $pageLimit";
?>

<div class="container">
	<div class="row" style="padding-right:15px;padding-left:15px;">

		<div class="row" style="padding-right:15px;padding-left:15px;padding-bottom:20px;">

			<?php $btnStyle="btn-info";$textStyle="";if($filterBy==""){ $btnStyle="active";$textStyle="color: #c7703a;"; } ?>
			<a href="?page=table&formTable=<?=$formTable?>&filterBy=">
				<div class="btn <?=$btnStyle?>">
					Active List
				</div>
			</a>

			<?php $btnStyle="btn-info";$textStyle="";if($filterBy=="archive"){ $btnStyle="active";$textStyle="color: #c7703a;"; } ?>
			<a href="?page=table&formTable=<?=$formTable?>&filterBy=archive">
				<div class="btn <?=$btnStyle?>">
					<i class="fa fa-archive"></i> Archive List
				</div>
			</a>
		</div>

		<div class="table-responsive">

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
							<div class="btn btn-warning btn-xs" onclick="archiveRecord('<?=$row["token"]?>')">Archive</div>
							<div class="btn btn-danger btn-xs" onclick="deleteRecord('<?=$row["token"]?>')">Delete</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>

		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="?p=0&page=<?=$page?>&formTable=<?=$formTable?>&filterBy=<?=$filterBy?>">First Page</a></li>

				<?php if($p>1){ ?>
				<li class="page-item"><a class="page-link" href="?p=<?=$p-1?>&page=<?=$page?>&formTable=<?=$formTable?>&filterBy=<?=$filterBy?>">Previous</a></li>
				<?php } ?>

				<?php
				for ($x = 1; $x <= $TotalPage; $x++){ 
					$mixValue=$x-$p;
					if($mixValue<3&&$mixValue>-2){ ?>
						<li class="page-item <?php if($p==$x||$p==""){ ?> active<?php } ?>">
							<a class="page-link" href="?p=<?=$x?>&page=<?=$page?>&formTable=<?=$formTable?>&filterBy=<?=$filterBy?>"><?=$x?></a>
						</li>
					<?php } ?>
				<?php } ?>

				<?php if($p<$TotalPage||$p==""){ ?>
				<li class="page-item"><a class="page-link" href="?p=<?=$p+1?>&page=<?=$page?>&formTable=<?=$formTable?>&filterBy=<?=$filterBy?>">Next</a></li>
				<?php } ?>

				<li class="page-item"><a class="page-link" href="?p=<?=$TotalPage?>&page=<?=$page?>&formTable=<?=$formTable?>&filterBy=<?=$filterBy?>">Last Page</a></li>

				<li class="page-item"><a class="page-link" href="#">Total <?=$TotalProducts?> Items</a></li>

			</ul>
		</nav>

	</div>
</div>

<form method="post" action="" id="deleteForm">
<input type="hidden" name="form" value="delete_record">
<input type="hidden" name="token" value="<?=$token?>">
<input type="hidden" id="recordID" name="recordID">
</form>
<script>
function deleteRecord(strToken){
	document.getElementById('recordID').value=strToken;
	swal({  
		icon: "danger", 
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

<form method="post" action="" id="archiveForm">
<input type="hidden" name="form" value="archive_record">
<input type="hidden" name="token" value="<?=$token?>">
<input type="hidden" id="recordAID" name="recordID">
</form>
<script>
function archiveRecord(strToken){
	document.getElementById('recordAID').value=strToken;
	swal({  
	  title: "Archive",   
	  text: "Confirm to archive this?",
	  showCancelButton: true,  
	  html: true , 
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes"
	}, 
	function(){
	  	document.getElementById('archiveForm').submit();
	});
}
</script>