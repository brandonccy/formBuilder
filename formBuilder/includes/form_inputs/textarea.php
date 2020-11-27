<?php
$colValue="";
if($COLUMN_NAME=="time"||$COLUMN_NAME=="u_time"){ $colValue=$Time; }
?>
<?php
$COLUMN_LNAME=$COLUMN_NAME;
if($row["label"]<>""){ $COLUMN_LNAME = $row["label"]; }
?>
<div class="form-group">
	<label for="<?=$COLUMN_NAME?>"><?=$COLUMN_LNAME?> <?php if($row["required"]==0){ ?>*<?php }else{ echo "(Optional)"; } ?>:</label>
	<textarea class="form-control" id="<?=$COLUMN_NAME?>" name="<?=$COLUMN_NAME?>" <?php if($row["required"]==0){ ?> required="required"<?php } ?> style="<?=$row["column_css"]?>" placeholder="<?=$row["placeholder"]?>"><?=$colValue?></textarea>
	<?php if($row["short_desc"]<>""){ ?>
		<small class="form-text text-muted"><?=$row["short_desc"]?></small>
	<?php } ?>
</div>