<?php
$key = md5(uniqid().$Token);
$colValue = substr($key, 0, 12);

if($COLUMN_NAME=="time"||$COLUMN_NAME=="u_time"){ 
	$colValue=$Time; 
}elseif($COLUMN_NAME=="date"||$COLUMN_NAME=="u_date"){
	$colValue = $Today;
}elseif($COLUMN_NAME=="admin_id"){
	$colValue = $adminlogin;
}
if($cate=="edit"&&$row2[$COLUMN_NAME]<>""){
	$colValue = $row2[$COLUMN_NAME];
}
?>
<input type="hidden" class="form-control" id="<?=$COLUMN_NAME?>" name="<?=$COLUMN_NAME?>" <?php if($row["required"]==0){ ?> required="required"<?php } ?> value="<?=$colValue?>">