<?php
$username="";
if(isset($_POST["username"])&&!empty($_POST["username"])){
	$username=$_POST["username"];
}
$password="";
if(isset($_POST["password"])&&!empty($_POST["password"])){
	$password=$_POST["password"];
}
$query="SELECT * FROM admin WHERE username='$username' AND stat<>'3'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result)==0){?>
	<script>window.location="?status=1";</script>
<?php }else{ ?>
	<?php
	while($row=mysqli_fetch_array($result)){
		$token = $row["token"];
		$encrypted = $row["encrypted"];
		$status = $row["status"];
	}
	$tryEncrypt = md5($token.".".$password);
	if($encrypted==$tryEncrypt&&$status==0){
		$_SESSION["adminlogin"] = $token;
		?><script>window.location="?success";</script><?php
	}elseif($status==1){
		?><script>window.location="?status=3";</script><?php
	}else{
		?><script>window.location="?status=2";</script><?php
	}
	?>
<?php } ?>