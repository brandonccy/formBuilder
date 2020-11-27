<?php
$COLUMN_LNAME=$COLUMN_NAME;
if($row["label"]<>""){ $COLUMN_LNAME = $row["label"]; }
?>
<div class="form-group">
	<label for="<?=$COLUMN_NAME?>"><?=$COLUMN_LNAME?> <?php if($row["required"]==0){ ?>*<?php }else{ echo "(Optional)"; } ?>:</label>
	<select class="form-control select2" id="<?=$COLUMN_NAME?>" name="<?=$COLUMN_NAME?>" <?php if($row["required"]==0){ ?> required="required"<?php } ?> style="<?=$row["column_css"]?>">
		<option value="">Select</option>
		<?php
		if($row["select_table"]<>""){ ?>
			<?php
			$select_table = $row["select_table"];
			$query2="SELECT * FROM {$select_table} WHERE stat<>'3' AND status='0' ORDER BY name ASC";
			$result2 = mysqli_query($con, $query2);
			while($row2 = mysqli_fetch_array($result2)){ 
			?>
			<option value="<?=$row2["name"]?>"><?=$row2["name"]?></option>
			<?php } ?>
		<?php } ?>
		<?php
		$select_addon = $row["select_addon"];
		$query2="SELECT DISTINCT name FROM db_forms_selects WHERE stat<>'3' AND status='0' AND form_column_name='$select_addon' AND admin_id='$adminlogin' ORDER BY name ASC";
		$result2 = mysqli_query($con, $query2);
		while($row2 = mysqli_fetch_array($result2)){ 
		?>
			<option value="<?=$row2["name"]?>"><?=$row2["name"]?></option>
		<?php } ?>
	</select>
	<?php if($row["short_desc"]<>""){ ?>
		<small class="form-text text-muted"><?=$row["short_desc"]?></small>
	<?php } ?>
</div>