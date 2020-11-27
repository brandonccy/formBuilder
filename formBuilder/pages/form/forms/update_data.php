<?php
foreach ($_POST as $key => $value) {
	if($key=="form"||$key=="token"){}else{
		$valueKey=$_POST[$key];$valueKey = str_replace("'", '&#39;', $valueKey);
		if($key=="phone"){
			$valueKey = str_replace(array("+", "-", " ", "(", ")"), "", $valueKey);
		}
		$result=mysqli_query($con, "UPDATE {$formTable} SET {$key}='{$valueKey}' WHERE token='$id'");
	}
}
?>
<script>window.location="?page=form&cate=edit&id=<?=$id?>&formTable=<?=$formTable?>&status=1";</script>