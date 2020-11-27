<?php
$query="INSERT INTO {$formTable} (token, date, time) VALUES ('$Token', '$Today', '$Time')";
$result=mysqli_query($con, $query);
$getID=mysqli_insert_id($con);
foreach ($_POST as $key => $value) {
	if($key=="form"||$key=="token"){}else{
		$valueKey=$_POST[$key];$valueKey = str_replace("'", '&#39;', $valueKey);
		if($key=="phone"){
			$valueKey = str_replace(array("+", "-", " ", "(", ")"), "", $valueKey);
		}
		$result=mysqli_query($con, "UPDATE {$formTable} SET {$key}='{$valueKey}' WHERE id='$getID'");
	}
}
?>
<script>window.location="?page=form&formTable=<?=$formTable?>&status=1";</script>