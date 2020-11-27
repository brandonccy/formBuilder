<?php
$username="";
if(isset($_POST["username"])&&!empty($_POST["username"])){
	$username=$_POST["username"];
}
$password="";
if(isset($_POST["password"])&&!empty($_POST["password"])){
	$password=$_POST["password"];
}
if($password<>""){
	$_POST["encrypted"] = md5($Token.".".$password);
}

if($send_count==0&&$role==""){
	?>
	<script>window.location="?page=form&formTable=<?=$formTable?>&status=2";</script>
	<?php
}else{

	if($role==""){
		$send_count--;
		$query="UPDATE admin SET send_count='$send_count' WHERE id='$adminlogin'";
		$result=mysqli_query($con, $query);
	}
	
	$query="INSERT INTO {$formTable} (token, date, time, username) VALUES ('$Token', '$Today', '$Time', '$username')";
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
<?php } ?>