<?php
$recordID="";
if(isset($_POST["recordID"])&&!empty($_POST["recordID"])){
	$recordID=$_POST["recordID"];
}
$query="DELETE FROM {$formTable} WHERE token='$recordID'";
$result=mysqli_query($con, $query);
?>
<script type="text/javascript">window.location="";</script>