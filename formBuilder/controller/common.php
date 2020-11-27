<?php
/* Authentication Functions */
$adminLogin="";
if(isset($_SESSION["adminlogin"])&&!empty($_SESSION["adminlogin"])){
	$adminLogin = $_SESSION["adminlogin"];
	$query="SELECT * FROM admin WHERE token='$adminLogin'";
	$result = mysqli_query($con, $query);
	while($row=mysqli_fetch_array($result)){
		$adminlogin = $row["id"];
		$role = $row["role"];
		$adminName = $row["name"];
		$send_count = $row["send_count"];
		$send_limit = $row["send_limit"];
		$username = $row["username"];
		$adminEncrypted = $row["encrypted"];
		$admintoken = $row["token"];
	}
}
?>