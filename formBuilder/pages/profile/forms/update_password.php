<?php
$current_password="";
if(isset($_POST["current_password"])&&!empty($_POST["current_password"])){
	$current_password=$_POST["current_password"];
}

$currentEncrypted = md5($adminLogin.".".$current_password);

$new_password="";
if(isset($_POST["new_password"])&&!empty($_POST["new_password"])){
	$new_password=$_POST["new_password"];
}
$confirm_new_password="";
if(isset($_POST["confirm_new_password"])&&!empty($_POST["confirm_new_password"])){
	$confirm_new_password=$_POST["confirm_new_password"];
}

if($currentEncrypted==$adminEncrypted){
	if($new_password<>""&&$new_password==$confirm_new_password){
		$encrypted = md5($adminLogin.".".$new_password);

		$query="UPDATE admin SET encrypted='$encrypted' WHERE token='$adminLogin'";
		$result = mysqli_query($con, $query);

		echo '<script>window.location="?page=profile&cate=&status=1";</script>';

	}else{
		echo '<script>window.location="?page=profile&cate=&status=3";</script>';
	}
}else{
	echo '<script>window.location="?page=profile&cate=&status=2";</script>';
}
?>